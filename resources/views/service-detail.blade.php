@extends('layouts.app')

@section('title', $service->titre . ' - LLABB TECH GROUP')

@section('content')

@include('partials.page-header', [
    'title' => $service->titre,
    'description' => $service->resume
])

<div class="main d-flex-center pt-8 pb-8">
    <div class="container main-content">
        <section class="about-our-company">
            <div class="about-info pb-4">
                <div class="about-texts pb-4">
                    <h4 class="text-accent">Description</h4>
                    <h2 class="about-info-title">{{ $service->titre }}</h2>
                    <p>{{ $service->description ?: $service->resume }}</p>

                    @if ($service->methodologie)
                        <h4 class="text-accent pt-4">Méthodologie</h4>
                        <p>{{ $service->methodologie }}</p>
                    @endif

                    @if ($service->technologies)
                        <h4 class="text-accent pt-4">Technologies utilisées</h4>
                        <p>{{ $service->technologies }}</p>
                    @endif
                </div>
            </div>
        </section>

        <section class="pt-8">
            <div class="d-flex-center">
                <a href="{{ route('contact') }}" class="btn btn-primary">Discuter de mon projet</a>
            </div>
        </section>
    </div>
</div>

@endsection