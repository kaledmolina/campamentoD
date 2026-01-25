<?php

namespace App\Livewire;

use App\Models\Payment;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateRegistration extends Component
{
    use WithFileUploads;

    #[Validate('required|min:3')]
    public $name = '';

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

    #[Validate('required|numeric|min:5|max:100')]
    public $age = '';

    #[Validate('required|image|max:10240')] // 10MB max
    public $payment_proof;

    #[Validate('nullable|image|max:10240')] // 10MB max
    public $consent_proof;

    public $registration_step = 0; // 0: Check, 1: Minor Warning, 2: Form
    public $is_minor_flow = false;

    public $registration_success = false;

    public function selectMinor()
    {
        $this->registration_step = 1;
        $this->is_minor_flow = true;
    }

    public function selectAdult()
    {
        $this->registration_step = 2;
        $this->is_minor_flow = false;
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

        $proofPath = $this->payment_proof->store('payments', 'public');

        $consentPath = null;
        if ($this->consent_proof) {
            $consentPath = $this->consent_proof->store('consents', 'public');
        }

        if ($this->zone === 'Otro') {
            $this->validate([
                'other_zone' => 'required|min:3',
            ]);
            $finalZone = $this->other_zone;
        } else {
            $finalZone = $this->zone;
        }

        // Create Camper User
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => null, // No password for campers
            'document_type' => $this->document_type,
            'document_number' => $this->document_number,
            'zone' => $finalZone,
            'congregacion' => $this->congregacion,
            'phone' => $this->phone,
            'age' => $this->age,
            'consent_proof_path' => $consentPath,
        ]);

        // Create Initial Payment
        $registrationFee = GlobalSetting::get('registration_fee', 30000); // Default 30k

        Payment::create([
            'user_id' => $user->id,
            'amount' => $registrationFee,
            'proof_path' => $proofPath,
            'status' => 'pending',
            'notes' => 'Inscripción inicial (Tarifa Global)',
        ]);

        $this->registration_success = true;
        $this->reset(['name', 'email', 'document_type', 'document_number', 'zone', 'other_zone', 'congregacion', 'phone', 'age', 'payment_proof', 'consent_proof']);
    }

    public function render()
    {
        return view('livewire.create-registration');
    }
}
