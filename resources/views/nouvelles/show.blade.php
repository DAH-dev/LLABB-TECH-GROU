@extends('layouts.app')

@section('title', $nouvelle->titre . ' - LLABB TECH GROUP')

@section('content')

@include('partials.page-header', [
    'title' => $nouvelle->titre,
    'description' => $nouvelle->date_publication->translatedFormat('d F Y')
])

<style>
    .news-detail-page .nd-narrow { max-width: 760px; margin: 0 auto; }
    .news-detail-page .nd-cover img {
        width: 100%;
        max-height: 420px;
        object-fit: cover;
        border-radius: 12px;
        border: 1px solid #e4e9f2;
        margin-bottom: 28px;
    }
    .news-detail-page .nd-body {
        font-size: 1.05rem;
        line-height: 1.8;
        color: #10203d;
    }
    .news-detail-page .nd-body p { margin: 0 0 22px; }

    .news-detail-page .nd-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
        gap: 24px;
    }
    .news-detail-page .nd-card {
        position: relative;
        background: #fff;
        border: 1px solid #e4e9f2;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 16px rgba(16, 32, 61, 0.06);
        transition: transform .2s ease, box-shadow .2s ease;
    }
    .news-detail-page .nd-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 10px 24px rgba(16, 32, 61, 0.12);
    }
    .news-detail-page .nd-thumb { aspect-ratio: 16 / 10; overflow: hidden; background: #eef2fa; }
    .news-detail-page .nd-thumb img { width: 100%; height: 100%; object-fit: cover; display: block; }
    .news-detail-page .nd-card-body { padding: 14px 16px 18px; }
    .news-detail-page .nd-card-date { display: block; font-size: 0.76rem; font-weight: 600; color: var(--color-primary); margin-bottom: 6px; }
    .news-detail-page .nd-card-title { font-size: 0.98rem; line-height: 1.35; color: #10203d; margin: 0; }
    .news-detail-page .nd-overlay { position: absolute; inset: 0; }

    .news-detail-page .nd-cta {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 24px;
        flex-wrap: wrap;
        padding-top: 30px;
    }
    .news-detail-page .nd-cta h2 { font-size: clamp(1.4rem, 3vw, 1.8rem); max-width: 22ch; color: #10203d; margin: 0; }
    .news-detail-page .nd-cta-row { display: flex; gap: 14px; flex-wrap: wrap; }
</style>

<div class="main d-flex-center pt-8 pb-8 news-detail-page">
    <div class="container main-content">

        <div class="nd-narrow">
            @if ($nouvelle->image)
                <div class="nd-cover">
                    <img src="{{ asset('assets/images/nouvelles/' . $nouvelle->image) }}" alt="{{ $nouvelle->titre }}">
                </div>
            @endif

            <div class="nd-body">
                @foreach (explode("\n", trim($nouvelle->contenu)) as $paragraph)
                    @if (trim($paragraph) !== '')
                        <p>{{ $paragraph }}</p>
                    @endif
                @endforeach
            </div>
        </div>

        @if ($autres->isNotEmpty())
            <section class="pt-8">
                <div class="d-flex-center pb-5">
                    <h3 class="heading-lg">Autres nouvelles</h3>
                </div>
                <div class="nd-grid">
                    @foreach ($autres as $autre)
                        <article class="nd-card" data-aos="fade-up" data-aos-delay="0">
                            <div class="nd-thumb">
                                <img src="{{ $autre->image ? asset('assets/images/nouvelles/' . $autre->image) : asset('assets/images/blog/post-1.png') }}" alt="{{ $autre->titre }}">
                            </div>
                            <div class="nd-card-body">
                                <span class="nd-card-date">{{ $autre->date_publication->translatedFormat('d F Y') }}</span>
                                <h3 class="nd-card-title">{{ $autre->titre }}</h3>
                            </div>
                            <a class="nd-overlay" href="{{ route('nouvelles.show', $autre->slug) }}" aria-label="{{ $autre->titre }}"></a>
                        </article>
                    @endforeach
                </div>
            </section>
        @endif

        <div class="nd-narrow nd-cta">
            <h2>Une question sur nos actualités ?</h2>
            <div class="nd-cta-row">
                <a class="btn btn-primary" href="{{ route('contact') }}">Nous contacter</a>
                <a class="btn btn-outline" href="{{ route('nouvelles') }}">Toutes les nouvelles</a>
            </div>
        </div>

    </div>
</div>

@endsection