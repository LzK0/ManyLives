@extends('layouts.main')

@section('title')
MeusPosts
@endsection

@section('user_image')
{{asset('storage/'. Auth::user()->image)}}
@endsection

@section('css')
{{asset('css/style_user_posts.css')}}
@endsection

@php
use App\Models\User;
@endphp

@section('content')
<section class=" w-full h-full">
    @if (count($posts) == 0)
    <section class="w-full flex bg-white flex-col items-center p-5 gap-3 h-[180.5rem]
sm:px-20
md:flex-wrap md:flex-row md:justify-center md:p-3 md:gap-8 md:h-[95rem]
lg:gap-4 lg:h-full" id="container-posts">
        @else
        <section class="w-full bg-white flex flex-col items-center p-5 gap-3 h-[180.5rem]
sm:px-20
md:flex-wrap md:flex-row md:justify-center md:p-3 md:gap-8 md:h-[95rem]
lg:gap-4 lg:h-[74rem]" id="container-posts">
            @endif
            <article class="w-full h-16 flex items-center justify-start p-3
    md:pl-16
    xl:pl-32">
                <input type="text" class="py-1 rounded-lg absolute px-7 outline-0 border-1 border-zinc-800 focus:outline-purple-300
        md:pr-20
        lg:pr-40" maxlength="60" placeholder="Pesquisar título..." id="live-search">
            </article>


            @if (count($posts) == 0)
            <h1 class="text-2xl">Nenhum post encontrado.</h1>
            @endif
            <div id="show"></div>

            @foreach ($posts as $post)
            <article class="hidd w-full h-1/6  border border-zinc-400
    md:w-2/5 md:h-[25rem] 
    lg:w-[30%] lg:p-1
    xl:w-[25%] xl:h-[30rem]">
                <div class="cards-post w-full h-1/2">
                    <img src="{{asset('storage/'. $post)}}" alt="" class="w-full h-full">
                </div>
                <div class="cards w-full h-1/2  flex flex-col p-4">
                    <div class="w-full h-1/3 flex items-center gap-2">
                        <div class="w-12 h-[3rem] rounded-full bg-zinc-900">
                            <img src="../Images/{{User::find($post->user_id)->image}}" alt="" class="w-full h-full rounded-full">
                        </div>
                        <div class="w-2/3 h-6/6">
                            <p>
                                {{User::find($post->user_id)->name}}
                            </p>
                            <p>{{date('d/m/Y', strtotime($post->published_at))}}</p>
                        </div>
                    </div>
                    <div class="w-full h-2/3 flex items-center border-b border-b-zinc-400">
                        <a href="" class="text-lg font-bold hover:text-purple-600">{{$post->title}}</a>
                    </div>
                    <div class="w-full h-1/3 flex items-center justify-end pr-6">
                        <div class="w-11 h-11  flex items-center justify-center gap-1"><i class="effect-likes fa-regular fa-heart text-red-500 cursor-pointer"></i>
                            <p class="likes">2</p>
                        </div>
                        <input type="hidden" value="{{$post->user_id}}" class="val-likes">
                    </div>
                </div>
            </article>

            @endforeach

            <div class="w-full h-5 p-9 flex justify-end">
                <p>{{$posts->links()}}</p>
            </div>

        </section>
    </section>
    @endsection

    @section('js')
    {{asset('js/script_user_posts.js')}}
    @endsection