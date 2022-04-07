<?php

namespace App\Console\Commands;

use App\Mail\WelcomeMail;
use App\Models\Student;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use PhpParser\Node\Stmt\Foreach_;

class HelloWorldCommand extends Command
{

    public $user_id;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:mail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'this command will be auto for emailing in mailtrap';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */


    // $userid = [];
    // array_push($userid, $user);

    public function handle()
    {
        
        info('mail first');
        sleep(1);
        info('mail second');
        $student = Student::whereMonth('birth', date('m-d'))
                            ->whereDay('birth', date('d') )
                            // ->GROUPBY('user_id')
                            
                            ->get();


        

        // $userid = [];                  
        foreach ($student as $mystudent) {

            // dd($mystudent->toArray(), $student->toArray());

        $user = User::find($mystudent->user_id);
        // array_push($userid, $user);


        Mail::to($user)->send(new WelcomeMail($mystudent));

        }

        
//

// $users = User::wherehas('students', function($studentQuery) {
//     $studentQuery

   
//         ->whereMonth('birth', date('m-d'))
//         ->whereDay('birth', date('d'));
//         // ->get();
//         // dd($studentQuery);
// })
//     ->with('students')
//     ->get();

//     // dd($users);
//     foreach ($users as $user) {
//         Mail::to($user)->send(new WelcomeMail($user->students));
//     }

    


//
        // dd($userid);


        echo "check email";

       
    } 
}
