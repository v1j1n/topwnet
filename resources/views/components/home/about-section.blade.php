@props(['aboutUs'])

@if($aboutUs)
<!-- About area start here -->
<section class="about-section-seven pt-80 paralax__animation">
    <div class="map-shape">
        <img src="{{ asset('images/shape/blog-four-shape.png') }}" alt="Image">
    </div>
    <div class="container">
        <div class="row g-5">
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

            <div class="col-lg-6 offset-lg-1 content-column">
                <div class="inner-column">
                    <div class="content-box">
                        <div class="sec-title">
                            <h6 class="sub-title wow fadeInUp" data-wow-delay="00ms" data-wow-duration="1500ms">{{ $aboutUs->title }}</h6>
                            <h2 class="title wow splt-txt" data-splitting>{{ $aboutUs->heading }}</h2>
                            <p class="text wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">{{ $aboutUs->description }}</p>
                        </div>
                    </div>

                    @if($aboutUs->points && count($aboutUs->points) > 0)
                        @php
                            $halfCount = ceil(count($aboutUs->points) / 2);
                            $columns = [
                                array_slice($aboutUs->points, 0, $halfCount),
                                array_slice($aboutUs->points, $halfCount)
                            ];
                        @endphp

                        <div class="list">
                            @foreach($columns as $index => $columnPoints)
                                @if(count($columnPoints) > 0)
                                    <ul class="mt-30 wow fadeInUp" data-wow-delay="{{ $index * 100 }}ms" data-wow-duration="1500ms">
                                        @foreach($columnPoints as $item)
                                            <li><i class="fa-solid fa-check"></i> {{ $item['point'] ?? '' }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            @endforeach
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
<!-- About area end here -->
@endif

