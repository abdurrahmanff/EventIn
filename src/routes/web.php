<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\TransactionController;
use App\Models\Event;
use App\Models\EventCategory;
use App\Models\Transaction;
use App\Http\Controllers\ProfileController;
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
        "categories" => EventCategory::all()
    ]);
})->middleware('auth');
Route::post('buat-event', [EventController::class, 'postEvent']);
Route::get('buat-event/{event:id}/buat-tiket', [EventController::class, 'eventTicket'])->middleware('auth');
Route::post('buat-event/{event:id}/buat-tiket', [EventController::class, 'postTicket']);

Route::get('detail-event/{event:id}', [EventController::class, 'event'])->name('detail_event');
Route::post('detail-event/{event:id}/beli-tiket', [EventController::class, 'buyTicket'])->name('beli-tiket');

Route::get('/payment/{transaction:id}', [TransactionController::class, 'getPayment'])->name('payment')->middleware('auth');
Route::post('/payment/{transaction:id}/confirm', [TransactionController::class, 'confirmPayment'])->middleware('auth');

Route::get('admin', function () {
    if(Auth::user()->role_id != 1){
        abort(404);
    }
    return view('admin_dashboard', [
        "title" => "Dashboard Admin",
        // Get event ordered by id desc
        "events" => Event::orderBy('id', 'desc')->paginate(10)
    ]);
})->name('admin');
Route::post('admin/event/{event:id}/acc', [EventController::class, 'acceptEvent']);
Route::post('admin/event/{event:id}/deny', [EventController::class, 'rejectEvent']);


Route::get('profil', function(){
    return view('profile', [
        "title" => "Profil Saya"
    ]);
});

Route::get('ubah-profil', [ProfileController::class, 'showChangeProfile']);

Route::post('ubah-profil', [ProfileController::class, 'postChangeProfile']);

Route::get('ubah-password', [ProfileController::class, 'showChangePassword']);

Route::post('ubah-password', [ProfileController::class, 'postChangePassword']);

// Route::get('events', function () {
//     return view('events',[
//         "title" => "Semua Event",
//         "events" => Event::with('category')->get()
//     ]);
// });
