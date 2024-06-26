<?php

use App\Http\Controllers\SubscriptionsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('subscriptions', [SubscriptionsController::class, 'index']);
Route::get('subscriptions/{id}', [SubscriptionsController::class, 'searchSubscription']);
Route::post('subscriptions/cancel/{id}', [SubscriptionsController::class, 'cancel']);
Route::post('checkin/{id}', [SubscriptionsController::class, 'checkin']);
