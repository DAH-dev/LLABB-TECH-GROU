@extends('layouts.admin')

@section('title', 'Blog')

@section('content')

<div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
    <p style="color:#5c6b84; margin:0;">{{ $articles->count() }} article(s)</p>
    <a href="{{ route('admin.articles.create') }}" class="btn-admin">+ Ajouter un article</a>
</div>

<div class="admin-card">
    <table class="admin-table">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Catégorie</th>
                <th>Auteur</th>
                <th>Date</th>
                <th>Statut</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($articles as $article)
                <tr>
                    <td>{{ $article->titre }}</td>
                    <td>{{ $article->category->nom }}</td>
                    <td>{{ $article->auteur }}</td>
                    <td>{{ $article->date_publication?->format('d/m/Y') }}</td>
                    <td>
                        @if ($article->statut === 'publie')
                            <span style="color:#1e7e4a;">Publié</span>
                        @else
                            <span style="color:#5c6b84;">Brouillon</span>
                        @endif
                    </td>
                    <td style="display:flex; gap:8px;">
                        <a href="{{ route('admin.articles.edit', $article) }}" class="btn-admin-outline">Modifier</a>
                        <form action="{{ route('admin.articles.destroy', $article) }}" method="POST" onsubmit="return confirm('Supprimer cet article ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-admin-outline" style="color:#c0392b; border-color:#f5b7b1;">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="6" style="color:#5c6b84;">Aucun article pour l'instant.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection