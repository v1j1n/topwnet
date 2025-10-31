@extends('layouts.app')

@section('title', 'Contact Us - Top World Networks')

@section('description', 'Get in touch with Top World Networks for IT consulting, security solutions, and digital services in Kuwait.')

@section('content')
<!-- Page Banner -->
<x-page-banner
    title="Contact Us"
    :breadcrumbs="['Home' => route('home'), 'Contact' => null]"
    imageKey="contact_banner"
/>

<!-- Contact Section -->
<section class="contact-section pt-120 pb-90">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="contact-info-box">
                    <div class="icon">
                        <i class="fa-light fa-location-dot"></i>
                    </div>
                    <h4>Our Location</h4>
                    <p>Kuwait City, Al Qibla, Block 13, Al Soor Street, Al Marzook Building. Third Floor, Office No. 15</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="contact-info-box">
                    <div class="icon">
                        <i class="fa-light fa-envelope"></i>
                    </div>
                    <h4>Email Address</h4>
                    <p>
                        <a href="mailto:sales@topwnet.com">sales@topwnet.com</a><br>
                        <a href="mailto:support@topwnet.com">support@topwnet.com</a>
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="contact-info-box">
                    <div class="icon">
                        <i class="fa-light fa-phone-flip"></i>
                    </div>
                    <h4>Phone Number</h4>
                    <p>
                        <a href="tel:+96522445419">+965 22445419 / 22445391</a><br>
                        <a href="tel:+96594411744">+965 94411744 / 50410555</a>
                    </p>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-lg-8">
                <div class="contact-form">
                    <h3>Send Us a Message</h3>
                    <form action="{{ route('contact.submit') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="name" placeholder="Your Name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="email" name="email" placeholder="Your Email" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="tel" name="phone" placeholder="Phone Number" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="subject" placeholder="Subject">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea name="message" placeholder="Your Message" rows="5" required></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn-one">Send Message <i class="fa-solid fa-angle-right ms-2"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="contact-sidebar">
                    <h3>Business Hours</h3>
                    <ul class="business-hours">
                        <li>
                            <span>Monday - Thursday:</span>
                            <span>8:00 AM - 5:00 PM</span>
                        </li>
                        <li>
                            <span>Friday:</span>
                            <span>Closed</span>
                        </li>
                        <li>
                            <span>Saturday:</span>
                            <span>9:00 AM - 2:00 PM</span>
                        </li>
                        <li>
                            <span>Sunday:</span>
                            <span>Closed</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Google Map -->
<section class="google-map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3477.311065002766!2d47.9681688!3d29.3611799!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3fcf84dbbd47f72f%3A0x69472b6acf4338f3!2sTop%20World%20Networks%20Co.!5e0!3m2!1sen!2skw!4v1760211917914!5m2!1sen!2skw" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</section>
@endsection

