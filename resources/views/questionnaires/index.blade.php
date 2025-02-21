@include('layouts.navigation')
@extends('layouts.app')
@section('content')
    <div class="container mx-auto px-6 py-8">
        <h2 class="text-3xl font-bold text-gray-900 mb-6 flex items-center">
            📋 Les événements auxquels j'ai participé
        </h2>

        @if($events->isEmpty())
            <div class="bg-red-100 border border-red-400 text-red-700 px-6 py-4 rounded-lg text-center shadow-md">
                <strong class="font-bold text-lg">😞 Oops!</strong>
                <p class="text-gray-700">Aucun questionnaire disponible pour vos événements.</p>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($events as $event)
                    <div class="bg-white shadow-md hover:shadow-lg border border-gray-800 rounded-lg p-6  transition duration-300">
                        <h3 class="text-xl font-semibold text-gray-900 flex items-center">
                            📅 {{ $event->name }}
                        </h3>
                        <p class="text-gray-700 mt-2">{{ $event->description }}</p>

                        @if($event->questionnaires->isEmpty())
                            <p class="text-gray-500 mt-3 italic">Aucun questionnaire associé.</p>
                        @else
                            <h4 class="text-lg font-medium text-gray-800 mt-4">📑 Questionnaires associés :</h4>
                            <ul class="mt-2 space-y-2">
                                @foreach($event->questionnaires as $questionnaire)
                                    <li>
                                        <a href="{{ route('questionnaires.fill', $questionnaire->id) }}" 
                                           class="flex items-center bg-gray-800 hover:bg-primary-300 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-300 transition-all transform hover:scale-105">
                                            📝 <span class="ml-2">Remplir : {{ $questionnaire->title }}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                @endforeach
            </div>
        @endif
    </div> 
@endsection
