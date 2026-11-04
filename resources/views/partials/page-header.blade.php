<section class="page-header">
    <div class="page-header-bg">
        <div class="digital-grid"></div>
        <div class="particles-container">
            @for ($i = 1; $i <= 12; $i++)
                <div class="particle"></div>
            @endfor
        </div>
        <div class="geometric-overlay">
            <div class="geometric-shape shape-1"></div>
            <div class="geometric-shape shape-2"></div>
            <div class="geometric-shape shape-3"></div>
            <div class="geometric-shape shape-4"></div>
        </div>
    </div>

    <div class="floating-elements">
        <div class="floating-circle floating-circle-1"></div>
        <div class="floating-circle floating-circle-2"></div>
        <div class="floating-circle floating-circle-3"></div>
    </div>

    <div class="container page-header-content">
        <div class="flex-column-center">
            <nav class="breadcrumb">
                <a href="{{ route('home') }}" class="breadcrumb-link">Accueil</a>
                <span class="breadcrumb-separator">
                    <svg viewBox="0 0 24 24" width="14" height="14"><path d="M9 6l6 6-6 6" stroke="currentColor" stroke-width="2" fill="none"/></svg>
                </span>
                <span class="breadcrumb-current">{{ $title }}</span>
            </nav>

            <h1 class="page-title">{{ $title }}</h1>

            @isset($description)
                <p class="page-description">{{ $description }}</p>
            @endisset
        </div>
    </div>
</section>