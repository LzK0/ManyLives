@extends('layouts.main')

@section('title')
Esqueceu sua senha?
@endsection

@section('content')
<section class="w-full h-full bg-zinc-100 flex justify-center flex-col gap-5 items-center">
    <x-validation-errors class="mb-8 text-white mx-auto bg-zinc-200 rounded-lg  pt-5 h-32 text-center w-2/3 max-w-[400px]" />
    @session('status')
    <div class="mb-8 text-green-700 flex bg-zinc-200 rounded-lg pt-5 h-32 text-center w-2/3 max-w-[400px] items-center
    justify-center">
        {{ $value }}
    </div>
    @endsession
    <div class="w-4/5 h-2/5 p-3 bg-purple-600 rounded-lg shadow-lg flex flex-col items-center justify-center gap-2 max-w-[500px]">
        <div class="mb-4 text-sm text-white">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>



        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-label for="email" class="text-white" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Email Password Reset Link') }}
                </x-button>
            </div>
        </form>
    </div>
</section>
@endsection