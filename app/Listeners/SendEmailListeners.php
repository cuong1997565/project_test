<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;
class SendEmailListeners
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    /**
     * Handle the event.
     *
     * @param  UserRegistered  $event
     * @return void
     */
    public function handle(UserRegistered $event)
    {
        $data = array('name' => $event->user->username, 'email' => $event->user->email, 'body' => 'Welcome to our website. Hope you will enjoy our articles');
        Mail::send('emails.mail',$data,function($message) use ($data){
            $message->to($data['email'])->subject('Welcome to our Website');
            $message->from('noreply@artisansweb.net');
        });
    }
}
