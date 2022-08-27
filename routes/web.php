<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Bot_absen;
use App\Http\Controllers\Auth;
use App\Http\Controllers\Pages;
use App\Http\Controllers\Rekam;
use App\Http\Controllers\Akun;

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
    return view('index');
});

Route::prefix("/Absen")->controller(Bot_absen::class)->group(function () {
    Route::get("/", 'index');// parameter ke-2 adalah nama controller
    Route::get("/rekam", 'rekam');
    Route::get("/course", 'course');
    Route::get("/akun", 'akun');
    Route::post("/add", 'create');
    Route::get("/detail/{id}", 'detail');
    Route::put("/update", 'update');
    Route::delete("/delete/{id}", 'delete');
});

Route::prefix("/Rekam")->controller(Rekam::class)->group(function () {
    Route::post("/update", "update");
    Route::delete("/delete/{id}", "delete");
    Route::post("/reset", "reset_aktivitas");
    Route::post("/reset/ram", "reset_ram");
});

Route::prefix("/Akun")->controller(Akun::class)->group(function () {
    Route::post("/update", "update");
});

Route::prefix("/Pages")->controller(Pages::class)->group(function () {
    Route::get("/akun", 'akun');
    Route::get("/rekam", 'rekam');
    Route::get("/course", 'course');
});

Route::controller(Auth::class)->group(function () {
    Route::get("/login", 'login');
    Route::get("/Auth/login", 'authLogin');
});