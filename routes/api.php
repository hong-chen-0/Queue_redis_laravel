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

Route::any('/test2', [QueueController::class, 'test2']);//redis缓存

Route::any('/sendReminderEmail', [QueueController::class, 'sendReminderEmail']);

Route::any('/sendItem', [QueueController::class, 'sendItem']);