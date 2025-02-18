@extends('adminlte::page')

@section('title', 'Liste des Questionnaires')

@section('content_header')
    <h1>Liste des Questionnaires</h1>
@stop

@section('content')
    <a href="{{ route('admin.questionnaires.create') }}" class="btn btn-primary mb-3">Créer un Questionnaire</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Événement</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($questionnaires as $questionnaire)
                <tr>
                    <td>{{ $questionnaire->title }}</td>
                    <td>{{ $questionnaire->event->name }}</td>
                    <td>
                        <a href="{{ route('admin.questionnaires.edit', $questionnaire->id) }}" class="btn btn-sm btn-warning">Modifier</a>
                        <form action="{{ route('admin.questionnaires.destroy', $questionnaire->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Supprimer ce questionnaire ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop
