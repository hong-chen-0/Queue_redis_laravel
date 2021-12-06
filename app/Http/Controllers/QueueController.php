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
use Illuminate\Support\Facades\Hash;

class QueueController extends Controller{
  //接口测试
  public function test(){
    Redis::rpush('zzz', '100');
  }
  //redis缓存
  public function test2(){
    Redis::set('cache04', 'data');
    
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

  //推送商品到队列
  public function sendItem(){

    //指定队列
    $job = new SendItem();
    //队列任务推送
    $this->dispatch($job);

    return '推送队列成功';
  }

  //购买redis里的商品
  public function buy()
  {
    // 随机用户名
    $username = '小王';

    if ($goodsId = Redis::lpop('goods_list')) {
      // 购买成功(存HASH表)
      Redis::hset('buy_success', $goodsId, $username);
    } else {
      // 购买失败
      Redis::incr('buy_fail');
    }
    return 'buy over';
  }

  //查看购买成功客户姓名
  public function customerName(){
    $customerNames = Redis::hvals('buy_success');

    return json_encode($customerNames, JSON_UNESCAPED_UNICODE);//编码转换

  }
}
