@extends('layouts.main')

@section('title')
Home
@endsection

@section('css')
{{ asset('css/styles_index.css') }}
@endsection

@section('content')

<!-- Titulo da página com parallax -->
<section class="w-full h-5/6 flex items-center justify-center" id="atck">
    <div class="w-full h-2/5 bg-white flex flex-col items-center justify-center gap-2 md:w-4/6">
        <h1 class="font-mono text-5xl sm:text-6xl md:text-7xl text-slate-700 text-center break-words"><b class="text-yellow-500">M</b>any<b class="text-yellow-500">L</b>ives</h1>
        <h4 class="text-lg text-slate-700 text-center break-words">Nosso <b class="text-yellow-500">blog</b> de notícias gerais</h4>
    </div>
</section>

<section class="w-4/5 bg-white flex flex-col items-center p-3 gap-3 sm:px-10 min-[350px]:w-full md:flex-wrap md:flex-row md:justify-center md:p-3 lg:gap-4" id="container-posts">

    <!-- Search -->
    <article class="w-full flex items-center justify-center p-4">
        <div class="relative w-full max-w-lg">
            <form action="{{ route('search_index') }}" method="get">
                @csrf
                <input type="text" id="live-search" maxlength="60" placeholder="Pesquisar título..."
                    @if(isset($search))
                    value="{{$search}}"
                    @endif
                    name="search" class="w-full py-3 px-4 rounded-lg border border-yellow-500 bg-gray-50 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-yellow-600 focus:border-yellow-600 text-sm transition duration-300 ease-in-out">
                <button type="submit" class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-500 hover:text-gray-700 transition-colors duration-300">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 15.232a6.5 6.5 0 1 0-9.193-9.193 6.5 6.5 0 0 0 9.193 9.193zm1.06-1.06a8 8 0 1 0-11.313-11.313A8 8 0 0 0 16.293 14.171l3.657 3.657a1 1 0 0 0 1.415-1.415l-3.657-3.657z" />
                    </svg>
                </button>
            </form>
        </div>
    </article>

    <!-- Cards -->
    <section class="container mx-auto p-4" id="posts-container">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($posts as $post)
            <article class="border border-gray-300 bg-white rounded-lg shadow-md transition-transform duration-300 ease-in-out transform hover:scale-105 hover:shadow-lg flex flex-col hidd">
                @if($post->image_post && $post->image_post !== 'error')
                <div class="w-full h-36 overflow-hidden rounded-t-lg">
                    <img src="{{ asset('storage/'.$post->image_post) }}" alt="Post Image" class="w-full h-full object-cover">
                </div>
                @else
                <div class="w-full h-36 overflow-hidden rounded-t-lg random-color"></div>
                @endif
                <div class="flex flex-col flex-1 p-4">
                    <div class="flex items-center justify-between mb-2">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 rounded-full bg-gray-300 overflow-hidden">
                                <a href="{{route('perfil_other_user', $post->user_id)}}">
                                    @foreach ($users as $user )
                                    @if($post->user_id == $user->id)
                                    <img src="{{ asset('storage/'. $user->image)}}" alt="User Image" class="w-full h-full object-cover rounded-full">
                                    @break
                                    @endif
                                    @endforeach
                                </a>
                            </div>
                            <div class="flex flex-col justify-center">
                                @foreach ($users as $user )
                                @if($post->user_id == $user->id)
                                <p class="text-sm font-semibold text-gray-800">{{ $user->name}}</p>
                                <p class="text-xs text-gray-500">{{ date('d/m/Y', strtotime($post->published_at)) }}</p>
                                <p class="text-xs text-gray-500">Seguidores: {{$user->followers->count()}}</p>
                                @break
                                @endif
                                @endforeach
                            </div>
                        </div>

                        <!-- Botão de Seguir -->
                        @auth
                        @if(Auth::id() !== $post->user_id)
                        <form action="{{ route('follow_user', $post->user_id) }}" method="get">
                            @csrf
                            @if($follows->where('id_followed', $post->user_id)->where('id_follower', Auth::id())->first())
                            <button type="submit" class="flex gap-1 items-center justify-center bg-yellow-300 text-gray-700 px-3 py-1 text-xs rounded-md hover:bg-yellow-200 transition-colors duration-300">
                            Seguindo
                            </button>
                            @else
                            <button type="submit" class="flex gap-1 items-center justify-center bg-gray-100 text-gray-700 px-3 py-1 text-xs rounded-md hover:bg-gray-200 transition-colors duration-300">
                                Seguir
                            </button>
                            @endif
                        </form>
                        @endif
                        @endauth
                    </div>

                    <div class="flex-1 mb-2">
                        <a href="{{ route('vizualizar_post', $post->id) }}" class="text-lg font-semibold text-gray-800 hover:text-yellow-500 break-words">{{ $post->title }}</a>
                    </div>
                    <div class="w-full p-2 break-words flex-1">
                        <p class="text-sm text-gray-700">{{ $post->description }}</p>
                    </div>
                    <div class="flex justify-between items-center mt-2">
                        <div class="flex items-center gap-1 text-sm text-gray-600">
                            <form action="{{route('like', $post->id)}}" method="get" class="flex gap-2 items-center justify-center">
                                @csrf
                                <button type="submit" class="flex items-center gap-2 focus:outline-none">
                                    @if($post->likes->where('user_id', Auth::id())->count())
                                    <i class="fa-solid fa-heart text-red-500"></i>
                                    @else
                                    <i class="fa-solid fa-heart text-gray-600 hover:text-red-500"></i>
                                    @endif
                                </button>
                                <p>{{ $post->likes->count() }}</p>
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

    <!-- Paginação -->
    <div class="w-full h-[7%] flex justify-center items-center">
        <p>{{ $posts->links() }}</p>
    </div>

</section>

<!-- Tecnologias -->
<footer class="h-[20rem] w-full bg-zinc-800 text-white p-5 md:h-2/5 lg:px-20 xl:px-60">
    <div class="w-full h-1/2 flex items-center justify-center flex-col gap-20">
        <p class="text-center">Projeto feito por <i class="text-yellow-500">Victor Silva Antunes Rodrigues</i></p>
        <p>Tecnologias utilizadas:</p>
    </div>
    <div class="w-full h-1/3 grid grid-cols-3 gap-5 p-4 text-sm">
        <div class="sm:py-3 py-1 flex items-center justify-center text-center flex-1 transition-all ease-linear duration-300 rounded-md bg-orange-500 hover:bg-orange-600">
            <p>HTML5</p>
        </div>
        <div class="sm:py-3 p-2 flex items-center justify-center text-center flex-1 transition-all ease-linear duration-300 rounded-md bg-sky-500 hover:bg-sky-600">
            <p>CSS (Tailwind)</p>
        </div>
        <div class="sm:py-3 py-1 flex items-center justify-center text-center flex-1 transition-all ease-linear duration-300 rounded-md bg-yellow-500 hover:bg-yellow-600">
            <p>Javascript</p>
        </div>
        <div class="sm:py-3 py-1 flex items-center justify-center text-center col-start-1 col-end-3 transition-all ease-linear duration-300 rounded-md bg-purple-500 hover:bg-purple-600">
            <p>PHP (Laravel)</p>
        </div>
        <div class="sm:py-3 py-1 flex items-center justify-center text-center flex-1 transition-all ease-linear duration-300 rounded-md bg-gray-500 hover:bg-gray-600">
            <p>MySQL (Database)</p>
        </div>
    </div>
</footer>

@endsection