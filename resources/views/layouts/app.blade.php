<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', $settings?->seo_titre ?: 'LLABB TECH GROUP - Digital, Technologie, IA, Marketing')</title>
    <meta name="description" content="@yield('description', $settings?->seo_description ?: 'LLABB TECH GROUP - Entreprise spécialisée dans le numérique, la technologie, l\'intelligence artificielle et le marketing digital.')">
    

    <link rel="icon" type="image/png" href="{{ asset('assets/images/logo-transparent-01.png') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/universal-slider.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/hover3d-effects.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/auto-progress-bar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/globals.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <style>
        /* Sous-menus de l'en-tête (scopés sur .nav-menu .has-submenu) */
        .nav-menu .has-submenu { position: relative; }
        .nav-menu .has-submenu > .submenu-wrap {
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }
        .nav-menu .submenu-toggle {
            background: none;
            border: none;
            padding: 4px;
            cursor: pointer;
            color: inherit;
            display: inline-flex;
            align-items: center;
        }
        .nav-menu .submenu-toggle svg {
            width: 12px;
            height: 12px;
            transition: transform .2s ease;
        }
        .nav-menu .submenu {
            list-style: none;
            margin: 0;
            padding: 8px 0;
            position: absolute;
            top: 100%;
            left: 0;
            min-width: 180px;
            background: #072066;
            border: 1px solid rgba(255,255,255,0.15);
            border-radius: 8px;
            box-shadow: 0 10px 24px rgba(0,0,0,0.25);
            opacity: 0;
            visibility: hidden;
            transform: translateY(6px);
            transition: opacity .2s ease, transform .2s ease, visibility .2s ease;
            z-index: 50;
        }
        .nav-menu .submenu li { display: block; margin: 0; }
        .nav-menu .submenu a {
            display: block;
            padding: 10px 18px;
            color: #fff;
            font-size: 0.92rem;
            white-space: nowrap;
        }
        .nav-menu .submenu a:hover { background: rgba(255,255,255,0.1); }

        @media (min-width: 992px) {
            .nav-menu .has-submenu:hover > .submenu,
            .nav-menu .has-submenu:focus-within > .submenu {
                opacity: 1;
                visibility: visible;
                transform: translateY(0);
            }
            .nav-menu .has-submenu:hover .submenu-toggle svg { transform: rotate(180deg); }
        }

        @media (max-width: 991px) {
            .nav-menu .submenu {
                position: static;
                display: none;
                opacity: 1;
                visibility: visible;
                transform: none;
                box-shadow: none;
                border: none;
                background: transparent;
                padding: 0 0 0 16px;
            }
            .nav-menu .has-submenu.open > .submenu { display: block; }
            .nav-menu .has-submenu.open .submenu-toggle svg { transform: rotate(180deg); }
        }

        /* Sélecteur de langue */
        .lang-switcher {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            margin-right: 12px;
        }
        .lang-switcher a {
            font-size: 0.8rem;
            font-weight: 600;
            padding: 4px 7px;
            border-radius: 4px;
            color: inherit;
            opacity: 0.65;
            text-decoration: none;
            transition: opacity .2s ease, background .2s ease;
        }
        .lang-switcher a:hover { opacity: 1; }
        .lang-switcher a.active {
            opacity: 1;
            background: rgba(30, 136, 229, 0.18);
        }
    </style>
</head>
<body class="body-1">
    <div id="particles-js" class="particles-background"></div>

    <div id="page-loader" class="page-loader">
        <div class="loader-container">
            <div class="loader-content">
                <div class="loader-spinner">
                    <div class="spinner-ring">
                        <div></div>
                    </div>
                </div>
                <div class="loader-progress">
                    <div class="progress-bar"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Header -->
    <header class="header">
        <div class="container d-flex-between">
            <div class="logo position-relative">
                <img class="image" src="{{ asset('assets/images/logo-transparent-01.png') }}" alt="Logo">
                <a class="overlay-link" href="{{ route('home') }}"></a>
            </div>

            <nav class="navbar" id="navbar">
                <ul class="nav-menu">
                    <li><a href="{{ route('home') }}" class="nav-link">{{ __('Accueil') }}</a></li>
                    <li><a href="{{ route('about') }}" class="nav-link">{{ __('À propos') }}</a></li>

                    <li class="has-submenu">
                        <span class="submenu-wrap">
                            <a href="{{ route('services') }}" class="nav-link">{{ __('Services') }}</a>
                            <button type="button" class="submenu-toggle" aria-label="{{ __('Ouvrir le sous-menu Services') }}">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
                            </button>
                        </span>
                        <ul class="submenu">
                            <li><a href="{{ route('pricing') }}">{{ __('Tarifs') }}</a></li>
                        </ul>
                    </li>

                    <li class="has-submenu">
                        <span class="submenu-wrap">
                            <a href="{{ route('team') }}" class="nav-link">{{ __('Équipe') }}</a>
                            <button type="button" class="submenu-toggle" aria-label="{{ __('Ouvrir le sous-menu Équipe') }}">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
                            </button>
                        </span>
                        <ul class="submenu">
                            <li><a href="{{ route('portfolio') }}">{{ __('Portfolio') }}</a></li>
                        </ul>
                    </li>

                    <li><a href="{{ route('blog') }}" class="nav-link">{{ __('Blog') }}</a></li>
                    @if (Route::has('nouvelles'))
                        <li><a href="{{ route('nouvelles') }}" class="nav-link">{{ __('Nouvelles') }}</a></li>
                    @endif
                    <li><a href="{{ route('contact') }}" class="nav-link">{{ __('Contact') }}</a></li>
                </ul>
            </nav>

            <div class="actions d-flex-center">
                <div class="lang-switcher">
                    @foreach (['fr' => 'FR', 'en' => 'EN', 'es' => 'ES'] as $code => $label)
                        <a href="{{ route('lang.switch', $code) }}" class="{{ app()->getLocale() === $code ? 'active' : '' }}">{{ $label }}</a>
                    @endforeach
                </div>
                <a href="#" class="btn btn-get-quotes">{{ __('Demander un devis') }}</a>
                <div class="theme-switcher">
                    <button id="theme-toggle" class="theme-toggle-btn" aria-label="{{ __('Basculer le mode sombre') }}">
                        <svg id="theme-toggle-light-icon" class="sun-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2.25a.75.75 0 01.75.75v2.25a.75.75 0 01-1.5 0V3a.75.75 0 01.75-.75zM7.5 12a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM18.894 6.106a.75.75 0 00-1.06-1.06l-1.591 1.59a.75.75 0 101.06 1.061l1.591-1.59zM21.75 12a.75.75 0 01-.75.75h-2.25a.75.75 0 010-1.5H21a.75.75 0 01.75.75zM17.894 17.894a.75.75 0 001.06-1.06l-1.59-1.591a.75.75 0 10-1.061 1.06l1.59 1.591zM12 18a.75.75 0 01.75.75v2.25a.75.75 0 01-1.5 0v-2.25A.75.75 0 0112 18zM7.894 17.894a.75.75 0 00-1.06-1.06l-1.591 1.59a.75.75 0 101.06 1.061l1.591-1.59zM4.5 12a.75.75 0 01-.75.75H1.5a.75.75 0 010-1.5h2.25a.75.75 0 01.75.75zM6.106 6.106a.75.75 0 001.06-1.06l-1.59-1.591a.75.75 0 00-1.061 1.06l1.59 1.591z"/></svg>
                        <svg id="theme-toggle-dark-icon" class="moon-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path fill-rule="evenodd" d="M9.528 1.718a.75.75 0 01.162.819A8.97 8.97 0 009 6a9 9 0 009 9 8.97 8.97 0 004.463-.69a.75.75 0 01.981.981A10.501 10.501 0 0118 19.5a10.5 10.5 0 01-10.5-10.5 10.5 10.5 0 011.718-5.528.75.75 0 01.81-.162z" clip-rule="evenodd" /></svg>
                    </button>
                </div>
            </div>

            <button class="mobile-menu-toggle" id="mobile-menu-toggle">
                <span class="hamburger-line"></span>
                <span class="hamburger-line"></span>
                <span class="hamburger-line"></span>
            </button>
        </div>
    </header>

    @yield('content')

    <!-- Footer -->
    <footer class="footer pt-5 pb-5">
        <div class="footer-main">
            <div class="container">
                <div class="footer-content">
                    <div class="footer-section footer-about">
                        <div class="footer-logo">
                           <img src="{{ asset('assets/images/logo-transparent-01.png') }}" alt="LLABB TECH GROUP Logo" style="height: 42px; width: auto; max-width: 160px;">
                        </div>
                        <p class="footer-description">
                            {{ __('LLABB TECH GROUP accompagne les entreprises avec des solutions numériques, technologiques et d\'intelligence artificielle innovantes.') }}
                        </p>
                    </div>

                    <div class="footer-section footer-links">
                        <h4 class="footer-title">{{ __('Navigation') }}</h4>
                        <ul class="footer-menu">
                            <li><a href="{{ route('home') }}" class="footer-link">{{ __('Accueil') }}</a></li>
                            <li><a href="{{ route('about') }}" class="footer-link">{{ __('À propos') }}</a></li>
                            <li><a href="{{ route('team') }}" class="footer-link">{{ __('Équipe') }}</a></li>
                            <li><a href="{{ route('services') }}" class="footer-link">{{ __('Services') }}</a></li>
                            <li><a href="{{ route('portfolio') }}" class="footer-link">{{ __('Portfolio') }}</a></li>
                            <li><a href="{{ route('blog') }}" class="footer-link">{{ __('Blog') }}</a></li>
                            @if (Route::has('nouvelles'))
                                <li><a href="{{ route('nouvelles') }}" class="footer-link">{{ __('Nouvelles') }}</a></li>
                            @endif
                            <li><a href="{{ route('pricing') }}" class="footer-link">{{ __('Tarifs') }}</a></li>
                            <li><a href="{{ route('temoignages') }}" class="footer-link">{{ __('Témoignages') }}</a></li>
                            <li><a href="{{ route('faq') }}" class="footer-link">{{ __('FAQ') }}</a></li>
                            <li><a href="{{ route('legal') }}" class="footer-link">{{ __('Mentions légales') }}</a></li>
                        </ul>
                    </div>

