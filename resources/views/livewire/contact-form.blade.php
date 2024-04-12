<div class="col-lg-6 col-md-7 order-2 order-md-1"
    x-init="init()"
    x-data="{
        init() {
            $wire.on('message-sent', () => {
                document.getElementById('message_sent').classList.remove('d-none');
            });
        },
    }">
    <div class="contact-form-box wow fadeInLeft" data-wow-delay=".3s">
        <div class="section-header">
            <h2 class="section-title">Let’s contact me !</h2>
            <p>I design and code beautifully simple things and i love what i do. Just simple like
                that!
            </p>
        </div>

        <div class="tj-contact-form">
            <form id="contact-form" wire:submit="sendEmail">
                <div class="row gx-3">
                    <div class="col-sm-6">
                        <div class="form_group">
                            <input type="text" name="firstname" id="firstname" placeholder="First name"
                                   wire:model="firstname"
                                   autocomplete="off">
                            @error('firstname') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form_group">
                            <input type="text" name="lastname" id="lastname" placeholder="Last name"
                                   wire:model="lastname"
                                   autocomplete="off">
                            @error('lastname') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form_group">
                            <input type="email" name="email" id="email"
                                   wire:model="email"
                                   placeholder="Email address" autocomplete="off">
                            @error('email') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form_group">
                            <input type="tel" name="phone" id="phone"
                                   wire:model="phone"
                                   placeholder="Phone number" autocomplete="off">
                            @error('phone') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form_group">
                                                <textarea name="message" id="message"
                                                          wire:model="message"
                                                          placeholder="Message"></textarea>
                            @error('message') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <x-turnstile
                        wire:model="turnstile"
                        data-language="en" />
                    @error('turnstile') <span class="error">{{ $message }}</span> @enderror

                    <div class="col-12">
                        <div class="form_btn">
                            <button type="submit" class="btn tj-btn-primary">Send Message</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- BEGIN: Contact Form Success Modal Message -->
    <div id="message_sent" wire:ignore
         class="d-none flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800"
         role="alert">
        <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
             fill="currentColor" viewBox="0 0 20 20">
            <path
                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
        </svg>
        <span class="sr-only">Info</span>
        <div>
            <span class="font-medium">Message Sent Successfully !</span><br> Thank you for contacting me. I'll get back to
            you as soon as possible.
        </div>
        <button type="button"
                class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-800 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
                data-dismiss-target="#message_sent" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
        </button>
    </div>
    <!-- END: Contact Form Success Modal Message -->
</div>
