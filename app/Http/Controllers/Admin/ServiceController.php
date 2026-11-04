<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('ordre')->get();

        return view('admin.services.index', [
            'services' => $services,
        ]);
    }

    public function create()
    {
        return view('admin.services.form', [
            'service' => new Service(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $this->validateService($request);
        $validated['slug'] = Str::slug($validated['titre']);
        $validated['est_actif'] = $request->boolean('est_actif');

        if ($request->hasFile('icone')) {
            $validated['icone'] = $this->storeIcon($request->file('icone'));
        } else {
            unset($validated['icone']);
        }

        Service::create($validated);

        return redirect()->route('admin.services.index')->with('success', 'Service créé avec succès.');
    }

    public function edit(Service $service)
    {
        return view('admin.services.form', [
            'service' => $service,
        ]);
    }

    public function update(Request $request, Service $service)
    {
        $validated = $this->validateService($request);
        $validated['slug'] = Str::slug($validated['titre']);
        $validated['est_actif'] = $request->boolean('est_actif');

        if ($request->hasFile('icone')) {
            if ($service->icone && file_exists(public_path('assets/images/services/' . $service->icone))) {
                @unlink(public_path('assets/images/services/' . $service->icone));
            }
            $validated['icone'] = $this->storeIcon($request->file('icone'));
        } else {
            unset($validated['icone']);
        }

        $service->update($validated);

        return redirect()->route('admin.services.index')->with('success', 'Service mis à jour avec succès.');
    }

    public function destroy(Service $service)
    {
        if ($service->icone && file_exists(public_path('assets/images/services/' . $service->icone))) {
            @unlink(public_path('assets/images/services/' . $service->icone));
        }

        $service->delete();

        return redirect()->route('admin.services.index')->with('success', 'Service supprimé.');
    }

    private function validateService(Request $request): array
    {
        return $request->validate([
            'titre' => 'required|string|max:255',
            'resume' => 'nullable|string',
            'description' => 'nullable|string',
            'methodologie' => 'nullable|string',
            'technologies' => 'nullable|string',
            // "file" et non "image" : certaines versions de Laravel rejettent le SVG avec la règle "image"
            'icone' => 'nullable|file|mimes:jpeg,jpg,png,webp,svg|max:2048',
            'ordre' => 'nullable|integer',
        ]);
    }

    private function storeIcon($file): string
    {
        $filename = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('assets/images/services'), $filename);

        return $filename;
    }
}