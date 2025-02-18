@extends('adminlte::page')

@section('title', 'Liste des Réponses')

@section('content_header')
    <h1>Liste des Réponses</h1>
@stop

@section('content')
    <a href="{{ route('admin.responses.create') }}" class="btn btn-primary mb-3">Ajouter une Réponse</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Question</th>
                <th>Utilisateur</th>
                <th>Réponse</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($responses as $response)
                <tr>
                    <td>{{ $response->question->question_text }}</td>
                    <td>{{ $response->user->name }}</td>
                    <td>{{ json_encode($response->answer) }}</td>
                    <td>
                        <a href="{{ route('admin.responses.edit', $response->id) }}" class="btn btn-sm btn-warning">Modifier</a>
                        <form action="{{ route('admin.responses.destroy', $response->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Supprimer cette réponse ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop
