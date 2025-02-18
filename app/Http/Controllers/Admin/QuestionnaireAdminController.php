<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Questionnaire;
use App\Models\Event;
use Illuminate\Http\Request;

class QuestionnaireAdminController extends Controller
{
    public function index()
    {
        $questionnaires = Questionnaire::with('event')->get();
        return view('admin.questionnaires.index', compact('questionnaires'));
    }

    public function create()
    {
        $events = Event::all();
        return view('admin.questionnaires.create', compact('events'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'event_id' => 'required|exists:events,id',
        ]);
        Questionnaire::create($request->all());

        return redirect()->route('admin.questionnaires.index')->with('success', 'Questionnaire créé avec succès.');
    }

    public function edit(Questionnaire $questionnaire)
    {
        $events = Event::all();
        return view('admin.questionnaires.edit', compact('questionnaire', 'events'));
    }

    public function update(Request $request, Questionnaire $questionnaire)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'event_id' => 'required|exists:events,id',
        ]);

        $questionnaire->update($request->all());

        return redirect()->route('questionnaires.index')->with('success', 'Questionnaire mis à jour.');
    }

    public function destroy(Questionnaire $questionnaire)
    {
        $questionnaire->delete();
        return redirect()->route('questionnaires.index')->with('success', 'Questionnaire supprimé.');
    }
}
