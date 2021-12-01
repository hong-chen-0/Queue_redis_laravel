<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class QueueController extends Controller{
  //接口测试
  public function test(){
    return 'success';
  }
  //redis缓存
  public function test2(){
    Redis::set('cache01', '缓存数据01');
    Redis::set('cache02', '缓存数据02');
    Redis::set('cache03', '缓存数据03');
    Redis::set('cache04', '缓存数据04');
    
    return Redis::get('cache03');

  }
}
