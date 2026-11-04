@extends('layouts.admin')

@section('title', 'Messages de contact')

@section('content')

<p style="color:#5c6b84; margin-bottom:20px;">{{ $messages->count() }} message(s)</p>

<div class="admin-card">
    <table class="admin-table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Email</th>
                <th>Service</th>
                <th>Message</th>
                <th>Reçu le</th>
                <th>Statut</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($messages as $message)
                <tr>
                   <td><a href="{{ route('admin.messages.show', $message) }}" style="color:#1e88e5;">{{ $message->nom }}</a></td>
                    <td>{{ $message->email }}</td>
                    <td>{{ $message->service_interesse ?: '—' }}</td>
                    <td style="max-width:250px;">{{ \Illuminate\Support\Str::limit($message->message, 60) }}</td>
                    <td>{{ $message->created_at->format('d/m/Y H:i') }}</td>
                    <td>
                        <form action="{{ route('admin.messages.update-status', $message) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PATCH')
                            <select name="statut" onchange="this.form.submit()"
                                    style="padding:4px 8px; border:1px solid #e0e0e0; border-radius:4px; font-size:0.82rem;">
                                <option value="a_traiter" {{ $message->statut === 'a_traiter' ? 'selected' : '' }}>À traiter</option>
                                <option value="traite" {{ $message->statut === 'traite' ? 'selected' : '' }}>Traité</option>
                            </select>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('admin.messages.destroy', $message) }}" method="POST" onsubmit="return confirm('Supprimer ce message ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-admin-outline" style="color:#c0392b; border-color:#f5b7b1;">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="7" style="color:#5c6b84;">Aucun message pour l'instant.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection