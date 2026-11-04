@extends('layouts.admin')

@section('title', $plan->exists ? 'Modifier l\'offre' : 'Nouvelle offre')

@section('content')

<div class="admin-card" style="max-width: 700px;">
    <form action="{{ $plan->exists ? route('admin.pricing.update', $plan) : route('admin.pricing.store') }}" method="POST">
        @csrf
        @if ($plan->exists)
            @method('PUT')
        @endif

        <div class="form-group" style="margin-bottom:16px;">
            <label style="display:block; font-size:0.85rem; font-weight:600; margin-bottom:6px;">Nom de l'offre *</label>
            <input type="text" name="nom" value="{{ old('nom', $plan->nom) }}" required
                   style="width:100%; padding:10px 12px; border:1px solid #e0e0e0; border-radius:4px;">
        </div>

        <div class="form-group" style="margin-bottom:16px;">
            <label style="display:block; font-size:0.85rem; font-weight:600; margin-bottom:6px;">Description courte</label>
            <input type="text" name="description" value="{{ old('description', $plan->description) }}"
                   style="width:100%; padding:10px 12px; border:1px solid #e0e0e0; border-radius:4px;">
        </div>

        <div style="display:flex; gap:16px;">
            <div class="form-group" style="margin-bottom:16px; flex:1;">
                <label style="display:block; font-size:0.85rem; font-weight:600; margin-bottom:6px;">Prix (FCFA) *</label>
                <input type="number" name="prix" value="{{ old('prix', $plan->prix) }}" required
                       style="width:100%; padding:10px 12px; border:1px solid #e0e0e0; border-radius:4px;">
            </div>
            <div class="form-group" style="margin-bottom:16px; flex:1;">
                <label style="display:block; font-size:0.85rem; font-weight:600; margin-bottom:6px;">Période</label>
                <input type="text" name="periode" value="{{ old('periode', $plan->periode ?? 'projet') }}"
                       style="width:100%; padding:10px 12px; border:1px solid #e0e0e0; border-radius:4px;">
            </div>
        </div>

        <div class="form-group" style="margin-bottom:16px;">
            <label style="display:block; font-size:0.85rem; font-weight:600; margin-bottom:6px;">Fonctionnalités incluses (une par ligne)</label>
            <textarea name="fonctionnalites_texte" rows="6" style="width:100%; padding:10px 12px; border:1px solid #e0e0e0; border-radius:4px;">{{ old('fonctionnalites_texte', $plan->fonctionnalites ? implode("\n", $plan->fonctionnalites) : '') }}</textarea>
        </div>

        <div style="display:flex; gap:16px; align-items:center;">
            <div class="form-group" style="margin-bottom:16px; width:120px;">
                <label style="display:block; font-size:0.85rem; font-weight:600; margin-bottom:6px;">Ordre</label>
                <input type="number" name="ordre" value="{{ old('ordre', $plan->ordre) }}"
                       style="width:100%; padding:10px 12px; border:1px solid #e0e0e0; border-radius:4px;">
            </div>
            <div class="form-group" style="margin-bottom:16px; display:flex; align-items:center; gap:8px; margin-top:28px;">
                <input type="checkbox" name="plus_populaire" id="plus_populaire" value="1" {{ old('plus_populaire', $plan->plus_populaire) ? 'checked' : '' }}>
                <label for="plus_populaire" style="margin:0; font-weight:400; font-size:0.9rem;">Marquer comme "Le plus populaire"</label>
            </div>
        </div>

        <div style="display:flex; gap:12px;">
            <button type="submit" class="btn-admin">{{ $plan->exists ? 'Enregistrer les modifications' : 'Créer l\'offre' }}</button>
            <a href="{{ route('admin.pricing.index') }}" class="btn-admin-outline">Annuler</a>
        </div>
    </form>
</div>

@endsection