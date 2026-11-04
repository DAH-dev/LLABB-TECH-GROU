@extends('layouts.admin')

@section('title', $faqItem->exists ? 'Modifier la question' : 'Nouvelle question')

@section('content')

<div class="admin-card" style="max-width: 700px;">
    <form action="{{ $faqItem->exists ? route('admin.faq.update', $faqItem) : route('admin.faq.store') }}" method="POST">
        @csrf
        @if ($faqItem->exists)
            @method('PUT')
        @endif

        <div class="form-group" style="margin-bottom:16px;">
            <label style="display:block; font-size:0.85rem; font-weight:600; margin-bottom:6px;">Question *</label>
            <input type="text" name="question" value="{{ old('question', $faqItem->question) }}" required
                   style="width:100%; padding:10px 12px; border:1px solid #e0e0e0; border-radius:4px;">
        </div>

        <div class="form-group" style="margin-bottom:16px;">
            <label style="display:block; font-size:0.85rem; font-weight:600; margin-bottom:6px;">Réponse *</label>
            <textarea name="reponse" rows="4" required style="width:100%; padding:10px 12px; border:1px solid #e0e0e0; border-radius:4px;">{{ old('reponse', $faqItem->reponse) }}</textarea>
        </div>

        <div style="display:flex; gap:16px;">
            <div class="form-group" style="margin-bottom:16px; flex:1;">
                <label style="display:block; font-size:0.85rem; font-weight:600; margin-bottom:6px;">Catégorie *</label>
                <select name="categorie" required style="width:100%; padding:10px 12px; border:1px solid #e0e0e0; border-radius:4px;">
                    <option value="general" {{ old('categorie', $faqItem->categorie) === 'general' ? 'selected' : '' }}>Général</option>
                    <option value="services" {{ old('categorie', $faqItem->categorie) === 'services' ? 'selected' : '' }}>Services</option>
                    <option value="tarifs" {{ old('categorie', $faqItem->categorie) === 'tarifs' ? 'selected' : '' }}>Tarifs</option>
                    <option value="dashboard" {{ old('categorie', $faqItem->categorie) === 'dashboard' ? 'selected' : '' }}>Dashboard & technique</option>
                    <option value="support" {{ old('categorie', $faqItem->categorie) === 'support' ? 'selected' : '' }}>Support</option>
                </select>
            </div>
            <div class="form-group" style="margin-bottom:16px; width:120px;">
                <label style="display:block; font-size:0.85rem; font-weight:600; margin-bottom:6px;">Ordre</label>
                <input type="number" name="ordre" value="{{ old('ordre', $faqItem->ordre) }}"
                       style="width:100%; padding:10px 12px; border:1px solid #e0e0e0; border-radius:4px;">
            </div>
        </div>

        <div style="display:flex; gap:12px;">
            <button type="submit" class="btn-admin">{{ $faqItem->exists ? 'Enregistrer les modifications' : 'Ajouter la question' }}</button>
            <a href="{{ route('admin.faq.index') }}" class="btn-admin-outline">Annuler</a>
        </div>
    </form>
</div>

@endsection