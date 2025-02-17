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
    public function fill($id)
{
    $questionnaire = Questionnaire::with('questions')->findOrFail($id);
    return view('responses.fill', compact('questionnaire'));
}

    public function submit(Request $request, $id)
    {
        $questionnaire = Questionnaire::findOrFail($id);

        foreach ($request->responses as $questionId => $answer) {
            Response::updateOrCreate(
                ['question_id' => $questionId, 'user_id' => auth()->id()],
                ['answer' => $answer]
            );
        }

        return redirect()->route('questionnaires.index')->with('success', 'Vos réponses ont été enregistrées.');
    }

}
