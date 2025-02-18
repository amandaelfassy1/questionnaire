<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Response;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;

class ResponseAdminController extends Controller
{
    public function index()
    {
        $responses = Response::with(['question', 'user'])->get();
        return view('admin.responses.index', compact('responses'));
    }

    public function create()
    {
        $questions = Question::all();
        $users = User::all();
        return view('admin.responses.create', compact('questions', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'question_id' => 'required|exists:questions,id',
            'user_id' => 'required|exists:users,id',
            'answer' => 'required|array', // JSON array pour multi-réponses
        ]);

        Response::create([
            'question_id' => $request->question_id,
            'user_id' => $request->user_id,
            'answer' => json_encode($request->answer), // Convertir en JSON
        ]);

        return redirect()->route('admin.responses.index')->with('success', 'Réponse enregistrée.');
    }

    public function edit(Response $response)
    {
        $questions = Question::all();
        $users = User::all();
        return view('admin.responses.edit', compact('response', 'questions', 'users'));
    }

    public function update(Request $request, Response $response)
    {
        $request->validate([
            'question_id' => 'required|exists:questions,id',
            'user_id' => 'required|exists:users,id',
            'answer' => 'required|array',
        ]);

        $response->update([
            'question_id' => $request->question_id,
            'user_id' => $request->user_id,
            'answer' => json_encode($request->answer),
        ]);

        return redirect()->route('admin.responses.index')->with('success', 'Réponse mise à jour.');
    }

    public function destroy(Response $response)
    {
        $response->delete();
        return redirect()->route('admin.responses.index')->with('success', 'Réponse supprimée.');
    }
}
