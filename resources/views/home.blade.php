@extends('layouts.app')

@section('title', $siteSetting?->seo_titre ?: 'LLABB TECH GROUP - Accueil')

@section('content')


    <!-- Hero -->
    <section class="hero container flex-column-center p-3">
        <div class="hero-content-home-1">
            <div class="hero-info">
                <div class="hero-info-content flex-column-center pb-5">
                    <h2 class="text-white heading-hero text-shadow" 
                        data-aos="fade-down" 
                        data-aos-duration="800" 
                        data-aos-delay="100">
                        Excellence en Solutions Technologiques
                    </h2>

                    <div data-aos="fade-right" 
                     data-aos-duration="600" 
                     data-aos-delay="300">
                        <h3 class="text-primary text-shadowl--letterpress">
                            In <span id="typed-element"></span>
                        </h3>
                    </div>
                    
                    <p class="text-white w-75 text-shadow--strong" 
                    data-aos="fade-up" 
                    data-aos-duration="600" 
                    data-aos-delay="500">
                        Nous vous aidons à grandir grâce à la stratégie, la créativité et la technologie.
                    </p>
                </div>

                <div class="cta w-100">
                    <div class="social-links pb-4 d-flex-between" 
                        data-aos="fade-in" 
                        data-aos-duration="400">
                        @include('partials.social-links', ['s' => $siteSetting, 'small' => true])
                    </div>

                    <div class="cta-buttons w-100 d-flex gap-4">
                        <a href="pages/contact-us.html" class="btn btn-get-quotes" 
                        data-aos="fade-right" 
                        data-aos-duration="500" 
                        data-aos-delay="900">
                            Demander un devis
                        </a>
                        <a href="pages/contact-us.html" class="btn btn-outline" 
                        data-aos="fade-left" 
                        data-aos-duration="500" 
                        data-aos-delay="950">
                            Commencer
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main 1 -->
    <div class="main d-flex-center pt-8 pb-8">
        <!-- Main Content -->
        <div class="container main-content">
            <!-- Services section -->
            <section class="service-cards-modern">
                <div class="d-flex-baseline-between pb-5" 
                    data-aos="fade-down" 
                    data-aos-duration="600" 
                    data-aos-delay="0">
                    <h2>Nos Services</h2>
                    <a href="pages/services.html" class="btn btn-primary">Voir les services</a>
                </div>

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
            <a class="overlay-link" href="javascript:void(0)"></a>
        </div>
    @endforeach
</div>
            </section>

            <!-- About Our Company section -->
            <section class="about-our-company">
                <div class="about-info pb-4" 
                    data-aos="fade-right" 
                    data-aos-duration="600" 
                    data-aos-delay="0">
                    <div class="about-texts pb-4">
                        <h4 class="text-accent">À propos de notre entreprise</h4>
                        <h2 class="about-info-title">Nous sommes passionnés par une qualité qui transforme votre entreprise.</h2>
                        <p>{{ $siteSetting->texte_a_propos }}</p>
                    </div>
                    
<div class="about-progress">
    <div class="custom-progress" data-progress
        data-label="{{ $siteSetting->competence_1_nom }}"
        data-percentage="{{ $siteSetting->competence_1_pourcentage }}"
        data-color="var(--color-primary)"
        data-bg="var(--color-text-primary)"
        data-text-color="var(--color-text-primary)">
    </div>

    <div class="custom-progress" data-progress
        data-label="{{ $siteSetting->competence_2_nom }}"
        data-percentage="{{ $siteSetting->competence_2_pourcentage }}"
        data-color="var(--color-primary)"
        data-bg="var(--color-text-primary)"
        data-text-color="var(--color-text-primary)">
    </div>

    <div class="custom-progress" data-progress
        data-label="{{ $siteSetting->competence_3_nom }}"
        data-percentage="{{ $siteSetting->competence_3_pourcentage }}"
        data-color="var(--color-primary)"
        data-bg="var(--color-text-primary)"
        data-text-color="var(--color-text-primary)">
    </div>
