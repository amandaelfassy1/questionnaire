@extends('layouts.app')

@section('content')
    <h2>Mes Questionnaires</h2>

    @if($events->isEmpty())
        <p>Aucun questionnaire disponible pour vos événements.</p>
    @else
        @foreach($events as $event)
            <div class="card mt-3">
                <div class="card-body">
                    <h5>Événement : {{ $event->name }}</h5>
                    <p>{{ $event->description }}</p>

                    @if($event->questionnaires->isEmpty())
                        <p>Aucun questionnaire associé.</p>
                    @else
                        <ul>
                            @foreach($event->questionnaires as $questionnaire)
                                <li>
                                    <a href="{{ route('questionnaires.fill', $questionnaire->id) }}" class="btn btn-primary">
                                        Remplir le questionnaire : {{ $questionnaire->title }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        @endforeach
    @endif
@endsection
