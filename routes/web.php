<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Bot_absen;
use App\Http\Controllers\Authku;
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

Route::controller(Pages::class)->group(function () {
    Route::get("/", 'index');
    Route::get("/akun", 'akun')->middleware('login')->middleware('authku');
    Route::get("/rekam", 'rekam')->middleware('login');
    Route::get("/course", 'course')->middleware('login');
    Route::get("/status-bot", 'status_bot');
    Route::get("/rencana", 'rencana')->middleware('login')->middleware('authku');
    Route::get("/setting", 'setting')->middleware('login')->middleware('authku');
    Route::get("/log-in", 'login')->name('login');
});

Route::prefix('/absen')->controller(Bot_absen::class)->group(function () {
    Route::post('/', 'delete');
});

// Route::prefix("/Absen")->controller(Bot_absen::class)->group(function () {
//     Route::get("/", 'index')->name('Absen');// parameter ke-2 adalah nama controller
//     Route::get("/rekam", 'rekam')->name('Absen/rekam');
//     Route::get("/course", 'course');
//     Route::get("/akun", 'akun');
//     Route::post("/add", 'create');
//     Route::get("/detail/{id}", 'detail');
//     Route::put("/update", 'update');
//     Route::delete("/delete/{id}", 'delete');
// });

// Route::prefix("/Rekam")->controller(Rekam::class)->group(function () {
//     Route::post("/update", "update");
//     Route::delete("/delete/{id}", "delete");
//     Route::post("/reset", "reset_aktivitas");
//     Route::post("/reset/ram", "reset_ram");
// });

// Route::middleware(['authku'])->prefix("/Akun")->controller(Akun::class)->group(function () {
//     Route::get("/", "index");
//     Route::post("/update", "update");
// });


Route::controller(Authku::class)->group(function () {
    Route::post("/auth/login", 'authLogin');
    Route::get("/log-out", 'logout')->name('logout');
});