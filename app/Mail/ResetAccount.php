<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
use App\Models\VerifyCode;

class ResetAccount extends Mailable
{
    use Queueable, SerializesModels;

    public User $user;
    public VerifyCode $code;

    public function __construct(User $user,VerifyCode $code)
    {
        $this->user = $user;
        $this->code = $code;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('email.reset');
    }
}
