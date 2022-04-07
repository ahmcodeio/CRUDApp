<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class WelcomeMail extends Mailable
{
    

    public $data, $user_id;


    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($students)
    {
        $this->data = $students;

        
        // dd( base64_encode(asset('storage/' . $students->image)));
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        // return $this->markdown('view-to-mail');

        return $this->markdown('emails.welcome')->with('students', $this->data);

        // return $this->view('emails.welcome')->with('students', $this->data);
    }
}
