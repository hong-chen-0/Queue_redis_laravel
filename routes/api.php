<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QueueController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::any('/test', [QueueController::class, 'test']);//接口测试

Route::any('/setValue', [QueueController::class, 'setValue']);//redis缓存

Route::any('/sendReminderEmail', [QueueController::class, 'sendReminderEmail']);  //推送提醒邮件到队列

Route::any('/sendItem', [QueueController::class, 'sendItem']);//推送商品到队列

Route::any('/buy', [QueueController::class, 'buy']);//购买redis里的商品

Route::any('/customerName', [QueueController::class, 'customerName']);//查看购买成功客户姓名