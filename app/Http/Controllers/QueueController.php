<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Mail;
use Storage;
use App\User;
use App\Jobs\SendReminderEmail;
use App\Jobs\SendItem;

class QueueController extends Controller{
  //接口测试
  public function test(){
    Redis::set('aaa', '100');
  }
  //redis缓存
  public function test2(){
    Redis::set('cache01', '缓存数据01');
    Redis::set('cache02', '缓存数据02');
    Redis::set('cache03', '缓存数据03');
    Redis::set('cache04', '缓存数据04');
    
    return Redis::get('cache04');
  }

  //推送提醒邮件到队列
  public function sendReminderEmail(){

    //分配队列
    $job = new SendReminderEmail();
    //$job = (new SendReminderEmail())->onQueue('emails');
    //延迟一分钟
    //$job = (new SendReminderEmail())->delay(60);
    $this->dispatch($job);

    return '邮件推送队列成功';
  }

  //推送打印到队列
  public function sendItem(){

    //分配队列
    $job = new SendItem();

    $this->dispatch($job);

    return '推送队列成功';
  }
}
