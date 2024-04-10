<?php

namespace App\Livewire;

use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ContactForm extends Component
{
    #[Validate('required')]
    public $firstname = '';

    #[Validate('required')]
    public $lastname = '';

    #[Validate('required|email')]
    public $email = '';

    #[Validate(['nullable', 'regex:/^(?:(?:\+|00)33|0)\s*[1-9](?:[\s.-]*\d{2}){4}$/'])]
    public $phone = '';

    #[Validate('required|min:5')]
    public $message = '';

    public function sendEmail(): void
    {
        $this->validate();

        Mail::to('hugomayonobe@gmail.com')->send(new ContactMail([
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'email' => $this->email,
            'phone' => $this->phone,
            'message' => $this->message,
        ]));

        $this->reset();
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}
