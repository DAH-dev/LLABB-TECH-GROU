@extends('layouts.admin')

@section('title', 'Tarifs')

@section('content')

<div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
    <p style="color:#5c6b84; margin:0;">{{ $pricingPlans->count() }} offre(s)</p>
    <a href="{{ route('admin.pricing.create') }}" class="btn-admin">+ Ajouter une offre</a>
</div>

<div class="admin-card">
    <table class="admin-table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prix</th>
                <th>Populaire</th>
                <th>Ordre</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pricingPlans as $plan)
                <tr>
                    <td>{{ $plan->nom }}</td>
                    <td>{{ number_format($plan->prix, 0, ',', ' ') }} FCFA</td>
                    <td>{{ $plan->plus_populaire ? 'Oui' : 'Non' }}</td>
                    <td>{{ $plan->ordre }}</td>
                    <td style="display:flex; gap:8px;">
                        <a href="{{ route('admin.pricing.edit', $plan) }}" class="btn-admin-outline">Modifier</a>
                        <form action="{{ route('admin.pricing.destroy', $plan) }}" method="POST" onsubmit="return confirm('Supprimer cette offre ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-admin-outline" style="color:#c0392b; border-color:#f5b7b1;">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" style="color:#5c6b84;">Aucune offre pour l'instant.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection