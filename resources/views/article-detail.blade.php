@extends('layouts.app')

@section('title', $article->titre . ' - LLABB TECH GROUP')

@section('content')

@include('partials.page-header', [
    'title' => $article->titre,
    'description' => $article->category->nom . ' — ' . $article->date_publication->translatedFormat('d F Y')
])

<style>
    .article-detail-page { --ad-ink: #10203d; --ad-muted: #5c6b84; --ad-line: #e4e9f2; --ad-panel: #eef2fa; }

    .article-detail-page .ad-narrow {
        max-width: 760px;
        margin: 0 auto;
    }

    .article-detail-page .ad-cover {
        margin-bottom: 28px;
    }
    .article-detail-page .ad-cover img {
        width: 100%;
        max-height: 420px;
        object-fit: cover;
        border-radius: 12px;
        border: 1px solid var(--ad-line);
    }

    .article-detail-page .ad-meta {
        display: flex;
        align-items: center;
        gap: 22px;
        flex-wrap: wrap;
        font-size: 0.88rem;
        color: var(--ad-muted);
        padding-bottom: 26px;
        border-bottom: 1px solid var(--ad-line);
        margin-bottom: 30px;
    }
    .article-detail-page .ad-meta .ad-meta-item {
        display: flex;
        align-items: center;
        gap: 7px;
    }
    .article-detail-page .ad-meta svg { width: 16px; height: 16px; flex-shrink: 0; color: var(--color-primary); }

    .article-detail-page .ad-share {
        display: flex;
        align-items: center;
        gap: 10px;
        flex-wrap: wrap;
        padding: 22px 0;
        border-bottom: 1px solid var(--ad-line);
        margin-bottom: 36px;
    }
    .article-detail-page .ad-share .label {
        font-size: 0.85rem;
        color: var(--ad-muted);
        margin-right: 2px;
    }
    .article-detail-page .ad-share-btn {
        font-size: 0.82rem;
        padding: 7px 14px;
        border: 1px solid var(--ad-line);
        border-radius: 6px;
        background: transparent;
        color: var(--ad-ink);
        cursor: pointer;
        transition: border-color .2s ease, color .2s ease;
    }
    .article-detail-page .ad-share-btn:hover { border-color: var(--color-primary); color: var(--color-primary); }

    .article-detail-page .ad-body {
        font-size: 1.05rem;
        line-height: 1.8;
        color: var(--ad-ink);
    }
    .article-detail-page .ad-body p { margin: 0 0 22px; }

    .article-detail-page .ad-author {
        display: flex;
        gap: 16px;
        align-items: center;
        padding: 30px 0;
        margin-top: 10px;
        border-top: 1px solid var(--ad-line);
        border-bottom: 1px solid var(--ad-line);
    }
    .article-detail-page .ad-author .avatar {
        width: 48px; height: 48px;
        border-radius: 50%;
        background: var(--ad-panel);
        color: var(--color-primary);
        display: flex; align-items: center; justify-content: center;
        font-weight: 700;
        flex-shrink: 0;
    }
    .article-detail-page .ad-author .name { font-weight: 700; color: var(--ad-ink); display: block; }
    .article-detail-page .ad-author .role { font-size: 0.85rem; color: var(--ad-muted); }

    .article-detail-page .ad-cta {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 24px;
        flex-wrap: wrap;
        padding-top: 30px;
    }
    .article-detail-page .ad-cta h2 {
        font-size: clamp(1.4rem, 3vw, 1.8rem);
        max-width: 22ch;
        color: var(--ad-ink);
        margin: 0;
    }
    .article-detail-page .ad-cta-row { display: flex; gap: 14px; flex-wrap: wrap; }

        .article-detail-page .ad-related-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 24px;
    }
    @media (max-width: 800px) {
        .article-detail-page .ad-related-grid { grid-template-columns: 1fr; }
    }

    .article-detail-page .ad-related-card {
        position: relative;
        background: #fff;
        border: 1px solid var(--ad-line);
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 16px rgba(16, 32, 61, 0.06);
        transition: transform .2s ease, box-shadow .2s ease;
    }
    .article-detail-page .ad-related-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 10px 24px rgba(16, 32, 61, 0.12);
    }
    .article-detail-page .ad-related-thumb {
        width: 100%;
        aspect-ratio: 16 / 10;
        overflow: hidden;
        background: var(--ad-panel);
    }
    .article-detail-page .ad-related-thumb img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }
    .article-detail-page .ad-related-body {
        padding: 16px 18px 20px;
    }
    .article-detail-page .ad-related-cat {
        display: block;
        font-size: 0.76rem;
        color: var(--color-primary);
        margin-bottom: 6px;
        font-weight: 600;
    }
    .article-detail-page .ad-related-title {
        font-size: 1rem;
        line-height: 1.35;
        color: var(--ad-ink);
        margin: 0;
    }
    .article-detail-page .ad-related-card:hover .ad-related-title {
        color: var(--color-primary);
    }
    .article-detail-page .ad-related-overlay {
        position: absolute;
        inset: 0;
    }
