@props(['services'])

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
                                        <a href="{{ route('services.show', $service->slug) }}">{{ $service->title }}</a>
                                    </h4>
                                </div>
                                <a class="arry-btn" href="{{ route('services.show', $service->slug) }}">
                                    <i class="fa-regular fa-arrow-up-right"></i>
                                </a>
                                <div class="hover-content">
                                    <span class="sub-title">{{ $service->primary_label }}</span>
                                    <h4 class="title">
                                        <a href="{{ route('services.show', $service->slug) }}">{{ $service->title_hover ?? $service->title }}</a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
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
<!-- Services area end here-->

