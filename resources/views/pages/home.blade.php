@extends('layouts.app')

@section('title', 'Top World Networks | Global Digital Solutions & Connectivity | Kuwait')

@section('content')
    <x-home.banner-section :banners="$banners" />
    <x-home.about-section :aboutUs="$aboutUs" />
    <x-home.partners-section :partners="$partners" />
    <x-home.services-carousel :services="$services" />
    <x-home.service-offerings :serviceHomeSetting="$serviceHomeSetting" />
    <x-home.contact-form />
@endsection

@push('scripts')
    <script src="{{ asset('js/contact-form-ajax.js') }}"></script>
@endpush

