@extends('layouts.app')

@section('title', 'Portfolio - LLABB TECH GROUP')

@section('content')

@include('partials.page-header', [
    'title' => 'Notre Portfolio',
    'description' => 'Découvrez nos réalisations en développement, intelligence artificielle et marketing digital.'
])

<div class="main d-flex-center pt-8 pb-8">
    <div class="container main-content">
        <section class="portfolio">
            <div class="portfolio-isotope" data-aos="fade-up" data-aos-delay="100">

                <div class="portfolio-filters-container d-flex-center pb-5">
                    <ul class="portfolio-filters">
                        <li class="filter-btn active" data-filter="*">Tous les projets</li>
                        @foreach ($projects->pluck('category')->unique('id') as $category)
                            <li class="filter-btn" data-filter=".filter-{{ $category->slug }}">{{ $category->nom }}</li>
                        @endforeach
                    </ul>
                </div>

                <div class="portfolio-grid">
                    @foreach ($projects as $project)
                        <div class="portfolio-item filter-{{ $project->category->slug }}" data-aos="zoom-in" data-aos-delay="0">
                            <div class="portfolio-card">
                                <div class="portfolio-image">
                                    <img class="image" src="{{ $project->image_couverture ? asset('assets/images/portfolio/' . $project->image_couverture) : asset('assets/images/portfolio/project-1.png') }}" alt="{{ $project->titre }}">
                                </div>
                                <div class="portfolio-info">
                                    <h3>{{ $project->titre }}</h3>
                                    <span class="portfolio-category">{{ $project->category->nom }}</span>
                                </div>
                            </div>
                            <a class="overlay-link" href="{{ route('portfolio.show', $project->slug) }}"></a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
</div>

@endsection