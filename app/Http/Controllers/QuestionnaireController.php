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

    public function create()
    {
        return view('questionnaires.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $questionnaire = Questionnaire::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('questionnaires.index')->with('success', 'Questionnaire créé avec succès.');
    }
}
