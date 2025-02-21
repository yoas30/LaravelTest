<?php

use App\Http\Controllers\HalamanController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;





Route::get('/', function () {
    return view('welcome');
});

Route::get('/depan', function () {
    return view('depan');
});


// Route::get('/depan/{id}', function ($id) {
//     return "<h1>Saya Yoas dengan id = $id</h1>";
// })->where('id', '[0-9]+');

// Route::get('/depan/{id}/{nama}', function ($id, $nama) {
//     return "<h1>Saya Yoas dengan id = $id dan nama $nama</h1>";
// })->where(['id'=> '[0-9]+', 'nama'=>'[A-Za-z]+']);

Route::get('/siswa',[SiswaController::class, 'index']);
Route::get('/siswa/{id}',[SiswaController::class, 'detail'])
->where('id', '[0-9]+');

Route::get('/', [HalamanController::class,'index']);
Route::get('/tentang', [HalamanController::class,'tentang']);
Route::get('/kontak', [HalamanController::class,'kontak']);

