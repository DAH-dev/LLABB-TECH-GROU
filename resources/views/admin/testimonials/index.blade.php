@extends('layouts.admin')

@section('title', 'Témoignages')

@section('content')

<div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
    <p style="color:#5c6b84; margin:0;">{{ $testimonials->count() }} témoignage(s)</p>
    <a href="{{ route('admin.testimonials.create') }}" class="btn-admin">+ Ajouter un témoignage</a>
</div>

<div class="admin-card">
    <table class="admin-table">
        <thead>
            <tr>
                <th>Client</th>
                <th>Entreprise</th>
                <th>Note</th>
                <th>Mis en avant</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($testimonials as $testimonial)
                <tr>
                    <td>{{ $testimonial->nom_client }}</td>
                    <td>{{ $testimonial->entreprise ?: '—' }}</td>
                    <td>{{ $testimonial->note }}/5</td>
                    <td>{{ $testimonial->mis_en_avant ? 'Oui' : 'Non' }}</td>
                    <td style="display:flex; gap:8px;">
                        <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="btn-admin-outline">Modifier</a>
                        <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST" onsubmit="return confirm('Supprimer ce témoignage ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-admin-outline" style="color:#c0392b; border-color:#f5b7b1;">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" style="color:#5c6b84;">Aucun témoignage pour l'instant.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection