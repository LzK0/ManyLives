@extends('layouts.main')

@section('title')
vizualizar post
@endsection

@php
use App\Models\User;
@endphp

@section('user_image')
{{asset('storage/'. Auth::user()->image)}}
@endsection

@section('css')
{{asset('css/style_vizualizar_post.css')}}
@endsection

@section('content')

<section class="w-full">

    <div class="w-full h-full flex justify-center">
        <div class="w-full h-full">
            @if(!($post->image_post == "error"))
            <div class="h-[15rem] w-full flex items-center justify-center relative
            md:w-4/5 md:mx-auto md:h-[20rem]
            xl:h-[25rem]">
                <img src="{{asset('storage/'.$post->image_post)}}" alt="" class="w-full h-full" id="image_preview">
            </div>
            @endif
            <div class="w-full h-[80%]
            md:w-4/5 md:mx-auto
            ">
                <div class="w-full h-[10%] flex">
                    <div class="w-1/3 h-full flex justify-center items-center
                sm:justify-end">
                        <div class="w-[5rem] h-[5rem] rounded-full
                        sm:w-[7rem] sm:h-[7rem] sm:p-4
                        md:w-[9rem] md:h-[9rem] md:p-6">
                            <img src="{{asset('storage/'. $user->image)}}" alt="" class="w-full h-full rounded-full">
                        </div>
                    </div>
                    <div class="w-2/3">
                        <div class="w-full h-1/2 flex items-end">
                            <h4 class="text-xl">{{$user->name}}</h4>
                        </div>
                        <div class="w-full h-1/2 flex items-baseline">
                            <p>publicado: {{date("d/m/Y", strtotime($post->created_at)) }}</p>
                        </div>
                    </div>
                </div>
                <article class="w-full h-full flex items-center flex-col gap-6 overflow-hidden p-4 ">
                    <div cass="">
                        <h1 class="content-off p-3 text-3xl text-center text-purple-600">{{$post->title}}</h1>
                    </div>
                    <div class="">
                        <p class="content-off text-xl text-center">{{$post->content}}</p>
                    </div>
                    <div>
                        <h2 class="content-off text-2xl text-purple-600 text-center">Ver mais:</h2>
                    </div>
                    <section class="w-full h-full flex justify-center items-center flex-col gap-5 flex-wrap
                    md:flex-row">
                        @foreach ($mais_posts as $post)
                        <article class="hidd w-4/5 border border-zinc-400 bg-white h-[30rem]
    md:w-[48%]
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
                                            <img src="{{asset('storage/'. User::find($post->user_id)->image)}}" alt="" class="w-full h-full rounded-full">
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
            <div class="w-full h-[7%] p-5 flex justify-center items-center">
                <p>{{$mais_posts->links()}}</p>
            </div>
        </div>
    </div>
</section>

@endsection

@section('js')
{{asset('js/script_vizualizar_post.js')}}
@endsection