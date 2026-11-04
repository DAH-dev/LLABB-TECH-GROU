@extends('layouts.app')

@section('title', 'Tarifs - LLABB TECH GROUP')

@section('content')

@include('partials.page-header', [
    'title' => 'Nos tarifs',
    'description' => 'Des offres claires et adaptées à la taille de votre projet.'
])

<div class="main d-flex-center pt-8 pb-8">
    <div class="container main-content">
        <section class="pricing-plants">
            <div class="options-plants">
                @foreach ($pricingPlans as $plan)
                    <div class="plants {{ $plan->plus_populaire ? 'most-popular' : '' }}" data-aos="fade-up" data-aos-delay="0">
                        @if ($plan->plus_populaire)
                            <div class="tag-most-popular">
                                <span>Le plus populaire</span>
                            </div>
                        @endif

                        <div class="plant-header">
                            <h2 class="mb-0">{{ $plan->nom }}</h2>
                            <p>{{ $plan->description }}</p>
                        </div>
                        <div class="price d-flex-center">
                            <span class="price-main">{{ number_format($plan->prix, 0, ',', ' ') }} FCFA</span>
                        </div>
                        <div class="d-flex-center">
                            <a href="{{ route('contact') }}" class="btn btn-primary">Choisir {{ $plan->nom }}</a>
                        </div>
                        <div class="benefits">
                            <div class="line"></div>
                            <ul class="benefits-list">
                                @foreach ($plan->fonctionnalites as $feature)
                                    <li class="benefit-item">
                                        <svg class="benefit-icon"><use xlink:href="#check-circle-1"></use></svg>
                                        <span class="text">{{ $feature }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
</div>

@endsection