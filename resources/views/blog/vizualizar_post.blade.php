@extends('layouts.main')

@section('title')
visualizar post
@endsection

@php
use App\Models\User;
@endphp

@section('user_image')
{{asset('storage/'. Auth::user()->image)}}
@endsection

@section('css')
{{asset('css/style_visualizar_post.css')}}
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
                        <h1 class="content-off p-3 text-3xl text-center text-yellow-500">{{$post->title}}</h1>
                    </div>
                    <div class="">
                        <p class="content-off text-xl text-center">{{$post->content}}</p>
                    </div>
                    <div>
                        <h2 class="content-off text-2xl text-yellow-500 text-center">Ver mais:</h2>
                    </div>
                    <section class="container mx-auto p-4">
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                            @foreach($mais_posts as $post)
                            <article class="border border-yellow-500 bg-yellow-50 rounded-lg shadow-md transition-transform duration-300 ease-in-out transform hover:scale-105 hover:shadow-xl hidd">
                                @if($post->image_post && $post->image_post !== 'error')
                                <div class="w-full h-36 overflow-hidden rounded-t-lg">
                                    <img src="{{ asset('storage/'.$post->image_post) }}" alt="Post Image" class="w-full h-full object-cover">
                                </div>
                                @else
                                <div class="w-full h-36 bg-gray-200 overflow-hidden rounded-t-lg">
                                </div>
                                @endif
                                <div class="flex flex-col p-3 h-52">
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
                                        <a href="{{ route('vizualizar_post', $post->id) }}" class="text-sm font-semibold text-gray-800 hover:text-yellow-500">{{ $post->title }}</a>
                                    </div>
                                    @if($post->image_post == 'error')
                                    <div class="flex-1 mb-2">
                                        <p class="text-xs text-gray-700">{{ $post->description }}</p>
                                    </div>
                                    @endif
                                    <div class="flex justify-between items-center mt-2">
                                        <div class="flex items-center gap-1 text-sm text-gray-600">
                                            <i class="fa-regular fa-heart text-red-500 cursor-pointer"></i>
                                            <p class="text-xs">2</p>
                                        </div>
                                        @if(Auth::check() && Auth::user()->id == $post->user_id)
                                        <div class="flex items-center gap-2 text-sm text-gray-600">
                                            <a href="{{ route('tela_editar_post', $post->id) }}" class="text-sky-500 hover:text-sky-600 transition duration-200">
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
{{asset('js/script_visualizar_post.js')}}
@endsection
