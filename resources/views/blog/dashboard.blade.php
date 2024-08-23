@extends('layouts.main')

@section('title')
Dashboard
@endsection

@section('user_image')
{{asset('storage/'.Auth::user()->image)}}
@endsection

@section('content')
<section class="w-full flex items-center justify-center flex-col gap-3 p-1
md:h-full">

    <artcile class="w-[90%] flex items-center justify-center flex-col gap-4 flex-wrap
    md:hidden">
        @foreach ($posts as $post )
        <div class="w-full h-[10rem] grid grid-cols-4 grid-rows-4 border border-zinc-300 bg-gradient-to-b from-purple-500 to-purple-600 text-white rounded-lg">
            <span class="flex-1 col-start-1 col-end-3 row-start-1 row-end-1 border-r border-zinc-300 flex justify-center items-center">
                ID: {{$post->id}}
            </span>
            <span class="flex-1 col-start-3 col-end-5 row-start-1 row-end-1 flex justify-center items-center">
                Usuário: {{$post->user->name}}
            </span>
            <span class="flex-1 col-start-1 col-end-5 row-start-2 row-end-4 border border-zinc-300 flex justify-center items-center flex-col">
                <div class="w-full h-2/6 pl-2">
                    <p>Título:</p>
                </div>
                <div class="w-full h-4/6 text-center">
                    <p>
                        {{$post->title}}
                    </p>
                </div>
            </span>
            <span class="flex-1 col-start-1 col-end-4 row-start-4 row-end-4 border-r border-zinc-300 flex justify-center items-center text-2xlg">
                Data: {{date('d/m/Y', strtotime($post->published_at))}}
            </span>
            <span class="flex-1 col-start-4 col-end-5 row-start-4 row-end-4 flex justify-center items-center">
                <div class="w-1/2 h-full border-r border-zinc-300 flex items-center justify-center">
                    <a href="{{route('tela_editar_post', $post->id)}}" class=""><i class="fa-solid fa-pencil text-sky-400 hover:text-sky-500 transition-all ease-linear duration-300"></i></a>
                </div>
                <div class="w-1/2 h-full flex items-center justify-center">
                    <form action="{{route('deletar_post', $post->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class=""><i class="fa-solid fa-trash text-red-400 cursor-pointer hover:text-red-500 transition-all ease-linear duration-300"></i></button>
                    </form>
                </div>

            </span>
        </div>
        @endforeach
    </artcile>

    <!-- Tela > MD -->
    <article class="bg-zinc-200 w-[90%] h-[55%] hidden 
    md:flex md:flex-col">
        <table class="w-full h-full text-center rounded-lg">
            <thead class="border bg-gradient-to-b from-purple-500 to-purple-600">
                <tr>
                    <th class="border border-black p-3">ID</th>
                    <th class="border border-black p-3">Usuário</th>
                    <th class="border border-black p-1">Título</th>
                    <th class="border border-black p-3">Data</th>
                    <th class="border border-black p-1">Editar</th>
                    <th class="border border-black p-1">Apagar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr class="border">
                    <td class="border border-black border-opacity-50">{{ $post->id }}</td>
                    <td class="border border-black border-opacity-50">{{ $post->user->name }}</td>
                    <td class="border border-black border-opacity-50">{{ $post->title }}</td>
                    <td class="border border-black border-opacity-50">{{ date('d/m/Y', strtotime($post->published_at)) }}</td>
                    <td class="border border-black border-opacity-50">
                        <a href="{{route('tela_editar_post', $post->id)}}"><i class="fa-solid fa-pen text-sky-500 hover:text-sky-600 transition-all ease-linear duration-300"></i></a>
                    </td>
                    <td class="border border-black border-opacity-50">
                        <form action="{{route('deletar_post', $post->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit">
                                <i class="fa-solid fa-trash text-red-500 hover:text-red-600 transition-all ease-linear duration-300"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </article>
    <p>{{$posts->links()}}</p>
</section>
@endsection