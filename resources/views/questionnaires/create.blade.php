@extends('layouts.app')

@section('content')
    <h2>Créer un Questionnaire</h2>
    <form method="POST" action="{{ route('questionnaires.store') }}">
        @csrf
        <div class="form-group">
            <label>Titre</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea name="description" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-success mt-3">Créer</button>
    </form>
@endsection
