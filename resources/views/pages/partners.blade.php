@extends('layouts.app')

@section('title', 'Partners - Top World Networks')

@section('description', 'Get in touch with Top World Networks for IT consulting, security solutions, and digital services in Kuwait.')

@section('content')
    <!-- Start main-content -->
    <section class="page-title" style="background-image: url({{ asset('images/bg/page-title-bg.jpg') }});">
        <div class="auto-container">
            <div class="title-outer">
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Partners</li>
                </ul>
                <h1 class="title">Our Partners</h1>
            </div>
        </div>
    </section>
    <!-- end main-content -->


    <section class="blog-section pt-80 pb-90">
        <div class="auto-container">

            <section class="clients-intro">
                <p class="wow splt-txt" data-splitting>Top World Networks partners with leading global technology providers to deliver comprehensive, secure, and innovative IT solutions.</p>
            </section>

            <div class="row g-4">
                @forelse($partners as $index => $partner)
                    <div class="col-md-6 col-xl-2 wow fadeInLeft" data-wow-delay="{{ $index * 100 }}ms" data-wow-duration="1500ms">
                        <div class="blog-block-two mb-30">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image">
                                        <img src="{{ Storage::url($partner->logo) }}" alt="{{ $partner->name }}">
                                    </figure>
                                </div>
                                <div class="content-box">
                                    <h4 class="title">
                                        <a href="#">{{ $partner->short_description }}</a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <p class="text-center">No partners available at the moment.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>


@endsection
