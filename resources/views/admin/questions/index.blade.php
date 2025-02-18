@extends('adminlte::page')

@section('title', 'Liste des Questions')

@section('content_header')
    <h1>Liste des Questions</h1>
@stop

@section('content')
    <a href="{{ route('admin.questions.create') }}" class="btn btn-primary mb-3">Créer une Question</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Question</th>
                <th>Questionnaire</th>
                <th>Type</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($questions as $question)
                <tr>
                    <td>{{ $question->question_text }}</td>
                    <td>{{ $question->questionnaire->title ?? 'Aucun' }}</td>
                    <td>{{ ucfirst($question->type) }}</td>
                    <td>
                        <a href="{{ route('admin.questions.edit', $question->id) }}" class="btn btn-sm btn-warning">Modifier</a>
                        <form action="{{ route('admin.questions.destroy', $question->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Supprimer cette question ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop
