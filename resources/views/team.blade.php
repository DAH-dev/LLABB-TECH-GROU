@extends('layouts.app')

@section('title', 'Équipe - LLABB TECH GROUP')

@section('content')

@include('partials.page-header', [
    'title' => 'Notre équipe',
    'description' => 'Des profils complémentaires réunis autour d\'une même exigence : livrer des solutions qui comptent.'
])

<style>
    .team-page .team-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
        gap: 28px;
    }

    .team-page .member-card {
        background: #fff;
        border: 1px solid #e4e9f2;
        border-radius: 14px;
        overflow: hidden;
        box-shadow: 0 4px 16px rgba(16, 32, 61, 0.06);
        display: flex;
        flex-direction: column;
        transition: transform .2s ease, box-shadow .2s ease;
    }
    .team-page .member-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 10px 24px rgba(16, 32, 61, 0.12);
    }

    .team-page .member-photo {
        width: 100%;
        aspect-ratio: 1 / 1;
        overflow: hidden;
        background: #eef2fa;
    }
    .team-page .member-photo img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    .team-page .member-body {
        padding: 20px 18px 24px;
        text-align: center;
    }
    .team-page .member-name {
        display: block;
        font-weight: 700;
        font-size: 1.05rem;
        color: var(--color-text-primary, #10203d);
    }
    .team-page .member-role {
        display: block;
        margin-top: 2px;
        font-size: 0.88rem;
        font-weight: 600;
        color: var(--color-primary);
    }
    .team-page .member-socials {
        display: flex;
        justify-content: center;
        gap: 10px;
        margin-top: 14px;
    }
    .team-page .member-socials a {
        width: 34px;
        height: 34px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        background: #eef2fa;
        color: var(--color-primary);
        transition: background .2s ease, color .2s ease;
    }
    .team-page .member-socials a:hover {
        background: var(--color-primary);
        color: #fff;
    }
    .team-page .member-socials svg {
        width: 16px;
        height: 16px;
    }
    .team-page .member-bio {
        margin-top: 14px;
        font-size: 0.88rem;
        line-height: 1.6;
        color: #5c6b84;
    }
</style>

<div class="main d-flex-center pt-8 pb-8 team-page">
    <div class="container main-content">
        <section class="team">
            <div class="team-grid">
                @foreach ($teamMembers as $member)
                    <div class="member-card" data-aos="fade-up" data-aos-delay="0">
                        <div class="member-photo">
                            <img src="{{ $member->photo ? asset('assets/images/team/' . $member->photo) : asset('assets/images/testimonials/face-01.png') }}" alt="{{ $member->nom }}">
                        </div>
                        <div class="member-body">
                            <span class="member-name">{{ $member->nom }}</span>
                            <span class="member-role">{{ $member->poste }}</span>

                            @if ($member->lien_linkedin || $member->lien_twitter)
                                <div class="member-socials">
                                    @if ($member->lien_linkedin)
                                        <a href="{{ $member->lien_linkedin }}" target="_blank" rel="noopener" aria-label="LinkedIn">
                                            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                                        </a>
                                    @endif
                                    @if ($member->lien_twitter)
                                        <a href="{{ $member->lien_twitter }}" target="_blank" rel="noopener" aria-label="X (Twitter)">
                                            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M18.901 1.153h3.68l-8.04 9.19L24 22.846h-7.406l-5.8-7.584-6.638 7.584H.474l8.6-9.83L0 1.154h7.594l5.243 6.932ZM17.61 20.644h2.039L6.486 3.24H4.298Z"/></svg>
                                        </a>
                                    @endif
                                </div>
                            @endif

                            @if ($member->bio)
                                <p class="member-bio">{{ $member->bio }}</p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
</div>

@endsection