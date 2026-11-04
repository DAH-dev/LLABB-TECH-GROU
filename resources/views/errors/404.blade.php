@extends('layouts.app')

@section('title', 'Page introuvable - LLABB TECH GROUP')

@section('content')

<style>
    .error-main {
        position: relative;
        padding: 100px 0;
        min-height: 60vh;
        display: flex;
        align-items: center;
        background-color: #ffffff;
    }
    .error-inner { position: relative; max-width: 620px; }
    .error-code {
        font-size: clamp(4rem, 14vw, 7rem);
        font-weight: 700;
        color: var(--color-primary);
        line-height: 1;
    }
    .error-inner h1 { font-size: clamp(1.6rem, 4vw, 2.3rem); margin: 14px 0 0; }
    .error-inner p.lede {
        font-style: italic;
        font-size: 1.1rem;
        color: var(--color-text-secondary);
        max-width: 50ch;
        margin-top: 16px;
    }
    .error-quick-links { margin-top: 40px; display: flex; flex-wrap: wrap; gap: 10px; }
    .error-quick-links a {
        font-size: 0.9rem;
        padding: 12px 20px;
        border: 1px solid var(--color-border);
        text-decoration: none;
        color: inherit;
    }
    .error-quick-links a:hover { border-color: var(--color-primary); color: var(--color-primary); }
    .error-quick-links a.primary {
        background: var(--color-primary);
        color: #fff;
        border-color: var(--color-primary);
    }
    .error-quick-links a.primary:hover { opacity: 0.9; color: #fff; }
</style>

<main class="error-main">
    <div class="container error-inner">
        <div class="error-code">404</div>
        <h1>Cette page n'existe pas, ou plus.</h1>
        <p class="lede">Le lien suivi est peut-être incorrect, ou la page a été déplacée. Voici quelques pages pour retrouver votre chemin.</p>
        <div class="error-quick-links">
            <a class="primary" href="{{ route('home') }}">Retour à l'accueil</a>
            <a href="{{ route('services') }}">Nos services</a>
            <a href="{{ route('portfolio') }}">Nos réalisations</a>
            <a href="{{ route('contact') }}">Nous contacter</a>
        </div>
    </div>
</main>

@endsection