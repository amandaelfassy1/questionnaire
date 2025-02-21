@include('layouts.navigation')
@extends('layouts.app')
@section('content')
    <div class="container mx-auto py-10">
        <!-- ✅ Bloc principal -->
        <div class="bg-white shadow-xl rounded-lg p-8 mx-auto">
            <h2 class="text-3xl font-bold text-gray-900 mb-6 text-center flex items-center justify-center">
                📋 Remplir le Questionnaire
            </h2>
            <h3 class="text-xl font-semibold text-gray-800 mb-2 text-center">{{ $questionnaire->title }}</h3>
            <p class="text-gray-600 text-center mb-6">{{ $questionnaire->description }}</p>

            <!-- ✅ Formulaire -->
            <form method="POST" action="{{ route('questionnaires.submit', $questionnaire->id) }}" class="space-y-6">
                @csrf

                @foreach($questionnaire->questions as $question)
                    <div class="bg-gray-100 p-5 rounded-lg shadow-md border border-gray-200">
                        <label class="block font-medium text-gray-800 text-lg mb-2">
                            {{ $question->question_text }}
                        </label>

                        @if($question->type == 'text')
                            <input type="text" name="responses[{{ $question->id }}]" 
                                   class="mt-2 p-3 w-full border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                                   placeholder="Votre réponse ici..." required>

                        @elseif($question->type == 'boolean')
                            <div class="mt-3 flex space-x-4">
                                <label class="flex items-center bg-white p-3 rounded-lg shadow-md cursor-pointer w-full">
                                    <input type="radio" name="responses[{{ $question->id }}]" value="1" 
                                           class="form-radio text-blue-500" required>
                                    <span class="ml-2 text-gray-900 font-semibold">✅ Oui</span>
                                </label>
                                <label class="flex items-center bg-white p-3 rounded-lg shadow-md cursor-pointer w-full">
                                    <input type="radio" name="responses[{{ $question->id }}]" value="0" 
                                           class="form-radio text-red-500" required>
                                    <span class="ml-2 text-gray-900 font-semibold">❌ Non</span>
                                </label>
                            </div>

                        @elseif($question->type == 'multiple_choice' || $question->type == 'radio')
                            @php
                                $options = json_decode($question->options, true) ?? [];
                            @endphp

                            @if(!empty($options))
                                <div class="mt-3 space-y-3">
                                    @foreach($options as $option)
                                        <label class="flex items-center bg-white p-3 rounded-lg shadow-md cursor-pointer">
                                            <input type="radio" name="responses[{{ $question->id }}]" value="{{ $option }}" 
                                                   class="form-radio text-blue-500" required>
                                            <span class="ml-2 text-gray-900 font-semibold">{{ $option }}</span>
                                        </label>
                                    @endforeach
                                </div>
                            @else
                                <p class="text-gray-500">⚠️ Aucune option disponible pour cette question.</p>
                            @endif
                        @endif
                    </div>
                @endforeach

                <!-- ✅ Bouton de soumission -->
                <div class="flex justify-center mt-6">
                    <button type="submit" 
                            class="bg-gray-800 hover:bg-blue-600 text-white font-bold py-3 px-8 rounded-lg shadow-lg transition-all transform hover:scale-105">
                        ✅ Soumettre les Réponses
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
