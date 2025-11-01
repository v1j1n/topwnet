@props(['serviceHomeSetting'])

<!-- Service Section Start -->
<section class="service-section-four pt-120 pb-120">
    <div class="sec-shape">
        <img src="{{ asset('images/shape/service-four-shape.png') }}" alt="Shape">
    </div>
    <div class="container">
        @if($serviceHomeSetting)
            <div class="row g-5">
                <div class="col-lg-6 content-column">
                    <div class="inner-column">
                        <div class="sec-title mb-30">
                            <h6 class="sub-title wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                                {{ $serviceHomeSetting->title }}
                            </h6>
                            <h2 class="title wow splt-txt words chars splitting animated" data-splitting="">
                                {{ preg_replace('/(?<!^)([A-Z])/', ' $1', $serviceHomeSetting->heading) }}
                            </h2>
                            <div class="text wow fadeInUp animated" data-wow-delay="200ms" data-wow-duration="1500ms">
                                {!! strip_tags($serviceHomeSetting->description, '<p><br><strong><em><a>') !!}
                            </div>
                        </div>

                        @if($serviceHomeSetting->highlights && count($serviceHomeSetting->highlights) > 0)
                            @php
                                $halfCount = ceil(count($serviceHomeSetting->highlights) / 2);
                                $highlightColumns = [
                                    array_slice($serviceHomeSetting->highlights, 0, $halfCount),
                                    array_slice($serviceHomeSetting->highlights, $halfCount)
                                ];
                            @endphp

                            <div class="info">
                                @foreach($highlightColumns as $index => $column)
                                    @if(count($column) > 0)
                                        <ul class="wow fadeInDown animated" data-wow-delay="{{ $index * 100 }}ms" data-wow-duration="1500ms">
                                            @foreach($column as $highlight)
                                                <li>
                                                    <i class="fa-solid fa-check"></i>
                                                    <h5 class="title">
                                                        {{ is_array($highlight) ? ($highlight['highlight_item'] ?? $highlight['highlight'] ?? $highlight['title'] ?? '') : $highlight }}
                                                    </h5>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                @endforeach
                            </div>
                        @endif

                        <a class="btn-one-rounded wow fadeInDown mt-40 animated" data-wow-delay="200ms" data-wow-duration="1500ms" href="{{ route('services.show', 'it-consulting') }}">
                            View all Services <i class="fa-regular fa-angle-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-6 wow fadeInLeft animated" data-wow-delay="200ms" data-wow-duration="1500ms">
                    <div class="service-block-four">
                        <div class="acc" id="customAccordion">
                            @if($serviceHomeSetting->offerings && count($serviceHomeSetting->offerings) > 0)
                                @foreach($serviceHomeSetting->offerings as $index => $offering)
                                    <div class="acc-item">
                                        <h2 class="acc-header">
                                            <button class="acc-btn" type="button">
                                                <span class="content-box">
                                                    <span class="icon">
                                                        <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M41.9688 20.3125H37.5V7.8125C37.5 6.64844 36.5391 5.65625 35.4062 5.65625H14.5938C13.4297 5.65625 12.5 6.64844 12.5 7.8125V20.3125H8.03125C6.83594 20.3125 5.875 21.3047 5.875 22.4688V42.1875C5.875 43.3516 6.83594 44.3438 8.03125 44.3438H41.9688C43.1328 44.3438 44.125 43.3516 44.125 42.1875V22.4688C44.125 21.3047 43.1328 20.3125 41.9688 20.3125ZM15.625 8.78125H34.375V20.3125H15.625V8.78125ZM41 41.2188H9V23.4375H41V41.2188Z" fill="currentColor"></path>
                                                            <path d="M25 27.5625C22.8516 27.5625 21.0938 29.3203 21.0938 31.4688C21.0938 33.6172 22.8516 35.375 25 35.375C27.1484 35.375 28.9062 33.6172 28.9062 31.4688C28.9062 29.3203 27.1484 27.5625 25 27.5625ZM25 32.25C24.5781 32.25 24.2188 31.8906 24.2188 31.4688C24.2188 31.0469 24.5781 30.6875 25 30.6875C25.4219 30.6875 25.7812 31.0469 25.7812 31.4688C25.7812 31.8906 25.4219 32.25 25 32.25Z" fill="currentColor"></path>
                                                        </svg>
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
            <div class="row">
                <div class="col-12 text-center">
                    <p>Service information is being updated.</p>
                </div>
            </div>
        @endif
    </div>
</section>
<!-- Service Section end -->

