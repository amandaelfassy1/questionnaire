<?php

namespace App\Http\Controllers;

use App\Models\Questionnaire;
use Illuminate\Http\Request;

class QuestionnaireController extends Controller
{
    public function index()
    {
        $user = auth()->user();
    
        // Récupérer les événements auxquels l'utilisateur a participé
        $events = $user->events()->with('questionnaires')->get();
        return view('questionnaires.index', compact('events'));
    }

}
