@extends('adminlte::page')

@section('title', isset($event) ? 'Modifier un événement' : 'Ajouter un événement')

@section('content_header')
    <h1>{{ isset($event) ? 'Modifier un événement' : 'Ajouter un événement' }}</h1>
@stop

@section('content')
    <form action="{{ isset($event) ? route('events.update', $event->id) : route('events.store') }}" method="POST">
        @csrf
        @isset($event)
            @method('PUT')
        @endisset

        <div class="form-group">
            <label>Nom</label>
            <input type="text" name="name" class="form-control" value="{{ $event->name ?? '' }}" required>
        </div>

        <div class="form-group">
            <label>Description</label>
            <textarea name="description" class="form-control">{{ $event->description ?? '' }}</textarea>
        </div>

        <div class="form-group">
            <label>Date</label>
            <input type="date" name="date" class="form-control" value="{{ $event->date ?? '' }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
@stop
