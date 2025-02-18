@extends('adminlte::page')

@section('title', 'Créer une Question')

@section('content_header')
    <h1>Créer une Question</h1>
@stop

@section('content')
    <form action="{{ route('admin.questions.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="question_text">Texte de la question</label>
            <input type="text" name="question_text" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="questionnaire_id">Questionnaire associé</label>
            <select name="questionnaire_id" class="form-control" required>
                <option value="">Sélectionner un questionnaire</option>
                @foreach($questionnaires as $questionnaire)
                    <option value="{{ $questionnaire->id }}">{{ $questionnaire->title }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="type" class="block font-medium text-gray-700">Type de question</label>
            <select name="type" id="type" class="mt-1 block w-full border rounded-lg p-2" required onchange="toggleOptionsField()">
                <option value="text">Texte</option>
                <option value="boolean">Oui/Non</option>
                <option value="multiple_choice">Choix multiple</option>
            </select>
        </div>
        
        <div class="mb-4" id="optionsField" style="display: none;">
            <label for="options" class="block font-medium text-gray-700">Options (séparées par une virgule)</label>
            <input type="text" name="options" id="options" class="mt-1 block w-full border rounded-lg p-2">
        </div>
        
        <script>
            function toggleOptionsField() {
                var type = document.getElementById("type").value;
                var optionsField = document.getElementById("optionsField");
                optionsField.style.display = (type === "multiple_choice") ? "block" : "none";
            }
        </script>
        
        

        <button type="submit" class="btn btn-success">Créer</button>
    </form>
@stop
