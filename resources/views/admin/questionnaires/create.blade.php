@extends('adminlte::page')

@section('title', 'Créer un Questionnaire')

@section('content_header')
    <h1>Créer un Questionnaire</h1>
@stop

@section('content')
    <form action="{{ route('admin.questionnaires.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Titre</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea name="description" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label>Événement associé</label>
            <select name="event_id" class="form-control" required>
                @foreach($events as $event)
                    <option value="{{ $event->id }}">{{ $event->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Créer</button>
    </form>
@stop