</div>
                </div>

                <div class="about-image" 
                    data-hover-3d 
                    data-aos="fade-left" 
                    data-aos-duration="600" 
                    data-aos-delay="0">
                    <img src="{{ asset('assets/images/backgrounds/computer-code.png') }}" alt="About Image">
                </div>
            </section>
        </div>
    </div>

    <!-- Counting info section -->
    <section class="counting-info container">
        <div class="counting-content">
            <div class="info" 
                data-aos="fade-down" 
                data-aos-delay="100">
                <h2 class="title">Plus de <span class="subinfo">{{ $siteSetting->annees_experience }} ans</span> d'expérience</h2>
                <p class="text">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                    Blanditiis quod veniam temporibus eaque, a neque nulla.
                </p>

                <a href="javascript:void(0)" class="btn btn-outline" 
                    data-aos="fade-right" 
                    data-aos-duration="500" 
                    data-aos-delay="950">
                    Commencer
                </a>
            </div>
<div class="box-counting">
    <div class="counts" data-aos="fade-down" data-aos-delay="100">
        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
            <path d="M9 18h6"/>
            <path d="M10 21h4"/>
            <path d="M12 3a6 6 0 0 0-4 10.5c.6.55 1 1.4 1 2.2V17h6v-1.3c0-.8.4-1.65 1-2.2A6 6 0 0 0 12 3z"/>
        </svg>
        <span class="number" data-counter>{{ $siteSetting->nb_projets }}+</span>
        <span class="label">Projets réalisés</span>
    </div>
       <div class="counts" data-aos="fade-up" data-aos-delay="100">
        <svg width="32" height="32" viewBox="0 0 24 24" fill="currentColor">
            <rect x="1" y="10.5" width="9" height="4.5" rx="2.2" transform="rotate(-18 5.5 12.75)"/>
            <rect x="14" y="10.5" width="9" height="4.5" rx="2.2" transform="rotate(18 18.5 12.75)"/>
            <polygon points="9.5,11 12,8.7 14.5,11 12,13.3"/>
        </svg>
        <span class="number" data-counter>{{ $siteSetting->nb_clients }}+</span>
        <span class="label">Clients satisfaits</span>
    </div>
    <div class="counts" data-aos="fade-down" data-aos-delay="100">
        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
            <path d="M21 15a2 2 0 0 1-2 2H8l-5 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
            <path d="M7 8h10"/>
            <path d="M7 12h6"/>
        </svg>
        <span class="number" data-counter>{{ $siteSetting->nb_tickets_resolus }}+</span>
        <span class="label">Tickets résolus</span>
    </div>
</div>
        </div>
    </section>

    <!-- Main 2 -->
    <div class="main d-flex-center pt-8 pb-8">
        <!-- Main Content 2 -->
        <div class="container main-content">
            <!-- Process section -->
            <!-- Process section -->
            <section class="step-info">
                <div class="d-flex-center pb-5"
                    data-aos="fade-down" 
                    data-aos-duration="600" 
                    data-aos-delay="0">
                    <h2 class="heading-lg">Notre Processus</h2>
                </div>

                <div class="box-step-info">
                    <!-- Step 1 -->
                    <div class="step up">
                        <div class="process-info d-flex-center"
                        data-aos="fade-down"
                        data-aos-delay="100">
                            <div class="process-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M9 6 4 12l5 6"/>
                                    <path d="M15 5l-4 14"/>
                                    <path d="M17 6l5 6-5 6"/>
                                </svg>
                            </div>
                            <div class="process-text">
                                <span class="text text-shadowl--white">1. NOUS ANALYSONS ET PLANIFIONS</span>
                                <p>Nous analysons vos besoins et élaborons une stratégie complète adaptée aux objectifs de votre entreprise.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Step 2 -->
                    <div class="step right">
                        <div class="process-info d-flex-center"
                        data-aos="fade-left"
                        data-aos-delay="150">
                            <div class="process-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="4" width="18" height="13" rx="2"/>
                                    <path d="M8 21h8M12 17v4"/>
                                    <path d="M9.5 9 7.5 11.5 9.5 14"/>
                                    <path d="M14.5 9l2 2.5-2 2.5"/>
                                </svg>
                            </div>
                            <div class="process-text">
                                <span class="text text-shadowl--white">2. NOUS CO-CRÉONS ET DÉVELOPPONS</span>
                                <p>Ensemble, nous construisons des solutions innovantes en utilisant des technologies de pointe et les meilleures pratiques.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Central Image -->
                    <div class="central-image">
                        <img class="image" src="{{ asset('assets/images/backgrounds/process.jpg') }}" alt="Process">
                    </div>

                    <!-- Step 3 -->
                    <div class="step down">
                        <div class="process-info d-flex-center"
                        data-aos="fade-up"
                        data-aos-delay="200">
                            <div class="process-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M20 11a8 8 0 0 0-14.93-4"/>
                                    <path d="M8 4v3H5"/>
                                    <path d="M4 13a8 8 0 0 0 14.93 4"/>
                                    <path d="M16 20v-3h3"/>
                                    <circle cx="12" cy="10.5" r="1.8"/>
                                    <path d="M8.8 16.2c0-1.9 1.4-3.2 3.2-3.2s3.2 1.3 3.2 3.2"/>
                                </svg>
                            </div>
                            <div class="process-text">
                                <span class="text text-shadowl--white">3. NOUS ACCOMPAGNONS ET GARANTISSONS</span>
                                <p>Nous assurons un support et une maintenance continus pour garantir que votre solution reste performante dans la durée.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Step 4 -->
                    <div class="step left">
                        <div class="process-info d-flex-center"
                        data-aos="fade-right"
                        data-aos-delay="250">
                           <div class="process-icon">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path d="m11 17 2 2a1 1 0 1 0 3-3"/>
        <path d="m14 14 2.5 2.5a1 1 0 1 0 3-3l-3.88-3.88a3 3 0 0 0-4.24 0l-.88.88a1 1 0 1 1-3-3l2.81-2.81a5.79 5.79 0 0 1 7.06-.87l.47.28a2 2 0 0 0 1.42.25L21 4"/>
        <path d="m21 3 1 11h-2"/>
        <path d="M3 3 2 14l6.5 6.5a1 1 0 1 0 3-3"/>
        <path d="M3 4h8"/>
    </svg>
