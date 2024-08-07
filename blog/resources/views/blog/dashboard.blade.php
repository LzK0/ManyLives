@extends('layouts.main')

@section('title')
Dashboard
@endsection

@section('user_image')
images/{{Auth::user()->image}}
@endsection

@section('content')
<section class="w-full h-full bg-sky-400 flex items-center justify-center flex-col gap-3 p-1">
    <div class="bg-red-500 w-[90%] h-4/6">
        <table class="border w-full h-full text-center">
            <thead class="border">
                <tr>
                    <th class="border p-1">ID</th>
                    <th class="border p-1">Título</th>
                    <th class="border p-1">Data</th>
                    <th class="border p-1">Editar</th>
                    <th class="border p-1">Apagar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr class="border">
                    <td class="border">{{ $post->id }}</td>
                    <td class="border">{{ $post->title }}</td>
                    <td class="border">{{ $post->created_at }}</td>
                    <td class="border"><i class="fa-solid fa-pen"></i></td>
                    <td class="border"><i class="fa-solid fa-trash"></i></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <p>{{$posts->links()}}</p>
</section>
@endsection