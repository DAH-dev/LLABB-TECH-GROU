@extends('layouts.admin')

@section('title', 'Portfolio')

@section('content')

<div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
    <p style="color:#5c6b84; margin:0;">{{ $projects->count() }} projet(s)</p>
    <a href="{{ route('admin.projects.create') }}" class="btn-admin">+ Ajouter un projet</a>
</div>

<div class="admin-card">
    <table class="admin-table">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Catégorie</th>
                <th>Client</th>
                <th>Mis en avant</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($projects as $project)
                <tr>
                    <td>{{ $project->titre }}</td>
                    <td>{{ $project->category->nom }}</td>
                    <td>{{ $project->client ?: '—' }}</td>
                    <td>{{ $project->mis_en_avant ? 'Oui' : 'Non' }}</td>
                    <td style="display:flex; gap:8px;">
                        <a href="{{ route('admin.projects.edit', $project) }}" class="btn-admin-outline">Modifier</a>
                        <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" onsubmit="return confirm('Supprimer ce projet ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-admin-outline" style="color:#c0392b; border-color:#f5b7b1;">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" style="color:#5c6b84;">Aucun projet pour l'instant.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection