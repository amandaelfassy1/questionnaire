@extends('adminlte::page')

@section('title', 'Modifier un Questionnaire')

@section('content_header')
    <h1>📝 Modifier le Questionnaire</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">
        <h3 class="card-title">Édition du Questionnaire</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.questionnaires.update', $questionnaire->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Gestion des erreurs --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Titre du questionnaire --}}
            <div class="form-group">
                <label for="title">Titre</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $questionnaire->title) }}" required>
            </div>

            {{-- Description --}}
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" rows="3">{{ old('description', $questionnaire->description) }}</textarea>
            </div>

            {{-- Événement associé --}}
            <div class="form-group">
                <label for="event_id">Événement associé</label>
                <select name="event_id" id="event_id" class="form-control" required>
                    @foreach($events as $event)
                        <option value="{{ $event->id }}" {{ $questionnaire->event_id == $event->id ? 'selected' : '' }}>
                            {{ $event->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Type de questionnaire --}}
            <div class="form-group">
                <label for="type">Type de questionnaire</label>
                <select name="type" id="type" class="form-control" required>
                    <option value="organisateur" {{ $questionnaire->type == 'organisateur' ? 'selected' : '' }}>Organisateur</option>
                    <option value="formateur" {{ $questionnaire->type == 'formateur' ? 'selected' : '' }}>Formateur</option>
                    <option value="participant" {{ $questionnaire->type == 'participant' ? 'selected' : '' }}>Participant</option>
                </select>
            </div>

            {{-- Boutons d'action --}}
            <div class="mt-4">
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> Modifier
                </button>
                <a href="{{ route('admin.questionnaires.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Retour
                </a>
            </div>
        </form>
    </div>
</div>
@stop

@section('js')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Confirmation avant soumission
        document.querySelector("form").addEventListener("submit", function (e) {
            if (!confirm("Êtes-vous sûr de vouloir modifier ce questionnaire ?")) {
                e.preventDefault();
            }
        });
    });
</script>
@stop
