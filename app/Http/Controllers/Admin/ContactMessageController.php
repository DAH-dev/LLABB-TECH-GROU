<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    public function index()
    {
        $messages = ContactMessage::orderBy('created_at', 'desc')->get();

        return view('admin.messages.index', [
            'messages' => $messages,
        ]);
    }

    public function updateStatus(Request $request, ContactMessage $message)
    {
        $request->validate([
            'statut' => 'required|in:a_traiter,traite',
        ]);

        $message->update(['statut' => $request->input('statut')]);

        return redirect()->route('admin.messages.index')->with('success', 'Statut mis à jour.');
    }

    public function destroy(ContactMessage $message)
    {
        $message->delete();

        return redirect()->route('admin.messages.index')->with('success', 'Message supprimé.');
    }
        public function show(ContactMessage $message)
    {
        return view('admin.messages.show', [
            'message' => $message,
        ]);
    }
    
}