@extends('layouts.main')

@section('title')
PerfilPessoal
@endsection

@section('user_image')
{{asset('storage/'. Auth::user()->image)}}
@endsection

@section('css')
{{asset('css/styles_perfil.css')}}
@endsection

@section('content')
<section class="w-full h-full bg-gray-100 py-8 flex items-center justify-center">
    <form action="{{route('atualizar_perfil', Auth::user()->id)}}" method="post" class="w-full max-w-3xl bg-white shadow-md rounded-lg p-8" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="w-full flex flex-col items-center mb-8">
            <div class="relative">
                <div class="w-32 h-32 md:w-40 md:h-40 lg:w-48 lg:h-48 rounded-full overflow-hidden shadow-lg">
                    <img src="{{asset('storage/'.Auth::user()->image)}}" alt="" class="w-full h-full object-cover" id="image_preview">
                </div>
                <label for="image_perfil" class="absolute bottom-2 right-2 bg-yellow-500 transition-all ease-linear duration-300 cursor-pointer rounded-full p-2 hover:bg-yellow-400 shadow-md">
                    <i class="fa-solid fa-pencil text-white"></i>
                </label>
                <input type="file" id="image_perfil" name="image" class="hidden">
            </div>
        </div>
        <div class="w-full flex flex-col gap-6">
            <div class="flex flex-col">
                <label for="name" class="text-yellow-500 font-semibold">Nome:</label>
                <input type="text" name="name" class="w-full h-10 border-b-2 border-yellow-500 focus:outline-none focus:border-yellow-400 bg-gray-100 px-2 rounded" value="{{Auth::user()->name}}">
            </div>
            <div class="flex flex-col">
                <label for="email" class="text-yellow-500 font-semibold">Email:</label>
                <input type="text" name="email" class="w-full h-10 border-b-2 border-yellow-500 focus:outline-none focus:border-yellow-400 bg-yellow-500 text-white px-2 rounded" value="{{Auth::user()->email}}" disabled>
                <input type="hidden" name="password" value="{{Auth::user()->email}}">
            </div>
            <div id="show-password" class="w-full flex items-center justify-between">
                <label for="" class="text-yellow-500">Links nos posts:</label>
                <label class="switch">
                    <input type="checkbox" name="links" class="checkbox" id="show-links" {{ Auth::user()->links ? 'checked' : '' }}>
                    <div class="slider round"></div>
                </label>
            </div>
            <div class="w-full" id="container-links">
                <div class="w-full flex flex-col mb-4">
                    <label for="instagram" class="text-yellow-500 font-semibold">Instagram:</label>
                    <input type="url" name="instagram" class="w-full h-10 border-b-2 border-yellow-500 focus:outline-none focus:border-yellow-400 bg-gray-100 px-2 rounded" value="{{Auth::user()->instagram}}" id="instagram" placeholder="https://">
                </div>
                <div class="w-full flex flex-col mb-4">
                    <label for="facebook" class="text-yellow-500 font-semibold">Facebook:</label>
                    <input type="url" name="facebook" class="w-full h-10 border-b-2 border-yellow-500 focus:outline-none focus:border-yellow-400 bg-gray-100 px-2 rounded" value="{{Auth::user()->facebook}}" id="facebook" placeholder="https://">
                </div>
                <div class="w-full flex flex-col mb-4">
                    <label for="twitter" class="text-yellow-500 font-semibold">X:</label>
                    <input type="url" name="twitter" class="w-full h-10 border-b-2 border-yellow-500 focus:outline-none focus:border-yellow-400 bg-gray-100 px-2 rounded" value="{{Auth::user()->twitter}}" id="twitter" placeholder="https://">
                </div>
            </div>
            <div class="w-full flex justify-center">
                <button type="submit" class="bg-yellow-500 px-12 py-2 rounded-lg text-white cursor-pointer transition-all duration-300 ease-linear hover:bg-yellow-400 shadow-lg">Atualizar</button>
            </div>
        </div>
    </form>
</section>
@endsection

@section('js')
{{asset('js/script_perfil_user.js')}}
@endsection
