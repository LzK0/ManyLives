@extends('layouts.main')

@section('title')
Forgot Your Password?
@endsection

@section('content')
<section class="w-full h-full bg-gray-100 flex justify-center flex-col gap-5 items-center">

    <x-validation-errors class="mb-6 text-red-600 mx-auto bg-white rounded-lg border border-gray-300 p-4 w-4/5 max-w-md" />

    @session('status')
    <div class="mb-6 text-green-700 flex bg-white rounded-lg border border-gray-300 p-4 w-4/5 max-w-md items-center justify-center">
        {{ $value }}
    </div>
    @endsession

    <div class="w-4/5 max-w-md p-6 bg-white rounded-lg shadow-lg flex flex-col items-center justify-center gap-4 border border-gray-300">
        <div class="mb-4 text-sm text-gray-800 text-center">
            {{ __('Forgot your password? No problem. Just enter your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <form method="POST" action="{{ route('password.email') }}" class="w-full">
            @csrf

            <div class="w-full flex flex-col">
                <x-label for="email" class="text-gray-800 mb-2" value="{{ __('Email') }}" />
                <x-input id="email" class="block w-full border border-gray-300 rounded-md p-2 focus:border-yellow-400 focus:ring-yellow-400" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="bg-yellow-400 hover:bg-yellow-500 text-white font-bold py-2 px-6 rounded transition-all duration-300 cursor-pointer">
                    {{ __('Send Password Reset Link') }}
                </x-button>
            </div>
        </form>
    </div>
</section>
@endsection
