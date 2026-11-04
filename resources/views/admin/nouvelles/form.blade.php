@extends('layouts.admin')

@section('title', $nouvelle->exists ? 'Modifier la nouvelle' : 'Nouvelle nouvelle')

@section('content')

<div class="admin-card" style="max-width: 760px;">
    <form action="{{ $nouvelle->exists ? route('admin.nouvelles.update', $nouvelle) : route('admin.nouvelles.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if ($nouvelle->exists)
            @method('PUT')
        @endif

        <div class="form-group" style="margin-bottom:16px;">
            <label style="display:block; font-size:0.85rem; font-weight:600; margin-bottom:6px;">Titre *</label>
            <input type="text" name="titre" value="{{ old('titre', $nouvelle->titre) }}" required
                   style="width:100%; padding:10px 12px; border:1px solid #e0e0e0; border-radius:4px;">
        </div>

        <div class="form-group" style="margin-bottom:16px;">
            <label style="display:block; font-size:0.85rem; font-weight:600; margin-bottom:6px;">Résumé court * (300 caractères max)</label>
            <textarea name="resume" rows="2" maxlength="300" required style="width:100%; padding:10px 12px; border:1px solid #e0e0e0; border-radius:4px;">{{ old('resume', $nouvelle->resume) }}</textarea>
        </div>

        <div class="form-group" style="margin-bottom:16px;">
            <label style="display:block; font-size:0.85rem; font-weight:600; margin-bottom:6px;">Contenu *</label>
            <textarea name="contenu" rows="10" required style="width:100%; padding:10px 12px; border:1px solid #e0e0e0; border-radius:4px;">{{ old('contenu', $nouvelle->contenu) }}</textarea>
            <p style="font-size:0.78rem; color:#5c6b84; margin-top:4px;">Un retour à la ligne crée un nouveau paragraphe.</p>
        </div>

        <div class="form-group" style="margin-bottom:16px;">
            <label style="display:block; font-size:0.85rem; font-weight:600; margin-bottom:6px;">Image</label>
            @if ($nouvelle->image)
                <div style="margin-bottom:8px;">
                    <img src="{{ asset('assets/images/nouvelles/' . $nouvelle->image) }}" alt="Image actuelle"
                         style="height:90px; width:auto; border-radius:6px; object-fit:cover;">
                </div>
            @endif
            <input type="file" name="image" accept="image/*"
                   style="width:100%; padding:10px 12px; border:1px solid #e0e0e0; border-radius:4px;">
            @error('image')
                <p style="font-size:0.78rem; color:#c0392b; margin-top:4px;">{{ $message }}</p>
            @enderror
            <p style="font-size:0.78rem; color:#5c6b84; margin-top:4px;">
                @if ($nouvelle->exists)
                    Laisse ce champ vide pour garder l'image actuelle. Formats acceptés : JPG, PNG, WEBP (max 4 Mo).
                @else
                    Formats acceptés : JPG, PNG, WEBP (max 4 Mo).
                @endif
            </p>
        </div>

        <div style="display:flex; gap:16px; align-items:center;">
            <div class="form-group" style="margin-bottom:16px;">
                <label style="display:block; font-size:0.85rem; font-weight:600; margin-bottom:6px;">Date de publication *</label>
                <input type="date" name="date_publication"
                       value="{{ old('date_publication', optional($nouvelle->date_publication)->format('Y-m-d') ?? now()->format('Y-m-d')) }}" required
                       style="padding:10px 12px; border:1px solid #e0e0e0; border-radius:4px;">
            </div>
            <div class="form-group" style="margin-bottom:16px; display:flex; align-items:center; gap:8px; margin-top:28px;">
                <input type="checkbox" name="publie" id="publie" value="1" {{ old('publie', $nouvelle->exists ? $nouvelle->publie : true) ? 'checked' : '' }}>
                <label for="publie" style="margin:0; font-weight:400; font-size:0.9rem;">Publiée</label>
            </div>
        </div>

        <div style="display:flex; gap:12px;">
            <button type="submit" class="btn-admin">{{ $nouvelle->exists ? 'Enregistrer les modifications' : 'Ajouter la nouvelle' }}</button>
            <a href="{{ route('admin.nouvelles.index') }}" class="btn-admin-outline">Annuler</a>
        </div>
    </form>
</div>

@endsection