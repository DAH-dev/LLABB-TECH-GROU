<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('category')->orderBy('ordre')->get();

        return view('admin.projects.index', [
            'projects' => $projects,
        ]);
    }

    public function create()
    {
        return view('admin.projects.form', [
            'project' => new Project(),
            'categories' => ProjectCategory::orderBy('nom')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $this->validateProject($request);
        $validated['slug'] = Str::slug($validated['titre']);
        $validated['mis_en_avant'] = $request->boolean('mis_en_avant');

        if ($request->hasFile('image_couverture')) {
            $validated['image_couverture'] = $this->storeImage($request->file('image_couverture'));
        } else {
            unset($validated['image_couverture']);
        }

        Project::create($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Projet créé avec succès.');
    }

    public function edit(Project $project)
    {
        return view('admin.projects.form', [
            'project' => $project,
            'categories' => ProjectCategory::orderBy('nom')->get(),
        ]);
    }

    public function update(Request $request, Project $project)
    {
        $validated = $this->validateProject($request);
        $validated['slug'] = Str::slug($validated['titre']);
        $validated['mis_en_avant'] = $request->boolean('mis_en_avant');

        if ($request->hasFile('image_couverture')) {
            // On supprime l'ancienne image du disque si elle existe
            if ($project->image_couverture && file_exists(public_path('assets/images/portfolio/' . $project->image_couverture))) {
                @unlink(public_path('assets/images/portfolio/' . $project->image_couverture));
            }
            $validated['image_couverture'] = $this->storeImage($request->file('image_couverture'));
        } else {
            // Pas de nouveau fichier envoyé -> on garde l'image actuelle, on ne l'écrase pas
            unset($validated['image_couverture']);
        }

        $project->update($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Projet mis à jour avec succès.');
    }

    public function destroy(Project $project)
    {
        if ($project->image_couverture && file_exists(public_path('assets/images/portfolio/' . $project->image_couverture))) {
            @unlink(public_path('assets/images/portfolio/' . $project->image_couverture));
        }

        $project->delete();

        return redirect()->route('admin.projects.index')->with('success', 'Projet supprimé.');
    }

    private function validateProject(Request $request): array
    {
        return $request->validate([
            'project_category_id' => 'required|exists:project_categories,id',
            'titre' => 'required|string|max:255',
            'client' => 'nullable|string|max:255',
            'probleme' => 'nullable|string',
            'solution' => 'nullable|string',
            'resultats' => 'nullable|string',
            'image_couverture' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:4096',
            'ordre' => 'nullable|integer',
        ]);
    }

    private function storeImage($file): string
    {
        $filename = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('assets/images/portfolio'), $filename);

        return $filename;
    }
}