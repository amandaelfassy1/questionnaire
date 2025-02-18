@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-6 py-8">
        <div class="bg-white shadow-lg rounded-lg p-6">
            <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">📋 Remplir le Questionnaire</h2>
            <h3 class="text-xl font-semibold text-gray-900 mb-2 text-center">{{ $questionnaire->title }}</h3>
            <p class="text-gray-600 text-center mb-6">{{ $questionnaire->description }}</p>

            <form method="POST" action="{{ route('questionnaires.submit', $questionnaire->id) }}" class="space-y-6">
                @csrf
                @foreach($questionnaire->questions as $question)
                    <div class="bg-gray-100 p-4 rounded-lg shadow-sm">
                        <label class="block font-medium text-gray-700">{{ $question->question_text }}</label>

                        @if($question->type == 'text')
                            <input type="text" name="responses[{{ $question->id }}]" 
                                   class="mt-2 p-2 w-full border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                                   required>

                        @elseif($question->type == 'boolean')
                            <div class="mt-2 space-x-4">
                                <label class="inline-flex items-center">
                                    <input type="radio" name="responses[{{ $question->id }}]" value="1" 
                                           class="form-radio text-blue-600" required>
                                    <span class="ml-2">Oui</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="radio" name="responses[{{ $question->id }}]" value="0" 
                                           class="form-radio text-red-600" required>
                                    <span class="ml-2">Non</span>
                                </label>
                            </div>

                            @elseif($question->type == 'boolean')
                            <div class="mt-2 space-x-4">
                                <label class="inline-flex items-center">
                                    <input type="radio" name="responses[{{ $question->id }}]" value="1" 
                                           class="form-radio text-blue-600" required>
                                    <span class="ml-2">Oui</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="radio" name="responses[{{ $question->id }}]" value="0" 
                                           class="form-radio text-red-600" required>
                                    <span class="ml-2">Non</span>
                                </label>
                            </div>
                        
                        @elseif($question->type == 'multiple_choice' || $question->type == 'radio')
                            @php
                                $options = json_decode($question->options, true) ?? [];
                            @endphp
                        
                            @if(!empty($options))
                                <div class="mt-2 space-y-2">
                                    @foreach($options as $option)
                                        <label class="block">
                                            <input type="radio" name="responses[{{ $question->id }}]" value="{{ $option }}" 
                                                   class="form-radio text-blue-600" required>
                                            <span class="ml-2">{{ $option }}</span>
                                        </label>
                                    @endforeach
                                </div>
                            @else
                                <p class="text-gray-500">⚠️ Aucune option disponible pour cette question.</p>
                            @endif
                        @endif
                        
                    </div>
                @endforeach

                <div class="flex justify-center mt-6">
                    <button type="submit" 
                            class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-6 rounded-lg transition">
                        ✅ Soumettre les Réponses
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
