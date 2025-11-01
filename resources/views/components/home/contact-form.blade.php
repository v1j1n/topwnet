<!-- Contact Section Start -->
<section class="contact-section-four">
    <div class="container">
        <div class="outer-box pt-50">
            <div class="sec-title center mb-50">
                <h6 class="sub-title wow fadeInUp" data-wow-delay="00ms" data-wow-duration="1500ms">Get in touch</h6>
                <h2 class="title wow splt-txt" data-splitting>Have an Inquiry?</h2>
                <p class="text wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                    Ready to take the next step in your digital transformation? <br />
                    Let's connect to discuss how our IT consulting expertise can help drive your business forward.
                </p>
            </div>

            @if(session('success'))
                <div class="alert alert-success mb-4 text-center" role="alert" style="background-color: #d4edda; color: #155724; padding: 1rem; border-radius: 0.5rem; margin-bottom: 2rem;">
                    <strong>Success!</strong> {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger mb-4" role="alert" style="background-color: #f8d7da; color: #721c24; padding: 1rem; border-radius: 0.5rem; margin-bottom: 2rem;">
                    <strong>Error!</strong> Please fix the following errors:
                    <ul class="mb-0 mt-2" style="list-style-position: inside;">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="contact-block-four">
                <form id="contact_form" name="contact_form" action="{{ route('enquiry.store') }}" method="POST">
                    @csrf
                    @honeypot
                    <div class="row g-4">
                        <div class="col-lg-6">
                            <div class="input-feild">
                                <input name="name" type="text" placeholder="Your Name" value="{{ old('name') }}" required>
                                <div class="icon">
                                    <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0.554688 19.25C0.554688 15.384 4.00514 12.25 8.26148 12.25C12.5179 12.25 15.9683 15.384 15.9683 19.25H14.0416C14.0416 16.3505 11.4537 14 8.26148 14C5.06922 14 2.48139 16.3505 2.48139 19.25H0.554688ZM8.26148 11.375C5.06798 11.375 2.48139 9.02563 2.48139 6.125C2.48139 3.22438 5.06798 0.875 8.26148 0.875C11.455 0.875 14.0416 3.22438 14.0416 6.125C14.0416 9.02563 11.455 11.375 8.26148 11.375ZM8.26148 9.625C10.3905 9.625 12.1149 8.05875 12.1149 6.125C12.1149 4.19125 10.3905 2.625 8.26148 2.625C6.13248 2.625 4.40809 4.19125 4.40809 6.125C4.40809 8.05875 6.13248 9.625 8.26148 9.625ZM16.2416 12.865C18.9204 13.9616 20.785 16.408 20.785 19.25H18.8583C18.8583 17.1185 17.4598 15.2837 15.4508 14.4612L16.2416 12.865ZM15.5793 2.98656C17.5042 3.7074 18.8583 5.42816 18.8583 7.4375C18.8583 9.94893 16.743 12.0096 14.0416 12.2304V10.469C15.6761 10.2569 16.9316 8.981 16.9316 7.4375C16.9316 6.22943 16.1625 5.18528 15.0444 4.68681L15.5793 2.98656Z" fill="#092D3C" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="input-feild">
                                <input name="email" type="email" placeholder="Email Address" value="{{ old('email') }}" required>
                                <div class="icon">
                                    <svg width="24" height="19" viewBox="0 0 24 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M22.4031 0.875C22.9859 0.875 23.4582 1.30406 23.4582 1.83333V17.173C23.4582 17.6987 22.9778 18.125 22.4118 18.125H3.40273C2.8248 18.125 2.35629 17.6986 2.35629 17.173V16.2083H21.348V4.99583L12.9073 11.8958L2.35629 3.27083V1.83333C2.35629 1.30406 2.82868 0.875 3.41139 0.875H22.4031ZM8.68687 12.375V14.2917H0.246094V12.375H8.68687ZM5.52158 7.58333V9.5H0.246094V7.58333H5.52158ZM20.89 2.79167H4.92454L12.9073 9.31725L20.89 2.79167Z" fill="#092D3C" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="input-feild">
                                <input name="phone" type="text" placeholder="Phone number" value="{{ old('phone') }}" required>
                                <div class="icon">
                                    <svg width="19" height="19" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M22 16.92V20a2 2 0 0 1-2.18 2A19.9 19.9 0 0 1 2 4.18 2 2 0 0 1 4 2h3.09a1 1 0 0 1 1 .75 12.05 12.05 0 0 0 .7 2.27 1 1 0 0 1-.23 1.11L7.21 7.91a16 16 0 0 0 8.88 8.88l1.78-1.35a1 1 0 0 1 1.11-.23 12.05 12.05 0 0 0 2.27.7 1 1 0 0 1 .75 1Z" fill="#092D3C"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="input-feild">
                                <select name="service_name" id="subject" required>
                                    <option value="">Service you're looking for?</option>
                                    @if(isset($allServices) && $allServices->count() > 0)
                                        @foreach($allServices as $service)
                                            <option value="{{ $service->title }}" {{ old('service_name') == $service->title ? 'selected' : '' }}>
                                                {{ $service->title }}
                                            </option>
                                        @endforeach
                                    @else
                                        @foreach(['IT Consulting', 'Network Security', 'IT Outsourcing', 'Hardware & Software', 'AMC', 'Web Development', 'Domain & Hosting', 'Other'] as $service)
                                            <option value="{{ $service }}" {{ old('service_name') == $service ? 'selected' : '' }}>
                                                {{ $service }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="input-feild textarea-feild">
                                <textarea name="message" placeholder="Write Message" required>{{ old('message') }}</textarea>
                                <div class="icon">
                                    <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4.20621 14.8885L15.3724 4.7464L13.8154 3.33218L2.64921 13.4743V14.8885H4.20621ZM5.11829 16.8885H0.447266V12.6458L13.0369 1.21086C13.4669 0.820339 14.1639 0.820339 14.5939 1.21086L17.708 4.03929C18.1379 4.42981 18.1379 5.06298 17.708 5.4535L5.11829 16.8885ZM0.447266 18.8885H20.2647V20.8885H0.447266V18.8885Z" fill="#092D3C" />
                                    </svg>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn-one mt-4 mx-auto">
                                    Submit <i class="fa-solid fa-angle-right ms-2"></i>
                                </button>
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
<!-- Contact Section End -->

