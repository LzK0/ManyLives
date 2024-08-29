@extends('layouts.main')

@section('title')
Explorar
@endsection

@section('content')
<div class="container mx-auto mt-10 p-5">
    <h1 class="text-2xl font-semibold text-gray-800 mb-6">Explorar Usuários</h1>
    <article class="w-full flex items-center justify-center p-4">
        <div class="relative w-full max-w-lg">
            <form action="{{ route('search_users') }}" method="post">
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

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-3">
        @foreach($users as $user)
        <div class="bg-white shadow-md rounded-lg p-5 flex items-center hidd">
            <div class="w-16 h-16 rounded-full overflow-hidden">
                <a href="{{route('perfil_other_user', $user->id)}}">
                    <img src="{{ asset('storage/'. $user->image)}}" alt="User Image" class="w-full h-full object-cover rounded-full">
                </a>
            </div>
            <div class="ml-4">
                <h2 class="text-xl font-medium text-gray-800">{{ $user->name }}</h2>
                @if($user->email != $adminEmail)
                <p class="text-gray-600">Email: {{ $user->email }}</p>
                @else
                <p class="text-gray-600">Email privado.</p>
                @endif
                @if($user->followers->count() == 1)
                <p class="text-gray-600">{{ $user->followers->count() }} seguidor</p>
                @else
                <p class="text-gray-600">{{ $user->followers->count() }} seguidores</p>
                @endif
            </div>
        </div>
        @endforeach
    </div>

    @if($users->isEmpty())
    <p class="mt-10 text-center text-gray-600 mb-3">Nenhum usuário encontrado.</p>
    @endif

    <div class="w-full h-[7%] flex justify-center items-center">
        <p>{{ $users->links() }}</p>
    </div>


</div>
@endsection