<?php

namespace App\Jobs;

use App\Jobs\Job;
use Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendText extends Job implements SelfHandling, ShouldQueue
{
    use InteractsWithQueue, SerializesModels;


    public $text;
    public $phone;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($text,$phone)
    {
        //
        $this->text = $text;
        $this->phone = $phone;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //

        Mail::raw($this->text, function ($message){
          $message->from(env('MAIL_USERNAME','john.smith@email.com'));
          $message->to($this->phone);
          //var_dump($this->phone); exit();
        });
    }
}
