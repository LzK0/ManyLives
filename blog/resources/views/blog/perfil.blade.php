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
                <div class="w-[13rem] h-[13rem] rounded-full relative">
                    <img src="images/{{Auth::user()->image}}" alt="" class="w-full h-[90%] rounded-full" id="image_preview">
                    <label for="image_perfil" class="absolute bottom-[12px] right-[30px] bg-purple-600 transition-all ease-linear duration-500 cursor-pointer rounded-full px-2 py-1
                    hover:bg-purple-500"><i class="fa-solid fa-pencil"></i></label>
                    <input type="file" id="image_perfil" name="image_perfil" class="hidden"></>
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