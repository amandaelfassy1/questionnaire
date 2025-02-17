@extends('layouts.app')

@section('content')
    <h2>Remplir le Questionnaire: {{ $questionnaire->title }}</h2>
    <form method="POST" action="{{ route('questionnaires.submit', $questionnaire->id) }}">
        @csrf
        @foreach($questionnaire->questions as $question)
            <div class="form-group">
                <label>{{ $question->question_text }}</label>
                <input type="text" name="responses[{{ $question->id }}]" class="form-control">
            </div>
        @endforeach
        <button type="submit" class="btn btn-success mt-3">Soumettre</button>
    </form>
@endsection
