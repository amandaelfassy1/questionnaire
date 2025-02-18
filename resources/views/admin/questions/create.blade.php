@extends('adminlte::page')

@section('title', 'Créer une Question')

@section('content_header')
    <h1>Créer une Question</h1>
@stop

@section('content')
    <form action="{{ route('admin.questions.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="question_text">Texte de la question</label>
            <input type="text" name="question_text" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="questionnaire_id">Questionnaire associé</label>
            <select name="questionnaire_id" class="form-control" required>
                <option value="">Sélectionner un questionnaire</option>
                @foreach($questionnaires as $questionnaire)
                    <option value="{{ $questionnaire->id }}">{{ $questionnaire->title }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="type">Type de réponse</label>
            <select name="type" class="form-control" required>
                <option value="boolean">Vrai / Faux</option>
                <option value="multiple_choice">Choix multiple</option>
                <option value="text">Texte libre</option>
            </select>
        </div>
        

        <button type="submit" class="btn btn-success">Créer</button>
    </form>
@stop
