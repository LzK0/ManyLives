@extends('layouts.main')

@section('title')
Visualizar Post
@endsection

@php
use App\Models\User;
@endphp

@section('user_image')
@if(Auth::check())
{{ asset('storage/'. Auth::user()->image) }}
@endif
@endsection

@section('css')
{{ asset('css/style_vizualizar_os_posts.css') }}
@endsection

@section('content')
<section class="w-full">

    <div class="w-full h-full flex justify-center">
        <div class="w-full h-full">
            @if($post->image_post != "error")
            <div class="h-[15rem] w-full flex items-center justify-center relative md:w-4/5 md:mx-auto md:h-[20rem] xl:h-[25rem]">
                <img src="{{ asset('storage/'.$post->image_post) }}" alt="" class="w-full h-full" id="image_preview">
            </div>
            @endif

            <div class="w-full md:w-4/5 md:mx-auto">
                <div class="w-full flex">
                    <div class="w-1/3 flex justify-center items-center sm:justify-end">
                        <div class="w-[5rem] h-[5rem] rounded-full mt-5 sm:w-[7rem] sm:h-[7rem] sm:p-4 sm:mt-0 md:w-[9rem] md:h-[9rem] md:p-6">
                            <img src="{{ asset('storage/'. $user->image) }}" alt="" class="w-full h-full rounded-full">
                        </div>
                    </div>
                    <div class="w-2/3">
                        <div class="w-full h-1/2 flex items-end">
                            <h4 class="text-xl">{{ $user->name }}</h4>
                        </div>
                        <div class="w-full h-1/2 flex items-baseline">
                            <p>Publicado: {{ date('d/m/Y', strtotime($post->created_at)) }}</p>
                        </div>
                    </div>
                </div>

                @if($user->instagram || $user->facebook || $user->twitter)
                <div class="w-full h-[20%] flex items-center justify-center gap-2 flex-col md:h-[10%] md:flex-row">
                    @if ($user->instagram)
                    <a href="{{ $user->instagram }}">
                        <button class="insta-btn border-2 border-yellow-400">
                            <i class="fa-brands fa-instagram"></i>
                        </button>
                    </a>
                    @endif

                    @if ($user->facebook)
                    <a href="{{ $user->facebook }}">
                        <button class="fb-btn border-2 border-yellow-400">
                            <i class="fa-brands fa-facebook"></i>
                        </button>
                    </a>
                    @endif

                    @if($user->twitter)
                    <a href="{{ $user->twitter }}">
                        <button class="x-btn border-2 border-yellow-400">
                            <i class="fa-solid fa-x"></i>
                        </button>
                    </a>
                    @endif
                </div>
                @endif

                <article class="w-full flex flex-col gap-6 overflow-hidden p-4">
                    <h1 class="text-3xl text-center text-yellow-500 content-off">{{ $post->title }}</h1>
                    <p class="text-xl text-center content-off">{{ $post->content }}</p>
                    <h2 class="text-2xl text-yellow-500 text-center content-off">Ver mais:</h2>

                    <section class="container mx-auto p-4" id="posts-container">
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                            @foreach($mais_posts as $mais_post)
                            <article class="border border-gray-300 bg-white rounded-lg shadow-md transition-transform duration-300 ease-in-out transform hover:scale-105 hover:shadow-lg flex flex-col hidd">
                                @if($mais_post->image_post && $mais_post->image_post !== 'error')
                                <div class="w-full h-36 overflow-hidden rounded-t-lg">
                                    <img src="{{ asset('storage/'.$mais_post->image_post) }}" alt="Post Image" class="w-full h-full object-cover">
                                </div>
                                @else
                                <div class="w-full h-36 overflow-hidden rounded-t-lg random-color"></div>
                                @endif

                                <div class="flex flex-col flex-1 p-4">
                                    <div class="flex items-center justify-between mb-2">
                                        <div class="flex items-center gap-3">
                                            <div class="w-12 h-12 rounded-full bg-gray-300 overflow-hidden">
                                                <a href="{{ route('perfil_other_user', $mais_post->user_id) }}">
                                                    @foreach ($users as $us )
                                                    @if($us->id === $mais_post->user_id)
                                                    <img src="{{ asset('storage/'. $us->image) }}" alt="User Image" class="w-full h-full object-cover rounded-full">
                                                    @endif
                                                    @endforeach
                                                </a>
                                            </div>
                                            <div class="flex flex-col justify-center">
                                                @foreach ($users as $us )
                                                @if($us->id === $mais_post->user_id)
                                                <p class="text-sm font-semibold text-gray-800">{{ $us->name }}</p>
                                                @endif
                                                @endforeach
                                                <p class="text-xs text-gray-500">{{ date('d/m/Y', strtotime($mais_post->created_at)) }}</p>
                                            </div>
                                        </div>

                                        <!-- Botão de Seguir -->
                                        @auth
                                        @if(Auth::id() !== $mais_post->user_id)
                                        <form action="{{ route('follow_user', $mais_post->user_id) }}" method="get">
                                            @csrf
                                            @if($follows->where('id_followed', $mais_post->user_id)->where('id_follower', Auth::id())->first())
                                            <button type="submit" class="bg-yellow-300 text-gray-700 px-3 py-1 text-xs rounded-md hover:bg-yellow-200 transition-colors duration-300">
                                                Seguindo
                                            </button>
                                            @else
                                            <button type="submit" class="bg-gray-100 text-gray-700 px-3 py-1 text-xs rounded-md hover:bg-gray-200 transition-colors duration-300">
                                                Seguir
                                            </button>
                                            @endif
                                        </form>
                                        @endif
                                        @endauth
                                    </div>

                                    <a href="{{ route('vizualizar_post', $mais_post->id) }}" class="text-lg font-semibold text-gray-800 hover:text-yellow-500 break-words">
                                        {{ $mais_post->title }}
                                    </a>

                                    <p class="text-sm text-gray-700 mt-2">{{ $mais_post->description }}</p>

                                    <div class="flex justify-between items-center mt-2">
                                        <form action="{{ route('like', $mais_post->id) }}" method="get" class="flex items-center gap-1">
                                            @csrf
                                            <button type="submit" class="flex items-center gap-2 focus:outline-none">
                                                @if($mais_post->likes->where('user_id', Auth::id())->count())
                                                <i class="fa-solid fa-heart text-red-500"></i>
                                                @else
                                                <i class="fa-solid fa-heart text-gray-600 hover:text-red-500"></i>
                                                @endif
                                            </button>
                                            <p>{{ $mais_post->likes->count() }}</p>
                                        </form>

                                        @if(Auth::check() && Auth::user()->id == $mais_post->user_id)
                                        <div class="flex items-center gap-2 text-sm text-gray-600">
                                            <a href="{{ route('tela_editar_post', $mais_post->id) }}" class="text-yellow-500 hover:text-yellow-600 transition duration-200">
                                                <i class="fa-solid fa-pencil"></i>
                                            </a>

                                            <form action="{{ route('deletar_post', $mais_post->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:text-red-600">
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
                </article>
            </div>
        </div>
    </div>
</section>
@endsection