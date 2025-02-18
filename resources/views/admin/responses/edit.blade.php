@extends('adminlte::page')

@section('title', 'Modifier une Question')

@section('content_header')
    <h1>Modifier la Question</h1>
@stop

@section('content')
    <form action="{{ route('admin.questions.update', $question->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="question_text">Texte de la question</label>
            <input type="text" name="question_text" class="form-control" value="{{ $question->question_text }}" required>
        </div>

        <div class="form-group">
            <label for="questionnaire_id">Questionnaire associé</label>
            <select name="questionnaire_id" class="form-control" required>
                @foreach($questionnaires as $questionnaire)
                    <option value="{{ $questionnaire->id }}" {{ $question->questionnaire_id == $questionnaire->id ? 'selected' : '' }}>
                        {{ $questionnaire->title }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="type">Type de réponse</label>
            <select name="type" class="form-control" required>
                <option value="text" {{ $question->type == 'text' ? 'selected' : '' }}>Texte libre</option>
                <option value="radio" {{ $question->type == 'radio' ? 'selected' : '' }}>Choix unique</option>
                <option value="checkbox" {{ $question->type == 'checkbox' ? 'selected' : '' }}>Choix multiple</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Mettre à jour</button>
    </form>
@stop
