@extends('layouts.admin')

@section('title', 'Abonnés newsletter')

@section('content')

<div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
    <p style="color:#5c6b84; margin:0;">{{ $subscribers->count() }} abonné(s)</p>
    <a href="{{ route('admin.newsletter.export') }}" class="btn-admin">Exporter en CSV</a>
</div>

<div class="admin-card">
    <table class="admin-table">
        <thead>
            <tr>
                <th>Email</th>
                <th>Inscrit le</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($subscribers as $subscriber)
                <tr>
                    <td>{{ $subscriber->email }}</td>
                    <td>{{ $subscriber->created_at->format('d/m/Y H:i') }}</td>
                    <td>
                        <form action="{{ route('admin.newsletter.destroy', $subscriber) }}" method="POST" onsubmit="return confirm('Désinscrire cet abonné ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-admin-outline" style="color:#c0392b; border-color:#f5b7b1;">Désinscrire</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="3" style="color:#5c6b84;">Aucun abonné pour l'instant.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection