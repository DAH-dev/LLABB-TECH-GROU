@extends('layouts.app')

@section('title', 'Contact - LLABB TECH GROUP')

@section('content')

@include('partials.page-header', [
    'title' => 'Contactez-nous',
    'description' => 'Parlons de votre projet. Notre équipe vous répond sous 24h.'
])

<div class="main d-flex-center pt-8 pb-8">
    <div class="container main-content">
        <section class="contact-form pt-5">
            <div class="contact-form-container" data-aos="fade-up" data-aos-delay="100">

                <div class="contact-form-content">
                    <!-- Contact Info -->
                    <div class="contact-info-card">
                        <div class="contact-info-header">
                            <h3>Discutons de votre projet</h3>
                            <p>Construisons ensemble l'avenir de votre entreprise. Contactez nos experts et démarrez votre transformation digitale dès aujourd'hui.</p>
                        </div>

                        <div class="contact-details">
                            <div class="contact-detail-item">
                                <div class="contact-icon">
                                    <svg><use xlink:href="#phone"></use></svg>
                                </div>
                                <div class="contact-text">
                                    <span class="label">Téléphone</span>
                                    <span class="value">{{ $settings?->telephone ?: '+225 00 00 00 00 00' }}</span>
                                </div>
                            </div>

                            <div class="contact-detail-item">
                                <div class="contact-icon">
                                    <svg><use xlink:href="#envelope-1"></use></svg>
                                </div>
                                <div class="contact-text">
                                    <span class="label">Email</span>
                                    <span class="value">{{ $settings?->email_contact ?: 'contact@llabbtechgroup.com' }}</span>
                                </div>
                            </div>

                            <div class="contact-detail-item">
                                <div class="contact-icon">
                                    <svg><use xlink:href="#map-marker-1"></use></svg>
                                </div>
                                <div class="contact-text">
                                    <span class="label">Adresse</span>
                                    <span class="value">{{ $settings?->adresse ?: 'Abidjan, Côte d\'Ivoire' }}</span>
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

                        @if ($settings?->lien_twitter || $settings?->lien_facebook || $settings?->lien_linkedin || $settings?->lien_instagram)
    <div class="contact-social">
        <span class="social-label">Suivez-nous</span>
        <div class="social-links">
           @include('partials.social-links', ['s' => $settings, 'small' => true])
        </div>
    </div>
@endif
                    </div>

                    <!-- Contact Form -->
                    <div class="contact-form-card">
                        <form id="contactForm" action="{{ route('contact.store') }}" method="POST" class="contact-form-fields">
                            @csrf
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

                            <div class="form-group">
                                <label for="name" class="form-label">Nom complet *</label>
                                <input type="text" id="name" name="name" class="form-input" required>
                            </div>

                            <div class="form-group">
                                <label for="email" class="form-label">Adresse email *</label>
                                <input type="email" id="email" name="email" class="form-input" required>
                            </div>

                            <div class="form-group">
                                <label for="phone" class="form-label">Téléphone</label>
                                <input type="tel" id="phone" name="phone" class="form-input">
                            </div>

                            <div class="form-group">
                                <label for="company" class="form-label">Entreprise</label>
                                <input type="text" id="company" name="company" class="form-input">
                            </div>

                            <div class="form-group">
                                <label for="service" class="form-label">Service concerné</label>
                                <select id="service" name="service" class="form-select">
                                    <option value="">Sélectionnez un service</option>
                                    <option value="developpement-digital">Développement digital</option>
                                    <option value="solutions-it">Solutions IT</option>
                                    <option value="intelligence-artificielle">Intelligence Artificielle</option>
                                    <option value="marketing-communication">Marketing & Communication</option>
                                    <option value="conseil-innovation">Conseil & Innovation</option>
                                    <option value="autre">Autre</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="budget" class="form-label">Budget du projet</label>
                                <select id="budget" name="budget" class="form-select">
                                    <option value="">Sélectionnez une fourchette</option>
                                    <option value="moins-500k">Moins de 500 000 FCFA</option>
                                    <option value="500k-1.5m">500 000 - 1 500 000 FCFA</option>
                                    <option value="1.5m-5m">1 500 000 - 5 000 000 FCFA</option>
                                    <option value="plus-5m">Plus de 5 000 000 FCFA</option>
                                </select>
                            </div>

                            <div class="form-group form-group-full">
                                <label for="message" class="form-label">Détails du projet *</label>
                                <textarea id="message" name="message" class="form-textarea" rows="5" placeholder="Décrivez-nous votre projet, vos objectifs et vos besoins spécifiques..." required></textarea>
                            </div>

                            <div class="form-group form-group-full">
                                <label class="form-checkbox-container">
                                    <input type="checkbox" name="newsletter" class="form-checkbox">
                                    <span class="form-checkmark"></span>
                                    <span class="form-checkbox-text">S'abonner à notre newsletter pour recevoir nos actualités</span>
                                </label>
                            </div>

                            <div class="form-group form-group-full">
                                <label class="form-checkbox-container">
                                    <input type="checkbox" name="privacy" class="form-checkbox" required>
                                    <span class="form-checkmark"></span>
                                    <span class="form-checkbox-text">J'accepte la politique de confidentialité *</span>
                                </label>
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

        <section class="pt-8">
            <div style="border-radius: 12px; overflow: hidden;">
                <iframe
                    src="https://www.google.com/maps?q={{ urlencode($settings?->adresse ?: "Abidjan, Côte d'Ivoire") }}&output=embed"
                    width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy">
                </iframe>
            </div>
        </section>
    </div>
</div>

@endsection