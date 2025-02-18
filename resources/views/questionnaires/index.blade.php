@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-6 py-8">
        <h2 class="text-3xl font-bold text-gray-800 mb-6">📋 Mes Questionnaires</h2>

        @if($events->isEmpty())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">😞 Oops!</strong>
                <span class="block sm:inline">Aucun questionnaire disponible pour vos événements.</span>
            </div>
        @else
            @foreach($events as $event)
                <div class="bg-white shadow-lg rounded-lg p-6 mb-6">
                    <h3 class="text-xl font-semibold text-gray-900">{{ $event->name }}</h3>
                    <p class="text-gray-600">{{ $event->description }}</p>

                    @if($event->questionnaires->isEmpty())
                        <p class="text-gray-500 mt-3">Aucun questionnaire associé.</p>
                    @else
                        <h4 class="text-lg font-medium text-gray-700 mt-4">📑 Questionnaires associés :</h4>
                        <ul class="mt-2 space-y-2">
                            @foreach($event->questionnaires as $questionnaire)
                                <li>
                                    <a href="{{ route('questionnaires.fill', $questionnaire->id) }}" 
                                       class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded inline-block transition">
                                        📝 Remplir : {{ $questionnaire->title }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            @endforeach
        @endif
    </div>
@endsection
