@extends('layouts.app')

@section('title', 'Services - LLABB TECH GROUP')

@section('content')

@include('partials.page-header', [
    'title' => 'Nos services',
    'description' => 'Des solutions numériques, technologiques et d\'intelligence artificielle pensées pour votre croissance.'
])

<div class="main d-flex-center pt-8 pb-8">
    <div class="container main-content">
        <section class="service-cards-modern">
            <div class="services-grid">
                @foreach ($services as $service)
                    <div class="service-card" data-aos="fade-up" data-aos-delay="0">
                        <div class="service-icon">
    @if ($service->icone)
        <img src="{{ asset('assets/images/services/' . $service->icone) }}" alt="{{ $service->titre }}" style="width:40px; height:40px; object-fit:contain;">
    @endif
</div>
                        <div class="service-description">
                            <h3>{{ $service->titre }}</h3>
                            <p>{{ $service->resume }}</p>
                        </div>
                        <a class="overlay-link" href="{{ route('services.show', $service->slug) }}"></a>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
</div>

@endsection