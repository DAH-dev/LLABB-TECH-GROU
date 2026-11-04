@extends('layouts.admin')

@section('title', 'Message de ' . $message->nom)

@section('content')

<a href="{{ route('admin.messages.index') }}" style="font-size:0.85rem; color:#5c6b84; display:inline-block; margin-bottom:16px;">&larr; Retour aux messages</a>

<div class="admin-card" style="max-width: 700px;">

    <div style="display:grid; grid-template-columns: 1fr 1fr; gap:16px; margin-bottom:24px; padding-bottom:20px; border-bottom:1px solid #e0e0e0;">
        <div>
            <div style="font-size:0.78rem; color:#5c6b84; margin-bottom:4px;">Nom</div>
            <div>{{ $message->nom }}</div>
        </div>
        <div>
            <div style="font-size:0.78rem; color:#5c6b84; margin-bottom:4px;">Email</div>
            <div><a href="mailto:{{ $message->email }}" style="color:#1e88e5;">{{ $message->email }}</a></div>
        </div>
        <div>
            <div style="font-size:0.78rem; color:#5c6b84; margin-bottom:4px;">Téléphone</div>
            <div>{{ $message->telephone ?: '—' }}</div>
        </div>
        <div>
            <div style="font-size:0.78rem; color:#5c6b84; margin-bottom:4px;">Entreprise</div>
            <div>{{ $message->entreprise ?: '—' }}</div>
        </div>
        <div>
            <div style="font-size:0.78rem; color:#5c6b84; margin-bottom:4px;">Service concerné</div>
            <div>{{ $message->service_interesse ?: '—' }}</div>
        </div>
        <div>
            <div style="font-size:0.78rem; color:#5c6b84; margin-bottom:4px;">Budget</div>
            <div>{{ $message->budget ?: '—' }}</div>
        </div>
        <div>
            <div style="font-size:0.78rem; color:#5c6b84; margin-bottom:4px;">Reçu le</div>
            <div>{{ $message->created_at->format('d/m/Y à H:i') }}</div>
        </div>
        <div>
            <div style="font-size:0.78rem; color:#5c6b84; margin-bottom:4px;">Inscrit à la newsletter</div>
            <div>{{ $message->inscription_newsletter ? 'Oui' : 'Non' }}</div>
        </div>
    </div>

    <div style="margin-bottom:24px;">
        <div style="font-size:0.78rem; color:#5c6b84; margin-bottom:8px;">Message</div>
        <div style="white-space:pre-wrap; line-height:1.6;">{{ $message->message }}</div>
    </div>

    <div style="display:flex; gap:12px; align-items:center;">
        <form action="{{ route('admin.messages.update-status', $message) }}" method="POST">
            @csrf
            @method('PATCH')
            <select name="statut" onchange="this.form.submit()"
                    style="padding:8px 12px; border:1px solid #e0e0e0; border-radius:4px;">
                <option value="a_traiter" {{ $message->statut === 'a_traiter' ? 'selected' : '' }}>À traiter</option>
                <option value="traite" {{ $message->statut === 'traite' ? 'selected' : '' }}>Traité</option>
            </select>
        </form>

        <a href="mailto:{{ $message->email }}" class="btn-admin">Répondre par email</a>

        <form action="{{ route('admin.messages.destroy', $message) }}" method="POST" onsubmit="return confirm('Supprimer ce message ?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn-admin-outline" style="color:#c0392b; border-color:#f5b7b1;">Supprimer</button>
        </form>
    </div>
</div>

@endsection