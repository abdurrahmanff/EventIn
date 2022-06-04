<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
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

Route::get('/', function () {
    return view('home', [
        "title" => "Homepage"
    ]);
});


Route::get('login', [LoginController::class, 'showLoginForm']);

Route::get('register', [RegisterController::class, 'showRegisterForm']);
Route::get('register-eo', [RegisterController::class, 'showRegisterEOForm']);
Route::post('register',[RegisterController::class, 'postRegister']);
Route::post('register-eo', [RegisterController::class, 'postRegisterEO']);

Route::get('login-eo', function () {
    return view('login_eo', [
        "title" => "Login Event Organizer"
    ]);
});

Route::get('detail-event', function () {
    return view('event_detail', [
        "title" => "Detail Event"
    ]);
});


Route::get('buat-event', function () {
    return view('make_event', [
        "title" => "Buat Event"
    ]);
});

Route::get('admin', function () {
    return view('admin_dashboard', [
        "title" => "Dashboard Admin"
    ]);
});