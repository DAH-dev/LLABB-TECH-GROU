@extends('layouts.admin')

@section('title', 'Utilisateurs')

@section('content')

<div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
    <p style="color:#5c6b84; margin:0;">{{ $users->count() }} utilisateur(s)</p>
    <a href="{{ route('admin.users.create') }}" class="btn-admin">+ Ajouter un utilisateur</a>
</div>

<div class="admin-card">
    <table class="admin-table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Email</th>
                <th>Rôle</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ ucfirst(str_replace('_', ' ', $user->role)) }}</td>
                    <td style="display:flex; gap:8px;">
                        <a href="{{ route('admin.users.edit', $user) }}" class="btn-admin-outline">Modifier</a>
                        @if ($user->id !== auth()->id())
                            <form action="{{ route('admin.users.destroy', $user) }}" method="POST" onsubmit="return confirm('Supprimer cet utilisateur ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-admin-outline" style="color:#c0392b; border-color:#f5b7b1;">Supprimer</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" style="color:#5c6b84;">Aucun utilisateur.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection