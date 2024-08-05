@extends('layouts.main')

@section('title')
PerfilPessoal
@endsection

@php

@endphp

@section('user_image')
images/{{Auth::user()->image}}
@endsection

@section('content')
<section class="w-full h-full bg-sky-500">
    <form action="atulizar_perfil" method="post" class="w-full h-full" enctype="multipart/form-data">
        @csrf
        <div class="w-full h-[35%] bg-slate-700 flex flex-col p-1 items-center justify-center">
            <div class="w-full h-full flex items-center justify-center relative">
                <div class="w-[13rem] h-[14rem] rounded-full relative">
                    <img src="images/{{Auth::user()->image}}" alt="" class="w-full h-[90%] rounded-full" id="image_preview">

                    <label for="image_perfil" class="absolute bottom-[12px] right-[30px] bg-purple-600 transition-all ease-linear duration-500 cursor-pointer rounded-full px-2 py-1
                    hover:bg-purple-500"><i class="fa-solid fa-pencil"></i></label>

                    <input type="file" id="image_perfil" name="image" class="hidden"></>

                </div>
            </div>
        </div>
        <div class="w-full h-[65%] bg-red-600 flex justify-center items-center">
            <div class="w-5/6 h-5/6 bg-slate-200 flex items-center justify-center flex-col gap-8">
                <div class="flex flex-col">
                    <label for="">Nome:</label>
                    <input type="text" name="name" class="w-[80%] h-[50%] border-t-0 border-l-0 border-r-0 border-b-purple-600" value="{{Auth::user()->name}}">
                </div>
                <div class="flex flex-col">
                    <label for="">Email:</label>
                    <input type="text" name="email" class="w-[80%] h-[50%] border-t-0 border-l-0 border-r-0 border-b-purple-600" value="{{Auth::user()->email}}">
                </div>
                <div class="flex flex-col">
                    <label for="">Senha:</label>
                    <input type="password" name="password" id="password" class="w-[80%] h-[50%] border-t-0 border-l-0 border-r-0 border-b-purple-600">
                </div>
                <div>
                    <button type="submit" class="bg-purple-600 px-12 py-2 rounded-lg text-white cursor-pointer transition-all duration-300 ease-linear hover:bg-purple-500">Atualizar</button>
                </div>
            </div>
        </div>
    </form>
</section>
@endsection

@section('js')
<script>
    var image = document.getElementById('image_perfil').addEventListener('change', function(e) {
        let tgt = e.target || window.event.srcElement;
        let files = tgt.files;
        let fr = new FileReader();

        fr.addEventListener("load", function() {
            document.getElementById('image_preview').src = fr.result;
        });

        fr.readAsDataURL(files[0]);

    });
</script>
@endsection