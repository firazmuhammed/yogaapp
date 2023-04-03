<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactUs extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
         $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->data['email'], $this->data['full_name'])
                        ->replyTo($this->data['email'], $this->data['full_name'])
                        ->to('supporttets@francisalukkas.com', 'Francis Alukkas')
                        ->subject($this->data['subject'])
                        ->view('emails.contact.contact-us')
                        ->with($this->data);
//        return $this->markdown('emails.contact.contact-us');
    }
}
