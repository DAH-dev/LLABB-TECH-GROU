@extends('layouts.admin')

@section('title', $member->exists ? 'Modifier le membre' : 'Nouveau membre')

@section('content')

<div class="admin-card" style="max-width: 700px;">
    <form action="{{ $member->exists ? route('admin.team.update', $member) : route('admin.team.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if ($member->exists)
            @method('PUT')
        @endif

        <div class="form-group" style="margin-bottom:16px;">
            <label style="display:block; font-size:0.85rem; font-weight:600; margin-bottom:6px;">Nom *</label>
            <input type="text" name="nom" value="{{ old('nom', $member->nom) }}" required
                   style="width:100%; padding:10px 12px; border:1px solid #e0e0e0; border-radius:4px;">
        </div>

        <div class="form-group" style="margin-bottom:16px;">
            <label style="display:block; font-size:0.85rem; font-weight:600; margin-bottom:6px;">Poste *</label>
            <input type="text" name="poste" value="{{ old('poste', $member->poste) }}" required
                   style="width:100%; padding:10px 12px; border:1px solid #e0e0e0; border-radius:4px;">
        </div>

        <div class="form-group" style="margin-bottom:16px;">
            <label style="display:block; font-size:0.85rem; font-weight:600; margin-bottom:6px;">Bio</label>
            <textarea name="bio" rows="3" style="width:100%; padding:10px 12px; border:1px solid #e0e0e0; border-radius:4px;">{{ old('bio', $member->bio) }}</textarea>
        </div>

        <div class="form-group" style="margin-bottom:16px;">
            <label style="display:block; font-size:0.85rem; font-weight:600; margin-bottom:6px;">Photo</label>
            @if ($member->photo)
                <div style="margin-bottom:8px;">
                    <img src="{{ asset('assets/images/team/' . $member->photo) }}" alt="Photo actuelle"
                         style="height:80px; width:80px; border-radius:50%; object-fit:cover;">
                </div>
            @endif
            <input type="file" name="photo" accept="image/*"
                   style="width:100%; padding:10px 12px; border:1px solid #e0e0e0; border-radius:4px;">
            @error('photo')
                <p style="font-size:0.78rem; color:#c0392b; margin-top:4px;">{{ $message }}</p>
            @enderror
            <p style="font-size:0.78rem; color:#5c6b84; margin-top:4px;">
                @if ($member->exists)
                    Laisse ce champ vide pour garder la photo actuelle. Formats acceptés : JPG, PNG, WEBP (max 4 Mo).
                @else
                    Formats acceptés : JPG, PNG, WEBP (max 4 Mo).
                @endif
            </p>
        </div>

        <div style="display:flex; gap:16px;">
            <div class="form-group" style="margin-bottom:16px; flex:1;">
                <label style="display:block; font-size:0.85rem; font-weight:600; margin-bottom:6px;">LinkedIn</label>
                <input type="text" name="lien_linkedin" value="{{ old('lien_linkedin', $member->lien_linkedin) }}"
                       style="width:100%; padding:10px 12px; border:1px solid #e0e0e0; border-radius:4px;">
            </div>
            <div class="form-group" style="margin-bottom:16px; flex:1;">
                <label style="display:block; font-size:0.85rem; font-weight:600; margin-bottom:6px;">Twitter / X</label>
                <input type="text" name="lien_twitter" value="{{ old('lien_twitter', $member->lien_twitter) }}"
                       style="width:100%; padding:10px 12px; border:1px solid #e0e0e0; border-radius:4px;">
            </div>
            <div class="form-group" style="margin-bottom:16px; width:100px;">
                <label style="display:block; font-size:0.85rem; font-weight:600; margin-bottom:6px;">Ordre</label>
                <input type="number" name="ordre" value="{{ old('ordre', $member->ordre) }}"
                       style="width:100%; padding:10px 12px; border:1px solid #e0e0e0; border-radius:4px;">
            </div>
        </div>

        <div style="display:flex; gap:12px;">
            <button type="submit" class="btn-admin">{{ $member->exists ? 'Enregistrer les modifications' : 'Ajouter le membre' }}</button>
            <a href="{{ route('admin.team.index') }}" class="btn-admin-outline">Annuler</a>
        </div>
    </form>
</div>

@endsection