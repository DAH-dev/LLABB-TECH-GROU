@extends('layouts.admin')

@section('title', 'Équipe')

@section('content')

<div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
    <p style="color:#5c6b84; margin:0;">{{ $teamMembers->count() }} membre(s)</p>
    <a href="{{ route('admin.team.create') }}" class="btn-admin">+ Ajouter un membre</a>
</div>

<div class="admin-card">
    <table class="admin-table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Poste</th>
                <th>Ordre</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($teamMembers as $member)
                <tr>
                    <td>{{ $member->nom }}</td>
                    <td>{{ $member->poste }}</td>
                    <td>{{ $member->ordre }}</td>
                    <td style="display:flex; gap:8px;">
                        <a href="{{ route('admin.team.edit', $member) }}" class="btn-admin-outline">Modifier</a>
                        <form action="{{ route('admin.team.destroy', $member) }}" method="POST" onsubmit="return confirm('Supprimer ce membre ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-admin-outline" style="color:#c0392b; border-color:#f5b7b1;">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" style="color:#5c6b84;">Aucun membre pour l'instant.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection