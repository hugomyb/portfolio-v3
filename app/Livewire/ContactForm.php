<?php

namespace App\Livewire;

use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Component;
use RyanChandler\LaravelCloudflareTurnstile\View\Components\Turnstile;

class ContactForm extends Component
{
    public $firstname = '';

    public $lastname = '';

    public $email = '';

    public $phone = '';

    public $message = '';

    public $turnstile;

    public function sendEmail(): void
    {
        $this->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'phone' => ['nullable', 'regex:/^(?:(?:\+|00)33|0)\s*[1-9](?:[\s.-]*\d{2}){4}$/'],
            'message' => 'required|min:5',
            'turnstile' => ['required', Rule::turnstile()]
        ]);

        Mail::to('hugomayonobe@gmail.com')->send(new ContactMail([
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'email' => $this->email,
            'phone' => $this->phone,
            'message' => $this->message,
        ]));

        $this->dispatch('message-sent');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}
