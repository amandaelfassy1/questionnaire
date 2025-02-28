@extends('adminlte::page')

@section('title', 'Modifier un événement')

@section('content_header')
    <h1>Modifier un événement</h1>
@endsection

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">
        <h3 class="card-title">Édition de l'événement</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.events.update', $event->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label for="title" class="form-label">Titre de l'événement</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $event->name) }}" required>
            </div>

            <div class="mb-3">
                <label for="date" class="form-label">Date début</label>
                <input type="datetime-local" class="form-control" id="date" name="start_time" value="{{ old('start_time', $event->start_time) }}" required>
            </div>

            <div class="mb-3">
                <label for="date" class="form-label">Date fin</label>
                <input type="datetime-local" class="form-control" id="date" name="end_time" value="{{ old('end_time', $event->end_time) }}" required>
            </div>
            
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="4">{{ old('description', $event->description) }}</textarea>
            </div>

            <button type="submit" class="btn btn-success">
                <i class="fas fa-save"></i> Enregistrer
            </button>
            <a href="{{ route('admin.events.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Retour
            </a>
        </form>
    </div>
</div>
@endsection
