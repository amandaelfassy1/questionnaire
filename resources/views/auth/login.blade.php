@extends('layouts.app')
    @section('content')
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="bg-white shadow-lg rounded-lg p-8 max-w-md w-full">
            <!-- Logo -->
            <div class="text-center">
                <img src="{{ asset('img/e.png') }}" alt="Logo" class="w-20 mx-auto mb-4">
                <h2 class="text-2xl font-bold text-gray-900">Connexion à votre compte</h2>
                <p class="text-gray-600">Accédez à votre espace personnel</p>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Formulaire -->
            <form method="POST" action="{{ route('login') }}" class="mt-6">
                @csrf

                <!-- Email -->
                <div>
                    <x-input-label for="email" :value="__('Email')" class="text-gray-700 font-semibold" />
                    <x-text-input id="email" class="block mt-2 w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:outline-none"
                                  type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500 text-sm" />
                </div>

                <!-- Mot de passe -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Mot de passe')" class="text-gray-700 font-semibold" />
                    <x-text-input id="password" class="block mt-2 w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:outline-none"
                                  type="password" name="password" required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500 text-sm" />
                </div>

                <!-- Se souvenir de moi -->
                <div class="flex items-center justify-between mt-4">
                    <label for="remember_me" class="flex items-center text-gray-600">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-primary focus:ring-primary" name="remember">
                        <span class="ml-2 text-sm">Se souvenir de moi</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-sm text-primary hover:underline">Mot de passe oublié ?</a>
                    @endif
                </div>

                <!-- Bouton Connexion -->
                <div class="mt-6">
                    <button type="submit"
                            class="w-full bg-primary text-white font-bold py-3 rounded-lg shadow-md hover:bg-orange-600 transition-all">
                        🔒 Connexion
                    </button>
                </div>

                <!-- Lien vers inscription -->
                <p class="text-center text-gray-600 text-sm mt-4">
                    Pas encore inscrit ? 
                    <a href="{{ route('register') }}" class="text-primary font-semibold hover:underline">Créer un compte</a>
                </p>
            </form>
        </div>
    </div>

    @endsection
