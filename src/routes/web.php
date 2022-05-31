<?php

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

Route::get('login', function () {
    return view('login', [
        "title" => "Login page"
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