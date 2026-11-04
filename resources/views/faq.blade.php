@extends('layouts.app')

@section('title', 'FAQ - LLABB TECH GROUP')

@section('content')

@include('partials.page-header', [
    'title' => 'Questions fréquentes',
    'description' => 'Tout ce qu\'il faut savoir avant de démarrer un projet avec LLABB TECH GROUP.'
])

@php
    $labels = [
        'general' => 'Général',
        'services' => 'Services',
        'tarifs' => 'Tarifs',
        'dashboard' => 'Dashboard & technique',
        'support' => 'Support',
    ];
    $grouped = $faqItems->groupBy('categorie');
@endphp

<style>
    .faq-search { max-width: 700px; margin: 0 auto 32px; }
    .faq-search input {
        width: 100%;
        font-size: 1rem;
        padding: 14px 16px;
        border: 1px solid var(--color-border);
        background: transparent;
        color: inherit;
    }
    .faq-filters { display: flex; flex-wrap: wrap; gap: 10px; justify-content: center; margin-bottom: 40px; }
    .faq-filter-btn {
        font-size: 0.86rem;
        padding: 9px 16px;
        border: 1px solid var(--color-border);
        background: transparent;
        color: var(--color-text-secondary);
        cursor: pointer;
    }
    .faq-filter-btn:hover { color: inherit; border-color: var(--color-primary); }
    .faq-filter-btn.active { background: var(--color-primary); border-color: var(--color-primary); color: #fff; }

    .faq-accordion { max-width: 800px; margin: 0 auto; }
    .faq-group { margin-bottom: 40px; }
    .faq-group h2 { font-size: 1.1rem; color: var(--color-text-secondary); margin-bottom: 8px; }
    .faq-list { border-top: 1px solid var(--color-border); }
    .faq-item { border-bottom: 1px solid var(--color-border); }
    .faq-item button {
        width: 100%;
        text-align: left;
        background: none;
        border: none;
        cursor: pointer;
        padding: 22px 0;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
        font-size: 1.05rem;
        font-weight: 600;
        color: inherit;
    }
    .faq-item .faq-panel { max-height: 0; overflow: hidden; transition: max-height 0.3s ease; }
    .faq-item[data-open="true"] .faq-panel { max-height: 300px; }
    .faq-item p { color: var(--color-text-secondary); padding-bottom: 22px; margin: 0; max-width: 68ch; }
    .faq-item .plus { transition: transform 0.2s ease; flex-shrink: 0; color: var(--color-primary); font-size: 1.3rem; }
    .faq-item[data-open="true"] .plus { transform: rotate(45deg); }

    .faq-empty { display: none; text-align: center; padding: 60px 0; color: var(--color-text-secondary); }
    .faq-empty.show { display: block; }
</style>

<div class="main d-flex-center pt-8 pb-8">
    <div class="container main-content">

        <div class="faq-search">
            <input type="search" id="faqSearch" placeholder="Rechercher une question…" aria-label="Rechercher une question">
        </div>

        <div class="faq-filters" id="faqFilters">
            <button class="faq-filter-btn active" data-filter="all">Toutes</button>
            @foreach ($labels as $slug => $label)
                @if ($grouped->has($slug))
                    <button class="faq-filter-btn" data-filter="{{ $slug }}">{{ $label }}</button>
                @endif
            @endforeach
        </div>

        <div class="faq-accordion" id="faqAccordion">
            @foreach ($labels as $slug => $label)
                @if ($grouped->has($slug))
                    <div class="faq-group" data-group="{{ $slug }}">
                        <h2>{{ $label }}</h2>
                        <div class="faq-list">
                            @foreach ($grouped[$slug]->sortBy('ordre') as $index => $item)
                                <div class="faq-item" data-open="{{ $loop->first && $slug === 'general' ? 'true' : 'false' }}">
                                    <button type="button">
                                        {{ $item->question }}
                                        <span class="plus">+</span>
                                    </button>
                                    <div class="faq-panel">
                                        <p>{{ $item->reponse }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

        <div class="faq-empty" id="faqEmpty">Aucune question ne correspond à votre recherche.</div>

        <section class="pt-8">
            <div class="d-flex-center">
                <a href="{{ route('home') }}#contact" class="btn btn-primary">Vous ne trouvez pas votre réponse ? Contactez-nous</a>
            </div>
        </section>

    </div>
</div>

@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    var filterButtons = document.querySelectorAll('#faqFilters .faq-filter-btn');
    var groups = document.querySelectorAll('.faq-group');
    var items = document.querySelectorAll('.faq-item');
    var searchInput = document.getElementById('faqSearch');
    var empty = document.getElementById('faqEmpty');
    var activeFilter = 'all';

    function applyFilters() {
        var query = searchInput.value.trim().toLowerCase();
        var totalVisible = 0;

        groups.forEach(function (group) {
            var groupMatches = activeFilter === 'all' || group.getAttribute('data-group') === activeFilter;
            var groupVisibleCount = 0;

            group.querySelectorAll('.faq-item').forEach(function (item) {
                var questionText = item.querySelector('button').textContent.toLowerCase();
                var matchesQuery = query === '' || questionText.indexOf(query) !== -1;
                var visible = groupMatches && matchesQuery;
                item.hidden = !visible;
                if (visible) groupVisibleCount++;
            });

            group.hidden = groupVisibleCount === 0;
            totalVisible += groupVisibleCount;
        });

        empty.classList.toggle('show', totalVisible === 0);
    }

    filterButtons.forEach(function (btn) {
        btn.addEventListener('click', function () {
            filterButtons.forEach(function (b) { b.classList.remove('active'); });
            btn.classList.add('active');
            activeFilter = btn.getAttribute('data-filter');
            applyFilters();
        });
    });

    searchInput.addEventListener('input', applyFilters);

    items.forEach(function (item) {
        item.querySelector('button').addEventListener('click', function () {
            var isOpen = item.getAttribute('data-open') === 'true';
            item.setAttribute('data-open', isOpen ? 'false' : 'true');
        });
    });
});
</script>
@endsection