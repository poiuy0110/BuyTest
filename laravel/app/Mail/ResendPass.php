<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Request;

class ResendPass extends Mailable
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
    {   $member = $this->oMember;

        $domain = Request::server('REMOTE_ADDR');
        
        $member->chgpass_url = "http://".$domain."/member/memberChgPassConfirm/".htmlentities($member->chgpass_token);
        return $this->view('mail.memberchgpass',compact('member'));
    }
}
