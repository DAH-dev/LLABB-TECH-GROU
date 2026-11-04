@extends('layouts.admin')

@section('title', 'Tableau de bord')

@section('content')

<div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; margin-bottom: 32px;">
    <div class="admin-card">
        <div style="font-size: 0.85rem; color: #5c6b84; margin-bottom: 8px;">Messages à traiter</div>
        <div style="font-size: 2rem; font-weight: 700;">{{ $stats['messages_a_traiter'] }}</div>
    </div>
    <div class="admin-card">
        <div style="font-size: 0.85rem; color: #5c6b84; margin-bottom: 8px;">Articles publiés</div>
        <div style="font-size: 2rem; font-weight: 700;">{{ $stats['total_articles'] }}</div>
    </div>
    <div class="admin-card">
        <div style="font-size: 0.85rem; color: #5c6b84; margin-bottom: 8px;">Projets au portfolio</div>
        <div style="font-size: 2rem; font-weight: 700;">{{ $stats['total_projets'] }}</div>
    </div>
</div>

<div class="admin-card">
    <h2 style="font-size: 1.05rem; margin-top: 0;">Derniers messages reçus</h2>
    <table class="admin-table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Email</th>
                <th>Message</th>
                <th>Reçu le</th>
                <th>Statut</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($derniersMessages as $message)
                <tr>
                    <td>{{ $message->nom }}</td>
                    <td>{{ $message->email }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($message->message, 40) }}</td>
                    <td>{{ $message->created_at->format('d/m/Y H:i') }}</td>
                    <td>{{ $message->statut }}</td>
                </tr>
            @empty
                <tr><td colspan="5" style="color:#5c6b84;">Aucun message pour l'instant.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection