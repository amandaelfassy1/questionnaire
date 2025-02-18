@extends('adminlte::page')

@section('title', 'Modifier un Questionnaire')

@section('content_header')
    <h1>Modifier le Questionnaire</h1>
@stop

@section('content')
    <form action="{{ route('admin.  questionnaires.update', $questionnaire->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Titre</label>
            <input type="text" name="title" class="form-control" value="{{ $questionnaire->title }}" required>
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea name="description" class="form-control">{{ $questionnaire->description }}</textarea>
        </div>
        <div class="form-group">
            <label>Événement associé</label>
            <select name="event_id" class="form-control" required>
                @foreach($events as $event)
                    <option value="{{ $event->id }}" {{ $questionnaire->event_id == $event->id ? 'selected' : '' }}>
                        {{ $event->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-warning">Modifier</button>
    </form>
@stop
