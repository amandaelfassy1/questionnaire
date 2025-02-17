@extends('layouts.app')

@section('content')
    <h2>Mes Questionnaires</h2>
    <a href="{{ route('questionnaires.create') }}" class="btn btn-primary">Créer un Questionnaire</a>

    @foreach($questionnaires as $questionnaire)
        <div class="card mt-3">
            <div class="card-body">
                <h5>{{ $questionnaire->title }}</h5>
                <p>{{ $questionnaire->description }}</p>
                <a href="{{ route('questionnaires.show', $questionnaire->id) }}" class="btn btn-info">Voir</a>
            </div>
        </div>
    @endforeach
@endsection
