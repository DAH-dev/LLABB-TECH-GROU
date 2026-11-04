<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::orderBy('created_at', 'desc')->get();

        return view('admin.testimonials.index', [
            'testimonials' => $testimonials,
        ]);
    }

    public function create()
    {
        return view('admin.testimonials.form', [
            'testimonial' => new Testimonial(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $this->validateTestimonial($request);
        $validated['mis_en_avant'] = $request->boolean('mis_en_avant');

        if ($request->hasFile('photo')) {
            $validated['photo'] = $this->storeImage($request->file('photo'));
        } else {
            unset($validated['photo']);
        }

        Testimonial::create($validated);

        return redirect()->route('admin.testimonials.index')->with('success', 'Témoignage ajouté avec succès.');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.form', [
            'testimonial' => $testimonial,
        ]);
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $validated = $this->validateTestimonial($request);
        $validated['mis_en_avant'] = $request->boolean('mis_en_avant');

        if ($request->hasFile('photo')) {
            if ($testimonial->photo && file_exists(public_path('assets/images/testimonials/' . $testimonial->photo))) {
                @unlink(public_path('assets/images/testimonials/' . $testimonial->photo));
            }
            $validated['photo'] = $this->storeImage($request->file('photo'));
        } else {
            unset($validated['photo']);
        }

        $testimonial->update($validated);

        return redirect()->route('admin.testimonials.index')->with('success', 'Témoignage mis à jour avec succès.');
    }

    public function destroy(Testimonial $testimonial)
    {
        if ($testimonial->photo && file_exists(public_path('assets/images/testimonials/' . $testimonial->photo))) {
            @unlink(public_path('assets/images/testimonials/' . $testimonial->photo));
        }

        $testimonial->delete();

        return redirect()->route('admin.testimonials.index')->with('success', 'Témoignage supprimé.');
    }

    private function validateTestimonial(Request $request): array
    {
        return $request->validate([
            'nom_client' => 'required|string|max:255',
            'entreprise' => 'nullable|string|max:255',
            'texte' => 'required|string',
            'note' => 'required|integer|min:1|max:5',
            'photo' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:4096',
        ]);
    }

    private function storeImage($file): string
    {
        $filename = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('assets/images/testimonials'), $filename);

        return $filename;
    }
}