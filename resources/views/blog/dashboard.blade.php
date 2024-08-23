@extends('layouts.main')

@section('title')
Dashboard
@endsection

@section('user_image')
{{asset('storage/'.Auth::user()->image)}}
@endsection

@section('content')
<section class="w-full flex items-center justify-center flex-col gap-3 p-4 md:h-full bg-yellow-50">

    <!-- Tela para dispositivos móveis -->
    <article class="w-full flex flex-col gap-4 md:hidden">
        @foreach ($posts as $post)
        <div class="w-full h-auto bg-white shadow-lg border border-yellow-300 rounded-lg overflow-hidden flex flex-col md:flex-row mb-4">
            <div class="w-full md:w-1/4 flex justify-center items-center p-4 bg-yellow-100">
                <span class="text-yellow-600 font-bold">ID: {{$post->id}}</span>
            </div>
            <div class="w-full md:w-3/4 p-4">
                <div class="flex justify-between items-center mb-2">
                    <span class="text-yellow-600 font-semibold">Usuário: {{$post->user->name}}</span>
                    <span class="text-sm text-gray-500">Data: {{date('d/m/Y', strtotime($post->published_at))}}</span>
                </div>
                <div class="mb-2">
                    <p class="text-lg font-bold">{{$post->title}}</p>
                </div>
                <div class="flex justify-between mt-4">
                    <a href="{{route('tela_editar_post', $post->id)}}" class="text-yellow-500 hover:text-yellow-600 transition duration-300"><i class="fa-solid fa-pencil"></i></a>
                    <form action="{{route('deletar_post', $post->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-600 transition duration-300"><i class="fa-solid fa-trash"></i></button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </article>

    <!-- Tela para dispositivos maiores -->
    <article class="bg-white w-full max-w-6xl h-auto hidden md:flex md:flex-col rounded-lg shadow-lg border border-yellow-300">
        <table class="w-full text-center">
            <thead class="bg-yellow-500 text-white">
                <tr>
                    <th class="p-3 border-b border-yellow-300">ID</th>
                    <th class="p-3 border-b border-yellow-300">Usuário</th>
                    <th class="p-3 border-b border-yellow-300">Título</th>
                    <th class="p-3 border-b border-yellow-300">Data</th>
                    <th class="p-3 border-b border-yellow-300">Editar</th>
                    <th class="p-3 border-b border-yellow-300">Apagar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr class="border-b border-yellow-300">
                    <td class="py-2">{{ $post->id }}</td>
                    <td class="py-2">{{ $post->user->name }}</td>
                    <td class="py-2">{{ $post->title }}</td>
                    <td class="py-2">{{ date('d/m/Y', strtotime($post->published_at)) }}</td>
                    <td class="py-2">
                        <a href="{{route('tela_editar_post', $post->id)}}" class="text-yellow-500 hover:text-yellow-600 transition duration-300"><i class="fa-solid fa-pen"></i></a>
                    </td>
                    <td class="py-2">
                        <form action="{{route('deletar_post', $post->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-600 transition duration-300"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </article>
    
    <div class="w-full flex justify-center mt-4">
        {{$posts->links()}}
    </div>
</section>
@endsection
