<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompteRendu;
use App\Models\User;
use Illuminate\Http\Request;

class CompteRenduController extends Controller
{
    private function voitTout(): bool
    {
        return in_array(auth()->user()->role, ['super_admin', 'admin']);
    }

    public function index(Request $request)
    {
        $query = CompteRendu::with('user')
            ->orderBy('date_rapport', 'desc')
            ->orderBy('id', 'desc');

        $membres = collect();

        if ($this->voitTout()) {
            $membres = User::orderBy('name')->get(['id', 'name']);

            if ($request->filled('membre')) {
                $query->where('user_id', $request->input('membre'));
            }
        } else {
            $query->where('user_id', auth()->id());
        }

        return view('admin.rapports.index', [
            'comptesRendus' => $query->get(),
            'membres' => $membres,
            'voitTout' => $this->voitTout(),
        ]);
    }

    public function create()
    {
        return view('admin.rapports.form', [
            'compteRendu' => new CompteRendu(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $this->validateRapport($request);
        $validated['user_id'] = auth()->id();

        CompteRendu::create($validated);

        return redirect()->route('admin.rapports.index')->with('success', 'Compte rendu enregistré.');
    }

    public function show(CompteRendu $compteRendu)
    {
        abort_unless($this->voitTout() || $compteRendu->user_id === auth()->id(), 403);

        return view('admin.rapports.show', [
            'compteRendu' => $compteRendu->load('user'),
        ]);
    }

    public function edit(CompteRendu $compteRendu)
    {
        abort_unless($compteRendu->user_id === auth()->id(), 403);

        return view('admin.rapports.form', [
            'compteRendu' => $compteRendu,
        ]);
    }

    public function update(Request $request, CompteRendu $compteRendu)
    {
        abort_unless($compteRendu->user_id === auth()->id(), 403);

        $compteRendu->update($this->validateRapport($request));

        return redirect()->route('admin.rapports.index')->with('success', 'Compte rendu mis à jour.');
    }

    public function destroy(CompteRendu $compteRendu)
    {
        abort_unless($this->voitTout() || $compteRendu->user_id === auth()->id(), 403);

        $compteRendu->delete();

        return redirect()->route('admin.rapports.index')->with('success', 'Compte rendu supprimé.');
    }

    private function validateRapport(Request $request): array
    {
        return $request->validate([
            'titre' => 'required|string|max:255',
            'date_rapport' => 'required|date',
            'contenu' => 'required|string',
        ]);
    }
}