</div>
                            <div class="process-text">
                                <span class="text text-shadowl--white">4. NOUS LIVRONS ET LANÇONS</span>
                                <p>Nous déployons votre solution après des tests rigoureux, pour une mise en œuvre sans accroc.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Portfolio section -->
            <section class="portfolio pt-8">
                <div class="d-flex-center pb-5"
                    data-aos="fade-down" 
                    data-aos-duration="600" 
                    data-aos-delay="0">
                    <h2 class="heading-lg">Notre Portfolio</h2>
                </div>

                <div class="portfolio-isotope" 
                    data-aos="fade-up" 
                    data-aos-delay="100">
                    
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
            <a class="overlay-link" href="javascript:void(0)"></a>
        </div>
    @endforeach
</div>
                </div>
            </section>
        </div>
    </div>

    <!-- Client company section -->
    <section class="client-companies container pt-8 pb-8">
        <div class="text-center mt-6 mb-6" 
            data-aos="fade-up" 
            data-aos-duration="600">
            <h2 class="text-white">Bâtir le succès avec de grandes entreprises</h2>
        </div>

        <div class="customers-carousel universal-slider">
    @foreach ($partners as $partner)
        <div class="client-company">
            <img class="image" src="{{ asset('assets/images/companies/' . $partner->logo) }}" alt="{{ $partner->nom }}">
        </div>
    @endforeach
    @foreach ($partners as $partner)
        <div class="client-company">
            <img class="image" src="{{ asset('assets/images/companies/' . $partner->logo) }}" alt="{{ $partner->nom }}">
        </div>
    @endforeach
</div>
    </section>

    <!-- Main 3 -->
    <div class="main d-flex-center pt-8 pb-8">
        <!-- Main Content 3 -->
        <div class="container main-content">
            <!-- Pricing Plans section -->
<section class="pricing-plants">
    <div class="text-center pb-5"
        data-aos="fade-down"
        data-aos-duration="600"
        data-aos-delay="0">
        <h2 class="heading-lg">Nos tarifs</h2>
        <p>Des offres claires et adaptées à la taille de votre projet.</p>
    </div>

    <div class="options-plants">
        @foreach ($pricingPlans as $plan)
            <div class="plants {{ $plan->plus_populaire ? 'most-popular' : '' }}"
                data-aos="fade-up"
                data-aos-delay="100">
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
                        @foreach ($plan->fonctionnalites ?? [] as $feature)
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

    <!-- Testimonials section -->
    <section class="testimonials container pt-8 pb-8">
        <div class="text-center pb-5"
            data-aos="fade-down" 
            data-aos-duration="600" 
            data-aos-delay="0">
            <h2 class="heading-lg text-white">Témoignages</h2>
            <p class="text-white">La confiance de nos clients et partenaires envers notre qualité.</p>
        </div>

