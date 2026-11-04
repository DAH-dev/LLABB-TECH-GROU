@extends('layouts.app')

@section('title', 'Témoignages - LLABB TECH GROUP')

@section('content')

@include('partials.page-header', [
    'title' => 'Ce que disent nos clients',
    'description' => 'La confiance de nos clients, à travers leurs propres mots.'
])

<style>
    .testimonials-page .t-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 28px;
    }

    .testimonials-page .t-card {
        position: relative;
        background: #fff;
        border: 1px solid #e4e9f2;
        border-radius: 14px;
        padding: 30px 28px 26px;
        box-shadow: 0 4px 16px rgba(16, 32, 61, 0.06);
        display: flex;
        flex-direction: column;
        transition: transform .2s ease, box-shadow .2s ease;
    }
    .testimonials-page .t-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 10px 24px rgba(16, 32, 61, 0.12);
    }
    .testimonials-page .t-card.featured {
        border-color: var(--color-primary);
        box-shadow: 0 6px 20px rgba(30, 136, 229, 0.15);
    }
    .testimonials-page .t-featured-badge {
        position: absolute;
        top: -11px;
        right: 22px;
        background: var(--color-primary);
        color: #fff;
        font-size: 0.72rem;
        font-weight: 600;
        padding: 4px 12px;
        border-radius: 20px;
    }

    .testimonials-page .t-quote-icon {
        width: 30px;
        height: 30px;
        color: var(--color-primary);
        opacity: 0.25;
        margin-bottom: 10px;
    }

    .testimonials-page .t-stars {
        display: flex;
        gap: 3px;
        margin-bottom: 14px;
    }
    .testimonials-page .t-stars svg {
        width: 16px;
        height: 16px;
    }
    .testimonials-page .t-star-filled { color: #f5a623; }
    .testimonials-page .t-star-empty { color: #e4e9f2; }

    .testimonials-page .t-text {
        font-size: 0.96rem;
        line-height: 1.7;
        color: #334155;
        flex: 1;
        margin: 0 0 22px;
    }

    .testimonials-page .t-person {
        display: flex;
        align-items: center;
        gap: 14px;
        padding-top: 18px;
        border-top: 1px solid #eef2fa;
    }
    .testimonials-page .t-avatar {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        object-fit: cover;
        flex-shrink: 0;
        background: #eef2fa;
    }
    .testimonials-page .t-avatar-fallback {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        background: #eef2fa;
        color: var(--color-primary);
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        flex-shrink: 0;
    }
    .testimonials-page .t-name {
        display: block;
        font-weight: 700;
        font-size: 0.95rem;
        color: #10203d;
    }
    .testimonials-page .t-entreprise {
        display: block;
        font-size: 0.82rem;
        color: #5c6b84;
        margin-top: 2px;
    }

    .testimonials-page .t-empty {
        text-align: center;
        padding: 60px 0;
        color: #5c6b84;
    }
</style>

<div class="main d-flex-center pt-8 pb-8 testimonials-page">
    <div class="container main-content">

        @if ($testimonials->isEmpty())
            <p class="t-empty">Aucun témoignage pour le moment.</p>
        @else
            <div class="t-grid">
                @foreach ($testimonials as $testimonial)
                    <div class="t-card {{ $testimonial->mis_en_avant ? 'featured' : '' }}" data-aos="fade-up" data-aos-delay="0">
                        @if ($testimonial->mis_en_avant)
                            <span class="t-featured-badge">Témoignage phare</span>
                        @endif

                        <svg class="t-quote-icon" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M9.5 7C6.46 7 4 9.46 4 12.5S6.46 18 9.5 18c.3 0 .59-.03.87-.08C9.4 19.6 7.6 21 5.5 21v2c3.86 0 7-3.14 7-7v-4.5C12.5 9.46 10.04 7 7 7m11 0c-3.04 0-5.5 2.46-5.5 5.5S14.96 18 18 18c.3 0 .59-.03.87-.08-.97 1.68-2.77 3.08-4.87 3.08v2c3.86 0 7-3.14 7-7v-4.5C21 9.46 18.54 7 15.5 7"/>
                        </svg>

                        <div class="t-stars">
                            @for ($i = 1; $i <= 5; $i++)
                                <svg class="{{ $i <= $testimonial->note ? 't-star-filled' : 't-star-empty' }}" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87L18.18 21 12 17.77 5.82 21 7 14.14l-5-4.87 6.91-1.01L12 2z"/>
                                </svg>
                            @endfor
                        </div>

                        <p class="t-text">{{ $testimonial->texte }}</p>

                        <div class="t-person">
                            @if ($testimonial->photo)
                                <img class="t-avatar" src="{{ asset('assets/images/testimonials/' . $testimonial->photo) }}" alt="{{ $testimonial->nom_client }}">
                            @else
                                <div class="t-avatar-fallback">{{ strtoupper(substr($testimonial->nom_client, 0, 1)) }}</div>
                            @endif
                            <div>
                                <span class="t-name">{{ $testimonial->nom_client }}</span>
                                @if ($testimonial->entreprise)
                                    <span class="t-entreprise">{{ $testimonial->entreprise }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

    </div>
</div>

@endsection