<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\EventController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout']);

Route::get('register', [RegisterController::class, 'showRegisterForm'])->middleware('guest');
Route::post('register',[RegisterController::class, 'postRegister']);

Route::get('buat-event', function () {
    return view('make_event', [
        "title" => "Buat Event"
    ]);
})->middleware('auth');
Route::post('buat-event', [HomeController::class, 'postEvent']);

Route::get('/{event:id}', [EventController::class, 'event'])->name('detail-event');

Route::get('admin', function () {
    return view('admin_dashboard', [
        "title" => "Dashboard Admin"
    ]);
});

Route::get('profil', function(){
    return view('profile', [
        "title" => "Profil Saya"
    ]);
});

Route::get('ubah-profil', function(){
    return view('change_profile', [
        "title" => "Ubah Profil Saya"
    ]);
});

Route::get('ubah-password', function () {
    return view('change_password', [
        "title" => "Ubah Password Saya"
    ]);
});

Route::get('detail-event/beli-tiket', function () {
    return view('payment', [
        "title" => "Pembayaran"
    ]);
});