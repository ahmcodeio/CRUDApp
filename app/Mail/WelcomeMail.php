<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class WelcomeMail extends Mailable
{
    // public $user, $image;

  


    public $students, $user_id, $user;

    

    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($students)
    {
        $this->students = $students;

     

      

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        
        // dd($this->data->toArray(), 'wwww');
        return $this->view('emails.welcome');

       

    }
}
