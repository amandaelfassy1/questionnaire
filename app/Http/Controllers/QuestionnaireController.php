<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Questionnaire;
use Illuminate\Http\Request;

class QuestionnaireController extends Controller
{
    public function index()
    {
        $userId = auth()->id();
    
        // Récupérer les événements liés à l'utilisateur
        $events = Event::with('questionnaires')
            ->whereHas('users', function ($query) use ($userId) {
                $query->where('user_id', $userId);
            })->get();
    
        // Trouver les IDs des questionnaires déjà remplis par l'utilisateur
        $answeredQuestionnaireIds = \App\Models\Response::where('user_id', $userId)
            ->whereHas('question') // assure que la relation existe
            ->with('question')
            ->get()
            ->pluck('question.questionnaire_id')
            ->unique()
            ->toArray();
    
        return view('questionnaires.index', compact('events', 'answeredQuestionnaireIds'));
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
