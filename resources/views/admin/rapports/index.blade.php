@extends('layouts.admin')

@section('title', $voitTout ? 'Comptes rendus' : 'Mes comptes rendus')

@section('content')

<div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px; gap:16px; flex-wrap:wrap;">
    <p style="color:#5c6b84; margin:0;">{{ $comptesRendus->count() }} compte(s) rendu(s)</p>

    <div style="display:flex; gap:12px; align-items:center; flex-wrap:wrap;">
        @if ($voitTout)
            <form method="GET" action="{{ route('admin.rapports.index') }}" style="display:flex; gap:8px; align-items:center;">
                <select name="membre" onchange="this.form.submit()" style="padding:9px 12px; border:1px solid #e0e0e0; border-radius:4px;">
                    <option value="">Tous les membres</option>
                    @foreach ($membres as $membre)
                        <option value="{{ $membre->id }}" {{ (string) request('membre') === (string) $membre->id ? 'selected' : '' }}>{{ $membre->name }}</option>
                    @endforeach
                </select>
            </form>
        @endif
        <a href="{{ route('admin.rapports.create') }}" class="btn-admin">+ Rédiger un compte rendu</a>
    </div>
</div>

<div class="admin-card">
    <table class="admin-table">
        <thead>
            <tr>
                <th>Date</th>
                <th>Titre</th>
                @if ($voitTout)
                    <th>Membre</th>
                @endif
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($comptesRendus as $cr)
                <tr>
                    <td>{{ $cr->date_rapport->format('d/m/Y') }}</td>
                    <td>{{ $cr->titre }}</td>
                    @if ($voitTout)
                        <td>{{ $cr->user->name }}</td>
                    @endif
                    <td style="display:flex; gap:8px;">
                        <a href="{{ route('admin.rapports.show', $cr) }}" class="btn-admin-outline">Lire</a>
                        @if ($cr->user_id === auth()->id())
                            <a href="{{ route('admin.rapports.edit', $cr) }}" class="btn-admin-outline">Modifier</a>
                        @endif
                        <form action="{{ route('admin.rapports.destroy', $cr) }}" method="POST" onsubmit="return confirm('Supprimer ce compte rendu ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-admin-outline" style="color:#c0392b; border-color:#f5b7b1;">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="{{ $voitTout ? 4 : 3 }}" style="color:#5c6b84;">Aucun compte rendu pour l'instant.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection