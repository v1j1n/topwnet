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


<!-- Services carousel area start here-->
<section class="case-section have-combine pt-80 pb-80">
    <div class="outer-box">

        <div class="sec-title center mb-50">
            <h6 class="sub-title wow fadeInUp" data-wow-delay="00ms" data-wow-duration="1500ms">Our Core Services</h6>
            <h2 class="title wow splt-txt" data-splitting>
                End-to-End IT Solutions for Your Business
            </h2>
        </div>

        <div class="swiper case-slider">
            <div class="swiper-wrapper">

                {{-- Dynamic service slides --}}
                @forelse($services as $service)
                    <div class="swiper-slide">
                        <div class="case-block">
                            <div class="inner-box">
                                <figure class="image">
                                    <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->alt_text ?? $service->title }}" loading="lazy">
                                </figure>
                                <div class="content-box">
                                    <span class="sub-title">{{ $service->primary_label }}</span>
                                    <span class="sub-title-2">{{ $service->secondary_label }}</span>
                                    <h4 class="title">
                                        <a href="{{ url('services/' . $service->slug) }}">{{ $service->title }}</a>
                                    </h4>
                                </div>
                                <a class="arry-btn" href="{{ url('services/' . $service->slug) }}">
                                    <i class="fa-regular fa-arrow-up-right"></i>
                                </a>
                                <div class="hover-content">
                                    <span class="sub-title">{{ $service->primary_label }}</span>
                                    <h4 class="title">
                                        <a href="{{ url('services/' . $service->slug) }}">{{ $service->title_hover ?? $service->title }}</a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    {{-- Fallback message if no services exist --}}
                    <div class="swiper-slide">
                        <div class="case-block">
                            <div class="inner-box">
                                <div class="content-box text-center p-5">
                                    <p>No services available at the moment.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforelse

            </div>
        </div>
    </div>
</section>

<!-- Services carousel area end here-->

<!-- Service  Section  -->
<section class="service-section-four pt-120 pb-120">
    <div class="sec-shape">
        <img src="images/shape/service-four-shape.png" alt="Shape">
    </div>
    <div class="container">
        @if($serviceHomeSetting)
            <div class="row g-5">
                <div class="col-lg-6 content-column">
                    <div class="inner-column">
                        <div class="sec-title mb-30">
                            <h6 class="sub-title wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">{{ $serviceHomeSetting->title }}</h6>
                            <h2 class="title wow splt-txt words chars splitting animated" data-splitting="">
                                @php
                                    // Split camelCase or concatenated words with spaces
                                    $heading = preg_replace('/(?<!^)([A-Z])/', ' $1', $serviceHomeSetting->heading);
                                @endphp
                                {{ $heading }}
                            </h2>
                            <div class="text wow fadeInUp animated" data-wow-delay="200ms" data-wow-duration="1500ms">
                                {!! strip_tags($serviceHomeSetting->description, '<p><br><strong><em><a>') !!}
                            </div>
                        </div>

                        {{-- Dynamic highlights list --}}
                        @if($serviceHomeSetting->highlights && count($serviceHomeSetting->highlights) > 0)
                            <div class="info">
                                @php
                                    // Split highlights into two columns
                                    $halfCount = ceil(count($serviceHomeSetting->highlights) / 2);
                                    $firstColumn = array_slice($serviceHomeSetting->highlights, 0, $halfCount);
                                    $secondColumn = array_slice($serviceHomeSetting->highlights, $halfCount);
                                @endphp

                                <ul class="wow fadeInDown animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                                    @foreach($firstColumn as $highlight)
                                        <li>
                                            <i class="fa-solid fa-check"></i>
                                            <h5 class="title">
                                                @if(is_array($highlight))
                                                    {{ $highlight['highlight_item'] ?? $highlight['highlight'] ?? $highlight['title'] ?? '' }}
                                                @else
                                                    {{ $highlight }}
                                                @endif
                                            </h5>
                                        </li>
                                    @endforeach
                                </ul>

                                @if(count($secondColumn) > 0)
                                    <ul class="wow fadeInDown animated" data-wow-delay="100ms" data-wow-duration="1500ms">
                                        @foreach($secondColumn as $highlight)
                                            <li>
                                                <i class="fa-solid fa-check"></i>
                                                <h5 class="title">
                                                    @if(is_array($highlight))
                                                        {{ $highlight['highlight_item'] ?? $highlight['highlight'] ?? $highlight['title'] ?? '' }}
                                                    @else
                                                        {{ $highlight }}
                                                    @endif
                                                </h5>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        @endif

                        <a class="btn-one-rounded wow fadeInDown mt-40 animated" data-wow-delay="200ms" data-wow-duration="1500ms" href="{{ route('services.it-consulting') }}">View all Services <i class="fa-regular fa-angle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-6 wow fadeInLeft animated" data-wow-delay="200ms" data-wow-duration="1500ms">
                    <div class="service-block-four">
                        <div class="acc" id="customAccordion">
                            {{-- Dynamic accordion items from offerings --}}
                            @if($serviceHomeSetting->offerings && count($serviceHomeSetting->offerings) > 0)
                                @foreach($serviceHomeSetting->offerings as $index => $offering)
                                    <div class="acc-item">
                                        <h2 class="acc-header">
                                            <button class="acc-btn" type="button">
                                                <span class="content-box">
                                                    <span class="icon">

                                                    </span>
                                                    <span class="title">{{ $offering['title'] ?? '' }}</span>
                                                </span>
                                                <span class="number">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                                            </button>
                                        </h2>
                                        <div class="acc-collapse" style="display: none;">
                                            <div class="acc-body">
                                                <p class="text">{{ $offering['number_tag'] ?? $offering['description'] ?? '' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @else
            {{-- Fallback if no service home setting exists --}}
            <div class="row">
                <div class="col-12 text-center">
                    <p>Service information is being updated.</p>
                </div>
            </div>
        @endif
    </div>
</section>
    <!-- Service Section end -->

<!-- Contact Section Start -->

<section class="contact-section-four ">
    <div class="container">
        <div class="outer-box pt-50">
            <div class="sec-title center mb-50">
                <h6 class="sub-title wow fadeInUp" data-wow-delay="00ms" data-wow-duration="1500ms">Get in touch</h6>
                <h2 class="title wow splt-txt" data-splitting>Have an Inquiry?</h2>
                <p class="text wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">Ready to take the next step in your digital transformation? <br />Let’s connect to discuss how our IT consulting expertise can help drive your business forward.</p>
            </div>
            <div class="contact-block-four">
                <form id="contact_form" name="contact_form" action="#" method="post">
                    <div class="row g-4">
                        <div class="col-lg-6">
                            <div class="input-feild">
                                <input name="form_name" type="text" placeholder="Your Name">
                                <div class="icon">
                                    <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M0.554688 19.25C0.554688 15.384 4.00514 12.25 8.26148 12.25C12.5179 12.25 15.9683 15.384 15.9683 19.25H14.0416C14.0416 16.3505 11.4537 14 8.26148 14C5.06922 14 2.48139 16.3505 2.48139 19.25H0.554688ZM8.26148 11.375C5.06798 11.375 2.48139 9.02563 2.48139 6.125C2.48139 3.22438 5.06798 0.875 8.26148 0.875C11.455 0.875 14.0416 3.22438 14.0416 6.125C14.0416 9.02563 11.455 11.375 8.26148 11.375ZM8.26148 9.625C10.3905 9.625 12.1149 8.05875 12.1149 6.125C12.1149 4.19125 10.3905 2.625 8.26148 2.625C6.13248 2.625 4.40809 4.19125 4.40809 6.125C4.40809 8.05875 6.13248 9.625 8.26148 9.625ZM16.2416 12.865C18.9204 13.9616 20.785 16.408 20.785 19.25H18.8583C18.8583 17.1185 17.4598 15.2837 15.4508 14.4612L16.2416 12.865ZM15.5793 2.98656C17.5042 3.7074 18.8583 5.42816 18.8583 7.4375C18.8583 9.94893 16.743 12.0096 14.0416 12.2304V10.469C15.6761 10.2569 16.9316 8.981 16.9316 7.4375C16.9316 6.22943 16.1625 5.18528 15.0444 4.68681L15.5793 2.98656Z"
                                            fill="#092D3C" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="input-feild">
                                <input name="form_email" type="text" placeholder="Email Address">
                                <div class="icon">
                                    <svg width="24" height="19" viewBox="0 0 24 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M22.4031 0.875C22.9859 0.875 23.4582 1.30406 23.4582 1.83333V17.173C23.4582 17.6987 22.9778 18.125 22.4118 18.125H3.40273C2.8248 18.125 2.35629 17.6986 2.35629 17.173V16.2083H21.348V4.99583L12.9073 11.8958L2.35629 3.27083V1.83333C2.35629 1.30406 2.82868 0.875 3.41139 0.875H22.4031ZM8.68687 12.375V14.2917H0.246094V12.375H8.68687ZM5.52158 7.58333V9.5H0.246094V7.58333H5.52158ZM20.89 2.79167H4.92454L12.9073 9.31725L20.89 2.79167Z"
                                            fill="#092D3C" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="input-feild">
                                <input type="text" placeholder="Phone number">
                                <div class="icon">
                                    <svg width="19" height="19" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M22 16.92V20a2 2 0 0 1-2.18 2A19.9 19.9 0 0 1 2 4.18 2 2 0 0 1 4 2h3.09a1 1 0 0 1 1 .75 12.05 12.05 0 0 0 .7 2.27 1 1 0 0 1-.23 1.11L7.21 7.91a16 16 0 0 0 8.88 8.88l1.78-1.35a1 1 0 0 1 1.11-.23 12.05 12.05 0 0 0 2.27.7 1 1 0 0 1 .75 1Z" fill="#092D3C"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="input-feild">
                                <select name="#" id="subject">
                                    <option value="0">Service you’re looking for?</option>
                                    <option value="2">Standard SSL</option>
                                    <option value="3">Extended Validation SSL</option>
                                    <option value="4">Multi-Domain SSL</option>
                                    <option value="6">EV Multi-Domain SSL</option>
                                    <option value="7">Wildcard SSL</option>
                                    <option value="7">Website development</option>
                                    <option value="7">Other</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="input-feild textarea-feild">
                                <textarea name="form_message" placeholder="Write Message"></textarea>
                                <div class="icon">
                                    <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M4.20621 14.8885L15.3724 4.7464L13.8154 3.33218L2.64921 13.4743V14.8885H4.20621ZM5.11829 16.8885H0.447266V12.6458L13.0369 1.21086C13.4669 0.820339 14.1639 0.820339 14.5939 1.21086L17.708 4.03929C18.1379 4.42981 18.1379 5.06298 17.708 5.4535L5.11829 16.8885ZM0.447266 18.8885H20.2647V20.8885H0.447266V18.8885Z"
                                            fill="#092D3C" />
                                    </svg>
                                </div>
                            </div>
                            <div class="text-center">
                                <button class="btn-one mt-4 mx-auto" data-animation="fadeInUp" data-delay=".8s">Submit <i class="fa-solid fa-angle-right ms-2"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="google-map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3477.311065002766!2d47.9681688!3d29.3611799!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3fcf84dbbd47f72f%3A0x69472b6acf4338f3!2sTop%20World%20Networks%20Co.!5e0!3m2!1sen!2skw!4v1760211917914!5m2!1sen!2skw" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</section>





@endsection

