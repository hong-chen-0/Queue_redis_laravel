<?php
namespace App\Jobs;

use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Mail\Mailer;

class SendReminderEmail implements ShouldQueue{

    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user;

    /**
     * Execute the job.
     *
     * @return void
     */

    //创建JOB类任务
    public function handle(){
      Mail::send('emails.reminder',[
        'company'=>'123'
      ],function($message){
        $to = 'qgctempler@gmail.com'; 
        $message ->to($to)->subject('新邮件');  
      });
    }
}