<div class="testimonials-grid p-2" data-testimonials="home" data-aos="fade-up" data-aos-delay="100">
    @foreach ($testimonials as $testimonial)
        <div class="comment" data-comment>
            <div class="d-flex flex-column gap-2">
               <svg class="quote-icon" viewBox="0 0 24 24" fill="currentColor">
                <path d="M6,17h3l2,-4V7H5v6h3L6,17z M14,17h3l2,-4V7h-6v6h3L14,17z"/>
                  </svg>
                <div class="message">
                    <p class="text">{{ $testimonial->texte }}</p>
                </div>
                <div class="info-user">
                    <div class="image">
                        <img src="{{ $testimonial->photo ? asset('assets/images/testimonials/' . $testimonial->photo) : asset('assets/images/testimonials/face-01.png') }}" alt="{{ $testimonial->nom_client }}">
                    </div>
                    <div class="info">
                        <span class="name">{{ $testimonial->nom_client }}</span>
                        <span class="role">{{ $testimonial->entreprise }}</span>
                        <div class="rating">
                            @for ($i = 0; $i < $testimonial->note; $i++)
                               <svg class="star" viewBox="0 0 24 24" fill="currentColor">
                               <path d="M12 2l3.09 6.26L22 9.27l-5 4.87L18.18 21 12 17.27 5.82 21 7 14.14l-5-4.87 6.91-1.01L12 2z"/>
                               </svg>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
    </section>

    <!-- Main 4 -->
    <div class="main d-flex-center pt-10 pb-8">
        <!-- Main Content -->
        <div class="container main-content">
            <!-- Blog section -->
            <section class="blog no-blog-sidebar">
                <div class="d-flex-baseline-between pb-5" 
                    data-aos="fade-down" 
                    data-aos-duration="600" 
                    data-aos-delay="0">
                    <h2>Derniers articles du blog</h2>
                    <a href="pages/blog/blog-column-2.html" class="btn btn-primary">Voir tous les articles</a>
                </div>

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
                    <a href="javascript:void(0)" class="read-more">
                        Lire la suite
                        <svg><use xlink:href="#arrow-right"></use></svg>
                    </a>
                </div>
            </div>
            <a class="overlay-link" href="javascript:void(0)"></a>
        </article>
    @endforeach
</div>
            </section>
            
            <!-- Contact Form section -->
            <section class="contact-form pt-5">
                <div class="d-flex-center pb-5"
                    data-aos="fade-down" 
                    data-aos-duration="600" 
                    data-aos-delay="0">
                    <h2 class="heading-lg">Contactez-nous</h2>
                </div>

                <div class="contact-form-container"
                    data-aos="fade-up" 
                    data-aos-delay="100">
                    
                    <div class="contact-form-content">
                        <!-- Contact Info -->
                        <div class="contact-info-card">
                            <div class="contact-info-header">
                                <h3>Démarrons une conversation</h3>
                                <p>Construisons ensemble l'avenir de votre entreprise. Contactez nos experts et démarrez votre transformation digitale dès aujourd'hui.</p>
                            </div>

                            <div class="contact-details">
                                <div class="contact-detail-item">
                                    <div class="contact-icon">
                                        <svg><use xlink:href="#phone"></use></svg>
                                    </div>
                                    <div class="contact-text">
                                        <span class="label">Téléphone</span>
                                        <span class="value">{{ $siteSetting?->telephone ?: '+225 00 00 00 00 00' }}</span>
                                    </div>
                                </div>

                                <div class="contact-detail-item">
                                    <div class="contact-icon">
                                        <svg><use xlink:href="#envelope-1"></use></svg>
                                    </div>
                                    <div class="contact-text">
                                        <span class="label">Email</span>
                                        <span class="value">{{ $siteSetting?->email_contact ?: 'contact@llabbtechgroup.com' }}</span>
                                    </div>
                                </div>

                                <div class="contact-detail-item">
                                    <div class="contact-icon">
                                        <svg><use xlink:href="#map-marker-1"></use></svg>
                                    </div>
                                    <div class="contact-text">
                                        <span class="label">Adresse</span>
                                        <span class="value">{{ $siteSetting?->adresse ?: 'Abidjan, Côte d\'Ivoire' }}</span>
                                    </div>
                                </div>

                                <div class="contact-detail-item">
                                    <div class="contact-icon">
                                        <svg><use xlink:href="#alarm-1"></use></svg>
                                    </div>
                                    <div class="contact-text">
                                        <span class="label">Horaires</span>
                                        <span class="value">Lun - Ven : 8h - 18h</span>
                                    </div>
                                </div>
                            </div>

