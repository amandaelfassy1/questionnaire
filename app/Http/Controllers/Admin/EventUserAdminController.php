<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventUserAdminController extends Controller
{
    public function index()
    {
        $eventUsers = Event::with('users')->get();
        return view('admin.event_users.index', compact('eventUsers'));
    }

    public function edit($eventId)
    {
        $event = Event::with('users')->findOrFail($eventId);
        $users = User::all();

        return view('admin.event_users.edit', compact('event', 'users'));
    }

    public function update(Request $request, $eventId)
    {
        $event = Event::findOrFail($eventId);

        $request->validate([
            'users' => 'nullable|array',
            'users.*' => 'exists:users,id',
        ]);

        // Met à jour les utilisateurs associés à l'événement
        $event->users()->sync($request->users);

        return redirect()->route('admin.event_users.index')->with('success', 'Les utilisateurs ont été mis à jour pour cet événement.');
    }
}
