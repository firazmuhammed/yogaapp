<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\BlogNewsLetter;
use Mail;
use App\Models\Blog;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $data,$email;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data,$email)
    {
        $this->data= $data;
        $this->email=$email;
        
        
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $data = $this->data;
        $d=Mail::send('emails.xmas-order', $this->data, function($message) use ($data) {
                $message->to( $this->email)->subject('Aptus-Order');
             });
        // $d=Mail::send('emails.testmail', $data, function($message) use ($data) {
        //     $message->to($this->email)->subject('hi');
         
        //  });
        //  $d=Mail::send('emails.testmail', $data, function($message) use ($email, $subject) {
        //     $message->to($email)->subject($subject);
        //  });
    }
}
