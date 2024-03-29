<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Support\Facades\Redis;

class SendItem implements ShouldQueue{
  
  use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

  /**
   * Create a new job instance.
   *
   * @return void
   */
  public function __construct(){
      //
  }

  /**
   * Execute the job.
   *
   * @return void
   */
  public function handle(){
    //Redis::set('fff', '100');

    //推送30个商品到reids队列
    $count = 30;
    $redisKey = 'goods_list';

    for ($i = 1; $i <= $count; $i++) {
        Redis::rpush($redisKey, $i);
    }
  }
}
