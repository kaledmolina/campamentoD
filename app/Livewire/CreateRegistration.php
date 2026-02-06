<?php

namespace App\Livewire;

use App\Models\Payment;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Validate;
use Livewire\Component;
use App\Models\GlobalSetting;
use Livewire\WithFileUploads;

class CreateRegistration extends Component
{
    use WithFileUploads;

    #[Validate('required|min:3')]
    public $name = '';

    #[Validate('required|min:3')]
    public $last_name = '';

    #[Validate('required|email|unique:users,email')]
    public $email = '';

    #[Validate('required')]
    public $document_type = '';

    #[Validate('required|unique:users,document_number')]
    public $document_number = '';

    #[Validate('required')]
    public $zone = '';

    public $other_zone = '';

    #[Validate('required')]
    public $congregacion = '';

    #[Validate('required')]
    public $phone = '';

    #[Validate('required|date')]
    public $document_issue_date = '';

    #[Validate('required|in:M,F')]
    public $gender = '';

    #[Validate('required|date')]
    public $birth_date = '';

    #[Validate('required|min:3')]
    public $eps = '';

    #[Validate('required|numeric|min:5|max:100')]
    public $age = '';

    #[Validate('mimes:jpg,jpeg,png,webp,pdf|max:10240')] // 10MB max, required logic handled manually
    public $payment_proof;

    #[Validate('nullable|mimes:jpg,jpeg,png,webp,pdf|max:10240')] // 10MB max
    public $consent_proof;

    #[Validate('nullable|mimes:jpg,jpeg,png,webp,pdf|max:10240')] // 10MB max
    public $pastor_letter;

    #[Validate('required|in:partial,total')]
    public $registration_type = 'total'; // Default to total

    public $congregations = [];

    public $registration_step = 0; // 0: Check, 1: Minor Warning, 2: Form

    public function updatedZone($value)
    {
        $zonesData = \App\Filament\Resources\UserResource::getZonesData();

        if (array_key_exists($value, $zonesData)) {
            $this->congregations = $zonesData[$value];
        } else {
            $this->congregations = [];
        }

        $this->congregacion = '';
    }
    public $is_minor_flow = false;

    public $registration_success = false;

    public function selectMinor()
    {
        $this->registration_step = 1;
        $this->is_minor_flow = true;
    }

    public $discountCode = '';
    public $discountMessage = '';
    public $appliedDiscount = null; // Stores percentage

    public function selectAdult()
    {
        $this->registration_step = 2;
        $this->is_minor_flow = false;
    }

    public function applyDiscount()
    {
        $this->discountMessage = '';
        $this->appliedDiscount = null;

        if (empty($this->discountCode)) {
            $this->addError('discountCode', 'Ingrese un código');
            return;
        }

        $coupon = \App\Models\Coupon::where('code', $this->discountCode)->first();

        if (!$coupon || !$coupon->isValid()) {
            $this->addError('discountCode', 'Código inválido o expirado');
            return;
        }

        $this->appliedDiscount = $coupon->percentage;
        $this->discountMessage = "¡Código aplicado! Descuento del {$coupon->percentage}%";
    }

    public function proceedToForm()
    {
        $this->registration_step = 2;
    }

    public function save()
    {
        $this->validate();

        // Custom validation for minors
        if ($this->age < 18 && !$this->consent_proof) {
            $this->addError('consent_proof', 'El consentimiento de padres es obligatorio para menores de edad.');
            return;
        }

        $consentPath = null;
        if ($this->consent_proof) {
            $consentPath = $this->consent_proof->store('consents', 'public');
        }

        if ($this->zone === 'Otro Distrito') {
            $this->validate([
                'other_zone' => 'required|min:3',
                'pastor_letter' => 'required|mimes:jpg,jpeg,png,webp,pdf|max:10240',
            ], [
                'pastor_letter.required' => 'La carta de autorización pastoral es obligatoria para campistas de otros distritos.'
            ]);
            $finalZone = $this->other_zone;
        } else {
            $finalZone = $this->zone;
        }

        $pastorLetterPath = null;
        if ($this->pastor_letter) {
            $pastorLetterPath = $this->pastor_letter->store('pastor_letters', 'public');
        }

        // Calculate Cost based on Plan
        $baseCost = $this->registration_type === 'partial' ? 120000 : 300000;
        $participationCost = $baseCost;
        $discountAmount = 0;

        // Calculate Discount logic (WITHOUT side effects yet)
        if ($this->appliedDiscount > 0) {
            $discountAmount = ($baseCost * $this->appliedDiscount) / 100;
            $participationCost = $baseCost - $discountAmount;
        }

        // Validation for payment proof (Manual)
        // Only require proof if they actually have to pay something now
        // If discount is 100%, participationCost is 0, so no proof needed.
        if ($participationCost > 0 && !$this->payment_proof) {
            $this->addError('payment_proof', 'El comprobante de pago es obligatorio.');
            return;
        }

        $proofPath = null;
        if ($this->payment_proof) {
            $proofPath = $this->payment_proof->store('payments', 'public');
        }

        try {
            \Illuminate\Support\Facades\DB::transaction(function () use ($finalZone, $consentPath, $pastorLetterPath, $baseCost, $discountAmount, $proofPath, $participationCost) {

                // 1. Process Coupon Usage (Inside Transaction)
                if ($this->appliedDiscount > 0 && !empty($this->discountCode)) {
                    $coupon = \App\Models\Coupon::where('code', $this->discountCode)
                        ->lockForUpdate() // Prevent race conditions
                        ->first();

                    if ($coupon) {
                        // Double check validity inside the lock context
                        if ($coupon->isValid()) {
                            $coupon->increment('used_count');
                        } else {
                            // If coupon became invalid between form fill and submit
                            throw new \Exception('El cupón ya no es válido o ha alcanzado su límite de uso.');
                        }
                    }
                }

                // 2. Create Camper User
                $user = User::create([
                    'name' => $this->name,
                    'last_name' => $this->last_name,
                    'email' => $this->email,
                    'password' => null, // No password for campers
                    'document_type' => $this->document_type,
                    'document_number' => $this->document_number,
                    'document_issue_date' => $this->document_issue_date,
                    'gender' => $this->gender,
                    'birth_date' => $this->birth_date,
                    'eps' => $this->eps,
                    'zone' => $finalZone,
                    'congregacion' => $this->congregacion,
                    'phone' => $this->phone,
                    'age' => $this->age,
                    'consent_proof_path' => $consentPath,
                    'pastor_letter_path' => $pastorLetterPath,
                    'registration_type' => $this->registration_type,
                    'participation_cost' => $baseCost,
                    'discount_amount' => $discountAmount,
                    'coupon_code' => $this->discountCode ?: null,
                ]);

                // 3. Create Initial Payment ONLY if there is a cost
                if ($participationCost > 0) {
                    $registrationFee = GlobalSetting::get('registration_fee', 30000); // Default 30k

                    // If the remaining cost is LESS than the standard fee (e.g. 90% discount), 
                    // only charge what is left.
                    $amountToCharge = min($registrationFee, $participationCost);

                    \Illuminate\Support\Facades\Auth::login($user);

                    Payment::create([
                        'user_id' => $user->id,
                        'amount' => $amountToCharge,
                        'proof_path' => $proofPath,
                        'status' => 'pending',
                        'type' => 'registration',
                        'notes' => 'Inscripción inicial (Tarifa Global)',
                    ]);
                }
            });

            $this->registration_success = true;
            $this->reset(['name', 'last_name', 'email', 'document_type', 'document_number', 'document_issue_date', 'gender', 'birth_date', 'eps', 'zone', 'other_zone', 'congregacion', 'phone', 'age', 'payment_proof', 'consent_proof', 'pastor_letter', 'registration_type', 'discountCode', 'appliedDiscount', 'discountMessage', 'registration_step']);

        } catch (\Exception $e) {
            $this->addError('discountCode', 'Error al procesar el registro: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.create-registration');
    }
}
