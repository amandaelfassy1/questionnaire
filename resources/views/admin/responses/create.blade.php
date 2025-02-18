@extends('adminlte::page')

@section('title', 'Ajouter une Réponse')

@section('content_header')
    <h1>Ajouter une Réponse</h1>
@stop

@section('content')
    <form action="{{ route('admin.responses.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Question</label>
            <select name="question_id" class="form-control">
                @foreach($questions as $question)
                    <option value="{{ $question->id }}">{{ $question->question_text }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group">
            <label>Utilisateur</label>
            <select name="user_id" class="form-control">
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Réponse</label>
            <textarea name="answer" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-success">Enregistrer</button>
    </form>
@stop
