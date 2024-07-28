<?php

// Todos os imports

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Models\Post; // Adicionando o Model Post para o middleware 


//Rota index
Route::get('/', [PostController::class, 'index'])->name('index');

// Outras rotas do site
Route::get('/user_posts/{id}', [PostController::class, 'user_posts'])->name('user_posts')->middleware('auth');
Route::get('/perfil', [PostController::class,'perfil'])->name('perfil');

// Testes
Route::get('/all_posts', [PostController::class, 'all_posts'])->name('all_posts');
Route::get('search', [PostController::class, 'search'])->name('search');
Route::get('/teste-one', [PostController::class,'teste_one'])->name('teste-one');
Route::post('/upload/{id}', [PostController::class,'upload'])->name('upload');

// Rota para o middleware
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function (){
    return redirect('index');
})->name('dash');