</style>

<div class="main d-flex-center pt-8 pb-8 article-detail-page">
    <div class="container main-content">

        <div class="ad-narrow">

            <div class="ad-cover">
                <img src="{{ $article->image_a_la_une ? asset('assets/images/blog/' . $article->image_a_la_une) : asset('assets/images/blog/post-1.png') }}" alt="{{ $article->titre }}">
            </div>

            <div class="ad-meta">
                <span class="ad-meta-item">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>
                    {{ $article->date_publication->translatedFormat('d F Y') }}
                </span>
                <span class="ad-meta-item">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21a8 8 0 0 0-16 0"/><circle cx="12" cy="7" r="4"/></svg>
                    {{ $article->auteur }}
                </span>
                <span class="ad-meta-item">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
                    {{ max(1, ceil(str_word_count(strip_tags($article->contenu)) / 200)) }} min de lecture
                </span>
            </div>

            <div class="ad-share">
                <span class="label">Partager :</span>
                <button class="ad-share-btn" type="button" onclick="window.open('https://www.linkedin.com/sharing/share-offsite/?url=' + encodeURIComponent(window.location.href), '_blank')">LinkedIn</button>
                <button class="ad-share-btn" type="button" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(window.location.href), '_blank')">Facebook</button>
                <button class="ad-share-btn" type="button" onclick="window.open('https://twitter.com/intent/tweet?url=' + encodeURIComponent(window.location.href), '_blank')">X (Twitter)</button>
                <button class="ad-share-btn" type="button" id="copy-link">Copier le lien</button>
            </div>

            <div class="ad-body">
                @foreach (explode("\n", trim($article->contenu)) as $paragraph)
                    @if (trim($paragraph) !== '')
                        <p>{{ $paragraph }}</p>
                    @endif
                @endforeach
            </div>

            <div class="ad-author">
                <div class="avatar">{{ strtoupper(substr($article->auteur, 0, 1)) }}</div>
                <div>
                    <span class="name">{{ $article->auteur }}</span>
                    <span class="role">{{ $article->category->nom }}</span>
                </div>
            </div>

        </div>

        @if ($relatedArticles->isNotEmpty())
            <section class="pt-8">
                <div class="d-flex-center pb-5">
                    <h3 class="heading-lg">Articles liés</h3>
                </div>
                <div class="ad-related-grid">
                    @foreach ($relatedArticles as $related)
                        <article class="ad-related-card" data-aos="fade-up" data-aos-delay="0">
                            <div class="ad-related-thumb">
                                <img src="{{ $related->image_a_la_une ? asset('assets/images/blog/' . $related->image_a_la_une) : asset('assets/images/blog/post-1.png') }}" alt="{{ $related->titre }}">
                            </div>
                            <div class="ad-related-body">
                                <span class="ad-related-cat">{{ $related->category->nom ?? '' }}</span>
                                <h3 class="ad-related-title">{{ $related->titre }}</h3>
                            </div>
                            <a class="ad-related-overlay" href="{{ route('blog.show', $related->slug) }}" aria-label="{{ $related->titre }}"></a>
                        </article>
                    @endforeach
                </div>
            </section>
        @endif

        <div class="ad-narrow ad-cta">
            <h2>Un sujet à approfondir avec nous ?</h2>
            <div class="ad-cta-row">
                <a class="btn btn-primary" href="{{ route('contact') }}">Nous contacter</a>
                <a class="btn btn-outline" href="{{ route('blog') }}">Voir tous les articles</a>
            </div>
        </div>

    </div>
</div>

@endsection

@section('scripts')
<script>
document.getElementById('copy-link')?.addEventListener('click', function () {
    var btn = this;
    navigator.clipboard.writeText(window.location.href).then(function () {
        var original = btn.textContent;
        btn.textContent = 'Lien copié';
        setTimeout(function () { btn.textContent = original; }, 2000);
    }).catch(function () {});
});
</script>
@endsection