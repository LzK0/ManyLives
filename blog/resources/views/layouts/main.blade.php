<!DOCTYPE html>
<html lang="pt-br">

@php
    use App\Models\User;
@endphp

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @extends('layouts.head_links')
    <link rel="stylesheet" type="text/css" href="@yield('css')">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style_main.css')}}">
</head>

<body class=" w-screen h-screen flex font-thin overflow-x-hidden">

    <nav id="sidebar" class="w-20 h-full bg-zinc-200 transition-all ease-linear duration-300 flex flex-col fixed z-10">
        <div class="w-full h-1/6 flex items-center justify-center">
            <div class="w-5/5 h-3/5 rounded-full flex flex-col justify-center items-center">
                @auth
                <img src="images/{{User::find(Auth::user()->id)->image}}" alt="" class="w-full h-full rounded-full">
                <p id="user-name" class="hidden  transition-all ease-linear duration-500">{{Auth::user()->name}}</p>
                @endauth
                @guest
                <img src="images/fixed/useroff.png" alt="" class="w-full h-full rounded-full">
                <p id="user-name" class="hidden  transition-all ease-linear duration-500">Guest</p>
                @endguest
            </div>
        </div>
        <div class="w-full h-4/6">
            <ul class="whitespace-nowrap overflow-ellipsis  h-full flex flex-col gap-2 p-2">
                <li><a href="{{route('index')}}" class="gap-2 overflow-hidden flex items-center  text-lg py-3 rounded-lg transition-all duration-300 ease-linear active bg-purple-600 hover:bg-purple-500 "><i class="px-5 ml-0.5 fa-solid fa-house"></i>Home</a></li>
                <li><a href="{{route('teste-one')}}" class="gap-2 overflow-hidden hover:bg-gray-300 flex items-center  text-lg py-3 rounded-lg  transition-all duration-300 ease-linear"><i class="px-5 ml-0.5 fa-solid fa-chart-line"></i>Dashboard</a></li>
                <li><a href="{{route('perfil')}}" class="gap-2 overflow-hidden hover:bg-gray-300 flex items-center  text-lg py-3 rounded-lg  transition-all duration-300 ease-linear"><i class="px-5 ml-0.5 fa-solid fa-user"></i></i>Perfil</a></li>
                <li><a href="" class="gap-2 overflow-hidden hover:bg-gray-300 flex items-center  text-lg py-3 rounded-lg  transition-all duration-300 ease-linear"><i class="px-5 ml-0.5 fa-solid fa-address-book"></i>Meus posts</a></li>
                @guest
                <li><a href="{{route('login')}}" class="gap-2 overflow-hidden hover:bg-gray-300 flex items-center  text-lg py-3 rounded-lg  transition-all duration-300 ease-linear"><i class="px-5 ml-0.5 fa-solid fa-arrow-right-to-bracket"></i>Login</a></li>
                <li><a href="{{route('register')}}" class="gap-2 overflow-hidden hover:bg-gray-300 flex items-center  text-lg py-3 rounded-lg  transition-all duration-300 ease-linear"><i class="px-5 ml-0.5 fa-regular fa-share-from-square"></i>Cadastro</a></li>
                @endguest
            </ul>
        </div>
        <div class="w-full h-1/6 whitespace-nowrap overflow-ellipsis flex flex-col gap-2 p-2">
            @auth
            <form action="{{route('logout')}}" method="post">
            @csrf
            <a href="" class="gap-2 overflow-hidden flex items-center  text-lg py-3 rounded-lg  transition-all duration-300 ease-linear hover:bg-gray-300" onclick="event.preventDefault(); this.closest('form').submit();"><i class="fa-solid fa-arrow-right-from-bracket px-5 ml-0.5"></i> logout</a>
            </form>
            @endauth
        </div>
        <button class="absolute top-20 -right-3  text-sm bg-purple-600 hover:bg-purple-500 rounded-full px-1 py-1 transition-all ease-linear duration-300" id="sidebar-toggle"><i class="fa-solid fa-arrow-right"></i></button>
    </nav>

    <main class="h-full w-full ml-20 bg-zinc-700">
        @yield('content')
    </main>

    <script src="{{asset('js/script_main.js')}}"></script>
    @extends('layouts.footer_links')
    @yield('js')
</body>

</html>