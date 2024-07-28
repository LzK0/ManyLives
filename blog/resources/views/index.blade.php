@extends('layouts.main')

@section('title')
Home
@endsection

@section('css')
{{asset('css/style_index.css')}}
@endsection

@php
use App\Models\User;
@endphp

@section('content')

<section class="w-full h-5/6 flex items-center justify-center" id="atck">
    <div class="w-4/5 h-2/5 bg-white flex flex-col items-center justify-center gap-2  md:w-4/6">
        <h1 class="font-mono text-5xl sm:text-6xl md:text-7xl text-slate-700"><b class="text-purple-600">M</b>any<b class="text-purple-600">L</b>ives
        </h1>
        <h4 class="text-lg text-slate-700">Nosso <b class="text-purple-600">blog</b> de noticias gerais</h4>
    </div>
</section>
<section class="w-full bg-white flex flex-col items-center p-3 gap-3 h-[180.5rem]
sm:px-20
md:flex-wrap md:flex-row md:justify-center md:p-3 md:gap-8 md:h-[95rem]
lg:gap-4 lg:h-[65rem]" id="container-posts">
    <article class="w-full h-16 flex items-center justify-start p-3
    md:pl-16
    xl:pl-32">
        <input type="text" class="py-1 rounded-lg absolute px-7 outline-0 border-1 border-zinc-800 focus:outline-purple-300
        md:pr-20
        lg:pr-40" maxlength="60" placeholder="Pesquisar título..." id="live-search">
    </article>

    <div id="show"></div>

    @foreach ($posts as $post)
    <article class="w-full h-1/6  border border-zinc-400
    md:w-2/5 md:h-[25rem] 
    lg:w-[30%] lg:p-1
    xl:w-[27%]">
        <div class="cards-post w-full h-1/2 bg-[url('{{asset('images/perfilGato.jpg')}}')]">
        </div>
        <div class="cards w-full h-1/2  flex flex-col p-4">
            <div class="w-full h-1/3 flex items-center gap-2">
                <div class="w-12 h-[3rem] rounded-full bg-zinc-900">
                    <img src="Images/{{User::find($post->user_id)->image}}" alt="" class="w-full h-full rounded-full">
                </div>
                <div class="w-2/3 h-6/6">
                    <p>
                        {{User::find($post->user_id)->name}}
                    </p>
                    <p>{{date('d/m/Y', strtotime($post->published_at))}}</p>
                </div>
            </div>
            <div class="w-full h-2/3 flex items-center border-b border-b-zinc-400">
                <a href="" class="text-lg font-bold hover:text-purple-600">{{$post->title}}</a>
            </div>
            <div class="w-full h-1/3 flex items-center justify-end pr-6">
                <div class="w-11 h-11  flex items-center justify-center gap-1"><i class="effect-likes fa-regular fa-heart text-red-500 cursor-pointer"></i>
                    <p class="likes">2</p>
                </div>
                <input type="hidden" value="{{$post->user_id}}" class="val-likes">
            </div>
        </div>
    </article>

    @endforeach

    <div class="w-full h-5 p-9 flex justify-end">
        <p>{{$posts->links()}}</p>
    </div>

</section>
<section class="h-[20rem] w-full bg-zinc-800 text-white p-5
    md:h-2/5 
lg:px-20
xl:px-60">
    <div class="w-full h-1/2 flex items-center justify-center flex-col gap-20">
        <p class="text-center">Projeto feito por <i class="text-purple-500">Victor Silva Antunes Rodrigues</i></p>
        <p>Tecnologias utilizadas:</p>
    </div>
    <div class="w-full h-1/3 grid grid-cols-3 gap-5 p-4 text-sm">
        <div class="sm:py-3 py-1 flex items-center justify-center text-center flex-1 transition-all ease-linear duration-300 rounded-md bg-orange-500 hover:bg-orange-600">
            <p>HTML5</p>
        </div>
        <div class="sm:py-3 py-1  flex items-center justify-center text-center flex-1 transition-all ease-linear duration-300 rounded-md bg-sky-500 hover:bg-sky-600">
            <p>CSS (Tailwind)</p>
        </div>
        <div class="sm:py-3 py-1  flex items-center justify-center text-center flex-1 transition-all ease-linear duration-300 rounded-md bg-yellow-500 hover:bg-yellow-600">
            <p>Javascript (Ajax)</p>
        </div>
        <div class="sm:py-3 py-1  flex items-center justify-center text-center col-start-1 col-end-3 transition-all ease-linear duration-300 rounded-md bg-purple-500 hover:bg-purple-600">
            <p>PHP (Laravel)</p>
        </div>
        <div class="sm:py-3 py-1  flex items-center justify-center text-center flex-1 transition-all ease-linear duration-300 rounded-md bg-gray-500 hover:bg-gray-600">
            <p>MySQL (Database)</p>
        </div>
    </div>
</section>

@endsection

@section('js')
@extends('layouts.footer_links')
<script>
    $(document).ready(function() {
        $('#live-search').on('keyup', function() {
            $value = $(this).val();
            $.ajax({
                type: 'get',
                url: 'search',
                data: {
                    'search': $value
                },
                success: function(data) {
                    $('#show').html(data);
                }
            });
        });
        $('.effect-likes').on('click', function() {
            var id = $('.val-likes').val();
            alert(id)
            $.ajax({

            });
        });
    });
</script>
@endsection