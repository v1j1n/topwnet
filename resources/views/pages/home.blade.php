@extends('layouts.app')

@section('title', 'Top World Networks | Global Digital Solutions & Connectivity | Kuwait')

@section('content')
<!-- Banner area start here -->
<section class="banner-section">
    <div class="sec-shape"><img src="{{ asset('images/shape/banner-shape.png') }}" alt="Image"></div>
    <button class="goBottom-btn">
        <svg class="animation__arryUpDown" width="16" height="36" viewBox="0 0 16 36" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M13.8328 6.33334C13.8328 5.17961 13.4907 4.0518 12.8497 3.09251C12.2088 2.13322 11.2977 1.38555 10.2318 0.944039C9.16591 0.502527 7.99302 0.387008 6.86146 0.612088C5.72991 0.837169 4.69051 1.39274 3.8747 2.20855C3.0589 3.02435 2.50332 4.06375 2.27824 5.19531C2.05316 6.32686 2.16868 7.49975 2.61019 8.56566C3.05171 9.63156 3.79938 10.5426 4.75867 11.1836C5.71795 11.8245 6.84577 12.1667 7.99949 12.1667C9.54602 12.1648 11.0287 11.5496 12.1222 10.4561C13.2158 9.3625 13.831 7.87986 13.8328 6.33334ZM3.83283 6.33334C3.83283 5.50925 4.0772 4.70366 4.53504 4.01846C4.99287 3.33325 5.64362 2.7992 6.40498 2.48384C7.16634 2.16847 8.00412 2.08596 8.81237 2.24673C9.62062 2.4075 10.3631 2.80434 10.9458 3.38706C11.5285 3.96978 11.9253 4.71221 12.0861 5.52046C12.2469 6.32871 12.1644 7.16649 11.849 7.92785C11.5336 8.68921 10.9996 9.33995 10.3144 9.79779C9.62916 10.2556 8.82358 10.5 7.99949 10.5C6.89474 10.499 5.83552 10.0597 5.05434 9.27849C4.27316 8.49731 3.83385 7.43809 3.83283 6.33334ZM15.2554 27.4108C15.3327 27.4882 15.3941 27.58 15.436 27.6811C15.4779 27.7822 15.4995 27.8905 15.4995 28C15.4995 28.1094 15.4779 28.2177 15.436 28.3188C15.3941 28.4199 15.3327 28.5118 15.2554 28.5891L8.58869 35.2558C8.51133 35.3332 8.41948 35.3946 8.31839 35.4365C8.2173 35.4783 8.10895 35.4999 7.99953 35.4999C7.8901 35.4999 7.78175 35.4783 7.68066 35.4365C7.57957 35.3946 7.48772 35.3332 7.41036 35.2558L0.743692 28.5891C0.591894 28.432 0.507898 28.2215 0.509797 28.003C0.511696 27.7845 0.599336 27.5755 0.753843 27.421C0.90835 27.2664 1.11736 27.1788 1.33586 27.1769C1.55436 27.175 1.76486 27.259 1.92203 27.4108L7.16616 32.655V18C7.16616 17.779 7.25396 17.567 7.41024 17.4107C7.56652 17.2545 7.77848 17.1667 7.99949 17.1667C8.22051 17.1667 8.43247 17.2545 8.58875 17.4107C8.74503 17.567 8.83283 17.779 8.83283 18V32.655L14.077 27.4109C14.1543 27.3334 14.2462 27.272 14.3473 27.2302C14.4484 27.1883 14.5567 27.1667 14.6661 27.1667C14.7756 27.1667 14.8839 27.1882 14.985 27.2301C15.0861 27.272 15.178 27.3334 15.2554 27.4108Z" fill="white" />
        </svg>
    </button>

    <div class="swiper banner-slider">
        <div class="swiper-wrapper">
            @forelse ($banners as $banner)
                <div class="swiper-slide">
                    <div class="slide-bg" data-background="{{ asset('storage/' . $banner->image) }}"></div>
                    <div class="container">
                        <div class="outer-box">
                            <div class="row g-0 align-items-end">
                                <div class="col-lg-8 content-column">
                                    <div class="inner-column">
                                        <h6 class="sub-title" data-animation="fadeInUp" data-delay=".3s">{{ $banner->title }}</h6>
                                        <h1 class="title" data-animation="fadeInUp" data-delay=".5s">{{ $banner->heading_1 }}
                                            <span>{{ $banner->heading_2 }}</span>
                                        </h1>
                                        <p class="banner1">{{ $banner->description }}</p>
                                        <a class="btn-one" data-animation="fadeInUp" data-delay=".8s" href="{{ route('contact') }}">Contact us</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                {{-- Fallback banner if no active banners exist --}}
                <div class="swiper-slide">
                    <div class="slide-bg" data-background="{{ asset('images/banner/banner-new1.jpg') }}"></div>
                    <div class="container">
                        <div class="outer-box">
                            <div class="row g-0 align-items-end">
                                <div class="col-lg-8 content-column">
                                    <div class="inner-column">
                                        <h6 class="sub-title" data-animation="fadeInUp" data-delay=".3s">Top World Networks</h6>
                                        <h1 class="title" data-animation="fadeInUp" data-delay=".5s">Your Trusted Partner
                                            <span>in IT & Cybersecurity</span>
                                        </h1>
                                        <p class="banner1">Partnering with global leaders like Fortinet and Symantec to defend your endpoints, network, and data from the latest threats, 24/7.</p>
                                        <a class="btn-one" data-animation="fadeInUp" data-delay=".8s" href="{{ route('contact') }}">Contact us</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
    <div class="swiper-pagination banner-pagination"></div>
</section>
<!-- Banner area end here -->

<!-- About area start here -->
@if($aboutUs)
    <section class="about-section-seven pt-80 paralax__animation">
        <div class="map-shape">
            <img src="{{ asset('images/shape/blog-four-shape.png') }}" alt="Image">
        </div>
        <div class="container">
            <div class="row g-5">
                {{-- Dynamic image column --}}
                <div class="col-lg-5 image-column wow fadeInRight" data-wow-delay="200ms" data-wow-duration="1500ms">
                    <div class="inner-column">
                        <div data-depth="0.01" class="image1 overlay-anim">
                            <img src="{{ asset('storage/' . $aboutUs->image) }}" alt="{{ $aboutUs->title }}">
                        </div>
                        <div class="image2 overlay-anim" data-depth="0.05">
                            <img src="{{ asset('images/logo.png') }}" alt="Image">
                        </div>
                    </div>
                </div>

                {{-- Dynamic content column --}}
                <div class="col-lg-6 offset-lg-1 content-column">
                    <div class="inner-column">
                        <div class="content-box">
                            <div class="sec-title">
                                <h6 class="sub-title wow fadeInUp" data-wow-delay="00ms" data-wow-duration="1500ms">{{ $aboutUs->title }}</h6>
                                <h2 class="title wow splt-txt" data-splitting>{{ $aboutUs->heading }}</h2>
                                <p class="text wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">{{ $aboutUs->description }}</p>
                            </div>
                        </div>

                        {{-- Dynamic points list --}}
                        @if($aboutUs->points && count($aboutUs->points) > 0)
                            <div class="list">
                                @php
                                    // Split points into two columns
                                    $halfCount = ceil(count($aboutUs->points) / 2);
                                    $firstColumn = array_slice($aboutUs->points, 0, $halfCount);
                                    $secondColumn = array_slice($aboutUs->points, $halfCount);
                                @endphp

                                <ul class="mt-30 wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                                    @foreach($firstColumn as $item)
                                        <li><i class="fa-solid fa-check"></i> {{ $item['point'] ?? '' }}</li>
                                    @endforeach
                                </ul>

                                @if(count($secondColumn) > 0)
                                    <ul class="mt-30 wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                                        @foreach($secondColumn as $item)
                                            <li><i class="fa-solid fa-check"></i> {{ $item['point'] ?? '' }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        @endif

                        <div class="info">
                            <a href="{{ route('about-us') }}" class="btn-two">More about us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
<!-- About area end here -->

<!-- Partners area start here -->
@if($partners && $partners->isNotEmpty())
    <section class="brand-section pt-0 pb-50">
        <div class="container">
            <div class="outer-box">
                <div class="sec-title mb-50">
                    <h6 class="title">Our Partners</h6>
                </div>
                <div class="swiper brand-slider">
                    <div class="swiper-wrapper">
                        {{-- Dynamic partner logos --}}
                        @foreach($partners as $partner)
                            <div class="swiper-slide">
                                <div class="brand-block">
                                    <a href="#"><img src="{{ asset('storage/' . $partner->logo) }}" alt="{{ $partner->name }}"></a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
<!-- Partners area end here -->


<!-- Services area start here-->
<section class="service-section-four pt-120 pb-120">
    <div class="sec-shape">
        <img src="images/shape/service-four-shape.png" alt="Shape">
    </div>
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 content-column">
                <div class="inner-column">
                    <div class="sec-title mb-30">
                        <h6 class="sub-title wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">Services</h6>
                        <h2 class="title wow splt-txt words chars splitting animated" data-splitting="">
                            <span class="word">IT Solutions</span>
                            <span class="word">Drive</span>
                            <span class="word">Business</span>
                            <span class="word">Growth</span>
                        </h2>
                        <p class="text wow fadeInUp animated" data-wow-delay="200ms" data-wow-duration="1500ms">
                            Top World Networks is a leading IT solutions provider based in Kuwait, delivering innovative and scalable services to businesses locally and globally.
                        </p>
                    </div>
                    <div class="info">
                        <ul class="wow fadeInDown animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                            <li>
                                <i class="fa-solid fa-check"></i>
                                <h5 class="title">Web Development & Hosting</h5>
                            </li>
                            <li>
                                <i class="fa-solid fa-check"></i>
                                <h5 class="title">Cloud & Infrastructure Solutions</h5>
                            </li>
                        </ul>
                        <ul class="wow fadeInDown animated" data-wow-delay="100ms" data-wow-duration="1500ms">
                            <li>
                                <i class="fa-solid fa-check"></i>
                                <h5 class="title">Enterprise Software Development</h5>
                            </li>
                            <li>
                                <i class="fa-solid fa-check"></i>
                                <h5 class="title">Digital Transformation Consulting</h5>
                            </li>
                        </ul>
                    </div>
                    <a class="btn-one-rounded wow fadeInDown mt-40 animated" data-wow-delay="200ms" data-wow-duration="1500ms" href="it-consulting.html">View all Services <i class="fa-regular fa-angle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-6 wow fadeInLeft animated" data-wow-delay="200ms" data-wow-duration="1500ms">
                <div class="service-block-four">
                    <div class="acc" id="customAccordion">
                        <!-- First item -->
                        <div class="acc-item">
                            <h2 class="acc-header">
                                <button class="acc-btn" type="button">
                  <span class="content-box">
                    <span class="icon">
                      <!-- SVG icon -->
                    </span>
                    <span class="title">Custom Web Solutions</span>
                  </span>
                                    <span class="number">01</span>
                                </button>
                            </h2>
                            <div class="acc-collapse" style="display: none;">
                                <div class="acc-body">
                                    <p class="text">Building responsive websites, e-commerce platforms, and enterprise web applications tailored to client needs.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Second item -->
                        <div class="acc-item">
                            <h2 class="acc-header">
                                <button class="acc-btn" type="button">
                  <span class="content-box">
                    <span class="icon">
                      <!-- SVG icon -->
                    </span>
                    <span class="title">IT Infrastructure Management</span>
                  </span>
                                    <span class="number">02</span>
                                </button>
                            </h2>
                            <div class="acc-collapse" style="display: none;">
                                <div class="acc-body">
                                    <p class="text">Providing cloud hosting, server management, and networking solutions to optimize IT performance and reliability.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Third item -->
                        <div class="acc-item">
                            <h2 class="acc-header">
                                <button class="acc-btn" type="button">
                  <span class="content-box">
                    <span class="icon">
                      <!-- SVG icon -->
                    </span>
                    <span class="title">Digital Transformation</span>
                  </span>
                                    <span class="number">03</span>
                                </button>
                            </h2>
                            <div class="acc-collapse" style="display: none;">
                                <div class="acc-body">
                                    <p class="text">Helping businesses adopt new technologies, streamline operations, and enhance digital engagement with customers.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Fourth item -->
                        <div class="acc-item">
                            <h2 class="acc-header">
                                <button class="acc-btn" type="button">
                  <span class="content-box">
                    <span class="icon">
                      <!-- SVG icon -->
                    </span>
                    <span class="title">Consulting & Support</span>
                  </span>
                                    <span class="number">04</span>
                                </button>
                            </h2>
                            <div class="acc-collapse" style="display: none;">
                                <div class="acc-body">
                                    <p class="text">Providing IT consulting, ongoing support, and strategic guidance to ensure business growth and technology efficiency.</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services area end here-->


@endsection

