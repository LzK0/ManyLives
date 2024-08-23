@extends('layouts.main')

@section('title')
Meus Posts
@endsection

@section('user_image')
{{ asset('storage/' . Auth::user()->image) }}
@endsection

@section('css')
{{ asset('css/style_user_posts.css') }}
@endsection

@php
use App\Models\User;
@endphp

@section('content')
<section class="w-full min-h-screen bg-gray-100">

<style>
    :root {
        --random-color: {{ $color }};
    }

    #random-color {
        background-color: var(--random-color);
    }
</style>


    <!-- Container principal -->
    <div class="w-full max-w-7xl mx-auto p-5">
        <!-- Verificação de posts -->
        @if ($posts->count() == 0)
            <div class="w-full flex flex-col items-center justify-center p-5">
                <p class="text-lg text-gray-700">Você ainda não tem posts.</p>
            </div>
        @else
            <!-- Seção de busca -->
            <div class="flex justify-center mb-6">
                <div class="relative w-full max-w-lg">
                    <form action="{{ route('search_user_posts') }}" method="get">
                        @csrf
                        <input type="text" id="live-search" maxlength="60" placeholder="Pesquisar título..." name="search"
                            class="w-full py-3 px-4 rounded-lg border border-yellow-500 bg-gray-50 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-yellow-600 focus:border-yellow-600 text-sm transition duration-300 ease-in-out">
                        <button type="submit" class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-500 hover:text-gray-700 transition-colors duration-300">
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 15.232a6.5 6.5 0 1 0-9.193-9.193 6.5 6.5 0 0 0 9.193 9.193zm1.06-1.06a8 8 0 1 0-11.313-11.313A8 8 0 0 0 16.293 14.171l3.657 3.657a1 1 0 0 0 1.415-1.415l-3.657-3.657z" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>

            <!-- Exibição dos posts -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($posts as $post)
                <article class="border border-gray-300 bg-white rounded-lg shadow-md transition-transform duration-300 ease-in-out transform hover:scale-105 hover:shadow-xl flex flex-col hidd">
                    @if ($post->image_post && $post->image_post !== 'error')
                        <div class="w-full h-48 overflow-hidden rounded-t-lg">
                            <img src="{{ asset('storage/' . $post->image_post) }}" alt="Post Image" class="w-full h-full object-cover">
                        </div>
                    @else
                        <div class="w-full h-48 rounded-t-lg" id="random-color"></div>
                    @endif
                    <div class="flex flex-col flex-1 p-4">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-12 h-12 rounded-full bg-gray-300 overflow-hidden">
                                <img src="{{ asset('storage/' . User::find($post->user_id)->image) }}" alt="User Image" class="w-full h-full object-cover rounded-full">
                            </div>
                            <div class="flex flex-col justify-center">
                                <p class="text-sm font-semibold">{{ User::find($post->user_id)->name }}</p>
                                <p class="text-xs text-gray-500">{{ date('d/m/Y', strtotime($post->published_at)) }}</p>
                            </div>
                        </div>
                        <div class="flex-1 mb-3">
                            <a href="{{ route('vizualizar_post', $post->id) }}" class="text-md font-semibold text-gray-800 hover:text-yellow-600">{{ $post->title }}</a>
                        </div>
                        <p class="text-sm text-gray-700 mb-3">{{ $post->description }}</p>
                        <div class="flex justify-between items-center">
                            <div class="flex items-center gap-1 text-sm text-gray-600">
                                <i class="fa-regular fa-heart text-red-500 cursor-pointer"></i>
                                <p class="text-xs">2</p>
                            </div>
                            @if (Auth::check() && Auth::user()->id == $post->user_id)
                                <div class="flex items-center gap-2 text-sm text-gray-600">
                                    <a href="{{ route('tela_editar_post', $post->id) }}" class="text-yellow-500 hover:text-yellow-600 transition duration-200">
                                        <i class="fa-solid fa-pencil"></i>
                                    </a>
                                    <form action="{{ route('deletar_post', $post->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-600 transition duration-200">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>
                </article>
                @endforeach
            </div>

            <!-- Paginação -->
            <div class="w-full flex justify-center items-center mt-8">
                {{ $posts->links() }}
            </div>
        @endif
    </div>
</section>
@endsection

@section('js')
{{ asset('js/script_user_posts.js') }}
@endsection
