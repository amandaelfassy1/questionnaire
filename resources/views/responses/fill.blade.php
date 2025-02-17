@extends('layouts.app')

@section('content')
    <h2>Remplir le Questionnaire: {{ $questionnaire->title }}</h2>
    <form method="POST" action="{{ route('questionnaires.submit', ['id' => $questionnaire->id]) }}">
        @csrf
        @foreach($questionnaire->questions as $question)
            <div class="form-group">
                <label>{{ $question->question_text }}</label>

                @if($question->type == 'text')
                    <input type="text" name="responses[{{ $question->id }}]" class="form-control" required>
                
                @elseif($question->type == 'boolean')
                    <select name="responses[{{ $question->id }}]" class="form-control" required>
                        <option value="1">Oui</option>
                        <option value="0">Non</option>
                    </select>
                
                @elseif($question->type == 'multiple_choice')
                    @foreach(json_decode($question->options, true) as $option)
                        <div>
                            <input type="radio" name="responses[{{ $question->id }}]" value="{{ $option }}" required>
                            <label>{{ $option }}</label>
                        </div>
                    @endforeach
                @endif
            </div>
        @endforeach
        <button type="submit" class="btn btn-success mt-3">Soumettre</button>
    </form>
@endsection
