<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PricingPlan;
use Illuminate\Http\Request;

class PricingPlanController extends Controller
{
    public function index()
    {
        $pricingPlans = PricingPlan::orderBy('ordre')->get();

        return view('admin.pricing.index', [
            'pricingPlans' => $pricingPlans,
        ]);
    }

    public function create()
    {
        return view('admin.pricing.form', [
            'plan' => new PricingPlan(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $this->validatePlan($request);
        $validated['fonctionnalites'] = $this->parseFeatures($request->input('fonctionnalites_texte'));
        $validated['plus_populaire'] = $request->boolean('plus_populaire');

        PricingPlan::create($validated);

        return redirect()->route('admin.pricing.index')->with('success', 'Offre créée avec succès.');
    }

    public function edit(PricingPlan $pricing)
    {
        return view('admin.pricing.form', [
            'plan' => $pricing,
        ]);
    }

    public function update(Request $request, PricingPlan $pricing)
    {
        $validated = $this->validatePlan($request);
        $validated['fonctionnalites'] = $this->parseFeatures($request->input('fonctionnalites_texte'));
        $validated['plus_populaire'] = $request->boolean('plus_populaire');

        $pricing->update($validated);

        return redirect()->route('admin.pricing.index')->with('success', 'Offre mise à jour avec succès.');
    }

    public function destroy(PricingPlan $pricing)
    {
        $pricing->delete();

        return redirect()->route('admin.pricing.index')->with('success', 'Offre supprimée.');
    }

    private function validatePlan(Request $request): array
    {
        return $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'prix' => 'required|numeric|min:0',
            'periode' => 'nullable|string|max:50',
            'ordre' => 'nullable|integer',
        ]);
    }

    private function parseFeatures(?string $text): array
    {
        if (!$text) {
            return [];
        }

        return collect(explode("\n", $text))
            ->map(fn ($line) => trim($line))
            ->filter()
            ->values()
            ->all();
    }
}