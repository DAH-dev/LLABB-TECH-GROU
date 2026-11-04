@extends('layouts.app')

@section('title', 'Mentions légales & Confidentialité - LLABB TECH GROUP')

@section('content')

<style>
    .legal-hero { padding: 70px 0 40px; border-bottom: 1px solid var(--color-border); background-color: #ffffff; }
    .legal-hero h1 { font-size: clamp(2rem, 5vw, 2.6rem); }
    .legal-hero p.lede { font-style: italic; font-size: 1.1rem; color: var(--color-text-secondary); max-width: 60ch; margin-top: 16px; }
    .legal-hero .disclaimer {
        margin-top: 26px;
        padding: 16px 22px;
        background: rgba(0,0,0,0.03);
        border: 1px solid var(--color-border);
        font-size: 0.88rem;
        color: var(--color-text-secondary);
        max-width: 680px;
    }
    .legal-hero .disclaimer strong { color: inherit; }

    .legal-layout { display: grid; grid-template-columns: 220px 1fr; gap: 56px; padding: 56px 0 80px; background-color: #ffffff; }
    @media (max-width: 850px) { .legal-layout { grid-template-columns: 1fr; } }

    .legal-toc { position: sticky; top: 100px; align-self: start; padding-left: 4px; }
    .legal-toc .toc-title { font-size: 0.78rem; color: var(--color-text-secondary); margin-bottom: 12px; text-transform: uppercase; letter-spacing: 0.05em; }
    .legal-toc ul { list-style: none; margin: 0; padding: 0; }
    .legal-toc li { margin-bottom: 10px; }
    .legal-toc a { text-decoration: none; font-size: 0.9rem; color: var(--color-text-secondary); }
    .legal-toc a:hover { color: var(--color-primary); }
    @media (max-width: 850px) { .legal-toc { position: static; margin-bottom: 24px; } .legal-toc ul { display: flex; flex-wrap: wrap; gap: 16px; } }

    .legal-content h2 { font-size: 1.5rem; margin: 0 0 8px; padding-top: 8px; }
    .legal-content .block { margin-bottom: 48px; padding-top: 20px; border-top: 1px solid var(--color-border); }
    .legal-content .block:first-child { border-top: none; padding-top: 0; }
    .legal-content h3 { font-size: 1.1rem; margin: 28px 0 12px; }
    .legal-content p { margin: 0 0 16px; max-width: 72ch; color: var(--color-text-secondary); }
    .legal-content ul { margin: 0 0 16px; padding-left: 22px; max-width: 72ch; color: var(--color-text-secondary); }
    .legal-content li { margin-bottom: 8px; }
    .legal-content .todo { color: var(--color-primary); }
    .legal-content a { color: var(--color-primary); text-decoration: underline; }

    .cookie-banner {
        position: fixed; left: 20px; right: 20px; bottom: 20px; max-width: 640px; margin: 0 auto;
        background: #ffffff; border: 1px solid var(--color-border);
        box-shadow: 0 8px 24px rgba(16,32,61,0.12); padding: 22px 24px; z-index: 50; display: none;
    }
    .cookie-banner.show { display: block; }
    .cookie-banner p { margin: 0 0 16px; font-size: 0.95rem; color: #1b2a42; }
    .cookie-banner .row { display: flex; gap: 10px; flex-wrap: wrap; }
    .cookie-banner button {
        font-size: 0.85rem; padding: 10px 18px; border: 1px solid var(--color-border);
        background: transparent; color: #1b2a42; cursor: pointer;
    }
    .cookie-banner button.accept { background: var(--color-primary); color: #fff; border-color: var(--color-primary); }
    .cookie-banner button:hover { opacity: 0.85; }
</style>

<section class="legal-hero">
    <div class="container">
        <h1>Mentions légales & confidentialité</h1>
        <p class="lede">Informations légales sur l'éditeur du site et modalités de traitement de vos données personnelles.</p>
        <div class="disclaimer">
            <strong>Contenu type, à faire valider.</strong> Ce texte est un gabarit courant de mentions légales et de politique de confidentialité. Il doit être relu et complété par un professionnel du droit avant publication, afin de garantir sa conformité à la réglementation applicable en Côte d'Ivoire et, le cas échéant, au RGPD pour vos visiteurs européens.
        </div>
    </div>
</section>

<section style="background-color:#ffffff;">
<div class="container legal-layout">

    <nav class="legal-toc">
        <div class="toc-title">Sommaire</div>
        <ul>
            <li><a href="#editeur">Éditeur du site</a></li>
            <li><a href="#hebergement">Hébergement</a></li>
            <li><a href="#propriete">Propriété intellectuelle</a></li>
            <li><a href="#responsabilite">Responsabilité</a></li>
            <li><a href="#donnees">Données personnelles</a></li>
            <li><a href="#droits">Vos droits</a></li>
            <li><a href="#cookies">Cookies</a></li>
            <li><a href="#contact-dpo">Contact</a></li>
        </ul>
    </nav>

    <div class="legal-content">

        <div class="block" id="editeur">
            <h2>Mentions légales</h2>

            <h3>Éditeur du site</h3>
            <p>Le présent site est édité par <span class="todo">[Raison sociale à renseigner]</span>, <span class="todo">[forme juridique]</span> au capital de <span class="todo">[montant]</span>, immatriculée sous le numéro <span class="todo">[RCCM / numéro d'immatriculation]</span>, dont le siège social est situé <span class="todo">[adresse complète]</span>, Abidjan, Côte d'Ivoire.</p>
            <p>Numéro de téléphone : <span class="todo">[à renseigner]</span> — Adresse e-mail : <span class="todo">[à renseigner]</span></p>
            <p>Directeur de la publication : <span class="todo">[nom et fonction à renseigner]</span></p>
        </div>

        <div class="block" id="hebergement">
            <h3>Hébergement</h3>
            <p>Le site est hébergé par <span class="todo">[nom de l'hébergeur]</span>, dont le siège social est situé <span class="todo">[adresse de l'hébergeur]</span>, joignable au <span class="todo">[téléphone / contact hébergeur]</span>.</p>
        </div>

        <div class="block" id="propriete">
            <h3>Propriété intellectuelle</h3>
            <p>L'ensemble des contenus présents sur ce site (textes, images, logos, graphismes, structure) est la propriété de LLABB TECH GROUP, sauf mention contraire, et est protégé par les dispositions applicables en matière de propriété intellectuelle. Toute reproduction, représentation ou diffusion, totale ou partielle, sans autorisation préalable, est interdite.</p>
        </div>

        <div class="block" id="responsabilite">
            <h3>Responsabilité</h3>
            <p>LLABB TECH GROUP s'efforce d'assurer l'exactitude des informations diffusées sur ce site, sans garantir qu'elles soient exemptes d'erreurs ou d'omissions. L'entreprise ne saurait être tenue responsable des dommages directs ou indirects résultant de l'accès ou de l'utilisation du site.</p>
            <h3>Droit applicable</h3>
            <p>Les présentes mentions légales sont soumises au droit ivoirien. En cas de litige, et à défaut de résolution amiable, les tribunaux compétents seront ceux du ressort du siège social de LLABB TECH GROUP.</p>
        </div>

        <div class="block" id="donnees">
            <h2>Politique de confidentialité</h2>

            <h3>Données collectées</h3>
            <p>Dans le cadre de l'utilisation du site, les données suivantes peuvent être collectées :</p>
            <ul>
                <li>Nom, e-mail, téléphone et message, via le formulaire de contact</li>
                <li>Adresse e-mail, via le formulaire d'inscription à la newsletter</li>
                <li>Données de navigation, via les cookies et outils de mesure d'audience</li>
            </ul>

            <h3>Finalités et durée de conservation</h3>
            <p>Ces données sont utilisées pour répondre à vos demandes, vous adresser la newsletter si vous y êtes inscrit(e), et améliorer le site à partir des statistiques de fréquentation. Elles sont conservées pour une durée n'excédant pas ce qui est nécessaire à ces finalités, sauf obligation légale contraire.</p>

            <h3>Destinataires</h3>
            <p>Les données collectées sont destinées à l'équipe LLABB TECH GROUP et, le cas échéant, à ses prestataires techniques (hébergement, envoi d'e-mails, outils de mesure d'audience), dans la stricte mesure nécessaire à l'exécution de leurs missions.</p>
        </div>

        <div class="block" id="droits">
            <h3>Vos droits</h3>
            <p>Conformément à la réglementation applicable en matière de protection des données, vous disposez d'un droit d'accès, de rectification, de suppression et d'opposition concernant vos données personnelles. Vous pouvez exercer ces droits en nous contactant aux coordonnées indiquées ci-dessous.</p>
        </div>

        <div class="block" id="cookies">
            <h3>Cookies</h3>
            <p>Le site utilise des cookies pour assurer son bon fonctionnement, mesurer son audience et, le cas échéant, personnaliser certains contenus. Lors de votre première visite, un bandeau vous permet d'accepter ou de refuser les cookies non essentiels. Vous pouvez modifier votre choix à tout moment en réinitialisant vos préférences depuis votre navigateur.</p>
            <p><button type="button" id="reopen-cookies" style="font-size:0.88rem; background:none; border:none; border-bottom:1px solid var(--color-primary); color:var(--color-primary); cursor:pointer; padding:0;">Gérer mes préférences de cookies</button></p>
        </div>

        <div class="block" id="contact-dpo">
            <h3>Nous contacter au sujet de vos données</h3>
            <p>Pour toute question relative à cette politique ou pour exercer vos droits, vous pouvez nous écrire à <span class="todo">[adresse e-mail à renseigner]</span> ou via notre <a href="{{ route('contact') }}">formulaire de contact</a>.</p>
            <p style="font-size:0.9rem;">Dernière mise à jour : <span class="todo">[date à renseigner]</span></p>
        </div>

    </div>
</div>
</section>

<div class="cookie-banner" id="cookie-banner">
    <p>Ce site utilise des cookies pour mesurer son audience et améliorer votre expérience. Vous pouvez accepter, refuser ou personnaliser vos préférences.</p>
    <div class="row">
        <button class="accept" id="cookie-accept">Accepter</button>
        <button id="cookie-decline">Refuser</button>
    </div>
</div>

@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    var banner = document.getElementById('cookie-banner');
    var consentKey = 'llabb_cookie_consent';

    function getConsent() {
        try { return localStorage.getItem(consentKey); } catch (e) { return null; }
    }
    function setConsent(value) {
        try { localStorage.setItem(consentKey, value); } catch (e) {}
    }

    if (!getConsent()) {
        banner.classList.add('show');
    }

    document.getElementById('cookie-accept').addEventListener('click', function () {
        setConsent('accepted');
        banner.classList.remove('show');
    });
    document.getElementById('cookie-decline').addEventListener('click', function () {
        setConsent('declined');
        banner.classList.remove('show');
    });
    document.getElementById('reopen-cookies').addEventListener('click', function () {
        banner.classList.add('show');
    });
});
</script>
@endsection