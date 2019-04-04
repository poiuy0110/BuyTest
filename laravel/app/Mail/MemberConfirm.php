<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MemberConfirm extends Mailable
{
    use Queueable, SerializesModels;

    protected $oMember;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($oMember)
    {
        //
        $this->oMember = $oMember;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.memberconfirm');
    }
}
