<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\user;

class PasswordRecovery extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
     public $user;
     public $url;
     public $target;
     public function __construct(user $user,$target)
     {
         $this->user=$user;
         $this->target=$target;
         $this->url=url('recover?email='.$this->user->email.'&token='.$this->target);
     }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.recover')->to($this->user->email);
    }
}
