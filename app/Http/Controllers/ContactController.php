<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'company' => 'nullable|string|max:255',
            'service' => 'nullable|string|max:255',
            'budget' => 'nullable|string|max:255',
            'message' => 'required|string',
            'newsletter' => 'nullable|boolean',
        ]);

        ContactMessage::create([
            'nom' => $validated['name'],
            'email' => $validated['email'],
            'telephone' => $validated['phone'] ?? null,
            'entreprise' => $validated['company'] ?? null,
            'service_interesse' => $validated['service'] ?? null,
            'budget' => $validated['budget'] ?? null,
            'message' => $validated['message'],
            'inscription_newsletter' => $request->has('newsletter'),
            'statut' => 'a_traiter',
        ]);

        return redirect()->back()->with('success', 'Votre message a bien été envoyé. Nous vous répondrons dans les 24 heures.');
    }
        public function subscribeNewsletter(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        \App\Models\NewsletterSubscriber::firstOrCreate([
            'email' => $request->input('email'),
        ]);

        return redirect()->back()->with('success', 'Merci pour votre inscription à la newsletter !');
    }
}