@extends('app')
@section('Contents')
    <section class="page-section home-page page-section-current">
        @include('sections.home')
    </section>
    <section class="page-section About-page page-section-60">
        @include('sections.about')
    </section>
    <section class="page-section Team-page page-section-21">
        @include('sections.team')
    </section>
    <section class="page-section Portfolio-page page-section-57">
       @include('sections.portfolio')
    </section>
    <section class="page-section Contact-page page-section-117">
       @include('sections.contact')
    </section>
    <section class="page-section Blog-page page-section-41">
        @include('sections.blog')
    </section>
    <section class="page-section Services-page page-section-63">
        @include('sections.services')
    </section>
    <section class="page-section Register-page page-section-65">
        @include('sections.register')
    </section>
@endsection
