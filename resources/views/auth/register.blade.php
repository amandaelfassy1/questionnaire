@extends('layouts.app')
    @section('content')
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="bg-white shadow-lg rounded-lg p-8 max-w-md w-full">
            <!-- Logo -->
            <div class="text-center">
                <img src="{{ asset('img/e.png') }}" alt="Logo" class="w-20 mx-auto mb-4">
                <h2 class="text-2xl font-bold text-gray-900">Créer un compte</h2>
                <p class="text-gray-600">Rejoignez-nous dès maintenant</p>
            </div>

            <!-- Formulaire -->
            <form method="POST" action="{{ route('register') }}" class="mt-6">
                @csrf

                <!-- Nom -->
                <div>
                    <x-input-label for="name" :value="__('Nom')" class="text-gray-700 font-semibold" />
                    <x-text-input id="name" class="block mt-2 w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:outline-none"
                                  type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-500 text-sm" />
                </div>

                <!-- Email -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" class="text-gray-700 font-semibold" />
                    <x-text-input id="email" class="block mt-2 w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:outline-none"
                                  type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500 text-sm" />
                </div>

                <!-- Mot de passe -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Mot de passe')" class="text-gray-700 font-semibold" />
                    <x-text-input id="password" class="block mt-2 w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:outline-none"
                                  type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500 text-sm" />
                </div>

                <!-- Confirmation du mot de passe -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirmer le mot de passe')" class="text-gray-700 font-semibold" />
                    <x-text-input id="password_confirmation" class="block mt-2 w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:outline-none"
                                  type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-500 text-sm" />
                </div>

                <!-- Bouton d'inscription -->
                <div class="mt-6">
                    <button type="submit"
                            class="w-full bg-primary text-white font-bold py-3 rounded-lg shadow-md hover:bg-orange-600 transition-all">
                        🚀 S'inscrire
                    </button>
                </div>

                <!-- Déjà inscrit ? -->
                <p class="text-center text-gray-600 text-sm mt-4">
                    Déjà inscrit ?
                    <a href="{{ route('login') }}" class="text-primary font-semibold hover:underline">Se connecter</a>
                </p>
            </form>
        </div>
    </div>
    @endsection
