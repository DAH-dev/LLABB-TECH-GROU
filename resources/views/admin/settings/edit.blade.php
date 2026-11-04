@extends('layouts.admin')

@section('title', 'Paramètres')

@section('content')

<form action="{{ route('admin.settings.update') }}" method="POST" style="max-width: 700px;">
    @csrf
    @method('PUT')

    <div class="admin-card" style="margin-bottom:24px;">
        <h2 style="font-size:1.05rem; margin-top:0;">Coordonnées</h2>

        <div class="form-group" style="margin-bottom:16px;">
            <label style="display:block; font-size:0.85rem; font-weight:600; margin-bottom:6px;">Téléphone</label>
            <input type="text" name="telephone" value="{{ old('telephone', $setting->telephone) }}"
                   style="width:100%; padding:10px 12px; border:1px solid #e0e0e0; border-radius:4px;">
        </div>

        <div class="form-group" style="margin-bottom:16px;">
            <label style="display:block; font-size:0.85rem; font-weight:600; margin-bottom:6px;">Email de contact</label>
            <input type="email" name="email_contact" value="{{ old('email_contact', $setting->email_contact) }}"
                   style="width:100%; padding:10px 12px; border:1px solid #e0e0e0; border-radius:4px;">
        </div>

        <div class="form-group" style="margin-bottom:0;">
            <label style="display:block; font-size:0.85rem; font-weight:600; margin-bottom:6px;">Adresse</label>
            <input type="text" name="adresse" value="{{ old('adresse', $setting->adresse) }}"
                   style="width:100%; padding:10px 12px; border:1px solid #e0e0e0; border-radius:4px;">
        </div>
    </div>

    <div class="admin-card" style="margin-bottom:24px;">
        <h2 style="font-size:1.05rem; margin-top:0;">Réseaux sociaux</h2>

        <div class="form-group" style="margin-bottom:16px;">
            <label style="display:block; font-size:0.85rem; font-weight:600; margin-bottom:6px;">Facebook</label>
            <input type="text" name="lien_facebook" value="{{ old('lien_facebook', $setting->lien_facebook) }}"
                   style="width:100%; padding:10px 12px; border:1px solid #e0e0e0; border-radius:4px;">
        </div>

        <div class="form-group" style="margin-bottom:16px;">
            <label style="display:block; font-size:0.85rem; font-weight:600; margin-bottom:6px;">Twitter / X</label>
            <input type="text" name="lien_twitter" value="{{ old('lien_twitter', $setting->lien_twitter) }}"
                   style="width:100%; padding:10px 12px; border:1px solid #e0e0e0; border-radius:4px;">
        </div>

        <div class="form-group" style="margin-bottom:16px;">
            <label style="display:block; font-size:0.85rem; font-weight:600; margin-bottom:6px;">LinkedIn</label>
            <input type="text" name="lien_linkedin" value="{{ old('lien_linkedin', $setting->lien_linkedin) }}"
                   style="width:100%; padding:10px 12px; border:1px solid #e0e0e0; border-radius:4px;">
        </div>

        <div class="form-group" style="margin-bottom:0;">
            <label style="display:block; font-size:0.85rem; font-weight:600; margin-bottom:6px;">Instagram</label>
            <input type="text" name="lien_instagram" value="{{ old('lien_instagram', $setting->lien_instagram) }}"
                   style="width:100%; padding:10px 12px; border:1px solid #e0e0e0; border-radius:4px;">
        </div>
    </div>

    <div class="admin-card" style="margin-bottom:24px;">
        <h2 style="font-size:1.05rem; margin-top:0;">SEO (balises meta)</h2>

        <div class="form-group" style="margin-bottom:16px;">
            <label style="display:block; font-size:0.85rem; font-weight:600; margin-bottom:6px;">Titre SEO (balise title)</label>
            <input type="text" name="seo_titre" value="{{ old('seo_titre', $setting->seo_titre) }}"
                   style="width:100%; padding:10px 12px; border:1px solid #e0e0e0; border-radius:4px;">
        </div>

        <div class="form-group" style="margin-bottom:0;">
            <label style="display:block; font-size:0.85rem; font-weight:600; margin-bottom:6px;">Description SEO (balise meta description)</label>
            <textarea name="seo_description" rows="3" style="width:100%; padding:10px 12px; border:1px solid #e0e0e0; border-radius:4px;">{{ old('seo_description', $setting->seo_description) }}</textarea>
        </div>
    </div>

    <button type="submit" class="btn-admin">Enregistrer les paramètres</button>
</form>

@endsection