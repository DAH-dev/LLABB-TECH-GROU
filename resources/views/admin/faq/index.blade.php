@extends('layouts.admin')

@section('title', 'FAQ')

@section('content')

<div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
    <p style="color:#5c6b84; margin:0;">{{ $faqItems->count() }} question(s)</p>
    <a href="{{ route('admin.faq.create') }}" class="btn-admin">+ Ajouter une question</a>
</div>

<div class="admin-card">
    <table class="admin-table">
        <thead>
            <tr>
                <th>Question</th>
                <th>Catégorie</th>
                <th>Ordre</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($faqItems as $item)
                <tr>
                    <td>{{ $item->question }}</td>
                    <td>{{ ucfirst($item->categorie) }}</td>
                    <td>{{ $item->ordre }}</td>
                    <td style="display:flex; gap:8px;">
                        <a href="{{ route('admin.faq.edit', $item) }}" class="btn-admin-outline">Modifier</a>
                        <form action="{{ route('admin.faq.destroy', $item) }}" method="POST" onsubmit="return confirm('Supprimer cette question ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-admin-outline" style="color:#c0392b; border-color:#f5b7b1;">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" style="color:#5c6b84;">Aucune question pour l'instant.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection