@extends('layouts.app')

@section('title', 'Blog - LLABB TECH GROUP')

@section('content')

@include('partials.page-header', [
    'title' => 'Blog & Actualités',
    'description' => 'Nos réflexions et actualités sur le digital, l\'IA et la technologie.'
])

<div class="main d-flex-center pt-8 pb-8">
    <div class="container main-content">
        <section class="blog no-blog-sidebar">
            <div class="blog-grid blog-grid-col3">
                @foreach ($articles as $article)
                    <article class="blog-card" data-aos="fade-up" data-aos-delay="0">
                        <div class="blog-image">
                            <img class="image" src="{{ $article->image_a_la_une ? asset('assets/images/blog/' . $article->image_a_la_une) : asset('assets/images/blog/post-1.png') }}" alt="{{ $article->titre }}">
                            <div class="blog-category">
                                <span class="category-tag">{{ $article->category->nom }}</span>
                            </div>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <div class="blog-date">
                                    <svg><use xlink:href="#calendar"></use></svg>
                                    <span>{{ $article->date_publication->translatedFormat('d F Y') }}</span>
                                </div>
                                <div class="blog-author">
                                    <svg><use xlink:href="#user"></use></svg>
                                    <span>{{ $article->auteur }}</span>
                                </div>
                            </div>
                            <h3 class="blog-title">{{ $article->titre }}</h3>
                            <p class="blog-excerpt">{{ $article->extrait }}</p>
                            <div class="blog-footer">
                                <a href="{{ route('blog.show', $article->slug) }}" class="read-more">
                                    Lire la suite
                                    <svg><use xlink:href="#arrow-right"></use></svg>
                                </a>
                            </div>
                        </div>
                        <a class="overlay-link" href="{{ route('blog.show', $article->slug) }}"></a>
                    </article>
                @endforeach
            </div>
        </section>
    </div>
</div>

@endsection