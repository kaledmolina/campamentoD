<?php

namespace App\Livewire;

use App\Models\Payment;
use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class CamperConsultation extends Component
{
    use WithFileUploads;

    public $document_number_search = '';
    public $camper = null;

    // Payment Form
    #[Validate('required|numeric|min:1000')]
    public $amount = '';

    #[Validate('required|image|max:10240')]
    public $payment_proof;

    #[Validate('nullable|string|max:500')]
    public $notes = '';

    public function search()
    {
        $this->validate([
            'document_number_search' => 'required',
        ]);

        $this->camper = User::where('document_number', $this->document_number_search)->first();

        if (!$this->camper) {
            $this->addError('document_number_search', 'No se encontró ningún campista con este número de documento.');
        } else {
            $this->reset(['amount', 'payment_proof', 'payment_success', 'notes']);
        }
    }

    public function savePayment()
    {
        if (!$this->camper)
            return;

        $this->validate([
            'amount' => 'required|numeric|min:1000',
            'payment_proof' => 'required|image|max:10240',
            'notes' => 'nullable|string|max:500',
        ]);

        $proofPath = $this->payment_proof->store('payments', 'public');

        Payment::create([
            'user_id' => $this->camper->id,
            'amount' => $this->amount,
            'proof_path' => $proofPath,
            'status' => 'pending',
            'notes' => $this->notes,
        ]);

        $this->payment_success = true;
        $this->reset(['amount', 'payment_proof']);

        // Refresh camper to update totals if strictly calculated in DB (though attributes are dynamic)
        $this->camper->refresh();
    }

    public function render()
    {
        return view('livewire.camper-consultation');
    }
}
