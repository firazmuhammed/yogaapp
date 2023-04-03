<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Mail;
class SendMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'hour:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
    public function handle()
    {
//         $email = 'muhammedfiraz19@gmail.com';
// $details['email'] = 'muhammedfiraz19@gmail.com';
// $data=[
//     "info"=>"k",
//     'data'=>"l"

//  ];
//  $subject="mail";
// $d=Mail::send('emails.testmail', $data, function($message) use ($email, $subject) {
//    $message->to($email)->subject($subject);
// });
$schedule->command('queue:restart')
    ->everyFiveMinutes();

$schedule->command('queue:work --daemon')
    ->everyMinute()
    ->withoutOverlapping();
       
    }
}
