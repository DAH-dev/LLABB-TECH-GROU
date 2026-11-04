<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Nouvelle;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NouvelleController extends Controller
{
    public function index()
    {
        $nouvelles = Nouvelle::orderBy('date_publication', 'desc')->get();

        return view('admin.nouvelles.index', [
            'nouvelles' => $nouvelles,
        ]);
    }

    public function create()
    {
        return view('admin.nouvelles.form', [
            'nouvelle' => new Nouvelle(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $this->validateNouvelle($request);
        $validated['publie'] = $request->boolean('publie');
        $validated['slug'] = $this->uniqueSlug($validated['titre']);

        if ($request->hasFile('image')) {
            $validated['image'] = $this->storeImage($request->file('image'));
        } else {
            unset($validated['image']);
        }

        Nouvelle::create($validated);

        return redirect()->route('admin.nouvelles.index')->with('success', 'Nouvelle ajoutée avec succès.');
    }

    public function edit(Nouvelle $nouvelle)
    {
        return view('admin.nouvelles.form', [
            'nouvelle' => $nouvelle,
        ]);
    }

    public function update(Request $request, Nouvelle $nouvelle)
    {
        $validated = $this->validateNouvelle($request);
        $validated['publie'] = $request->boolean('publie');

        if ($validated['titre'] !== $nouvelle->titre) {
            $validated['slug'] = $this->uniqueSlug($validated['titre'], $nouvelle->id);
        }

        if ($request->hasFile('image')) {
            if ($nouvelle->image && file_exists(public_path('assets/images/nouvelles/' . $nouvelle->image))) {
                @unlink(public_path('assets/images/nouvelles/' . $nouvelle->image));
            }
            $validated['image'] = $this->storeImage($request->file('image'));
        } else {
            unset($validated['image']);
        }

        $nouvelle->update($validated);

        return redirect()->route('admin.nouvelles.index')->with('success', 'Nouvelle mise à jour avec succès.');
    }

    public function destroy(Nouvelle $nouvelle)
    {
        if ($nouvelle->image && file_exists(public_path('assets/images/nouvelles/' . $nouvelle->image))) {
            @unlink(public_path('assets/images/nouvelles/' . $nouvelle->image));
        }

        $nouvelle->delete();

        return redirect()->route('admin.nouvelles.index')->with('success', 'Nouvelle supprimée.');
    }

    private function validateNouvelle(Request $request): array
    {
        return $request->validate([
            'titre' => 'required|string|max:255',
            'resume' => 'required|string|max:300',
            'contenu' => 'required|string',
            'date_publication' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:4096',
        ]);
    }

    private function uniqueSlug(string $titre, ?int $ignoreId = null): string
    {
        $base = Str::slug($titre);
        $slug = $base;
        $i = 2;

        while (
            Nouvelle::where('slug', $slug)
                ->when($ignoreId, fn ($q) => $q->where('id', '!=', $ignoreId))
                ->exists()
        ) {
            $slug = $base . '-' . $i++;
        }

        return $slug;
    }

    private function storeImage($file): string
    {
        $filename = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('assets/images/nouvelles'), $filename);

        return $filename;
    }
}