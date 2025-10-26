@extends('layouts.app')
@section('title', 'About Us - Top World Networks')
@section('description', 'Learn about Top World Networks, Kuwait\'s leading IT solutions provider since 2005, offering innovative digital, networking, and cloud services.')
@section('content')
<!-- Page Banner -->
<section class="page-title">
    <div class="bg-layer" style="background-image: url({{ asset('images/bg/page-title.jpg') }});"></div>
    <div class="auto-container">
        <div class="content-box">
            <h1>About Us</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li>About Us</li>
            </ul>
        </div>
    </div>
</section>
<!-- About Section -->
<section class="about-section pt-120 pb-90">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="about-image">
                    <img src="{{ asset('images/about/about-1.jpg') }}" alt="About Top World Networks">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-content">
                    <div class="sec-title">
                        <span class="sub-title">Who We Are</span>
                        <h2>Leading IT Solutions Provider in Kuwait Since 2005</h2>
                    </div>
                    <div class="text">
                        <p>Top World Networks is a premier IT solutions provider based in Kuwait, established in 2005. We specialize in delivering innovative and reliable digital, networking, and cloud services to businesses both locally and globally.</p>
                        <p>Our team of experienced professionals is dedicated to simplify technology for our clients, enabling them to focus on their core business while we handle their IT infrastructure, security, and digital transformation needs.</p>
                    </div>
                    <div class="btn-box">
                        <a href="{{ route('contact') }}" class="btn-one">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
