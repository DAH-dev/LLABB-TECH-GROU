@extends('layouts.admin')

@section('title', $project->exists ? 'Modifier le projet' : 'Nouveau projet')

@section('content')

<div class="admin-card" style="max-width: 700px;">
    <form action="{{ $project->exists ? route('admin.projects.update', $project) : route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if ($project->exists)
            @method('PUT')
        @endif

        <div class="form-group" style="margin-bottom:16px;">
            <label style="display:block; font-size:0.85rem; font-weight:600; margin-bottom:6px;">Titre *</label>
            <input type="text" name="titre" value="{{ old('titre', $project->titre) }}" required
                   style="width:100%; padding:10px 12px; border:1px solid #e0e0e0; border-radius:4px;">
        </div>

        <div class="form-group" style="margin-bottom:16px;">
            <label style="display:block; font-size:0.85rem; font-weight:600; margin-bottom:6px;">Catégorie *</label>
            <select name="project_category_id" required style="width:100%; padding:10px 12px; border:1px solid #e0e0e0; border-radius:4px;">
                <option value="">Sélectionner une catégorie</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('project_category_id', $project->project_category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->nom }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group" style="margin-bottom:16px;">
            <label style="display:block; font-size:0.85rem; font-weight:600; margin-bottom:6px;">Client</label>
            <input type="text" name="client" value="{{ old('client', $project->client) }}"
                   style="width:100%; padding:10px 12px; border:1px solid #e0e0e0; border-radius:4px;">
        </div>

        <div class="form-group" style="margin-bottom:16px;">
            <label style="display:block; font-size:0.85rem; font-weight:600; margin-bottom:6px;">Problématique</label>
            <textarea name="probleme" rows="3" style="width:100%; padding:10px 12px; border:1px solid #e0e0e0; border-radius:4px;">{{ old('probleme', $project->probleme) }}</textarea>
        </div>

        <div class="form-group" style="margin-bottom:16px;">
            <label style="display:block; font-size:0.85rem; font-weight:600; margin-bottom:6px;">Solution</label>
            <textarea name="solution" rows="3" style="width:100%; padding:10px 12px; border:1px solid #e0e0e0; border-radius:4px;">{{ old('solution', $project->solution) }}</textarea>
        </div>

        <div class="form-group" style="margin-bottom:16px;">
            <label style="display:block; font-size:0.85rem; font-weight:600; margin-bottom:6px;">Résultats</label>
            <textarea name="resultats" rows="3" style="width:100%; padding:10px 12px; border:1px solid #e0e0e0; border-radius:4px;">{{ old('resultats', $project->resultats) }}</textarea>
        </div>

        <div class="form-group" style="margin-bottom:16px;">
            <label style="display:block; font-size:0.85rem; font-weight:600; margin-bottom:6px;">Image de couverture</label>
            @if ($project->image_couverture)
                <div style="margin-bottom:8px;">
                    <img src="{{ asset('assets/images/portfolio/' . $project->image_couverture) }}" alt="Image actuelle"
                         style="height:80px; border-radius:6px; object-fit:cover;">
                </div>
            @endif
            <input type="file" name="image_couverture" accept="image/*"
                   style="width:100%; padding:10px 12px; border:1px solid #e0e0e0; border-radius:4px;">
            @error('image_couverture')
                <p style="font-size:0.78rem; color:#c0392b; margin-top:4px;">{{ $message }}</p>
            @enderror
            <p style="font-size:0.78rem; color:#5c6b84; margin-top:4px;">
                @if ($project->exists)
                    Laisse ce champ vide pour garder l'image actuelle. Formats acceptés : JPG, PNG, WEBP (max 4 Mo).
                @else
                    Formats acceptés : JPG, PNG, WEBP (max 4 Mo).
                @endif
            </p>
        </div>

        <div style="display:flex; gap:16px;">
            <div class="form-group" style="margin-bottom:16px; width:120px;">
                <label style="display:block; font-size:0.85rem; font-weight:600; margin-bottom:6px;">Ordre</label>
                <input type="number" name="ordre" value="{{ old('ordre', $project->ordre) }}"
                       style="width:100%; padding:10px 12px; border:1px solid #e0e0e0; border-radius:4px;">
            </div>
            <div class="form-group" style="margin-bottom:16px; display:flex; align-items:center; gap:8px; margin-top:28px;">
                <input type="checkbox" name="mis_en_avant" id="mis_en_avant" value="1" {{ old('mis_en_avant', $project->mis_en_avant) ? 'checked' : '' }}>
                <label for="mis_en_avant" style="margin:0; font-weight:400; font-size:0.9rem;">Mettre en avant</label>
            </div>
        </div>

        <div style="display:flex; gap:12px;">
            <button type="submit" class="btn-admin">{{ $project->exists ? 'Enregistrer les modifications' : 'Créer le projet' }}</button>
            <a href="{{ route('admin.projects.index') }}" class="btn-admin-outline">Annuler</a>
        </div>
    </form>
</div>

@endsection