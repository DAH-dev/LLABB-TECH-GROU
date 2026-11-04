@extends('layouts.app')

@section('title', $project->titre . ' - LLABB TECH GROUP')

@section('content')

<style>
    .project-detail-page { --pd-ink: #10203d; --pd-muted: #5c6b84; --pd-line: #d7dfec; --pd-panel: #eef2fa; }

    /* ---- Hero : reste sur le fond sombre du site, donc texte blanc ---- */
    .project-detail-page .pd-crumb {
        padding: 24px 0 0;
        font-size: 0.86rem;
        color: rgba(255,255,255,0.75);
    }
    .project-detail-page .pd-crumb a { text-decoration: none; color: rgba(255,255,255,0.75); }
    .project-detail-page .pd-crumb a:hover { color: #fff; }
    .project-detail-page .pd-crumb .sep { margin: 0 8px; }
    .project-detail-page .pd-crumb .current { color: #fff; }

    .project-detail-page .pd-hero { padding: 36px 0 70px; }
    .project-detail-page .pd-hero-inner { max-width: 780px; }
    .project-detail-page .pd-tag {
        display: inline-block;
        font-size: 0.82rem;
        padding: 6px 14px;
        border: 1px solid rgba(255,255,255,0.4);
        color: #fff;
        background: rgba(255,255,255,0.08);
        margin-bottom: 18px;
        border-radius: 4px;
    }
    .project-detail-page .pd-hero h1 {
        font-size: clamp(2rem, 4.5vw, 3rem);
        line-height: 1.15;
        color: #fff;
        text-shadow: 0 2px 12px rgba(0,0,0,0.35);
        margin: 0;
    }
    .project-detail-page .pd-lede {
        font-size: 1.05rem;
        color: rgba(255,255,255,0.88);
        text-shadow: 0 1px 8px rgba(0,0,0,0.3);
        max-width: 60ch;
        margin-top: 18px;
    }
    .project-detail-page .pd-facts {
        margin-top: 32px;
        display: flex;
        gap: 40px;
        flex-wrap: wrap;
        font-size: 0.86rem;
        color: rgba(255,255,255,0.75);
    }
    .project-detail-page .pd-facts strong { display: block; color: #fff; font-size: 1rem; margin-bottom: 2px; }

    /* ---- Reste du contenu : à l'intérieur du panneau blanc .main/.container.main-content ---- */
    .project-detail-page .pd-cover img {
        width: 100%; max-height: 420px; object-fit: cover; border-radius: 12px;
        border: 1px solid var(--pd-line);
    }

    .project-detail-page .pd-section { padding: 48px 0; border-bottom: 1px solid var(--pd-line); }
    .project-detail-page .pd-section:last-of-type { border-bottom: none; }
    .project-detail-page .pd-grid-2 { display: grid; grid-template-columns: 0.8fr 1.2fr; gap: 48px; }
    @media (max-width: 800px) { .project-detail-page .pd-grid-2 { grid-template-columns: 1fr; gap: 16px; } }
    .project-detail-page .pd-grid-2 h2 { font-size: 1.45rem; color: var(--pd-ink); margin: 0; }
    .project-detail-page .pd-grid-2 .pd-body p { margin: 0; max-width: 65ch; color: var(--pd-ink); line-height: 1.7; }

    .project-detail-page .pd-result-highlight {
        border-left: 3px solid var(--color-primary);
        background: var(--pd-panel);
        padding: 24px 28px;
        border-radius: 0 8px 8px 0;
        color: var(--pd-ink);
        max-width: 70ch;
        line-height: 1.7;
    }

    .project-detail-page .pd-cta-top { display: flex; align-items: center; justify-content: space-between; gap: 24px; flex-wrap: wrap; padding-top: 48px; }
    .project-detail-page .pd-cta-top h2 { font-size: clamp(1.5rem, 3vw, 2rem); max-width: 22ch; color: var(--pd-ink); margin: 0; }
    .project-detail-page .pd-cta-row { display: flex; gap: 14px; flex-wrap: wrap; }
</style>

<div class="project-detail-page">

    <div class="container pd-crumb">
        <a href="{{ route('portfolio') }}">Portfolio</a><span class="sep">/</span><span class="current">{{ $project->titre }}</span>
    </div>

    <section class="pd-hero">
        <div class="container pd-hero-inner">
            <span class="pd-tag">{{ $project->category->nom }}</span>
            <h1>{{ $project->titre }}</h1>
            @if ($project->probleme)
                <p class="pd-lede">{{ \Illuminate\Support\Str::limit($project->probleme, 160) }}</p>
            @endif
            <div class="pd-facts">
                @if ($project->client)
                    <div><strong>Client</strong>{{ $project->client }}</div>
                @endif
                <div><strong>Catégorie</strong>{{ $project->category->nom }}</div>
            </div>
        </div>
    </section>

    <div class="main d-flex-center pt-8 pb-8">
        <div class="container main-content">

            <div class="pd-cover" style="margin-bottom: 40px;">
                <img src="{{ $project->image_couverture ? asset('assets/images/portfolio/' . $project->image_couverture) : asset('assets/images/portfolio/project-1.png') }}" alt="{{ $project->titre }}">
            </div>

            @if ($project->probleme)
                <section class="pd-section">
                    <div class="pd-grid-2">
                        <h2>Problématique</h2>
                        <div class="pd-body">
                            <p>{{ $project->probleme }}</p>
                        </div>
                    </div>
                </section>
            @endif

            @if ($project->solution)
                <section class="pd-section">
                    <div class="pd-grid-2">
                        <h2>Solution</h2>
                        <div class="pd-body">
                            <p>{{ $project->solution }}</p>
                        </div>
                    </div>
                </section>
            @endif

            @if ($project->resultats)
                <section class="pd-section">
                    <h2 style="margin-bottom:24px; color: var(--pd-ink);">Résultats</h2>
                    <div class="pd-result-highlight">
                        <p>{{ $project->resultats }}</p>
                    </div>
                </section>
            @endif

            <div class="pd-cta-top">
                <h2>Un projet du même type à réaliser ?</h2>
                <div class="pd-cta-row">
                    <a class="btn btn-primary" href="{{ route('contact') }}">Nous contacter</a>
                    <a class="btn btn-outline" href="{{ route('portfolio') }}">Voir d'autres projets</a>
                </div>
            </div>

        </div>
    </div>

</div>

@endsection