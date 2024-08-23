@extends('layouts.main')

@section('title')
Editando Post
@endsection

@section('user_image')
{{asset('storage/'. Auth::user()->image)}}
@endsection

@section('css')
{{asset('css/style_editar_post.css')}}
@endsection

@section('content')


<section class="w-full h-[190%]">

    <div class="w-full h-full flex justify-center">
        <form action="{{route('editar_post', $post->id)}}" method="post" enctype="multipart/form-data" class="w-[80%] h-full">
            @csrf
            @method('PUT')
            <div class="h-[20%] w-full bg-zinc-500 flex items-center justify-center relative
            md:h-[35%]
            xl:h-[40%]">
                @if($post->post_image)
                <img src="{{asset('storage/' . $post->image_post)}}" alt="" class="w-full h-full" id="image_preview">
                @endif
                <label for="image-post" class="w-[140px] h-[140px] flex items-center justify-center cursor-pointer bg-zinc-700 opacity-70 text-white rounded-full transition-all ease-linear duration-300 hover:bg-zinc-800 absolute">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 0 1 5.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 0 0-1.134-.175 2.31 2.31 0 0 1-1.64-1.055l-.822-1.316a2.192 2.192 0 0 0-1.736-1.039 48.774 48.774 0 0 0-5.232 0 2.192 2.192 0 0 0-1.736 1.039l-.821 1.316Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0ZM18.75 10.5h.008v.008h-.008V10.5Z" />
                    </svg>
                </label>
                <input type="file" name="image_post" id="image-post" class="hidden">
            </div>
            @error('image_post')
            <div class="text-red-600 w-4/5 mb-4">{{ $message }}</div>
            @enderror
            <div class="w-full h-[80%]">
                <div class="w-full h-[10%] flex">
                    <div class="w-1/3 h-full  flex justify-center items-center
                sm:justify-end">
                        <div class="w-[5rem] h-[5rem] rounded-full
                        sm:w-[7rem] sm:h-[7rem] sm:p-4
                        md:w-[9rem] md:h-[9rem] md:p-6">
                            <img src="{{asset('storage/'. Auth::user()->image)}}" alt="" class="w-full h-full rounded-full">
                        </div>
                    </div>
                    <div class="w-2/3 h-full ">
                        <div class="w-full h-1/2 flex items-end">
                            <h4 class="text-xl">Autor: {{Auth::user()->name}}</h4>

                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        </div>
                        <div class="w-full h-1/2 flex items-baseline">
                            <p>Será publicado: {{date("d/m/Y", strtotime(now())) }}</p>

                            <input type="hidden" name="published_at" id="" value="{{now()}}">

                            <input type="hidden" name="like" value="0">

                        </div>
                    </div>
                </div>
                @if(!Auth::user()->instagram && !Auth::user()->facebook && !Auth::user()->twitter)
                <div class="w-full h-[10%] items-center justify-evenly hidden">
                    @else
                    <div class="w-full h-[20%] flex items-center justify-center gap-2 flex-col
                    md:h-[10%] md:flex-row">
                        @if (Auth::user()->instagram)
                        <a href="">
                            <button class="insta-btn">
                                <i class="fa-brands fa-instagram"></i>
                            </button>
                        </a>
                        @endif

                        @if (Auth::user()->facebook)
                        <a href="">
                            <button class="fb-btn"> <i class="fa-brands fa-facebook"></i>
                            </button>
                        </a>
                        @endif

                        @if(Auth::user()->twitter)
                        <a href="">
                            <button class="x-btn">
                                <i class="fa-solid fa-x"></i>
                            </button>
                        </a>
                        @endif
                        @endif
                    </div>
                    <div class="w-full h-[90%] flex flex-col justify-center gap-3 items-center">

                        <input type="text" name="title" id="title" class="w-4/5 h-10 rounded-md bold border-purple-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 resize-none" value="{{$post->title}}" placeholder="Título...">
                        @error('title')
                        <div class="text-red-600 w-4/5 mb-4">{{ $message }}</div>
                        @enderror

                        <textarea name="description" id="description" placeholder="Descrição..." class="w-4/5 h-[12rem] border-purple-400 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 resize-none" value="{{old('description')}}">
                        {{$post->description}}
                        </textarea>
                        @error('description')
                        <div class="text-red-600 w-4/5 mb-4">{{ $message }}</div>
                        @enderror

                        <textarea name="content" id="content" placeholder="Conteúdo..." class="w-4/5 h-[28rem] border-purple-400 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 resize-none">
                        {{$post->content}}
                        </textarea>
                        @error('content')
                        <div class="text-red-600 w-4/5 mb-7">{{ $message }}</div>
                        @enderror

                        <div class="flex flex-col gap-5 p-2
                    md:flex-row">
                            <button class="submit" type="submit">
                                <span class="submit-content">Editar</span>
                            </button>
                            <button type="reset" class="atualizar">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="16"
                                    height="16"
                                    fill="currentColor"
                                    class="bi bi-arrow-repeat"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z"></path>
                                    <path
                                        fill-rule="evenodd"
                                        d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z"></path>
                                </svg>
                                Resetar
                            </button>

                        </div>
                    </div>

                </div>
        </form>
    </div>
</section>

@endsection

@section('js')
{{asset('js/script_editar_post.js')}}
@endsection