<div class="footer-section footer-contact">
    <h4 class="footer-title">{{ __('Contact') }}</h4>
    <div class="footer-contact-info">
        <div class="contact-item">
            <div class="contact-text">
                <span class="contact-label">{{ __('Email') }}</span>
                <span class="contact-value">{{ $settings?->email_contact ?: 'contact@llabbtechgroup.com' }}</span>
            </div>
        </div>
        @if ($settings?->telephone)
            <div class="contact-item">
                <div class="contact-text">
                    <span class="contact-label">{{ __('Téléphone') }}</span>
                    <span class="contact-value">{{ $settings->telephone }}</span>
                </div>
            </div>
        @endif
        @if ($settings?->adresse)
            <div class="contact-item">
                <div class="contact-text">
                    <span class="contact-label">{{ __('Adresse') }}</span>
                    <span class="contact-value">{{ $settings->adresse }}</span>
                </div>
            </div>
        @endif
    </div>

    <div class="social-links" style="margin-top:16px;">
        @include('partials.social-links', ['s' => $settings])
    </div>
</div>

                    <div class="footer-section footer-newsletter">
    <h4 class="footer-title">{{ __('Newsletter') }}</h4>
    <p class="newsletter-description">{{ __('Abonnez-vous pour recevoir nos actualités et conseils tech.') }}</p>
    <form class="newsletter-form" id="footerNewsletterForm" action="{{ route('newsletter.subscribe') }}" method="POST">
    @csrf
        <div class="newsletter-input-group">
           <input type="email" name="email" class="newsletter-input" placeholder="{{ __('Entrez votre adresse e-mail') }}" required>
            <button type="submit" class="newsletter-btn" style="display:flex; align-items:center; justify-content:center; font-size:0.85rem; font-weight:600;">
    {{ __('OK') }}
</button>
        </div>
    </form>

    <div class="footer-copyright">
        <p>LLABB TECH GROUP © {{ date('Y') }}</p>
    </div>
</div>
                </div>
            </div>
        </div>
    </footer>

    <button class="scroll-to-top" id="scrollToTop" aria-label="{{ __('Retour en haut') }}">
        <svg viewBox="0 0 24 24">
            <path d="M7 14l5-5 5 5z"/>
        </svg>
    </button>

    <script src="{{ asset('assets/lib/particles/particles.min.js') }}"></script>
    <script src="{{ asset('assets/lib/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/lib/hover3dBgEffects/hover3d-bg-effects.js') }}"></script>
    <script src="{{ asset('assets/lib/typed/typed.umd.js') }}"></script>

    <script src="{{ asset('assets/js/custom-isotope.js') }}"></script>
    <script src="{{ asset('assets/js/testimonials.js') }}"></script>
    <script src="{{ asset('assets/js/auto-progress-bar.js') }}"></script>
    <script src="{{ asset('assets/js/animate-counters.js') }}"></script>
    <script src="{{ asset('assets/js/universal-slider.js') }}"></script>
    <!-- <script src="{{ asset('assets/js/contact-form-demo.js') }}"></script> -->

    <script src="{{ asset('assets/data/particles-config.js') }}"></script>
    <script src="{{ asset('assets/data/services.js') }}"></script>

    <script src="{{ asset('assets/js/main-01.js') }}"></script>

    <script>
    window.addEventListener('load', () => {
        setTimeout(() => {
            if (typeof AOS !== 'undefined') {
                AOS.init({
                    duration: 800,
                    delay: 100,
                    once: false,
                    mirror: true,
                    offset: 50,
                    easing: 'ease-out-cubic'
                });
            }
        }, 2000);
    });

    // Sous-menus : ouverture au clic sur la flèche (mobile)
    document.querySelectorAll('.nav-menu .submenu-toggle').forEach(function (btn) {
        btn.addEventListener('click', function (e) {
            e.preventDefault();
            e.stopPropagation();
            btn.closest('.has-submenu').classList.toggle('open');
        });
    });
    </script>

    @yield('scripts')
</body>
</html>