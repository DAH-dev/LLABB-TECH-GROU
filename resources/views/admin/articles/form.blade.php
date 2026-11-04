@extends('layouts.admin')

@section('title', $article->exists ? 'Modifier l\'article' : 'Nouvel article')

@section('content')

<div class="admin-card" style="max-width: 700px;">
    <form action="{{ $article->exists ? route('admin.articles.update', $article) : route('admin.articles.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if ($article->exists)
            @method('PUT')
        @endif

        <div class="form-group" style="margin-bottom:16px;">
            <label style="display:block; font-size:0.85rem; font-weight:600; margin-bottom:6px;">Titre *</label>
            <input type="text" name="titre" value="{{ old('titre', $article->titre) }}" required
                   style="width:100%; padding:10px 12px; border:1px solid #e0e0e0; border-radius:4px;">
        </div>

        <div class="form-group" style="margin-bottom:16px;">
            <label style="display:block; font-size:0.85rem; font-weight:600; margin-bottom:6px;">Catégorie *</label>
            <select name="article_category_id" required style="width:100%; padding:10px 12px; border:1px solid #e0e0e0; border-radius:4px;">
                <option value="">Sélectionner une catégorie</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('article_category_id', $article->article_category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->nom }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group" style="margin-bottom:16px;">
            <label style="display:block; font-size:0.85rem; font-weight:600; margin-bottom:6px;">Extrait (résumé court)</label>
            <textarea name="extrait" rows="2" style="width:100%; padding:10px 12px; border:1px solid #e0e0e0; border-radius:4px;">{{ old('extrait', $article->extrait) }}</textarea>
        </div>

        <div class="form-group" style="margin-bottom:16px;">
            <label style="display:block; font-size:0.85rem; font-weight:600; margin-bottom:6px;">Contenu *</label>
            <textarea name="contenu" rows="8" required style="width:100%; padding:10px 12px; border:1px solid #e0e0e0; border-radius:4px;">{{ old('contenu', $article->contenu) }}</textarea>
        </div>

        <div class="form-group" style="margin-bottom:16px;">
            <label style="display:block; font-size:0.85rem; font-weight:600; margin-bottom:6px;">Image à la une</label>
            @if ($article->image_a_la_une)
                <div style="margin-bottom:8px;">
                    <img src="{{ asset('assets/images/blog/' . $article->image_a_la_une) }}" alt="Image actuelle"
                         style="height:80px; border-radius:6px; object-fit:cover;">
                </div>
            @endif
            <input type="file" name="image_a_la_une" accept="image/*"
                   style="width:100%; padding:10px 12px; border:1px solid #e0e0e0; border-radius:4px;">
            @error('image_a_la_une')
                <p style="font-size:0.78rem; color:#c0392b; margin-top:4px;">{{ $message }}</p>
            @enderror
            <p style="font-size:0.78rem; color:#5c6b84; margin-top:4px;">
                @if ($article->exists)
                    Laisse ce champ vide pour garder l'image actuelle. Formats acceptés : JPG, PNG, WEBP (max 4 Mo).
                @else
                    Formats acceptés : JPG, PNG, WEBP (max 4 Mo).
                @endif
            </p>
        </div>

        <div style="display:flex; gap:16px;">
            <div class="form-group" style="margin-bottom:16px; flex:1;">
                <label style="display:block; font-size:0.85rem; font-weight:600; margin-bottom:6px;">Auteur</label>
                <input type="text" name="auteur" value="{{ old('auteur', $article->auteur) }}" placeholder="{{ auth()->user()->name }}"
                       style="width:100%; padding:10px 12px; border:1px solid #e0e0e0; border-radius:4px;">
            </div>
            <div class="form-group" style="margin-bottom:16px; flex:1;">
                <label style="display:block; font-size:0.85rem; font-weight:600; margin-bottom:6px;">Date de publication</label>
                <input type="date" name="date_publication" value="{{ old('date_publication', $article->date_publication?->format('Y-m-d')) }}"
                       style="width:100%; padding:10px 12px; border:1px solid #e0e0e0; border-radius:4px;">
            </div>
        </div>

        <div class="form-group" style="margin-bottom:24px;">
            <label style="display:block; font-size:0.85rem; font-weight:600; margin-bottom:6px;">Statut *</label>
            <select name="statut" required style="width:100%; padding:10px 12px; border:1px solid #e0e0e0; border-radius:4px;">
                <option value="brouillon" {{ old('statut', $article->statut) === 'brouillon' ? 'selected' : '' }}>Brouillon</option>
                <option value="publie" {{ old('statut', $article->statut) === 'publie' ? 'selected' : '' }}>Publié</option>
            </select>
        </div>

        <div style="display:flex; gap:12px;">
            <button type="submit" class="btn-admin">{{ $article->exists ? 'Enregistrer les modifications' : 'Créer l\'article' }}</button>
            <a href="{{ route('admin.articles.index') }}" class="btn-admin-outline">Annuler</a>
        </div>
    </form>
</div>

@endsection