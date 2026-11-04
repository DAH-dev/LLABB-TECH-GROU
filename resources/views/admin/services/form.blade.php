@extends('layouts.admin')

@section('title', $service->exists ? 'Modifier le service' : 'Nouveau service')

@section('content')

<div class="admin-card" style="max-width: 700px;">
    <form action="{{ $service->exists ? route('admin.services.update', $service) : route('admin.services.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if ($service->exists)
            @method('PUT')
        @endif

        <div class="form-group" style="margin-bottom:16px;">
            <label style="display:block; font-size:0.85rem; font-weight:600; margin-bottom:6px;">Titre *</label>
            <input type="text" name="titre" value="{{ old('titre', $service->titre) }}" required
                   style="width:100%; padding:10px 12px; border:1px solid #e0e0e0; border-radius:4px;">
        </div>

        <div class="form-group" style="margin-bottom:16px;">
            <label style="display:block; font-size:0.85rem; font-weight:600; margin-bottom:6px;">Résumé (affiché sur les cartes)</label>
            <textarea name="resume" rows="2" style="width:100%; padding:10px 12px; border:1px solid #e0e0e0; border-radius:4px;">{{ old('resume', $service->resume) }}</textarea>
        </div>

        <div class="form-group" style="margin-bottom:16px;">
            <label style="display:block; font-size:0.85rem; font-weight:600; margin-bottom:6px;">Description détaillée</label>
            <textarea name="description" rows="4" style="width:100%; padding:10px 12px; border:1px solid #e0e0e0; border-radius:4px;">{{ old('description', $service->description) }}</textarea>
        </div>

        <div class="form-group" style="margin-bottom:16px;">
            <label style="display:block; font-size:0.85rem; font-weight:600; margin-bottom:6px;">Méthodologie</label>
            <textarea name="methodologie" rows="3" style="width:100%; padding:10px 12px; border:1px solid #e0e0e0; border-radius:4px;">{{ old('methodologie', $service->methodologie) }}</textarea>
        </div>

        <div class="form-group" style="margin-bottom:16px;">
            <label style="display:block; font-size:0.85rem; font-weight:600; margin-bottom:6px;">Technologies utilisées</label>
            <input type="text" name="technologies" value="{{ old('technologies', $service->technologies) }}"
                   style="width:100%; padding:10px 12px; border:1px solid #e0e0e0; border-radius:4px;">
        </div>

        <div style="display:flex; gap:16px;">
            <div class="form-group" style="margin-bottom:16px; flex:1;">
                <label style="display:block; font-size:0.85rem; font-weight:600; margin-bottom:6px;">Icône</label>
                @if ($service->icone)
                    <div style="margin-bottom:8px;">
                        <img src="{{ asset('assets/images/services/' . $service->icone) }}" alt="Icône actuelle"
                             style="height:48px; width:48px; object-fit:contain; border:1px solid #e0e0e0; border-radius:6px; padding:6px;">
                    </div>
                @endif
                <input type="file" name="icone" accept="image/*,.svg"
                       style="width:100%; padding:10px 12px; border:1px solid #e0e0e0; border-radius:4px;">
                @error('icone')
                    <p style="font-size:0.78rem; color:#c0392b; margin-top:4px;">{{ $message }}</p>
                @enderror
                <p style="font-size:0.78rem; color:#5c6b84; margin-top:4px;">
                    @if ($service->exists)
                        Laisse ce champ vide pour garder l'icône actuelle. PNG, SVG ou WEBP (max 2 Mo).
                    @else
                        PNG, SVG ou WEBP (max 2 Mo).
                    @endif
                </p>
            </div>
            <div class="form-group" style="margin-bottom:16px; width:120px;">
                <label style="display:block; font-size:0.85rem; font-weight:600; margin-bottom:6px;">Ordre</label>
                <input type="number" name="ordre" value="{{ old('ordre', $service->ordre) }}"
                       style="width:100%; padding:10px 12px; border:1px solid #e0e0e0; border-radius:4px;">
            </div>
        </div>

        <div class="form-group" style="margin-bottom:24px; display:flex; align-items:center; gap:8px;">
            <input type="checkbox" name="est_actif" id="est_actif" value="1" {{ old('est_actif', $service->est_actif ?? true) ? 'checked' : '' }}>
            <label for="est_actif" style="margin:0; font-weight:400; font-size:0.9rem;">Publié (visible sur le site)</label>
        </div>

        <div style="display:flex; gap:12px;">
            <button type="submit" class="btn-admin">{{ $service->exists ? 'Enregistrer les modifications' : 'Créer le service' }}</button>
            <a href="{{ route('admin.services.index') }}" class="btn-admin-outline">Annuler</a>
        </div>
    </form>
</div>

@endsection