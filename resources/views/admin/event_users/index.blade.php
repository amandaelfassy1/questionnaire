@extends('adminlte::page')

@section('title', 'Gestion des Associations Événement-Utilisateur')

@section('content_header')
    <h1>📅 Gestion des Associations Événement-Utilisateur</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">
        <h3 class="card-title">Liste des Associations</h3>
    </div>
    <div class="card-body">
        @if ($eventUsers->isEmpty())
            <div class="alert alert-warning">Aucune association trouvée.</div>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Événement</th>
                        <th>Utilisateurs Associés</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($eventUsers as $event)
                        <tr>
                            <td>{{ $event->name }}</td>
                            <td>
                                @if ($event->users->isEmpty())
                                    <span class="text-muted">Aucun utilisateur associé</span>
                                @else
                                    <ul>
                                        @foreach ($event->users as $user)
                                            <li>{{ $user->name }} ({{ $user->email }})</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.event_users.edit', $event->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> Modifier
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>
@stop
