@extends('layouts.main')

@section('title')
visualizar post
@endsection

@php
use App\Models\User;
@endphp

@section('user_image')
@if(Auth::check())
{{asset('storage/'. Auth::user()->image)}}
@endif
@endsection

@section('css')
{{asset('css/style_vizualizar_os_posts.css')}}
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
                        <div class="w-[5rem] h-[5rem] rounded-full mt-5
                        sm:w-[7rem] sm:h-[7rem] sm:p-4 sm:mt-0
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
                @if(!$user->instagram && !$user->facebook && !$user->twitter || $user->links == 0)
                <div class="w-full h-[10%] items-center justify-evenly hidden">
                    @else
                    <div class="w-full h-[20%] flex items-center justify-center gap-2 flex-col
                    md:h-[10%] md:flex-row">
                        @if ($user->instagram)
                        <a href="">
                            <button class="insta-btn border-2 border-yellow-400">
                                <i class="fa-brands fa-instagram"></i>
                            </button>
                        </a>
                        @endif

                        @if ($user->facebook)
                        <a href="">
                            <button class="fb-btn border-2 border-yellow-400"> <i class="fa-brands fa-facebook"></i>
                            </button>
                        </a>
                        @endif

                        @if($user->twitter)
                        <a href="">
                            <button class="x-btn border-2 border-yellow-400">
                                <i class="fa-solid fa-x"></i>
                            </button>
                        </a>
                        @endif
                        @endif
                    </div>
                <article class="w-full h-full flex items-center flex-col gap-6 overflow-hidden p-4 ">
                    <div cass="">
                        <h1 class="content-off p-3 text-3xl text-center text-yellow-500 content-off">{{$post->title}}</h1>
                    </div>
                    <div class="">
                        <p class="content-off text-xl text-center content-off">{{$post->content}}</p>
                    </div>
                    <div>
                        <h2 class="content-off text-2xl text-yellow-500 text-center content-off">Ver mais:</h2>
                    </div>
                    <section class="container mx-auto p-4">
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach($mais_posts as $post)
            <article class="border border-gray-300 bg-white rounded-lg shadow-md transition-transform duration-300 ease-in-out transform hover:scale-105 hover:shadow-xl flex flex-col">
                @if($post->image_post && $post->image_post !== 'error')
                <div class="w-full h-36 overflow-hidden rounded-t-lg">
                    <img src="{{ asset('storage/'.$post->image_post) }}" alt="Post Image" class="w-full h-full object-cover">
                </div>
                @else
                <div class="w-full h-36 overflow-hidden rounded-t-lg" id="random-color"></div>
                @endif
                <div class="flex flex-col flex-1 p-3">
                    <div class="flex items-center gap-3 mb-2">
                        <div class="w-10 h-10 rounded-full bg-gray-300 overflow-hidden">
                            <img src="{{ asset('storage/'. User::find($post->user_id)->image) }}" alt="User Image" class="w-full h-full object-cover rounded-full">
                        </div>
                        <div class="flex flex-col justify-center">
                            <p class="text-xs font-semibold">{{ User::find($post->user_id)->name }}</p>
                            <p class="text-xs text-gray-500">{{ date('d/m/Y', strtotime($post->published_at)) }}</p>
                        </div>
                    </div>
                    <div class="flex-1 mb-2">
                        <a href="{{ route('vizualizar_post', $post->id) }}" class="whitespace-normal text-sm font-semibold text-gray-800 hover:text-yellow-600 break-words">{{ $post->title }}</a>
                    </div>
                    <div class="w-full p-2 break-words flex-1">
                        <p class="text-sm text-gray-700">{{ $post->description }}</p>
                    </div>
                    <div class="flex justify-between items-center mt-2">
                        <div class="flex items-center gap-1 text-sm text-gray-600">
                            <i class="fa-regular fa-heart text-red-500 cursor-pointer"></i>
                            <p class="text-xs">2</p>
                        </div>
                        @if(Auth::check() && $user->id == $post->user_id)
                        <div class="flex items-center gap-2 text-sm text-gray-600">
                            <a href="{{ route('tela_editar_post', $post->id) }}" class="text-yellow-500 hover:text-yellow-600 transition duration-200">
                                <i class="fa-solid fa-pencil"></i>
                            </a>
                            <form action="{{ route('deletar_post', $post->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-600 transition duration-200">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </div>
                        @endif
                    </div>
                </div>
            </article>
            @endforeach
                        </div>
                    </section>
</section>

@endsection

@section('js')
{{asset('js/script_vizualizar.js')}}
@endsection