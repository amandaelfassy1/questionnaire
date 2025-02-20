@extends('adminlte::page')

@section('title', 'Créer un utilisateur')

@section('content_header')
    <h1>Créer un utilisateur</h1>
@endsection

@section('content')
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Nom :</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Email :</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Mot de passe :</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Confirmer le mot de passe :</label>
            <input type="password" name="password_confirmation" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Rôle :</label>
            <select name="role_id" class="form-control">
                @foreach($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Créer</button>
    </form>
@endsection
