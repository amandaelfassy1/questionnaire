<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Questionnaire;
use Illuminate\Http\Request;

class QuestionAdminController extends Controller
{
    // 📌 Afficher la liste des questions
    public function index()
    {
        $questions = Question::with('questionnaire')->get();
        return view('admin.questions.index', compact('questions'));
    }

    // 📌 Afficher le formulaire de création
    public function create()
    {
        $questionnaires = Questionnaire::all();
        return view('admin.questions.create', compact('questionnaires'));
    }

    // 📌 Enregistrer une question
    public function store(Request $request)
    {
        $request->validate([
            'question_text' => 'required|string|max:255',
            'questionnaire_id' => 'required|exists:questionnaires,id',
            'type' => 'required|in:boolean,multiple_choice,text',
            'options' => 'nullable|string', // <-- Correction ici (options sous forme de texte)
        ]);
    
        // Transformer les options en JSON si c'est un choix multiple
        $options = ($request->type === 'multiple_choice' && !empty($request->options))
            ? json_encode(array_map('trim', explode(',', $request->options)))
            : null;
    
        Question::create([
            'questionnaire_id' => $request->questionnaire_id,
            'question_text' => $request->question_text,
            'type' => $request->type,
            'options' => $options,
        ]);
    
        return redirect()->route('admin.questions.index')->with('success', 'Question créée avec succès.');
    }
    
    
    public function update(Request $request, $id)
    {
        $question = Question::findOrFail($id);
    
        $request->validate([
            'question_text' => 'required|string|max:255',
            'questionnaire_id' => 'required|exists:questionnaires,id',
            'type' => 'required|in:boolean,multiple_choice,text', // 🔥 Correction ici !
        ]);
    
        $question->update($request->all());
    
        return redirect()->route('admin.questions.index')->with('success', 'Question mise à jour.');
    }
    

    // 📌 Afficher le formulaire d'édition
    public function edit($id)
    {
        $question = Question::findOrFail($id);
        $questionnaires = Questionnaire::all();
        return view('admin.questions.edit', compact('question', 'questionnaires'));
    }

    // 📌 Supprimer une question
    public function destroy($id)
    {
        $question = Question::findOrFail($id);
        $question->delete();

        return redirect()->route('admin.questions.index')->with('success', 'Question supprimée.');
    }
}
