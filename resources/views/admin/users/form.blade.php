@extends('layouts.admin')

@section('title', $targetUser->exists ? 'Modifier l\'utilisateur' : 'Nouvel utilisateur')

@section('content')

<div class="admin-card" style="max-width: 600px;">
    <form action="{{ $targetUser->exists ? route('admin.users.update', $targetUser) : route('admin.users.store') }}" method="POST">
        @csrf
        @if ($targetUser->exists)
            @method('PUT')
        @endif

        <div class="form-group" style="margin-bottom:16px;">
            <label style="display:block; font-size:0.85rem; font-weight:600; margin-bottom:6px;">Nom complet *</label>
            <input type="text" name="name" value="{{ old('name', $targetUser->name) }}" required
                   style="width:100%; padding:10px 12px; border:1px solid #e0e0e0; border-radius:4px;">
        </div>

        <div class="form-group" style="margin-bottom:16px;">
            <label style="display:block; font-size:0.85rem; font-weight:600; margin-bottom:6px;">Email *</label>
            <input type="email" name="email" value="{{ old('email', $targetUser->email) }}" required
                   style="width:100%; padding:10px 12px; border:1px solid #e0e0e0; border-radius:4px;">
        </div>

        <div class="form-group" style="margin-bottom:16px;">
            <label style="display:block; font-size:0.85rem; font-weight:600; margin-bottom:6px;">
                Mot de passe {{ $targetUser->exists ? '(laisser vide pour ne pas changer)' : '*' }}
            </label>
            <input type="password" name="password" {{ $targetUser->exists ? '' : 'required' }}
                   style="width:100%; padding:10px 12px; border:1px solid #e0e0e0; border-radius:4px;">
        </div>

        <div class="form-group" style="margin-bottom:24px;">
            <label style="display:block; font-size:0.85rem; font-weight:600; margin-bottom:6px;">Rôle *</label>
            <select name="role" required style="width:100%; padding:10px 12px; border:1px solid #e0e0e0; border-radius:4px;">
                <option value="super_admin" {{ old('role', $targetUser->role) === 'super_admin' ? 'selected' : '' }}>Super Administrateur</option>
                <option value="admin" {{ old('role', $targetUser->role) === 'admin' ? 'selected' : '' }}>Administrateur</option>
                <option value="editeur" {{ old('role', $targetUser->role ?? 'editeur') === 'editeur' ? 'selected' : '' }}>Éditeur / Rédacteur</option>
                <option value="commercial" {{ old('role', $targetUser->role) === 'commercial' ? 'selected' : '' }}>Commercial (lecture des leads)</option>
            </select>
        </div>

        <div style="display:flex; gap:12px;">
            <button type="submit" class="btn-admin">{{ $targetUser->exists ? 'Enregistrer les modifications' : 'Créer l\'utilisateur' }}</button>
            <a href="{{ route('admin.users.index') }}" class="btn-admin-outline">Annuler</a>
        </div>
    </form>
</div>

@endsection