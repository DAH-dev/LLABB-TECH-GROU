@extends('layouts.admin')

@section('title', 'Services')

@section('content')

<div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
    <p style="color:#5c6b84; margin:0;">{{ $services->count() }} service(s)</p>
    <a href="{{ route('admin.services.create') }}" class="btn-admin">+ Ajouter un service</a>
</div>

<div class="admin-card">
    <table class="admin-table">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Ordre</th>
                <th>Statut</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($services as $service)
                <tr>
                    <td>{{ $service->titre }}</td>
                    <td>{{ $service->ordre }}</td>
                    <td>
                        @if ($service->est_actif)
                            <span style="color:#1e7e4a;">Publié</span>
                        @else
                            <span style="color:#5c6b84;">Brouillon</span>
                        @endif
                    </td>
                    <td style="display:flex; gap:8px;">
                        <a href="{{ route('admin.services.edit', $service) }}" class="btn-admin-outline">Modifier</a>
                        <form action="{{ route('admin.services.destroy', $service) }}" method="POST" onsubmit="return confirm('Supprimer ce service ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-admin-outline" style="color:#c0392b; border-color:#f5b7b1;">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" style="color:#5c6b84;">Aucun service pour l'instant.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection