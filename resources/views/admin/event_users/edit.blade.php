@extends('adminlte::page')

@section('title', 'Modifier les Associations')

@section('content_header')
    <h1>✏️ Modifier l'Association pour {{ $event->name }}</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">
        <h3 class="card-title">Modifier les Utilisateurs Associés</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.event_users.update', $event->id) }}" method="POST">
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

            {{-- Sélection des utilisateurs --}}
            <div class="form-group">
                <label for="users">Sélectionner les utilisateurs</label>
                <select name="users[]" id="users" class="form-control select2" multiple>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" 
                            {{ in_array($user->id, $event->users->pluck('id')->toArray()) ? 'selected' : '' }}>
                            {{ $user->name }} ({{ $user->email }})
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Boutons d'action --}}
            <div class="mt-4">
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> Enregistrer
                </button>
                <a href="{{ route('admin.event_users.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Retour
                </a>
            </div>
        </form>
    </div>
</div>
@stop

@section('js')
<script>
    $(document).ready(function() {
        $('.select2').select2({
            placeholder: "Sélectionner des utilisateurs",
            allowClear: true
        });
    });
</script>
@stop
