<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TeamMemberController extends Controller
{
    public function index()
    {
        $teamMembers = TeamMember::orderBy('ordre')->get();

        return view('admin.team.index', [
            'teamMembers' => $teamMembers,
        ]);
    }

    public function create()
    {
        return view('admin.team.form', [
            'member' => new TeamMember(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $this->validateMember($request);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $this->storeImage($request->file('photo'));
        } else {
            unset($validated['photo']);
        }

        TeamMember::create($validated);

        return redirect()->route('admin.team.index')->with('success', 'Membre ajouté avec succès.');
    }

    public function edit(TeamMember $team)
    {
        return view('admin.team.form', [
            'member' => $team,
        ]);
    }

    public function update(Request $request, TeamMember $team)
    {
        $validated = $this->validateMember($request);

        if ($request->hasFile('photo')) {
            if ($team->photo && file_exists(public_path('assets/images/team/' . $team->photo))) {
                @unlink(public_path('assets/images/team/' . $team->photo));
            }
            $validated['photo'] = $this->storeImage($request->file('photo'));
        } else {
            unset($validated['photo']);
        }

        $team->update($validated);

        return redirect()->route('admin.team.index')->with('success', 'Membre mis à jour avec succès.');
    }

    public function destroy(TeamMember $team)
    {
        if ($team->photo && file_exists(public_path('assets/images/team/' . $team->photo))) {
            @unlink(public_path('assets/images/team/' . $team->photo));
        }

        $team->delete();

        return redirect()->route('admin.team.index')->with('success', 'Membre supprimé.');
    }

    private function validateMember(Request $request): array
    {
        return $request->validate([
            'nom' => 'required|string|max:255',
            'poste' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:4096',
            'lien_linkedin' => 'nullable|string|max:255',
            'lien_twitter' => 'nullable|string|max:255',
            'ordre' => 'nullable|integer',
        ]);
    }

    private function storeImage($file): string
    {
        $filename = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('assets/images/team'), $filename);

        return $filename;
    }
}