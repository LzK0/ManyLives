@extends('layouts.main')

@section('title')
Cadastro
@endsection

@section('content')

<section class="w-full h-full flex items-center justify-center flex-col">
    <x-validation-errors class="mb-4 text-white mx-auto bg-zinc-200 rounded-lg p-2 h-34 text-center w-2/3 max-w-[400px]" />
    <form method="POST" action="{{ route('register') }}" class="w-5/6 h-3/5 max-w-[700px] shadow-lg bg-gradient-to-br from-purple-400 to-purple-600 rounded-2xl p-5 flex justify-center items-center flex-col">
        @csrf

        <div class="w-full flex items-center flex-col">
            <span class="w-[80%] max-w-[500px]">
                <x-label for="name" value="{{ __('Name') }}" class="text-white" />
            </span>
            <x-input id="name" class="block mt-1 w-[80%] max-w-[500px]" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
        </div>

        <div class="w-full flex items-center flex-col mt-2">
            <span class="w-[80%] max-w-[500px]">
                <x-label for="email" value="{{ __('Email') }}" class="text-white" />
            </span>
            <x-input id="email" class="block mt-1 w-[80%] max-w-[500px]" type="email" name="email" :value="old('email')" required autocomplete="username" />
        </div>

        <div class="w-full flex items-center flex-col mt-2">
            <span class="w-[80%] max-w-[500px]">
                <x-label for="password" value="{{ __('Password') }}" class="text-white" />
            </span>
            <x-input id="password" class="block mt-1 w-[80%] max-w-[500px]" type="password" name="password" required autocomplete="new-password" />
        </div>

        <div class="w-full flex items-center flex-col mt-2">
            <span class="w-[80%] max-w-[500px]">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" class="text-white" />
            </span>
            <x-input id="password_confirmation" class="block mt-1 w-[80%] max-w-[500px]" type="password" name="password_confirmation" required autocomplete="new-password" />
        </div>

        @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
        <div class="mt-4">
            <x-label for="terms">
                <div class="flex items-center">
                    <x-checkbox name="terms" id="terms" required />

                    <div class="ms-2">
                        {!! __('I agree to the :terms_of_service and :privacy_policy', [
                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                        ]) !!}
                    </div>
                </div>
            </x-label>
        </div>
        @endif

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-white hover:text-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-button class="ms-4 transition-all ease-linear duration-500">
                {{ __('Register') }}
            </x-button>
        </div>
    </form>
</section>
@endsection