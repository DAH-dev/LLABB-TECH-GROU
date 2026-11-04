@extends('layouts.admin')

@section('title', $testimonial->exists ? 'Modifier le témoignage' : 'Nouveau témoignage')

@section('content')

<div class="admin-card" style="max-width: 700px;">
    <form action="{{ $testimonial->exists ? route('admin.testimonials.update', $testimonial) : route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if ($testimonial->exists)
            @method('PUT')
        @endif

        <div class="form-group" style="margin-bottom:16px;">
            <label style="display:block; font-size:0.85rem; font-weight:600; margin-bottom:6px;">Nom du client *</label>
            <input type="text" name="nom_client" value="{{ old('nom_client', $testimonial->nom_client) }}" required
                   style="width:100%; padding:10px 12px; border:1px solid #e0e0e0; border-radius:4px;">
        </div>

        <div class="form-group" style="margin-bottom:16px;">
            <label style="display:block; font-size:0.85rem; font-weight:600; margin-bottom:6px;">Entreprise / Poste</label>
            <input type="text" name="entreprise" value="{{ old('entreprise', $testimonial->entreprise) }}"
                   style="width:100%; padding:10px 12px; border:1px solid #e0e0e0; border-radius:4px;">
        </div>

        <div class="form-group" style="margin-bottom:16px;">
            <label style="display:block; font-size:0.85rem; font-weight:600; margin-bottom:6px;">Témoignage *</label>
            <textarea name="texte" rows="4" required style="width:100%; padding:10px 12px; border:1px solid #e0e0e0; border-radius:4px;">{{ old('texte', $testimonial->texte) }}</textarea>
        </div>

        <div class="form-group" style="margin-bottom:16px;">
            <label style="display:block; font-size:0.85rem; font-weight:600; margin-bottom:6px;">Photo</label>
            @if ($testimonial->photo)
                <div style="margin-bottom:8px;">
                    <img src="{{ asset('assets/images/testimonials/' . $testimonial->photo) }}" alt="Photo actuelle"
                         style="height:80px; width:80px; border-radius:50%; object-fit:cover;">
                </div>
            @endif
            <input type="file" name="photo" accept="image/*"
                   style="width:100%; padding:10px 12px; border:1px solid #e0e0e0; border-radius:4px;">
            @error('photo')
                <p style="font-size:0.78rem; color:#c0392b; margin-top:4px;">{{ $message }}</p>
            @enderror
            <p style="font-size:0.78rem; color:#5c6b84; margin-top:4px;">
                @if ($testimonial->exists)
                    Laisse ce champ vide pour garder la photo actuelle. Formats acceptés : JPG, PNG, WEBP (max 4 Mo).
                @else
                    Formats acceptés : JPG, PNG, WEBP (max 4 Mo).
                @endif
            </p>
        </div>

        <div style="display:flex; gap:16px; align-items:center;">
            <div class="form-group" style="margin-bottom:16px; width:120px;">
                <label style="display:block; font-size:0.85rem; font-weight:600; margin-bottom:6px;">Note (1-5) *</label>
                <input type="number" name="note" min="1" max="5" value="{{ old('note', $testimonial->note ?? 5) }}" required
                       style="width:100%; padding:10px 12px; border:1px solid #e0e0e0; border-radius:4px;">
            </div>
            <div class="form-group" style="margin-bottom:16px; display:flex; align-items:center; gap:8px; margin-top:28px;">
                <input type="checkbox" name="mis_en_avant" id="mis_en_avant" value="1" {{ old('mis_en_avant', $testimonial->mis_en_avant) ? 'checked' : '' }}>
                <label for="mis_en_avant" style="margin:0; font-weight:400; font-size:0.9rem;">Mettre en avant</label>
            </div>
        </div>

        <div style="display:flex; gap:12px;">
            <button type="submit" class="btn-admin">{{ $testimonial->exists ? 'Enregistrer les modifications' : 'Ajouter le témoignage' }}</button>
            <a href="{{ route('admin.testimonials.index') }}" class="btn-admin-outline">Annuler</a>
        </div>
    </form>
</div>

@endsection