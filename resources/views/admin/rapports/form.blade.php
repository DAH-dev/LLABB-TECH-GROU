@extends('layouts.admin')

@section('title', $compteRendu->exists ? 'Modifier le compte rendu' : 'Nouveau compte rendu')

@section('content')

<div class="admin-card" style="max-width: 760px;">
    <form action="{{ $compteRendu->exists ? route('admin.rapports.update', $compteRendu) : route('admin.rapports.store') }}" method="POST">
        @csrf
        @if ($compteRendu->exists)
            @method('PUT')
        @endif

        <div class="form-group" style="margin-bottom:16px;">
            <label style="display:block; font-size:0.85rem; font-weight:600; margin-bottom:6px;">Titre *</label>
            <input type="text" name="titre" value="{{ old('titre', $compteRendu->titre) }}" required
                   style="width:100%; padding:10px 12px; border:1px solid #e0e0e0; border-radius:4px;">
        </div>

        <div class="form-group" style="margin-bottom:16px;">
            <label style="display:block; font-size:0.85rem; font-weight:600; margin-bottom:6px;">Date *</label>
            <input type="date" name="date_rapport"
                   value="{{ old('date_rapport', optional($compteRendu->date_rapport)->format('Y-m-d') ?? now()->format('Y-m-d')) }}" required
                   style="padding:10px 12px; border:1px solid #e0e0e0; border-radius:4px;">
        </div>

        <div class="form-group" style="margin-bottom:16px;">
            <label style="display:block; font-size:0.85rem; font-weight:600; margin-bottom:6px;">Compte rendu *</label>
            <textarea name="contenu" rows="12" required style="width:100%; padding:10px 12px; border:1px solid #e0e0e0; border-radius:4px;">{{ old('contenu', $compteRendu->contenu) }}</textarea>
            <p style="font-size:0.78rem; color:#5c6b84; margin-top:4px;">Un retour à la ligne crée un nouveau paragraphe.</p>
        </div>

        <div style="display:flex; gap:12px;">
            <button type="submit" class="btn-admin">{{ $compteRendu->exists ? 'Enregistrer les modifications' : 'Enregistrer le compte rendu' }}</button>
            <a href="{{ route('admin.rapports.index') }}" class="btn-admin-outline">Annuler</a>
        </div>
    </form>
</div>

@endsection