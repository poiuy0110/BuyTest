<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Request;

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

        $member = $this->oMember;

        $domain = Request::server('REMOTE_ADDR');
        
        $member->active_url = "http://".$domain."/member/memberEmailConfirm/".htmlentities($member->active_token);

        return $this->view('mail.memberconfirm',compact('member'));
    }
}
