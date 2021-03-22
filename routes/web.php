<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::get('/gallery', [ImageController::class, 'gallery'])->name('gallery');
Route::post('/upload_image', [ImageController::class, 'uploadImage']);
