<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;

class NewUserWelcome extends Mailable
{
    use Queueable, SerializesModels;
    public $users;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {   
        $this->users = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('view.name');
    }
}
