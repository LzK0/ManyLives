@extends('layouts.main')

@section('title')
Home
@endsection

@section('css')
{{asset('css/style_index.css')}}
@endsection

@section('content')

<section class="w-full h-5/6 bg-sky-400 flex items-center justify-center" id="atck">
    <div class="w-3/5 h-2/5 bg-white flex flex-col items-center justify-center gap-2">
        <h1 class="font-mono text-8xl text-slate-700"><b class="text-purple-600">M</b>any<b class="text-purple-600">L</b>ives
        </h1>
        <h4 class="text-3xl text-slate-700">Nosso <b class="text-purple-600">blog</b> de noticias gerais</h4>
    </div>
</section>

@endsection