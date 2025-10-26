<!-- Main Header-->
<header class="main-header header-style-one">
    <!-- Header Top -->
    <div class="header-top">
        <div class="auto-container">
            <div class="top-left">
                <!-- Info List -->
                <ul class="info-list">
                    <li><i class="fa-solid fa-envelope"></i> <a href="mailto:sales@topwnet.com">sales@topwnet.com, support@topwnet.com</a></li>
                    <li><i class="fa-solid fa-phone ring__animation"></i> +965 22445419 / 22445391, 94411744 / 50410555</li>
                </ul>
            </div>

            <div class="top-right">
                <ul class="top-social-icon">
                    <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                    <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fa-brands fa-x-twitter"></i></a></li>
                    <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
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
                            <li><a href="{{ route('services.it-consulting') }}">IT Consulting</a></li>
                            <li><a href="{{ route('services.network-security') }}">IT Security</a></li>
                            <li><a href="{{ route('services.it-outsourcing') }}">IT Outsourcing</a></li>
                            <li><a href="{{ route('services.hardware') }}">Hardware & Software Solutions</a></li>
                            <li><a href="{{ route('services.amc') }}">AMC (Annual Maintenance Contract)</a></li>
                            <li><a href="{{ route('services.webdev') }}">Web & Hosting Services</a></li>
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
                    <li>
                        <div class="contact-info-box">
                            <i class="icon lnr-icon-phone-handset"></i>
                            <span class="title">Call Now</span>
                            <a href="tel:+96522445419">+965 22445419 / 22445391</a>
                            <a href="tel:+96594411744">+965 94411744 / 50410555</a>
                        </div>
                    </li>
                    <li>
                        <div class="contact-info-box">
                            <span class="icon lnr-icon-envelope1"></span>
                            <span class="title">Send Email</span>
                            <a href="mailto:sales@topwnet.com">sales@topwnet.com</a>
                            <a href="mailto:support@topwnet.com">support@topwnet.com</a>
                        </div>
                    </li>
                    <li>
                        <div class="contact-info-box">
                            <span class="icon lnr-icon-location"></span>
                            <span class="title">Contact us</span>
                            <a href="#">Kuwait City, Al Qibla, Block 13, Al Soor Street, Al Marzook Building. Third Floor, Office No. 15</a>
                        </div>
                    </li>
                </ul>

                <ul class="social-links">
                    <li><a href="#"><i class="fab fa-x-twitter"></i></a></li>
                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                </ul>
            </nav>
        </div>
        <!-- End Mobile Menu -->

        <!-- Header Search -->
        <div class="search-popup">
            <span class="search-back-drop"></span>
            <button class="close-search"><span class="fa fa-times"></span></button>
            <div class="search-inner">
                <form method="get" action="{{ route('search') }}">
                    <div class="form-group">
                        <input type="search" name="q" value="" placeholder="Search..." required="">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </div>
                </form>
            </div>
        </div>
        <!-- End Header Search -->

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

