@extends('layouts.main')

@section('title', $user->nam. " Profile")

@section('css')
{{asset('css/style_perfil_other.css')}}
@endsection

@section('content')

<div class="flex flex-col items-center py-10 px-5">
    <div class="flex flex-col items-center mb-10">
        <div class="w-32 h-32 rounded-full overflow-hidden shadow-lg mb-4">
            <img src="{{ $user->image ? asset('storage/' . $user->image) : asset('storage/images/fixed/guestUser.jpg') }}" alt="Foto de {{ $user->name }}" class="w-full h-full object-cover">
        </div>
        <h1 class="text-3xl font-semibold text-gray-800">{{ $user->name }}</h1>
        <p class="text-lg text-gray-500">{{ $user->email }}</p>
        <div>
            @auth
            @foreach ($follows as $follow)
            @if(Auth::id() !== $user->id)
            <form action="{{ route('follow_user', $user->id) }}" method="get" class="flex gap-1 items-center justify-center">
                @csrf
                @if($follows->where('id_followed', $user->id)->where('id_follower', Auth::id())->first())
                <button type="submit" class="flex gap-1 items-center justify-center bg-yellow-300 text-gray-700 px-10 py-3 text-xs rounded-md hover:bg-yellow-200 transition-colors duration-300">
                    Seguindo
                </button>
                @break
                @else
                <button type="submit" class="flex gap-1 items-center justify-center bg-sky-300 text-gray-700 px-10 py-3 text-xs rounded-md hover:bg-sky-200 transition-colors duration-300">
                    Seguir
                </button>
                @break
                @endif
            </form>
            @endif
            @endforeach
            -
            @endauth
            Seguidores: {{ $user->followers->count() }}
        </div>
    </div>
    <div class="w-full max-w-6xl">
        <h2 class="text-2xl font-semibold text-gray-700 mb-6">Posts de {{ $user->name }}</h2>
        @if ($user->posts->isEmpty())
        <p class="text-center text-gray-500">Este usuário ainda não fez nenhum post.</p>
        @else
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($posts as $post)
            <article class="border border-gray-300 bg-white rounded-lg shadow-md transition-transform duration-300 ease-in-out transform hover:scale-105 hover:shadow-lg flex flex-col hidd">
                @if($post->image_post && $post->image_post !== 'error')
                <div class="w-full h-36 overflow-hidden rounded-t-lg">
                    <img src="{{ asset('storage/'.$post->image_post) }}" alt="Post Image" class="w-full h-full object-cover">
                </div>
                @else
                <div class="w-full h-36 overflow-hidden rounded-t-lg random-color"></div>
                @endif
                <div class="flex flex-col flex-1 p-3">
                    <div class="flex items-center gap-3 mb-2">
                        <div class="w-10 h-10 rounded-full bg-gray-300 overflow-hidden">
                            <a href="{{ route('perfil_other_user', $post->user_id) }}">
                                <img src="{{ $user->image ? asset('storage/'.$user->image) : asset('storage/images/fixed/guestUser.jpg') }}" alt="User Image" class="w-full h-full object-cover rounded-full">
                            </a>
                        </div>
                        <div class="flex flex-col justify-center">
                            <p class="text-xs font-semibold">{{ $user->name }}</p>
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
                            <form action="{{route('like', $post->id)}}" method="get" class="flex gap-2 items-center justify-center">
                                @csrf
                                <button type="submit" class="focus:outline-none flex items-center justify-center gap-2 like-button">
                                    @if($post->likes->where('user_id', Auth::id())->count())
                                    <i class="fa-solid fa-heart text-red-500"></i>
                                    @else
                                    <i class="fa-solid fa-heart text-gray-600 hover:text-red-500"></i>
                                    @endif
                                </button>
                                <div>
                                    <p>{{ $post->likes->count() }}</p>
                                </div>
                            </form>
                        </div>
                        @if(Auth::check() && Auth::user()->id == $post->user_id)
                        <div class="flex items-center gap-2 text-sm text-gray-600">
                            <a href="{{ route('tela_editar_post', $post->id) }}" class="text-yellow-500 hover:text-yellow-600 transition duration-200">
                                <i class="fa-solid fa-pencil"></i>
                            </a>

                            <form action="{{ route('deletar_post', $post->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit">
                                    <i class="fa-solid fa-trash text-red-500 hover:text-red-600"></i>
                                </button>
                            </form>
                        </div>
                        @endif
                    </div>
                </div>
            </article>
            @endforeach
        </div>
        @endif
    </div>
</div>

@endsection

@section('js')
{{asset('js/script_perfil_other.js')}}
@endsection