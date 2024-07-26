<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', [PostController::class, 'index'])->name('index');
Route::get('/teste-one', [PostController::class,'teste_one'])->name('teste-one');
Route::get('/perfil', [PostController::class,'perfil'])->name('perfil');
Route::post('/upload/{id}', [PostController::class,'upload'])->name('upload');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('index');
    })->name('dashboard');
});
