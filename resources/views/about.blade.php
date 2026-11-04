@extends('layouts.app')

@section('title', 'À propos - LLABB TECH GROUP')

@section('content')

<!-- Hero compact (pages intérieures) -->
<section style="position: relative; overflow: hidden; padding:110px 0 70px;">
    <!-- <img src="{{ asset('assets/images/backgrounds/hand-ia-bgremove.png') }}" alt=""
         style="position:absolute; top:50%; left:0; transform:translateY(-50%); max-width:45%; pointer-events:none; z-index:0;"> -->
    <div class="container" style="position:relative; z-index:1;">
        <div style="max-width: 620px; margin-left: auto;">
            <h1 class="text-white heading-hero text-shadow" data-aos="fade-down" data-aos-duration="800" data-aos-delay="100">
                Nous construisons des systèmes IA qui comptent.
            </h1>

            <p class="text-white text-shadow--strong pt-3" data-aos="fade-up" data-aos-duration="600" data-aos-delay="500">
                LLABB TECH GROUP est une agence basée à Abidjan qui conçoit des solutions digitales, IT et d'intelligence artificielle pour des entreprises qui veulent avancer plus vite.
            </p>

            <div class="d-flex gap-4 pt-4" style="flex-wrap: wrap;" data-aos="fade-in" data-aos-duration="400" data-aos-delay="700">
                <div>
                    <span class="text-primary" style="font-weight:700;">4</span>
                    <span class="text-white"> domaines d'expertise</span>
                </div>
                <div>
                    <span class="text-primary" style="font-weight:700;">Abidjan</span>
                    <span class="text-white"> Côte d'Ivoire</span>
                </div>
                <div>
                    <span class="text-primary" style="font-weight:700;">Sur-mesure</span>
                    <span class="text-white"> chaque projet</span>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    /* Composants éditoriaux propres à la page À propos */
    .about-split {
        display: grid;
        grid-template-columns: 1fr 1fr;
        border: 1px solid var(--color-border);
    }
    .about-split > div { padding: 44px 40px; }
    .about-split > div:first-child {
        border-right: 1px solid var(--color-border);
        background: var(--color-surface, rgba(0,0,0,0.02));
    }
    .about-split h3 {
        font-size: 1.05rem;
        color: var(--color-text-secondary);
        margin-bottom: 14px;
    }
    .about-split p { font-size: 1.1rem; margin: 0; }

    .about-values { list-style: none; margin: 0; padding: 0; }
    .about-values li {
        display: grid;
        grid-template-columns: 220px 1fr;
        gap: 32px;
        padding: 26px 0;
        border-top: 1px solid var(--color-border);
        align-items: baseline;
    }
    .about-values li:last-child { border-bottom: 1px solid var(--color-border); }
    .about-values .name {
        font-size: 1.3rem;
        font-weight: 600;
        color: var(--color-primary);
    }
    .about-values p { margin: 0; color: var(--color-text-secondary); }

    .about-accordion { border-top: 1px solid var(--color-border); }
    .about-exp-item { border-bottom: 1px solid var(--color-border); }
    .about-exp-item button {
        width: 100%;
        text-align: left;
        background: none;
        border: none;
        cursor: pointer;
        padding: 24px 0;
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 1.1rem;
        font-weight: 600;
        color: var(--color-text-primary, inherit);
    }
    .about-exp-item .about-exp-panel {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.3s ease;
    }
    .about-exp-item[data-open="true"] .about-exp-panel { max-height: 200px; }
    .about-exp-item p { color: var(--color-text-secondary); padding-bottom: 24px; margin: 0; }
    .about-exp-item .plus { transition: transform 0.2s ease; }
    .about-exp-item[data-open="true"] .plus { transform: rotate(45deg); }

    /* Équipe (même design que la page Équipe dédiée) */
    .about-team .team-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
        gap: 28px;
    }
    .about-team .member-card {
        background: #fff;
        border: 1px solid #e4e9f2;
        border-radius: 14px;
        overflow: hidden;
        box-shadow: 0 4px 16px rgba(16, 32, 61, 0.06);
        display: flex;
        flex-direction: column;
        transition: transform .2s ease, box-shadow .2s ease;
    }
    .about-team .member-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 10px 24px rgba(16, 32, 61, 0.12);
    }
    .about-team .member-photo {
        width: 100%;
        aspect-ratio: 1 / 1;
        overflow: hidden;
        background: #eef2fa;
    }
    .about-team .member-photo img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }
    .about-team .member-body {
        padding: 20px 18px 24px;
        text-align: center;
    }
    .about-team .member-name {
        display: block;
        font-weight: 700;
        font-size: 1.05rem;
        color: var(--color-text-primary, #10203d);
    }
    .about-team .member-role {
        display: block;
        margin-top: 4px;
        font-size: 0.88rem;
        font-weight: 600;
        color: var(--color-primary);
    }
    .about-team .member-socials {
        display: flex;
        justify-content: center;
        gap: 10px;
        margin-top: 14px;
    }
    .about-team .member-socials a {
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
    .about-team .member-socials a:hover {
        background: var(--color-primary);
        color: #fff;
    }
    .about-team .member-socials svg {
        width: 16px;
        height: 16px;
    }

    @media (max-width: 800px) {
        .about-split { grid-template-columns: 1fr; }
        .about-split > div:first-child { border-right: none; border-bottom: 1px solid var(--color-border); }
        .about-values li { grid-template-columns: 1fr; gap: 6px; }
    }
</style>

<div class="main d-flex-center pt-8 pb-8">
    <div class="container main-content">

        <!-- Histoire -->
        <section class="about-our-company">
            <div class="about-info pb-4">
                <div class="about-texts pb-4">
                    <h4 class="text-accent">Notre histoire</h4>
                    <h2 class="about-info-title">Une conviction simple : la technologie comme levier de croissance</h2>
                    <p>
                        LLABB TECH GROUP est né d'une conviction simple : la technologie doit être un levier
                        concret de croissance, et non un simple effet de mode. L'équipe fondatrice réunit des
                        profils venus du développement, de l'intelligence artificielle et du marketing, autour
                        d'une même exigence — livrer des solutions qui produisent des résultats mesurables.
                    </p>
                    <p>
                        Depuis ses débuts, l'entreprise a fait le choix de l'excellence opérationnelle : chaque
                        projet est pensé comme une réponse sur-mesure aux réalités et aux ambitions du client,
                        plutôt que comme une solution standardisée appliquée telle quelle.
                    </p>
                </div>
            </div>

            <div class="about-image" data-hover-3d>
                <img src="{{ asset('assets/images/backgrounds/computer-code.png') }}" alt="Notre histoire - LLABB TECH GROUP">
            </div>
        </section>

        <!-- Mission & Vision (disposition "split") -->
        <section class="pt-8">
            <div class="about-split">
                <div>
                    <h3>Mission</h3>
                    <p>Rendre la technologie accessible et rentable pour toute entreprise, à travers des solutions digitales, des outils d'IA et des stratégies marketing qui génèrent un impact concret.</p>
                </div>
                <div>
                    <h3>Vision</h3>
                    <p>Devenir une référence du numérique et de l'intelligence artificielle en Afrique de l'Ouest, reconnue pour la qualité de ses réalisations et la confiance durable qu'elle construit.</p>
                </div>
            </div>
        </section>

        <!-- Valeurs (disposition liste éditoriale) -->
        <section class="pt-8">
            <div class="d-flex-center pb-5">
                <h2 class="heading-lg">Nos valeurs</h2>
            </div>
            <ul class="about-values">
                <li>
                    <span class="name">Innovation</span>
                    <p>Nous explorons en continu les technologies émergentes — IA, automatisation, données — pour proposer des solutions à la pointe plutôt que suivre la tendance.</p>
                </li>
                <li>
                    <span class="name">Excellence</span>
                    <p>Chaque livrable répond à des standards élevés de qualité, de performance et de sécurité, du premier prototype à la mise en production.</p>
                </li>
                <li>
                    <span class="name">Transparence</span>
                    <p>Une relation client fondée sur l'écoute, des points d'étape réguliers et un suivi rigoureux, sans zones d'ombre sur l'avancement du projet.</p>
                </li>
                <li>
                    <span class="name">Agilité</span>
                    <p>Des méthodes de travail qui s'adaptent aux besoins évolutifs de chaque client, du cadrage initial jusqu'à la mise en ligne.</p>
                </li>
                <li>
                    <span class="name">Impact</span>
                    <p>Nous mesurons notre réussite à la valeur concrète que nos solutions apportent — visibilité, efficacité, croissance.</p>
                </li>
            </ul>
        </section>

        <!-- Expertise (accordéon) -->
        <section class="pt-8">
            <div class="d-flex-center pb-5">
                <h2 class="heading-lg">Nos domaines d'expertise</h2>
            </div>
            <div class="about-accordion" id="aboutAccordion">
                <div class="about-exp-item" data-open="true">
                    <button type="button">
                        Développement digital
                        <span class="plus">+</span>
                    </button>
                    <div class="about-exp-panel">
                        <p>Sites web, applications et plateformes sur-mesure, conçus pour évoluer avec l'activité du client.</p>
                    </div>
                </div>
                <div class="about-exp-item" data-open="false">
                    <button type="button">
                        Solutions IT
                        <span class="plus">+</span>
                    </button>
                    <div class="about-exp-panel">
                        <p>Infrastructures, intégrations et architectures back-office pensées pour la fiabilité et la sécurité.</p>
                    </div>
                </div>
                <div class="about-exp-item" data-open="false">
                    <button type="button">
                        Intelligence artificielle
                        <span class="plus">+</span>
                    </button>
                    <div class="about-exp-panel">
                        <p>Automatisation, chatbots et outils d'aide à la décision, intégrés aux processus existants de l'entreprise.</p>
                    </div>
                </div>
                <div class="about-exp-item" data-open="false">
                    <button type="button">
                        Marketing & communication digitale
                        <span class="plus">+</span>
                    </button>
                    <div class="about-exp-panel">
                        <p>Stratégie de contenu, référencement et présence en ligne, construits autour d'objectifs mesurables.</p>
                    </div>
                </div>
                <div class="about-exp-item" data-open="false">
                    <button type="button">
                        Conseil & innovation
                        <span class="plus">+</span>
                    </button>
                    <div class="about-exp-panel">
                        <p>Accompagnement stratégique et formation des équipes pour ancrer durablement les nouveaux outils.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Équipe -->
        <section class="team about-team pt-8">
            <div class="d-flex-center pb-5">
                <h2 class="heading-lg">Notre équipe</h2>
            </div>
            <div class="team-grid">
                @foreach ($teamMembers as $member)
                    <div class="member-card" data-aos="fade-up" data-aos-delay="0">
                        <div class="member-photo">
                            <img src="{{ $member->photo ? asset('assets/images/team/' . $member->photo) : asset('assets/images/testimonials/face-01.png') }}" alt="{{ $member->nom }}">
                        </div>
                        <div class="member-body">
                            <span class="member-name">{{ $member->nom }}</span>
                            <span class="member-role">{{ $member->poste }}</span>

                            @if ($member->lien_linkedin)
                                <div class="member-socials">
                                    <a href="{{ $member->lien_linkedin }}" target="_blank" rel="noopener" aria-label="LinkedIn">
                                        <svg viewBox="0 0 24 24" fill="currentColor"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

    </div>
</div>

@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('#aboutAccordion .about-exp-item button').forEach(function (btn) {
        btn.addEventListener('click', function () {
            var item = btn.closest('.about-exp-item');
            var isOpen = item.getAttribute('data-open') === 'true';
            document.querySelectorAll('#aboutAccordion .about-exp-item').forEach(function (other) {
                other.setAttribute('data-open', 'false');
            });
            if (!isOpen) {
                item.setAttribute('data-open', 'true');
            }
        });
    });
});
</script>
@endsection