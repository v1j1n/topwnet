<!-- Footer area start here -->
<footer class="main-footer footer-style-three pt-100">
    <div class="container">
        <div class="footer-cta">
            <div class="sec-title">
                <h2 class="title wow splt-txt" data-splitting>Innovate. Secure. Grow with <br />Top World Networks</h2>
                <p class="text wow fadeInUp" data-wow-delay="00ms" data-wow-duration="1500ms">Transforming businesses through advanced IT, security, and digital services.</p>
            </div>
            <div class="btn-wrp wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                <a href="{{ route('contact') }}" class="cta-btn">Contact us now <i class="fa-regular fa-arrow-up-right"></i></a>
            </div>
            <div class="bg-shape">
                <img src="{{ asset('images/shape/cta-line.png') }}" alt="Image">
            </div>
            <div class="arry">
                <img class="animation__arryLeftRight" src="{{ asset('images/shape/cta-arry.png') }}" alt="Image">
            </div>
        </div>

        <div class="widgets-section">
            <div class="row g-5 g-xl-0">
                <div class="col-lg-4 footer-column">
                    <div class="footer-widget about-widget">
                        <div class="logo">
                            <a href="{{ route('home') }}">
                                <img src="{{ asset('images/logo.png') }}" alt="Logo">
                            </a>
                        </div>
                        <div class="widget-content">
                            <p class="text">Top World Networks is a leading IT solutions provider in Kuwait. We specialize in IT consulting, security, outsourcing, web development, and annual maintenance. Our goal is to simplify technology for your business success.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="row g-4 g-xl-0">
                        <div class="col-sm-6 col-xl-4 footer-column">
                            <div class="footer-widget links-widget">
                                <h4 class="widget-title">Our Services</h4>
                                <div class="widget-content">
                                    <ul class="user-links">
                                        <li><a href="{{ route('services.it-consulting') }}">IT Consulting</a></li>
                                        <li><a href="{{ route('services.network-security') }}">IT Security</a></li>
                                        <li><a href="{{ route('services.it-outsourcing') }}">IT Outsourcing</a></li>
                                        <li><a href="{{ route('services.hardware') }}">Hardware & Software Solutions</a></li>
                                        <li><a href="{{ route('services.amc') }}">AMC (Annual Maintenance Contract)</a></li>
                                        <li><a href="{{ route('services.webdev') }}">Web & Hosting Services</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-xl-4 footer-column">
                            <div class="footer-widget links-widget">
                                <h4 class="widget-title">Quick Link</h4>
                                <div class="widget-content">
                                    <ul class="user-links">
                                        <li><a href="{{ route('home') }}">Home</a></li>
                                        <li><a href="{{ route('about-us') }}">About us</a></li>
                                        <li><a href="{{ route('partners') }}">Partners</a></li>
                                        <li><a href="{{ route('clients') }}">Clients</a></li>
                                        <li><a href="{{ route('contact') }}">Contact</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-xl-4 footer-column">
                            <div class="footer-widget links-widget contact-widget">
                                <h4 class="widget-title">Contact</h4>
                                <div class="widget-content">
                                    <ul class="user-links">
                                        <li>
                                            <i class="fa-light fa-location-dot"></i>
                                            <a href="#0">Kuwait City, Al Qibla, Block 13, Al Soor Street, Al Marzook Building. Third Floor, Office No. 15</a>
                                        </li>
                                        <li>
                                            <i class="fa-light fa-envelope"></i>
                                            <a href="mailto:sales@topwnet.com">sales@topwnet.com</a><br />
                                            <a href="mailto:support@topwnet.com">support@topwnet.com</a>
                                        </li>
                                        <li>
                                            <i class="fa-light fa-phone-flip"></i>
                                            <a href="tel:+96522445419">+965 22445419 / 22445391</a><br />
                                            <a href="tel:+96594411744">+965 94411744 / 50410555</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <p class="copyright-text">Copyright {{ date('Y') }}, <a href="{{ route('home') }}">Top World Networks</a> All Rights Reserved</p>
            <button class="goTop-btn">
                <i class="fa-solid fa-angles-up"></i>
                <i class="fa-solid fa-angles-up"></i>
            </button>
        </div>
    </div>

    <div class="sec-shape">
        <img class="animation__rotateY" src="{{ asset('images/shape/dual-circle420.png') }}" alt="Image">
    </div>
    <div class="box-shape">
        <div class="box1 wow slideInUp" data-wow-delay="200ms" data-wow-duration="1500ms"></div>
        <div class="box2 wow slideInLeft" data-wow-delay="200ms" data-wow-duration="1500ms"></div>
    </div>
</footer>
<!-- Footer area end here -->

