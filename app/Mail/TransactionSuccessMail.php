<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class TransactionSuccessMail extends Mailable
{
    public $data;


    public function __construct($data)
    {
        $this->data = $data;

    }

    public function build()
    {
        return $this
            ->from('hi@travelria.com', 'TRAVELRIA')
            ->subject('Tiket TRAVELIA Anda')
            ->view('emails.transaction-success');
    }
}
