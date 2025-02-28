@extends('adminlte::page')

@section('title', 'Créer un événement')

@section('content_header')
    <h1>Créer un événement</h1>
@stop

@section('content')
    <form action="{{ route('admin.events.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Nom de l'événement</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea name="description" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label>Date de début</label>
            <input type="datetime-local" name="start_time" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Date de fin</label>
            <input type="datetime-local" name="end_time" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Créer</button>
    </form>
@stop
