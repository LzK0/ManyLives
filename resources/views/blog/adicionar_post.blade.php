@extends('layouts.main')

@section('title')
Adicionar POST
@endsection

@section('user_image')
{{ asset('storage/' . Auth::user()->image) }}
@endsection

@section('css')
{{ asset('css/style_adicionar_post.css') }}
@endsection

@section('content')
<section class="w-full min-h-screen bg-gray-100 flex justify-center items-center py-8">

    <div class="w-full max-w-4xl bg-white shadow-lg rounded-lg p-6">
        <form action="cadastro_post" method="post" enctype="multipart/form-data">
            @csrf

            <div class="relative w-full h-72 bg-gray-200 rounded-lg overflow-hidden mb-6">
                <img src="" alt="Prévia da Imagem" class="w-full h-full object-cover hidden" id="image_preview">
                <label for="image-post" class="flex items-center justify-center cursor-pointer bg-yellow-500 text-white rounded-full w-32 h-32 transition-transform transform hover:scale-105 absolute bottom-4 right-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 0 1 5.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 0 0-1.134-.175 2.31 2.31 0 0 1-1.64-1.055l-.822-1.316a2.192 2.192 0 0 0-1.736-1.039 48.774 48.774 0 0 0-5.232 0 2.192 2.192 0 0 0-1.736 1.039l-.821 1.316Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0ZM18.75 10.5h.008v.008h-.008V10.5Z" />
                    </svg>
                </label>
                <input type="file" name="image_post" id="image-post" class="hidden">
            </div>

            @error('image_post')
            <div class="text-red-600 text-center mb-4">
                {{ $message }}
            </div>
            @enderror

            <div class="flex items-center mb-6">
                <div class="w-16 h-16 rounded-full overflow-hidden mr-4">
                    <img src="{{ asset('storage/' . Auth::user()->image) }}" alt="Imagem do Autor" class="w-full h-full object-cover">
                </div>
                <div>
                    <h4 class="text-xl font-semibold">Autor: {{ Auth::user()->name }}</h4>
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <p class="text-gray-600">Será publicado: {{ date('d/m/Y', strtotime(now())) }}</p>
                    <input type="hidden" name="published_at" value="{{ now() }}">
                    <input type="hidden" name="like" value="0">
                </div>
            </div>

            @if (!Auth::user()->instagram && !Auth::user()->facebook && !Auth::user()->twitter || Auth::user()->links == 0)
            <div class="hidden">
            @else
            <div class="flex gap-4 mb-6">
                @if (Auth::user()->instagram)
                <a href="" class="text-yellow-500 hover:text-yellow-600">
                    <button class="bg-yellow-300 text-yellow-800 p-2 rounded-full transition-transform transform hover:scale-110">
                        <i class="fa-brands fa-instagram"></i>
                    </button>
                </a>
                @endif

                @if (Auth::user()->facebook)
                <a href="" class="text-yellow-500 hover:text-yellow-600">
                    <button class="bg-yellow-300 text-yellow-800 p-2 rounded-full transition-transform transform hover:scale-110">
                        <i class="fa-brands fa-facebook"></i>
                    </button>
                </a>
                @endif

                @if (Auth::user()->twitter)
                <a href="" class="text-yellow-500 hover:text-yellow-600">
                    <button class="bg-yellow-300 text-yellow-800 p-2 rounded-full transition-transform transform hover:scale-110">
                        <i class="fa-brands fa-twitter"></i>
                    </button>
                </a>
                @endif
            </div>
            @endif

            <div class="flex flex-col gap-4">
                <textarea name="title" id="title" class="w-full h-32 border border-yellow-300 rounded-md p-3 placeholder-yellow-400 focus:outline-none focus:ring-2 focus:ring-yellow-500 resize-none" placeholder="Título..."></textarea>
                @error('title')
                <div class="text-red-600 mb-4">{{ $message }}</div>
                @enderror

                <textarea name="description" id="description" class="w-full h-40 border border-yellow-300 rounded-md p-3 placeholder-yellow-400 focus:outline-none focus:ring-2 focus:ring-yellow-500 resize-none" placeholder="Descrição...">{{ old('description') }}</textarea>
                @error('description')
                <div class="text-red-600 mb-4">{{ $message }}</div>
                @enderror

                <textarea name="content" id="content" class="w-full h-80 border border-yellow-300 rounded-md p-3 placeholder-yellow-400 focus:outline-none focus:ring-2 focus:ring-yellow-500 resize-none" placeholder="Conteúdo...">{{ old('content') }}</textarea>
                @error('content')
                <div class="text-red-600 mb-6">{{ $message }}</div>
                @enderror

                <div class="flex gap-4">
                    <button type="submit" class="bg-yellow-500 text-white p-3 rounded-lg shadow-lg transition-transform transform hover:scale-105">
                        Enviar
                    </button>
                    <button type="reset" class="bg-gray-300 text-gray-800 p-3 rounded-lg shadow-lg transition-transform transform hover:scale-105 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-repeat" viewBox="0 0 16 16">
                            <path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z"></path>
                            <path fill-rule="evenodd" d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z"></path>
                        </svg>
                        Resetar
                    </button>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection

@section('js')
{{ asset('js/script_adicionar_post.js') }}
@endsection
