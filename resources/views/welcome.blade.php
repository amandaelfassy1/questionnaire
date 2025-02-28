@extends('layouts.app')
@include('layouts.navigation')
@section('content')
    <!-- 🏠 HERO SECTION -->
    <header class="bg-primary relative">
        <div class="container mx-auto relative">
            <img src="{{ asset('img/ban1.png') }}" class="w-full" />
            <div class="absolute inset-0 flex flex-col justify-center items-end text-white pr-10">
                <p class="text-4xl fw-bold text-center leading-snug">
                    Gérez et analysez <br><span class="text-5xl">efficacement</span> <br> avec Eval'Event
                </p>
                <a href="#" class="transform transition duration-300 hover:scale-105 mt-6 bg-white text-primary font-bold py-3 px-6 rounded-lg shadow-md hover:bg-gray-200 self-end">
                   Commencer maintenant
                </a>
            </div>
        </div>
    </header>
    
    <!-- 🏗 SECTIONS DES SERVICES -->
                    
    <section class="container mx-auto px-6 py-12">
        <h2 class="text-3xl font-bold text-gray-900 text-center mb-8">🚀 Notre Solution SaaS</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-white shadow-lg rounded-lg p-6 transform transition duration-300 hover:scale-105 hover:shadow-xl">
                <h3 class="text-xl font-semibold text-primary flex items-center">📅 Planification</h3>
                <p class="text-gray-600 mt-2">Gérez efficacement les événements comme les formations et ateliers grâce à un système centralisé.</p>
            </div>
            <div class="bg-white shadow-lg rounded-lg p-6 transform transition duration-300 hover:scale-105 hover:shadow-xl">
                <h3 class="text-xl font-semibold text-primary flex items-center">📝 Digitalisation</h3>
                <p class="text-gray-600 mt-2">Fini le papier ! Créez, attribuez et analysez des questionnaires numériques avec des formats variés.</p>
            </div>
            <div class="bg-white shadow-lg rounded-lg p-6 transform transition duration-300 hover:scale-105 hover:shadow-xl">
                <h3 class="text-xl font-semibold text-primary flex items-center">📊 Analyse & Synthèse</h3>
                <p class="text-gray-600 mt-2">Collectez et analysez les réponses des participants en temps réel. Générez des rapports automatisés.</p>
            </div>
            <div class="bg-white shadow-lg rounded-lg p-6 transform transition duration-300 hover:scale-105 hover:shadow-xl">
                <h3 class="text-xl font-semibold text-primary flex items-center">🤝 Collaboration & RH</h3>
                <p class="text-gray-600 mt-2">Un workflow collaboratif optimisé pour tous les profils : développeurs, product owner, commerciaux, et clients.</p>
            </div>
        </div>
        
    </section>
    

    <!-- 📊 SECTION STATISTIQUES -->
    <section class="bg-gray-200  py-16">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold ">Nos résultats en chiffres</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
                <div class="bg-primary shadow-md rounded-lg p-6">
                    <h3 class="text-4xl font-bold text-white">250</h3>
                    <p class="text-white">Nouveaux projets par mois</p>
                </div>
                <div class="bg-primary shadow-md rounded-lg p-6">
                    <h3 class="text-4xl font-bold text-white">9,300</h3>
                    <p class="text-white">Utilisateurs actifs</p>
                </div>
                <div class="bg-primary shadow-md rounded-lg p-6">
                    <h3 class="text-4xl font-bold text-white">98%</h3>
                    <p class="text-white">Satisfaction client</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 👥 SECTION ÉQUIPE / TÉMOIGNAGES -->
    <section class="container mx-auto px-6 py-12">
        <h2 class="text-3xl font-bold text-gray-900 text-center">Notre équipe</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mt-8">
            <div class="text-center">
                <img src="{{asset('img/team1.png')}}" class="rounded-full mx-auto mb-4" alt="Team Member">
                <h3 class="text-lg font-semibold text-gray-900">Jean Dupont</h3>
                <p class="text-gray-600">Architecte principal</p>
            </div>
            <div class="text-center">
                <img src="{{asset('img/team2.png')}}" class="rounded-full mx-auto mb-4" alt="Team Member">
                <h3 class="text-lg font-semibold text-gray-900">Marie Curie</h3>
                <p class="text-gray-600">Spécialiste en design</p>
            </div>
            <div class="text-center">
                <img src="{{asset('img/team3.png')}}" class="rounded-full mx-auto mb-4" alt="Team Member">
                <h3 class="text-lg font-semibold text-gray-900">Paul Martin</h3>
                <p class="text-gray-600">Consultant en planification</p>
            </div>
            <div class="text-center">
                <img src="{{asset('img/team4.png')}}" class="rounded-full mx-auto mb-4" alt="Team Member">
                <h3 class="text-lg font-semibold text-gray-900">Alice Dubois</h3>
                <p class="text-gray-600">Directrice de projet</p>
            </div>
        </div>
    </section>

    <!-- 📩 SECTION APPEL À L'ACTION -->
    <section class="bg-gray-900 text-white py-16 text-center">
        <h2 class="text-3xl font-bold">Prêt à optimiser vos événements ?</h2>
        <p class="mt-4 text-lg">Essayez notre solution gratuitement dès aujourd'hui.</p>
        <div class="mt-6">
            <a href="#" class="bg-primary text-gray-900 py-3 px-6 rounded-lg text-lg shadow-md hover:bg-yellow-400">
                Essayer gratuitement
            </a>
        </div>
    </section>
@endsection
