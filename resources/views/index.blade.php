@extends('layouts.main') <!-- Pegando o layout do Main-->

<!--Inserindo o título da página-->
@section('title')
Home
@endsection

<!--Inserindo o CSS da página-->
@section('css')
{{asset('css/style_index.css')}}
@endsection

<!-- Importando a model User-->
@php
use App\Models\User;
@endphp

<!-- Envio da rota da imagem do usuário-->
@section('user_image')
@auth
{{asset('storage/'.Auth::user()->image)}}
@endauth
@endsection


<!-- Conteúdo principal -->
@section('content')

<!-- Titulo da página com parallax-->
<section class="w-full h-5/6 flex items-center justify-center" id="atck">

    <div class="w-full h-2/5 bg-white flex flex-col items-center justify-center gap-2  
    md:w-4/6">
        <h1 class="font-mono text-5xl sm:text-6xl md:text-7xl text-slate-700"><b class="text-purple-600">M</b>any<b class="text-purple-600">L</b>ives
        </h1>
        <h4 class="text-lg text-slate-700">Nosso <b class="text-purple-600">blog</b> de noticias gerais</h4>
    </div>
    </div>
</section>
<section class="w-4/5 bg-white flex flex-col items-center p-3 gap-3 
sm:px-10 min-[350px]:w-full
md:flex-wrap md:flex-row md:justify-center md:p-3
lg:gap-4" id="container-posts">
    <!-- Search-->
    <article class="w-full h-16 flex items-center justify-start p-3
    md:pl-16
    xl:pl-32">
        <input type="text" class="py-1 rounded-lg absolute px-7 outline-0 border-1 border-zinc-800 focus:outline-purple-300
        md:pr-20
        lg:pr-40" maxlength="60" placeholder="Pesquisar título..." id="live-search">
    </article>
    <!-- Inserindo os posts-->
    <div id="show" class="w-full flex flex-wrap justify-center gap-5 ">

        @foreach ($posts as $post)
        <article class="hidd w-4/5 border border-zinc-400 bg-white h-[30rem]
    md:w-2/5
    lg:w-[30%] lg:p-1
    xl:w-[27%]
    hover:transform hover:scale-105 hover:shadow-2xl">
            @if(!($post->image_post == "error"))
            <div class="w-full h-1/2">
                <img src="{{asset('storage/'.$post->image_post)}}" alt="" class="w-full h-full">
            </div>
            <div class="cards w-full h-1/2  flex flex-col p-4">
                @endif
                <div class="cards w-full h-full  flex flex-col p-4">
                    <div class="w-full h-1/3 flex items-center gap-2">
                        <div class="w-12 h-[3rem] rounded-full bg-zinc-900">
                            <img src="storage/{{User::find($post->user_id)->image}}" alt="" class="w-full h-full rounded-full">
                        </div>
                        <div class="w-2/3 h-full">
                            <p>
                                {{User::find($post->user_id)->name}}
                            </p>
                            <p>{{date('d/m/Y', strtotime($post->published_at))}}</p>
                        </div>
                    </div>
                    <div class="w-full h-2/3 flex items-center border-b border-b-zinc-400 bg-green-300">
                        <a href="{{route('vizualizar_post', $post->id)}}" class="text-lg font-bold hover:text-purple-600 bg-pink-200 w-full h-full ">{{$post->title}}</a>
                    </div>
                    @if($post->image_post == "error")
                    <div class="w-full h-2/3 flex items-center border-b border-b-zinc-400 bg-red-500">
                        <p class="text-lg">{{$post->description}}</p>
                    </div>
                    @endif
                    <div class="w-full h-1/3 flex items-center justify-end">
                        <div class="w-11 h-full  flex items-center justify-center gap-1">
                            <i class="effect-likes fa-regular fa-heart text-red-500 cursor-pointer"></i>
                            <p class="likes">2</p>
                        </div>
                        @if(Auth::check())
                        @if(Auth::user()->id == $post->user_id)
                        <div class="w-11 h-full  flex items-center justify-center">
                            <a href="{{route('tela_editar_post', $post->id)}}" class=""><i class="fa-solid fa-pencil text-sky-500 cursor-pointer hover:text-sky-600 transition-all ease-linear duration-300"></i></i></a>
                            </form>
                        </div>
                        <div class="w-11 h-full  flex items-center justify-center">
                            <form action="{{route('deletar_post', $post->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class=""><i class="fa-solid fa-trash text-red-500 cursor-pointer hover:text-red-600 transition-all ease-linear duration-300"></i></button>
                            </form>
                        </div>
                        @endif
                        @endif
                        <input type="hidden" value="{{$post->user_id}}" class="val-likes">
                    </div>
                </div>
        </article>

        @endforeach
    </div>
    <!-- Paginação-->
    <div class="w-full h-[7%] flex justify-center items-center">
        <p>{{$posts->links()}}</p>
    </div>

    <!-- Adicionando o autor e as teclogias utulizadas-->
</section>
<section class="h-[20rem] w-full bg-zinc-800 text-white p-5
    md:h-2/5
lg:px-20
xl:px-60">
    <div class="w-full h-1/2 flex items-center justify-center flex-col gap-20">
        <p class="text-center">Projeto feito por <i class="text-purple-500">Victor Silva Antunes Rodrigues</i></p>
        <p>Tecnologias utilizadas:</p>
    </div>
    <div class="w-full h-1/3 grid grid-cols-3 gap-5 p-4 text-sm">
        <div class="sm:py-3 py-1 flex items-center justify-center text-center flex-1 transition-all ease-linear duration-300 rounded-md bg-orange-500 hover:bg-orange-600">
            <p>HTML5</p>
        </div>
        <div class="sm:py-3 py-1  flex items-center justify-center text-center flex-1 transition-all ease-linear duration-300 rounded-md bg-sky-500 hover:bg-sky-600">
            <p>CSS (Tailwind)</p>
        </div>
        <div class="sm:py-3 py-1  flex items-center justify-center text-center flex-1 transition-all ease-linear duration-300 rounded-md bg-yellow-500 hover:bg-yellow-600">
            <p>Javascript (Ajax)</p>
        </div>
        <div class="sm:py-3 py-1  flex items-center justify-center text-center col-start-1 col-end-3 transition-all ease-linear duration-300 rounded-md bg-purple-500 hover:bg-purple-600">
            <p>PHP (Laravel)</p>
        </div>
        <div class="sm:py-3 py-1  flex items-center justify-center text-center flex-1 transition-all ease-linear duration-300 rounded-md bg-gray-500 hover:bg-gray-600">
            <p>MySQL (Database)</p>
        </div>
    </div>
</section>
@endsection

@section('js')
{{asset('js/script_index.js')}}
@endsection