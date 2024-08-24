<?php

// Todos os imports

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Models\Post; // Adicionando o Model Post para o middleware 


//Rota index
Route::get('/', [PostController::class, 'index'])->name('index');

// Rota para cadastrar o post
Route::get('/adicionar_post', [PostController::class, 'adicionar_post'])->name('adicionar_post')->middleware('auth');
Route::post('/cadastro_post', [PostController::class, 'cadastro_post'])->name('cadastro_post')->middleware('auth');

// Rota do dashboard (só para o administrador)
Route::get('/dash', [PostController::class, 'dash'])->name('dash')->middleware('auth');

// Rota para vizualizar o post em tela cheia
Route::get('/vizualizar_post/{id}', [PostController::class, 'vizualizar_post'])->name('vizualizar_post');

// Rotas de pesquisa (index e user_posts)
Route::get('/search_index', [PostController::class, 'search_index'])->name('search_index');
Route::get('/search_user_posts', [PostController::class, 'search_user_posts'])->name('search_user_posts');

// Rotas de likes
Route::get('/like/{id}', [PostController::class, 'like'])->name('like');

// Rotas do perfil
Route::get('/perfil', [PostController::class, 'perfil'])->name('perfil')->middleware('auth');
Route::put('/atualizar_perfil/{id}', [PostController::class, 'atualizar_perfil'])->name('atualizar_perfil')->middleware('auth');

// Rotas dos perfis de outros usuários
Route::get('/perfil_other_user/{id}', [PostController::class, 'perfil_other_user'])->name('perfil_other_user');

// Todos os posts do usuário logado
Route::get('/user_posts/{id}', [PostController::class, 'user_posts'])->name('user_posts')->middleware('auth');

// Rotas de edição
Route::get('/tela_editar_post/{id}', [PostController::class, 'tela_editar_post'])->name('tela_editar_post')->middleware('auth');
Route::put('/editar_post/{id}', [PostController::class, 'editar_post'])->name('editar_post')->middleware('auth');

// Rota de deletar
Route::delete('/deletar_post/{id}', [PostController::class, 'deletar_post'])->name('deletar_post')->middleware('auth');

// Rota para o middleware
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [PostController::class, 'index']);
})->name('dashboard');
