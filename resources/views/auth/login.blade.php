@extends('layouts.main')

@section('title')
Login
@endsection

@section('content')


<section class="w-full h-full flex items-center justify-center flex-col">

    <x-validation-errors class="mb-8 text-white mx-auto bg-zinc-200 rounded-lg top-[40px] pt-5 h-32 text-center w-2/3 max-w-[400px]" />

    @session('status')
    <div class="mb-4 font-medium text-sm text-green-600">
        {{ $value }}
    </div>
    @endsession

    <form method="POST" action="{{ route('login') }}" class="w-5/6 h-1/2 max-w-[700px] shadow-lg bg-gradient-to-br from-purple-400 to-purple-600 rounded-2xl p-5 flex justify-center items-center flex-col">
        @csrf

        <div class="w-full flex items-center flex-col">
            <span class="w-[80%] max-w-[500px]">
                <x-label class="text-white" for="email" value="{{ __('Email') }}" />
            </span>
            <x-input id="email" class="block mt-1 w-[80%] max-w-[500px]" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
        </div>

        <div class="w-full flex items-center flex-col mt-2">
            <span class="w-[80%] max-w-[500px]">
                <x-label class="text-white" for="password" value="{{ __('Password') }}" />
            </span>
            <x-input id="password" class="block mt-1 w-[80%] max-w-[500px]" type="password" name="password" required autocomplete="current-password" />
        </div>

        <div class="w-[80%] max-w-[500px]">
            <div class="flex items-start mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-white">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-start mt-4">
                @if (Route::has('password.request'))
                <a class="underline text-sm transition-all ease-linear duration-500 text-white hover:text-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
                @endif
            </div>
        </div>
        <div class="flex items-center justify-end mt-4">
            <input type="submit" name="submit" id="submit" class="transition-all ease-linear duration-500 bg-sky-500 hover:bg-sky-600 cursor-pointer text-white font-bold py-3 px-20 rounded" value="Login">
        </div>
    </form>
</section>
@endsection