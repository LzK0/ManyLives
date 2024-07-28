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
        <div class="w-full h-[40%] bg-slate-700 flex flex-col gap-2 items-center justify-center">
            <div class="w-full h-full flex items-center justify-center relative">
                <div class="w-[50%] rounded-full">
                    <img src="images/{{Auth::user()->image}}" alt="" class="w-full h-full rounded-full">
                </div>
                <div class="bg-red-300 w-10 h-10">
                    <input type="file" class="bottom-1 right-0"></input>
                </div>
            </div>
        </div>
    </form>
</section>
@endsection