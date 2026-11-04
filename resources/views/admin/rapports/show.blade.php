@extends('layouts.admin')

@section('title', $compteRendu->titre)

@section('content')

<div class="admin-card" style="max-width: 760px;">
    <p style="color:#5c6b84; margin:0 0 20px; font-size:0.9rem;">
        Par <strong>{{ $compteRendu->user->name }}</strong> · {{ $compteRendu->date_rapport->format('d/m/Y') }}
    </p>

    <div style="line-height:1.8;">
        @foreach (explode("\n", trim($compteRendu->contenu)) as $paragraph)
            @if (trim($paragraph) !== '')
                <p style="margin:0 0 16px;">{{ $paragraph }}</p>
            @endif
        @endforeach
    </div>

    <div style="display:flex; gap:12px; margin-top:24px;">
        @if ($compteRendu->user_id === auth()->id())
            <a href="{{ route('admin.rapports.edit', $compteRendu) }}" class="btn-admin">Modifier</a>
        @endif
        <a href="{{ route('admin.rapports.index') }}" class="btn-admin-outline">Retour à la liste</a>
    </div>
</div>

@endsection