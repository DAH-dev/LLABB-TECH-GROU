@extends('layouts.app')

@section('title', 'Nouvelles - LLABB TECH GROUP')

@section('content')

@include('partials.page-header', [
    'title' => 'Nouvelles',
    'description' => 'Les dernières actualités de LLABB TECH GROUP et du numérique.'
])

<style>
    .news-page .news-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 26px;
    }
    .news-page .news-card {
        position: relative;
        background: #fff;
        border: 1px solid #e4e9f2;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 16px rgba(16, 32, 61, 0.06);
        display: flex;
        flex-direction: column;
        transition: transform .2s ease, box-shadow .2s ease;
    }
    .news-page .news-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 10px 24px rgba(16, 32, 61, 0.12);
    }
    .news-page .news-thumb {
        width: 100%;
        aspect-ratio: 16 / 10;
        overflow: hidden;
        background: #eef2fa;
    }
    .news-page .news-thumb img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }
    .news-page .news-body { padding: 18px 20px 22px; }
    .news-page .news-date {
        display: block;
        font-size: 0.78rem;
        font-weight: 600;
        color: var(--color-primary);
        margin-bottom: 8px;
    }
    .news-page .news-title {
        font-size: 1.05rem;
        line-height: 1.35;
        color: #10203d;
        margin: 0 0 8px;
    }
    .news-page .news-card:hover .news-title { color: var(--color-primary); }
    .news-page .news-resume {
        font-size: 0.9rem;
        line-height: 1.6;
        color: #5c6b84;
        margin: 0;
    }
    .news-page .news-overlay { position: absolute; inset: 0; }
    .news-page .news-empty { text-align: center; padding: 60px 0; color: #5c6b84; }
</style>

<div class="main d-flex-center pt-8 pb-8 news-page">
    <div class="container main-content">

        @if ($nouvelles->isEmpty())
            <p class="news-empty">Aucune nouvelle pour le moment.</p>
        @else
            <div class="news-grid">
                @foreach ($nouvelles as $nouvelle)
                    <article class="news-card" data-aos="fade-up" data-aos-delay="0">
                        <div class="news-thumb">
                            <img src="{{ $nouvelle->image ? asset('assets/images/nouvelles/' . $nouvelle->image) : asset('assets/images/blog/post-1.png') }}" alt="{{ $nouvelle->titre }}">
                        </div>
                        <div class="news-body">
                            <span class="news-date">{{ $nouvelle->date_publication->translatedFormat('d F Y') }}</span>
                            <h3 class="news-title">{{ $nouvelle->titre }}</h3>
                            <p class="news-resume">{{ $nouvelle->resume }}</p>
                        </div>
                        <a class="news-overlay" href="{{ route('nouvelles.show', $nouvelle->slug) }}" aria-label="{{ $nouvelle->titre }}"></a>
                    </article>
                @endforeach
            </div>
        @endif

    </div>
</div>

@endsection