@extends('adminlte::page')

@section('title', 'Modifier un utilisateur')

@section('content_header')
    <h1>Modifier l'utilisateur</h1>
@endsection

@section('content')
    <form action="{{ route('users.update', $user) }}" method="POST">
        @csrf @method('PUT')
        <div class="form-group">
            <label>Nom :</label>
            <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
        </div>

        <div class="form-group">
            <label>Email :</label>
            <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
        </div>

        <div class="form-group">
            <label>Rôle :</label>
            <select name="role_id" class="form-control">
                @foreach($roles as $role)
                    <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>
                        {{ $role->role_name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Assigner des événements :</label>
            <select name="events[]" class="form-control select2" multiple="multiple" data-placeholder="Sélectionnez les événements">
                @foreach($events as $event)
                    <option value="{{ $event->id }}" {{ in_array($event->id, $user->events->pluck('id')->toArray()) ? 'selected' : '' }}>
                        {{ $event->name }}
                    </option>
                @endforeach
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
@endsection
