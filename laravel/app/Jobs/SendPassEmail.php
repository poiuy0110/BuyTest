<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Mail\ResendPass;
use Mail;

class SendPassEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $oMember;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($oMember)
    {
        //
        $this->oMember = $oMember;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        $oMember = $this->oMember;
        $email = new ResendPass($this->oMember);
        Mail::to($oMember->email)->send($email);
    }
}
