@extends('layouts.main')

@section('title')
Perfil Pessoal
@endsection

@section('css')
{{ asset('css/styles_perfil.css') }}
@endsection

@section('content')
<section class="w-full min-h-screen bg-gray-100 py-8 flex items-center justify-center">
    <div class="w-full max-w-5xl bg-white shadow-md rounded-lg flex flex-col md:flex-row p-8">
        <!-- Imagem de perfil -->
        <form action="{{ route('atualizar_perfil', Auth::user()->id) }}" method="post" class="mt-8 flex flex-col md:flex-row gap-6 w-full" enctype="multipart/form-data">
            <div class="flex-shrink-0 w-32 h-32 md:w-48 md:h-48 rounded-full overflow-hidden relative mx-auto md:mx-0 z-0">
                <img src="{{ asset('storage/' . Auth::user()->image) }}" alt="Imagem de perfil" class="w-full h-full object-cover" id="image_preview">
                <label for="image_perfil" class="absolute inset-0 bg-black bg-opacity-25 flex items-center justify-center cursor-pointer transition-opacity duration-300 hover:bg-opacity-40 ease-linear">
                    <i class="fa-solid fa-camera text-white text-2xl"></i>
                </label>
                <input type="file" id="image_perfil" name="image" class="hidden" onchange="previewImage(event)">
                @error('image')
                <div class="w-full h-[3%] text-center">
                    <div class="text-red-600 w-full mb-3">{{ $message }}</div>
                </div>
                @enderror
            </div>

            <!-- Informações do usuário -->
            <div class="flex flex-col justify-center w-full md:ml-8">
                <div class="text-center md:text-left">
                    <h1 class="text-2xl md:text-3xl font-semibold text-gray-800">{{ Auth::user()->name }}</h1>
                    <p class="text-base md:text-lg text-gray-500">{{ Auth::user()->email }}</p>
                </div>
                <div class="flex flex-col md:flex-row justify-center md:justify-start mt-4 gap-4">
                    <p class="text-gray-700">Seguidores: {{ Auth::user()->followers->count() }}</p>
                    <p class="text-gray-700">Seguindo: {{ Auth::user()->following->count() }}</p>
                </div>

                <!-- Formulário de edição -->
                @csrf
                @method('PUT')
                <div class="flex flex-col mt-6">
                    <label for="name" class="text-yellow-500 font-semibold">Nome:</label>
                    <input type="text" name="name" class="w-full h-10 border-b-2 border-yellow-500 focus:outline-none focus:border-yellow-400 bg-gray-100 px-2 rounded" value="{{ Auth::user()->name }}">
                </div>
                <div class="flex flex-col mt-4">
                    <label for="email" class="text-yellow-500 font-semibold">Email:</label>
                    <input type="text" name="email" class="w-full h-10 border-b-2 border-yellow-500 focus:outline-none focus:border-yellow-400 bg-yellow-500 text-white px-2 rounded" value="{{ Auth::user()->email }}" disabled>
                </div>

                <!-- Links nos posts -->
                <div id="show-password" class="flex items-center justify-between mt-4">
                    <label class="text-yellow-500">Links nos posts:</label>
                    <label class="switch">
                        <input type="checkbox" name="links" class="checkbox" id="show-links" {{ Auth::user()->links ? 'checked' : '' }}>
                        <div class="slider round"></div>
                    </label>
                </div>

                <!-- Redes sociais -->
                <div class="flex flex-col mt-4" id="container-links">
                    <div class="flex flex-col">
                        <label for="instagram" class="text-yellow-500 font-semibold">Instagram:</label>
                        <input type="url" name="instagram" class="w-full h-10 border-b-2 border-yellow-500 focus:outline-none focus:border-yellow-400 bg-gray-100 px-2 rounded" value="{{ Auth::user()->instagram }}" id="instagram" placeholder="https://">
                    </div>
                    <div class="flex flex-col mt-4">
                        <label for="facebook" class="text-yellow-500 font-semibold">Facebook:</label>
                        <input type="url" name="facebook" class="w-full h-10 border-b-2 border-yellow-500 focus:outline-none focus:border-yellow-400 bg-gray-100 px-2 rounded" value="{{ Auth::user()->facebook }}" id="facebook" placeholder="https://">
                    </div>
                    <div class="flex flex-col mt-4">
                        <label for="twitter" class="text-yellow-500 font-semibold">X:</label>
                        <input type="url" name="twitter" class="w-full h-10 border-b-2 border-yellow-500 focus:outline-none focus:border-yellow-400 bg-gray-100 px-2 rounded" value="{{ Auth::user()->twitter }}" id="twitter" placeholder="https://">
                    </div>
                </div>

                <!-- Botão de atualização -->
                <div class="flex justify-center mt-6">
                    <button type="submit" class="bg-yellow-500 px-12 py-2 rounded-lg text-white cursor-pointer transition-colors duration-300 hover:bg-yellow-400 shadow-lg">Atualizar</button>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection

@section('js')
{{ asset('js/script_perfil.js') }}
@endsection