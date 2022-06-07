<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\EventController;
use App\Models\Category;
use App\Models\Event;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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
Route::get('eventlist', [EventController::class, 'eventlist']);

Route::get('buat-event', function () {
    return view('make_event', [
        "title" => "Buat Event",
        "categories" => Category::all()
    ]);
})->middleware('auth');
Route::post('buat-event', [EventController::class, 'postEvent']);
Route::get('buat-event/buat-tiket', function () {
    return view('make_ticket_categories', [
        "title" => "Buat Tiket"
    ]);
})->middleware('auth');

Route::get('detail-event/beli-tiket', function () {
    return view('payment', [
        "title" => "Pembayaran"
    ]);
})->name('beli-tiket');
Route::get('detail-event/{event:id}', [EventController::class, 'event'])->name('detail_event');

Route::get('admin', function () {
    if(Auth::user()->role_id != 1){
        abort(404);
    }
    return view('admin_dashboard', [
        "title" => "Dashboard Admin",
        "events" => Event::with('user')->get(),
    ]);
})->name('admin');

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

// Route::get('events', function () {
//     return view('events',[
//         "title" => "Semua Event",
//         "events" => Event::with('category')->get()
//     ]);
// });