@if ($siteSetting?->lien_twitter || $siteSetting?->lien_facebook || $siteSetting?->lien_linkedin || $siteSetting?->lien_instagram)
    <div class="contact-social">
        <span class="social-label">Suivez-nous</span>
        <div class="social-links">
           @include('partials.social-links', ['s' => $siteSetting, 'small' => true])
        </div>
    </div>
@endif
                        </div>

                        <!-- Contact Form -->
                        <div class="contact-form-card">
                            <form id="contactForm" action="{{ route('contact.store') }}" method="POST" class="contact-form-fields">
    @csrf
                                <!-- Message sending notification -->
                                <div class="form-status">
    @if (session('success'))
        <div class="form-success" style="display: block;">
            <svg><use xlink:href="#lni-checkmark-circle"></use></svg>
            <span>{{ session('success') }}</span>
        </div>
    @endif
    @if ($errors->any())
        <div class="form-error-general" style="display: block;">
            <svg><use xlink:href="#lni-warning"></use></svg>
            <span>Merci de vérifier les champs du formulaire.</span>
        </div>
    @endif
</div>

                                <!-- Form fields -->
                                <div class="form-group">
                                    <label for="name" class="form-label">Nom complet *</label>
                                    <input type="text" id="name" name="name" class="form-input" required>
                                    <span class="form-error" id="name-error"></span>
                                </div>

                                <div class="form-group">
                                    <label for="email" class="form-label">Adresse email *</label>
                                    <input type="email" id="email" name="email" class="form-input" required>
                                    <span class="form-error" id="email-error"></span>
                                </div>

                                <div class="form-group">
                                    <label for="phone" class="form-label">Téléphone</label>
                                    <input type="tel" id="phone" name="phone" class="form-input">
                                    <span class="form-error" id="phone-error"></span>
                                </div>

                                <div class="form-group">
                                    <label for="company" class="form-label">Entreprise</label>
                                    <input type="text" id="company" name="company" class="form-input">
                                </div>

                                <div class="form-group">
                                    <label for="service" class="form-label">Service concerné</label>
                                    <select id="service" name="service" class="form-select">
                                        <option value="">Sélectionnez un service</option>
                                        <option value="web-development">Développement Web</option>
                                        <option value="mobile-app">Développement d'application mobile</option>
                                        <option value="cloud-solutions">Solutions Cloud</option>
                                        <option value="digital-marketing">Marketing Digital</option>
                                        <option value="ui-ux-design">Design UI/UX</option>
                                        <option value="data-analytics">Analyse de données</option>
                                        <option value="other">Autre</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="budget" class="form-label">Budget du projet</label>
                                    <select id="budget" name="budget" class="form-select">
                                        <option value="">Sélectionnez une fourchette</option>
                                        <option value="under-5k">Moins de 5 000 $</option>
                                        <option value="5k-15k">5 000 $ - 15 000 $</option>
                                        <option value="15k-50k">15 000 $ - 50 000 $</option>
                                        <option value="50k-100k">50 000 $ - 100 000 $</option>
                                        <option value="over-100k">Plus de 100 000 $</option>
                                    </select>
                                </div>

                                <div class="form-group form-group-full">
                                    <label for="message" class="form-label">Détails du projet *</label>
                                    <textarea id="message" name="message" class="form-textarea" rows="5" 
                                    placeholder="Décrivez-nous les besoins de votre projet, vos objectifs et toute fonctionnalité spécifique souhaitée..." required></textarea>
                                    <span class="form-error" id="message-error"></span>
                                </div>

                                <div class="form-group form-group-full">
                                    <label class="form-checkbox-container">
                                        <input type="checkbox" name="newsletter" class="form-checkbox">
                                        <span class="form-checkmark"></span>
                                        <span class="form-checkbox-text">S'abonner à notre newsletter pour recevoir nos actualités et conseils tech</span>
                                    </label>
                                </div>

                                <div class="form-group form-group-full">
                                    <label class="form-checkbox-container">
                                        <input type="checkbox" name="privacy" class="form-checkbox" required>
                                        <span class="form-checkmark"></span>
                                        <span class="form-checkbox-text">J'accepte la <a href="#privacy" class="form-link">politique de confidentialité</a> et les <a href="#terms" class="form-link">conditions d'utilisation</a> *</span>
                                    </label>
                                    <span class="form-error" id="privacy-error"></span>
                                </div>

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-primary form-submit-btn">
                                        <span>Envoyer le message</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    
@endsection