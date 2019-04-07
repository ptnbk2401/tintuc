<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegisterUser extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $arItem;
    public function __construct($arItem)
    {

        $this->arItem = $arItem;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $arInfoMail = $this->arItem;
        $this->subject("Confirm membership registration!");
        return $this->view('email.user.registered',compact('arInfoMail'));
    }
}
