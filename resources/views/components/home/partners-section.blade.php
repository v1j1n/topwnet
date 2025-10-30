@props(['partners'])

@if($partners->isNotEmpty())
<!-- Partners area start here -->
<section class="brand-section pt-0 pb-50">
    <div class="container">
        <div class="outer-box">
            <div class="sec-title mb-50">
                <h6 class="title">Our Partners</h6>
            </div>
            <div class="swiper brand-slider">
                <div class="swiper-wrapper">
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
<!-- Partners area end here -->
@endif

