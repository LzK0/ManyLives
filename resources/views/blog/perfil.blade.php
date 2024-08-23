@extends('layouts.main')

@section('title')
PerfilPessoal
@endsection


@section('user_image')
{{asset('storage/'. Auth::user()->image)}}
@endsection

@section('css')
{{asset('css/style_perfil.css')}}
@endsection

@section('content')
<section class="w-full h-full">
    <form action="{{route('atualizar_perfil')}}" method="post" class="w-full h-full" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="w-full h-[35%] flex flex-col p-1 items-center justify-center">
            <div class="w-full h-full flex items-end justify-center relative">
                <div class="w-[13rem] h-[14rem] rounded-full relative">
                    <img src="{{asset('storage/'.Auth::user()->image)}}" alt="" class="w-full h-[90%] rounded-full" id="image_preview">

                    <label for="image_perfil" class="absolute bottom-[20px] right-[30px] bg-purple-600 transition-all ease-linear duration-500 cursor-pointer rounded-full px-2 py-1
                    hover:bg-purple-500"><i class="fa-solid fa-pencil"></i></label>

                    <input type="file" id="image_perfil" name="image" class="hidden"></>

                </div>
            </div>
        </div>
        <div class="w-full h-[65%] flex justify-center items-baseline" id="container-perfil">
            <div class="w-5/6 h-[80%] flex items-center justify-baseline flex-col gap-3 p-4
            md:w-full">
                <div class="flex flex-col ml-5">
                    <input type="hidden" name="user_id" id="" value="{{Auth::user()->id}}">
                    <span class="w-full flex items-start">
                        <label for="" class="text-purple-600 border border-purple-600 border-t-0 border-l-0 border-r-0">Nome:</label>
                    </span>
                    <input type="text" name="name" class="w-[90%] h-[50%] border-t-0 border-l-0 border-r-0 border-b-purple-600 focus:border-purple-600 bg-zinc-100
                    md:w-[100%]" value="{{Auth::user()->name}}">
                </div>
                <div class="flex flex-col ml-5">
                    <span class="w-full flex items-start">
                        <label for="" class="text-purple-600 border border-purple-600 border-t-0 border-l-0 border-r-0">Email:</label>
                    </span>
                    <input type="text" name="email" class="w-[90%] h-[50%] border-t-0 border-l-0 border-r-0 border-b-purple-600 focus:border-purple-600 bg-purple-500 text-white
                    md:w-[100%]" value="{{Auth::user()->email}}" disabled>
                    <input type="hidden" name="password" value="{{Auth::user()->email}}">
                </div>
                <div id="show-password" class="w-[66%] max-w-[500px] h-[20%] flex items-center justify-center gap-3">
                    <label for="" class="text-purple-600">Links nos posts</label>
                    <label class="switch">
                        @if(Auth::user()->links == 1)
                        <input type="checkbox" name="links" class="checkbox" id="show-links" checked>
                        @else
                        <input type="checkbox" name="links" class="checkbox" id="show-links">
                        @endif
                        <div class="slider"></div>
                    </label>
                </div>
                <div class="w-[66%] max-w-[500px] h-[80%]" id="container-links">
                    <div class="w-[100%] h-1/3 flex items-center justify-center flex-col">
                        <span class="w-full flex items-start">
                            <label for="" class="text-purple-600 border border-purple-600 border-t-0 border-l-0 border-r-0">Instagram:</label>
                        </span>
                        <input type="url" name="instagram" class="w-[100%] h-[40%] border-t-0 border-l-0 border-r-0 border-b-purple-600 focus:border-purple-600 bg-zinc-100
                    md:w-[100%]" value="{{Auth::user()->instagram}}" id="instagram" placeholder="https://">
                    </div>
                    <div class="w-[100%] h-1/3 flex items-center justify-center flex-col">
                        <span class="w-full flex items-start">
                            <label for="" class="text-purple-600 border border-purple-600 border-t-0 border-l-0 border-r-0">Facebook:</label>
                        </span>
                        <input type="url" name="facebook" class="w-[100%] h-[40%] border-t-0 border-l-0 border-r-0 border-b-purple-600 focus:border-purple-600 bg-zinc-100
                    md:w-[100%]" value="{{Auth::user()->facebook}}" id="facebook" placeholder="https://">
                    </div>
                    <div class="w-[100%] h-1/3 flex items-center justify-center flex-col">
                        <span class="w-full flex items-start">
                            <label for="" class="text-purple-600 border border-purple-600 border-t-0 border-l-0 border-r-0">X:</label>
                        </span>
                        <input type="url" name="twitter" class="w-[100%] h-[40%] border-t-0 border-l-0 border-r-0 border-b-purple-600 focus:border-purple-600 bg-zinc-100
                    md:w-[100%]" value="{{Auth::user()->twitter}}" id="twitter" placeholder="https://">
                    </div>
                </div>
                <div>
                    <button type="submit" class="bg-purple-600 px-12 py-2 rounded-lg text-white cursor-pointer transition-all duration-300 ease-linear hover:bg-purple-500">Atualizar</button>
                </div>
            </div>
        </div>
    </form>
</section>
<script>

</script>
@endsection

@section('js')
{{asset('js/script_perfil_user.js')}}
@endsection