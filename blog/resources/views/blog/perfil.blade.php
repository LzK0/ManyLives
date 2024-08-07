@extends('layouts.main')

@section('title')
PerfilPessoal
@endsection


@section('user_image')
images/{{Auth::user()->image}}
@endsection

@section('content')
<section class="w-full h-full bg-white">
    <form action="atulizar_perfil" method="post" class="w-full h-full" enctype="multipart/form-data">
        @csrf
        <div class="w-full h-[35%] flex flex-col p-1 items-center justify-center">
            <div class="w-full h-full flex items-center justify-center relative">
                <div class="w-[13rem] h-[14rem] rounded-full relative">
                    <img src="images/{{Auth::user()->image}}" alt="" class="w-full h-[90%] rounded-full" id="image_preview">

                    <label for="image_perfil" class="absolute bottom-[12px] right-[30px] bg-purple-600 transition-all ease-linear duration-500 cursor-pointer rounded-full px-2 py-1
                    hover:bg-purple-500"><i class="fa-solid fa-pencil"></i></label>

                    <input type="file" id="image_perfil" name="image" class="hidden"></>

                </div>
            </div>
        </div>
        <div class="w-full h-[65%] flex justify-center items-center">
            <div class="w-5/6 h-5/6 flex items-center justify-baseline flex-col gap-8
            md:w-full">
                <div class="flex flex-col ml-5">
                    <span class="w-full flex items-start">
                        <label for="" class="text-purple-60 border border-purple-600 border-t-0 border-l-0 border-r-0">Nome:</label>
                    </span>
                    <input type="text" name="name" class="w-[90%] h-[50%] border-t-0 border-l-0 border-r-0 border-b-purple-600 focus:border-purple-600
                    md:w-[100%]" value="{{Auth::user()->name}}">
                </div>
                <div class="flex flex-col ml-5">
                <span class="w-full flex items-start">
                        <label for="" class="text-purple-600 border border-purple-600 border-t-0 border-l-0 border-r-0">Email:</label>
                    </span>
                    <input type="text" name="email" class="w-[90%] h-[50%] border-t-0 border-l-0 border-r-0 border-b-purple-600 focus:border-purple-600
                    md:w-[100%]" value="{{Auth::user()->email}}">
                </div>
                <div class="flex flex-col ml-12">
                <span class="w-full flex items-start">
                        <label for="" class="text-purple-600 border border-purple-600 border-t-0 border-l-0 border-r-0">Senha:</label>
                    </span>
                    <div class="w-[80%] h-[50%] flex
                    md:w-[90%]">
                        <input type="password" name="password" id="password" class="w-[100%] h-[100%] border-t-0 border-l-0 border-r-0 border-b-purple-600 focus:border-purple-600
                        md:w-[100%]" value="{{Auth::user()->password}}">
                        <span id="show-password" class="p-1 text-purple-600 bg-gray-200 border border-purple-600 rounded-sm transition-all ease-linear duration-300 cursor-pointer hover:bg-gray-300"><i class="fa-solid fa-eye"></i></span>
                    </div>
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
<script src="{{asset('js/script_perfil.js')}}"></script>
@endsection