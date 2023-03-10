<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\EvalController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\RepController;
use App\Http\Controllers\ShopController;
use App\Models\Booking;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ShopController::class, 'index']);
Route::get('/search', [ShopController::class, 'search']);
Route::get('/detail', [ShopController::class, 'detail']);

Route::get('/evaluate/index', [EvalController::class, 'index']);

Route::group(['middleware' => 'auth'], function() {
  Route::post('/like', [LikeController::class, 'create']);
  Route::post('/unlike', [LikeController::class, 'delete']);

  Route::get('/mypage', [HomeController::class, 'index']);

  Route::get('/evaluate', [EvalController::class, 'evaluate']);
  Route::post('/evaluate', [EvalController::class, 'create']);

  Route::post('/book', [BookingController::class, 'create']);
  Route::post('/book/pay', [BookingController::class, 'pay']);
  Route::post('/book/cancel', [BookingController::class, 'cancel']);
  Route::post('/book/change', [BookingController::class, 'change']);

  Route::get('/admin', [AdminController::class, 'index']);
  Route::post('/admin/register', [AdminController::class, 'create']);

  Route::get('/rep', [RepController::class, 'index']);
  Route::post('/rep/create', [RepController::class, 'create']);
  Route::get('/rep/update', [RepController::class, 'change']);
  Route::post('/rep/update', [RepController::class, 'update']);

  Route::get('/rep/mail', [MailController::class, 'index']);
  Route::post('/rep/mail', [MailController::class, 'send']);
  Route::get('/rep/qrcode', [MailController::class, 'qrcode']);
});

require __DIR__.'/auth.php';
