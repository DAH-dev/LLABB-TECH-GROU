<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FaqItem;
use Illuminate\Http\Request;

class FaqItemController extends Controller
{
    public function index()
    {
        $faqItems = FaqItem::orderBy('categorie')->orderBy('ordre')->get();

        return view('admin.faq.index', [
            'faqItems' => $faqItems,
        ]);
    }

    public function create()
    {
        return view('admin.faq.form', [
            'faqItem' => new FaqItem(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $this->validateFaq($request);

        FaqItem::create($validated);

        return redirect()->route('admin.faq.index')->with('success', 'Question ajoutée avec succès.');
    }

    public function edit(FaqItem $faq)
    {
        return view('admin.faq.form', [
            'faqItem' => $faq,
        ]);
    }

    public function update(Request $request, FaqItem $faq)
    {
        $validated = $this->validateFaq($request);

        $faq->update($validated);

        return redirect()->route('admin.faq.index')->with('success', 'Question mise à jour avec succès.');
    }

    public function destroy(FaqItem $faq)
    {
        $faq->delete();

        return redirect()->route('admin.faq.index')->with('success', 'Question supprimée.');
    }

    private function validateFaq(Request $request): array
    {
        return $request->validate([
            'question' => 'required|string|max:255',
            'reponse' => 'required|string',
            'categorie' => 'required|in:general,services,tarifs,dashboard,support',
            'ordre' => 'nullable|integer',
        ]);
    }
}