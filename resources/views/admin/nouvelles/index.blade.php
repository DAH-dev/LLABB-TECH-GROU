@extends('layouts.admin')

@section('title', 'Nouvelles')

@section('content')

<div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
    <p style="color:#5c6b84; margin:0;">{{ $nouvelles->count() }} nouvelle(s)</p>
    <a href="{{ route('admin.nouvelles.create') }}" class="btn-admin">+ Ajouter une nouvelle</a>
</div>

<div class="admin-card">
    <table class="admin-table">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Date</th>
                <th>Statut</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($nouvelles as $nouvelle)
                <tr>
                    <td>{{ $nouvelle->titre }}</td>
                    <td>{{ $nouvelle->date_publication->format('d/m/Y') }}</td>
                    <td>{{ $nouvelle->publie ? 'Publiée' : 'Brouillon' }}</td>
                    <td style="display:flex; gap:8px;">
                        <a href="{{ route('admin.nouvelles.edit', $nouvelle) }}" class="btn-admin-outline">Modifier</a>
                        <form action="{{ route('admin.nouvelles.destroy', $nouvelle) }}" method="POST" onsubmit="return confirm('Supprimer cette nouvelle ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-admin-outline" style="color:#c0392b; border-color:#f5b7b1;">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" style="color:#5c6b84;">Aucune nouvelle pour l'instant.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection