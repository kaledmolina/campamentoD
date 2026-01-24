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

    public $registration_success = false;

    public function save()
    {
        $this->validate();

        $proofPath = $this->payment_proof->store('payments', 'public');

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
        ]);

        // Create Initial Payment
        Payment::create([
            'user_id' => $user->id,
            'amount' => 30000, // 10% of 300,000
            'proof_path' => $proofPath,
            'status' => 'pending',
            'notes' => 'Inscripción inicial (10%)',
        ]);

        $this->registration_success = true;
        $this->reset(['name', 'email', 'document_type', 'document_number', 'zone', 'other_zone', 'congregacion', 'phone', 'age', 'payment_proof']);
    }

    public function render()
    {
        return view('livewire.create-registration');
    }
}
