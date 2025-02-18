@extends('adminlte::page')

@section('title', 'Admin Panel')

@section('content_header')
    <h1>Admin Panel</h1>
@stop

@section('content')
    <p>Bienvenue dans le panel admin !</p>

    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ \App\Models\Event::count() }}</h3>
                    <p>Événements</p>
                </div>
                <a href="{{ url('admin/events') }}" class="small-box-footer">Voir <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ \App\Models\Questionnaire::count() }}</h3>
                    <p>Questionnaires</p>
                </div>
                <a href="{{ url('admin/questionnaires') }}" class="small-box-footer">Voir <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ \App\Models\Question::count() }}</h3>
                    <p>Questions</p>
                </div>
                <a href="{{ url('admin/questions') }}" class="small-box-footer">Voir <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ \App\Models\Response::count() }}</h3>
                    <p>Réponses</p>
                </div>
                <a href="{{ url('admin/responses') }}" class="small-box-footer">Voir <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
@stop
