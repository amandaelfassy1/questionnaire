@extends('adminlte::page')

@section('title', 'Gestion des Questionnaires')

@section('content_header')
    <h1>Liste des Questionnaires</h1>
@endsection

@section('content')
<a href="{{ route('admin.questionnaires.create') }}" class="btn btn-success mb-4">Ajouter un questionnaire</a>

<div class="card">
    <div class="card-header bg-primary text-white">
        <h3 class="card-title">Tous les questionnaires</h3>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Événement</th>
                    <th>Type</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($questionnaires as $questionnaire)
                    <tr>
                        <td>{{ $questionnaire->title }}</td>
                        <td>{{ $questionnaire->event->name }}</td>
                        <td>
                            @if ($questionnaire->type == 'organisateur')
                                <span class="badge bg-success">Organisateur</span>
                            @elseif ($questionnaire->type == 'formateur')
                                <span class="badge bg-warning">Formateur</span>
                            @else
                                <span class="badge bg-info">Participant</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.questionnaires.edit', $questionnaire->id) }}" class="btn btn-sm btn-warning">Modifier</a>
                            <form action="{{ route('admin.questionnaires.destroy', $questionnaire->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Confirmer la suppression ?')">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
