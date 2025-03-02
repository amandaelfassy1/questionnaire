@extends('adminlte::page')

@section('title', 'Créer un questionnaire')

@section('content_header')
    <h1>Créer un questionnaire</h1>
@endsection

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">
        <h3 class="card-title">Nouveau Questionnaire</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.questionnaires.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Titre</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
            </div>

            <div class="mb-3">
                <label for="event_id" class="form-label">Événement</label>
                <select class="form-control" id="event_id" name="event_id" required>
                    @foreach ($events as $event)
                        <option value="{{ $event->id }}">{{ $event->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="type" class="form-label">Type de questionnaire</label>
                <select class="form-control" id="type" name="type" required>
                    <option value="organisateur">Organisateur</option>
                    <option value="formateur">Formateur</option>
                    <option value="participant">Participant</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success">Créer</button>
        </form>
    </div>
</div>
@endsection
