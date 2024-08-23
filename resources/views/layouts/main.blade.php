<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title> <!-- Adicionando uma section de titulo. -->
    @include('layouts.head_links') <!-- Importando os links do head. -->
    <link rel="stylesheet" type="text/css" href="@yield('css')"> <!-- Adicionando uma section para o css, se necessário-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/style_main.css')}}"> <!-- Adicionando a estilização principal da base do site -->
</head>


<!-- Conteúdo da página-->
<body class="w-screen h-screen flex font-thin overflow-x-hidden bg-zinc-100">

    @if (session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            Swal.fire("Bom trabalho!", "{{session('success')}}", "success");
        });
    </script>
    @endif

    @if(session('error'))
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            Swal.fire("Ooops!", "{{session('error')}}", "error");
        });
    </script>
    @endif

    <nav id="sidebar" class="w-20 h-full bg-zinc-200 transition-all ease-linear duration-300 flex flex-col fixed z-10">
        <div class="w-full h-1/6 items-center justify-center flex flex-col">
            <!-- Verificando a imagem do user -->
            @auth
            <div class="w-20 h-20 rounded-full flex justify-center items-center p-2">
                <img src="@yield('user_image')" alt="" class="w-[rem3] h-full rounded-full"> <!-- Section para a foto do user-->
            </div>
            <div class="">
                <p id="user-name" class="hidden transition-all ease-linear duration-500">{{Auth::user()->name}}</p>
            </div>
            @endauth
            @guest
            <div class="w-20 h-20 rounded-full flex justify-center items-center p-2">
                <img src="{{asset('storage/images/fixed/guestUser.jpg')}}" alt="" class="w-full h-full rounded-full">
            </div>
            <div>
                <p id="user-name" class="hidden transition-all ease-linear duration-500">Guest</p>
            </div>
            @endguest
        </div>
        <div class="w-full h-4/6">
            <ul class="whitespace-nowrap overflow-ellipsis h-full flex flex-col gap-2 p-2">
                <!-- Section para os links da sidebar-->
                <li><a href="{{route('index')}}" class="gap-2 overflow-hidden flex items-center text-lg py-3 rounded-lg transition-all duration-300 ease-linear active bg-yellow-500 hover:bg-yellow-400"><i class="px-5 ml-0.5 fa-solid fa-house"></i>Home</a></li>
                @auth
                <li><a href="{{route('adicionar_post')}}" class="gap-2 overflow-hidden hover:bg-gray-300 flex items-center text-lg py-3 rounded-lg transition-all duration-300 ease-linear"><i class="px-5 ml-0.5 fa-solid fa-plus"></i>Inserir post</a></li>
                @if(Auth::user()->email == 'admin@admin')
                <li><a href="{{route('dash')}}" class="gap-2 overflow-hidden hover:bg-gray-300 flex items-center text-lg py-3 rounded-lg transition-all duration-300 ease-linear"><i class="px-5 ml-0.5 fa-solid fa-chart-line"></i>Dashboard</a></li>
                @endif
                <li><a href="{{route('perfil')}}" class="gap-2 overflow-hidden hover:bg-gray-300 flex items-center text-lg py-3 rounded-lg transition-all duration-300 ease-linear"><i class="px-5 ml-0.5 fa-solid fa-user"></i>Perfil</a></li>
                <li><a href="{{route('user_posts', Auth::user()->id)}}" class="gap-2 overflow-hidden hover:bg-gray-300 flex items-center text-lg py-3 rounded-lg transition-all duration-300 ease-linear"><i class="px-5 ml-0.5 fa-solid fa-address-book"></i>Meus posts</a></li>
                @endauth
                @guest
                <li><a href="{{route('login')}}" class="gap-2 overflow-hidden hover:bg-gray-300 flex items-center text-lg py-3 rounded-lg transition-all duration-300 ease-linear"><i class="px-5 ml-0.5 fa-solid fa-arrow-right-to-bracket"></i>Login</a></li>
                <li><a href="{{route('register')}}" class="gap-2 overflow-hidden hover:bg-gray-300 flex items-center text-lg py-3 rounded-lg transition-all duration-300 ease-linear"><i class="px-5 ml-0.5 fa-regular fa-share-from-square"></i>Cadastro</a></li>
                @endguest
            </ul>
        </div>
        <!-- Section para o logout -->
        <div class="w-full h-1/6 whitespace-nowrap overflow-ellipsis flex flex-col gap-2 p-2">
            @auth
            <form action="{{route('logout')}}" method="post">
                @csrf
                <a href="" class="gap-2 overflow-hidden flex items-center text-lg py-3 rounded-lg transition-all duration-300 ease-linear hover:bg-gray-300" onclick="event.preventDefault(); this.closest('form').submit();"><i class="fa-solid fa-arrow-right-from-bracket px-5 ml-0.5"></i> logout</a>
            </form>
            @endauth
        </div>
        <button class="absolute top-20 -right-3 text-sm bg-yellow-500 hover:bg-yellow-400 rounded-full px-2 py-1 transition-all ease-linear duration-300" id="sidebar-toggle"><i class="fa-solid fa-arrow-right"></i></button>
    </nav>

    <main class="h-full w-full ml-20 bg-slate-100">
        @yield('content') <!-- Section que será atribuida para o conteúdo principal das outras páginas -->
    </main>

    <script src="{{asset('js/script_main.js')}}"></script> <!-- JS do main-->
    @include('layouts.footer_links') <!-- Importando os links do footer-->
    <script src="@yield('js')"></script> <!-- Section para arquivo js, se necessário-->
</body>

</html>
