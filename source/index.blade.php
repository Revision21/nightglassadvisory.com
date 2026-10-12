---
title:
---
@extends('_layouts.main')

@section('body')
    @include('_partials.home.hero')
    <main>
        @include('_partials.home.triggers')
        @include('_partials.home.cascade')
        @include('_partials.home.diagnostic')
        @include('_partials.home.about')
        @include('_partials.home.faq')
        @include('_partials.home.cta')
    </main>
    @include('_partials.footer')
@stop
