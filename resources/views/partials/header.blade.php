<!-- Main Header-->
<header class="main-header header-style-one">
    <!-- Header Top -->
    <div class="header-top">
        <div class="auto-container">
            <div class="top-left">
                <!-- Info List -->
                <ul class="info-list">
                    @if($siteSettings->emails && count($siteSettings->emails) > 0)
                    <li>
                        <i class="fa-solid fa-envelope"></i>
                        @foreach($siteSettings->emails as $index => $email)
                            <a href="mailto:{{ $email }}">{{ $email }}</a>@if($index < count($siteSettings->emails) - 1), @endif
                        @endforeach
                    </li>
                    @endif
                    @if($siteSettings->mobile_numbers && count($siteSettings->mobile_numbers) > 0)
                    <li>
                        <i class="fa-solid fa-phone ring__animation"></i>
                        @foreach($siteSettings->mobile_numbers as $index => $mobile)
                            {{ $mobile }}@if($index < count($siteSettings->mobile_numbers) - 1), @endif
                        @endforeach
                    </li>
                    @endif
                </ul>
            </div>

            <div class="top-right">
                <ul class="top-social-icon">
                    @if($siteSettings->facebook_url)
                    <li><a href="{{ $siteSettings->facebook_url }}" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-facebook-f"></i></a></li>
                    @endif
                    @if($siteSettings->instagram_url)
                    <li><a href="{{ $siteSettings->instagram_url }}" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-instagram"></i></a></li>
                    @endif
                    @if($siteSettings->x_url)
                    <li><a href="{{ $siteSettings->x_url }}" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-x-twitter"></i></a></li>
                    @endif
                    @if($siteSettings->linkedin_url)
                    <li><a href="{{ $siteSettings->linkedin_url }}" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-linkedin-in"></i></a></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
    <!-- Header Top -->

    <!-- Main box -->
    <div class="main-box">
        <div class="logo-box">
            <div class="logo">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('images/logo.png') }}" alt="{{ config('app.name') }}" title="{{ config('app.name') }}">
                </a>
            </div>
        </div>

        <!--Nav Box-->
        <div class="nav-outer">
            <nav class="nav main-menu">
                <ul class="navigation">
                    <li class="{{ Request::is('/') ? 'current' : '' }}">
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="{{ Request::is('about-us') ? 'current' : '' }}">
                        <a href="{{ route('about-us') }}">About Us</a>
                    </li>
                    <li class="dropdown {{ Request::is('services/*') ? 'current' : '' }}">
                        <a href="#">Services</a>
                        <ul>
                            @forelse($allServices as $service)
                            <li><a href="{{ route('services.show', $service->slug) }}">{{ $service->title }}</a></li>
                            @empty
                            <li><a href="#">No services available</a></li>
                            @endforelse
                        </ul>
                    </li>
                    <li class="{{ Request::is('partners') ? 'current' : '' }}">
                        <a href="{{ route('partners') }}">Partners</a>
                    </li>
                    <li class="{{ Request::is('clients') ? 'current' : '' }}">
                        <a href="{{ route('clients') }}">Clients</a>
                    </li>
                    <li class="{{ Request::is('contact') ? 'current' : '' }}">
                        <a href="{{ route('contact') }}">Contact</a>
                    </li>
                </ul>
            </nav>
            <!-- Main Menu End-->
        </div>

        <div class="outer-box">
            <div class="info-box">
                <a class="btn-two" href="{{ route('quote') }}">Get a quote</a>
            </div>
            <div class="mobile-nav-toggler d-block d-lg-none">
                <i class="icon lnr-icon-bars"></i>
            </div>
            <!-- Mobile Nav toggler -->
        </div>
    </div>

    <div class="auto-container">
        <!-- Mobile Menu -->
        <div class="mobile-menu">
            <div class="menu-backdrop"></div>
            <nav class="menu-box">
                <div class="upper-box">
                    <div class="nav-logo">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('images/logo.png') }}" alt="{{ config('app.name') }}">
                        </a>
                    </div>
                    <div class="close-btn"><i class="icon fa fa-times"></i></div>
                </div>

                <ul class="navigation clearfix d-block d-lg-none">
                    <!--Keep This Empty / Menu will come through Javascript-->
                </ul>

                <div class="content-box d-none d-lg-block">
                    <h4 class="title">About Us</h4>
                    <p class="text">Top World Networks is a leading Kuwait-based IT solutions provider established in 2005, offering innovative and reliable digital, networking, and cloud services to businesses locally and globally.</p>
                </div>

                <ul class="contact-list-one">
                    @if($siteSettings->mobile_numbers && count($siteSettings->mobile_numbers) > 0)
                    <li>
                        <div class="contact-info-box">
                            <i class="icon lnr-icon-phone-handset"></i>
                            <span class="title">Call Now</span>
                            @foreach($siteSettings->mobile_numbers as $mobile)
                            <a href="tel:{{ str_replace(' ', '', $mobile) }}">{{ $mobile }}</a>
                            @endforeach
                        </div>
                    </li>
                    @endif
                    @if($siteSettings->emails && count($siteSettings->emails) > 0)
                    <li>
                        <div class="contact-info-box">
                            <span class="icon lnr-icon-envelope1"></span>
                            <span class="title">Send Email</span>
                            @foreach($siteSettings->emails as $email)
                            <a href="mailto:{{ $email }}">{{ $email }}</a>
                            @endforeach
                        </div>
                    </li>
                    @endif
                    @if($siteSettings->address)
                    <li>
                        <div class="contact-info-box">
                            <span class="icon lnr-icon-location"></span>
                            <span class="title">Contact us</span>
                            <a href="#">{{ $siteSettings->address }}</a>
                        </div>
                    </li>
                    @endif
                </ul>

                <ul class="social-links">
                    @if($siteSettings->x_url)
                    <li><a href="{{ $siteSettings->x_url }}" target="_blank" rel="noopener noreferrer"><i class="fab fa-x-twitter"></i></a></li>
                    @endif
                    @if($siteSettings->facebook_url)
                    <li><a href="{{ $siteSettings->facebook_url }}" target="_blank" rel="noopener noreferrer"><i class="fab fa-facebook-f"></i></a></li>
                    @endif
                    @if($siteSettings->linkedin_url)
                    <li><a href="{{ $siteSettings->linkedin_url }}" target="_blank" rel="noopener noreferrer"><i class="fab fa-linkedin-in"></i></a></li>
                    @endif
                    @if($siteSettings->instagram_url)
                    <li><a href="{{ $siteSettings->instagram_url }}" target="_blank" rel="noopener noreferrer"><i class="fab fa-instagram"></i></a></li>
                    @endif
                </ul>
            </nav>
        </div>
        <!-- End Mobile Menu -->


        <!-- Sticky Header -->
        <div class="sticky-header">
            <div class="auto-container">
                <div class="inner-container">
                    <!--Logo-->
                    <div class="logo">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('images/logo.png') }}" alt="{{ config('app.name') }}">
                        </a>
                    </div>
                    <!--Right Col-->
                    <div class="nav-outer">
                        <!-- Main Menu -->
                        <nav class="main-menu">
                            <div class="navbar-collapse show collapse clearfix">
                                <ul class="navigation clearfix">
                                    <!--Keep This Empty / Menu will come through Javascript-->
                                </ul>
                            </div>
                        </nav>
                        <!-- Main Menu End-->
                        <!--Mobile Navigation Toggler-->
                        <div class="mobile-nav-toggler">
                            <span class="icon lnr-icon-bars"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Sticky Menu -->
    </div>
</header>
<!--End Main Header -->

