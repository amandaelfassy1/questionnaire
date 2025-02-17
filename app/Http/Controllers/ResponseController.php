<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Questionnaire;
use App\Models\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ResponseController extends Controller
{
    public function fill(Questionnaire $questionnaire)
    {
        return view('responses.fill', compact('questionnaire'));
    }

    public function submit(Request $request, Questionnaire $questionnaire)
    {
        foreach ($request->responses as $questionId => $answer) {
            Response::create([
                'question_id' => $questionId,
                'user_id' => auth()->id(),
                'answer' => $answer,
            ]);
        }

        return redirect()->route('questionnaires.index')->with('success', 'Réponses enregistrées.');
    }
}
