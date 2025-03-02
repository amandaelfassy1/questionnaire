<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Questionnaire;
use Illuminate\Http\Request;

class QuestionnaireController extends Controller
{
    public function index()
{
    $user = auth()->user();

    // Récupérer tous les événements auxquels l'utilisateur a participé
    $events = $user->events()->with(['questionnaires' => function ($query) use ($user) {
        $query->where('type', $user->role_name);
    }])->get();

    return view('questionnaires.index', compact('events'));
}


    public function show(Questionnaire $questionnaire)
    {
        // Vérifier que l'utilisateur a le droit de voir ce questionnaire
        if ($questionnaire->type !== auth()->user()->role) {
            return redirect()->route('questionnaires.index')->with('error', 'Vous ne pouvez pas remplir ce questionnaire.');
        }

        return view('questionnaires.show', compact('questionnaire'));
    }


}
