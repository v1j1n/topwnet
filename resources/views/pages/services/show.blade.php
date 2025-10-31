@extends('layouts.app')
@section('title', ($service->meta_title ?? $service->title) . ' - Top World Networks')
@section('description', $service->meta_description ?? $service->description)
@section('content')
<!-- Start main-content -->
<section class="page-title" style="background-image: url({{ asset('images/bg/page-title-bg.jpg') }});">
    <div class="auto-container">
        <div class="title-outer">
            <ul class="page-breadcrumb">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('home') }}#services">Services</a></li>
                <li>{{ $service->title }}</li>
            </ul>
            <h1 class="title">{{ $service->title }}</h1>
        </div>
    </div>
</section>
<!-- end main-content -->


<section class="services-details pt-50 pb-50">
    <div class="container">

        <div class="row">


            <div class="col-lg-4">
                <div class="service-sidebar mt-5 mt-lg-0">
                    <!--Start Services Details Sidebar Single-->
                    <div class="sidebar-widget service-sidebar-single">
                        <div class="sidebar-service-list mb-30">
                            <h4 class="title">More Services</h4>
                            <ul class="services-list">
                                @foreach($otherServices as $otherService)
                                    <li class="{{ $otherService->id === $service->id ? 'current' : '' }}">
                                        <a href="{{ route('services.show', $otherService->slug) }}" class="{{ $otherService->id === $service->id ? 'current' : '' }}">
                                            <i class="far fa-arrow-right"></i>
                                            <span>{{ $otherService->title }}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="sidebar-service-list mb-30">
                            <h4 class="title">Contact With us</h4>
                            <ul class="address">
                                <li>{{ $siteSettings->address ?? 'Office No. 15, Third Floor, Al Marzook Building Al Soor Street, Block 13, Al Qibla, Kuwait City' }}</li>
                                <hr />
                                <li><span>{{ $siteSettings->email ?? 'sales@topwnet.com, support@topwnet.com' }}</span></li>
                                <hr />
                                <li><a href="tel:{{ $siteSettings->phone ?? '+96522445419' }}">{{ $siteSettings->phone ?? '+965 22445419 / 22445391' }}<br />{{ $siteSettings->mobile ?? '+965 94411744 / 50410555' }}</a></li>
                            </ul>
                        </div>

                    </div>
                    <!--End Services Details Sidebar-->
                </div>
            </div>
            <!--Start Services Details Content-->
            <div class="col-xl-8 col-lg-8">
                <div class="services-details__content">

                    @if($service->big_image)
                        <div class="image-container-service image-column wow fadeInRight" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <div data-depth="0.01" class="image1 overlay-anim">
                                <img src="{{ asset('storage/' . $service->big_image) }}" alt="{{ $service->alt_text ?? $service->title }}" />
                            </div>
                        </div>
                    @endif

                    <h3>{{ $service->title }}</h3>
                    <div class="mb-30">{!! $service->description !!}</div>

                    @if($service->process && count($service->process) > 0)
                        <div class="service-nr-list">
                            <h3 class="mb-3">Service Process</h3>
                            <div class="row">
                                @foreach($service->process as $processStep)
                                    <div class="col-lg-6">
                                        <div class="nr-list">
                                            <h4 class="title d-flex align-items-center mb-4">
                                                <span>{{ $processStep['title'] ?? '' }}</span>
                                                {{ $processStep['description'] ?? '' }}
                                            </h4>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    @if($service->outcomes && count($service->outcomes) > 0)
                        <div class="content mt-10">
                            <div class="text">
                                <h3 class="mb-3">Service Outcome</h3>
                                <div class="row">
                                    @php
                                        $half = ceil(count($service->outcomes) / 2);
                                        $firstHalf = array_slice($service->outcomes, 0, $half);
                                        $secondHalf = array_slice($service->outcomes, $half);
                                    @endphp
                                    <div class="col-md-6">
                                        <ul class="outcome-list">
                                            @foreach($firstHalf as $outcome)
                                                <li><i class="fal fa-check"></i> {{ $outcome['description'] ?? '' }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <ul class="outcome-list">
                                            @foreach($secondHalf as $outcome)
                                                <li><i class="fal fa-check"></i> {{ $outcome['description'] ?? '' }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                </div>
            </div>
            <!--End Services Details Content-->

            <!--Start Services Details Sidebar-->

        </div>
    </div>
</section>



@endsection
