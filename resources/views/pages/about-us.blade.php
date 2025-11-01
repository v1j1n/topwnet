@extends('layouts.app')
@section('title', ($aboutUs->title ?? 'About Us') . ' - Top World Networks')
@section('description', $aboutUs->description ?? 'Learn about Top World Networks, Kuwait\'s leading IT solutions provider since 2005, offering innovative digital, networking, and cloud services.')
@section('content')

    {{-- Page Title Banner Section with Dynamic Background --}}
    <x-page-banner
        :title="$aboutUs->title ?? 'About Us'"
        :breadcrumbs="['Home' => route('home'), $aboutUs->title ?? 'About Us' => null]"
        imageKey="aboutus_banner"
    />

    {{-- About Section with Chairman's Message --}}
    <section class="about-section-4 pt-80 pb-80">
        <div class="auto-container">
            <div class="about-wrapper-4">
                <div class="row g-4 align-items-center">
                    <div class="col-lg-6">
                        <div class="about-image wow img-custom-anim-left">
                            @if($aboutUs?->about_section_image)
                                <img src="{{ Storage::url($aboutUs->about_section_image) }}" alt="{{ $aboutUs->title ?? 'About Us' }}">
                            @else
                                <img src="{{ asset('images/about/about1.jpg') }}" alt="About Us">
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-content">
                            <div class="sec-title mb-0">
                                <h6 class="sub-title wow fadeInUp">
                                    <span class="triangle triangle1"></span>
                                    <span class="triangle triangle2"></span>
                                    about us
                                </h6>
                                <h2 class="wow fadeInUp" data-wow-delay=".2s">{{ $aboutUs?->title ?? "Chairman's Message" }}</h2>
                                @if($aboutUs?->description)
                                    <div class="about-text wow fadeInUp mt-3" data-wow-delay=".6s">
                                        {!! $aboutUs->description !!}
                                    </div>
                                @else
                                    <p class="about-text wow fadeInUp mt-3" data-wow-delay=".6s">"Since our inception in 2005, <strong>Top World Networks</strong> has been driven by a vision to empower businesses through technology. What began as a small web solutions company has grown into a trusted IT partner delivering innovative and reliable digital solutions across Kuwait and beyond.</p>
                                    <p class="about-text wow fadeInUp mt-3" data-wow-delay=".6s">Our success is built on <strong>trust, innovation, and commitment to excellence.</strong> We take pride in understanding our clients' needs and delivering solutions that create real value.</p>
                                    <p class="about-text wow fadeInUp mt-3" data-wow-delay=".6s">As we look ahead, we remain dedicated to embracing new technologies and continuing our journey of growth, collaboration, and excellence."</p>
                                @endif
                            </div>

                            <div class="info mt-50">
                                @if($aboutUs?->chairman_name || $aboutUs?->designation)
                                <div class="user">
                                    <div class="image">
                                        <img src="{{ asset('images/about/about-user.png') }}" alt="Chairman">
                                    </div>
                                    <div>
                                        <img src="{{ asset('images/sign.png') }}" alt="Signature">
                                        <p class="sub-title">{{ $aboutUs?->designation && !str_contains($aboutUs->chairman_name ?? '', $aboutUs->designation) ?  $aboutUs->designation : '' }}</p>
                                    </div>
                                </div>
                                @endif

                                @if($aboutUs?->company_profile_file)
                                <div class="btn-wrp wow fadeInUp mt-10 animation__arryLeftRight" data-wow-delay="200ms" data-wow-duration="1500ms">
                                    <a href="{{ Storage::url($aboutUs->company_profile_file) }}" class="cta-btn download-pdf" target="_blank">Download company profile <i class="fa-regular fa-arrow-up-right"></i></a>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Funfact area start here -->
    {{-- Company Insights Section --}}
    <section class="funfact-section-two have-after">
        <div class="sec-shape">
            <img class="animation__rotateAndScale" src="{{ asset('images/shape/funface-dual-circle.png') }}" alt="Image">
        </div>
        <div class="container">
            <div class="outer-box">
                <div class="row g-5 align-items-center">
                    <div class="col-xl-4 col-xxl-4">
                        <div class="sec-title">
                            <h6 class="sub-title wow fadeInUp" data-wow-delay="00ms" data-wow-duration="1500ms">Insights</h6>
                            <h2 class="title text-white wow splt-txt" data-splitting>Company insights</h2>
                            <ul class="list wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                                <li><i class="fa-regular fa-check"></i> Empowering Your Team with Training</li>
                                <li><i class="fa-regular fa-check"></i> Performance Proven Strategies</li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-xl-8 col-xxl-7">
                        <div class="row g-4">

                            <div class="col-md-6 col-lg-4 wow fadeInLeft" data-wow-delay="00ms" data-wow-duration="1500ms">
                                <div class="funfact-block-two">
                                    <div class="inner-box">
                                        <div class="icon">
                                            <svg width="55" height="60" viewBox="0 0 55 55" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_278_96)">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                          d="M27.3209 16.4886C21.5697 16.4886 16.7291 20.5703 15.5928 25.9847C15.4521 26.6551 14.7945 27.0846 14.1241 26.9439C13.4536 26.8032 13.0242 26.1455 13.1649 25.4751C14.5382 18.9315 20.3762 14.0078 27.3209 14.0078C34.262 14.0078 39.9151 18.7758 41.421 25.1494C41.5786 25.8161 41.1658 26.4842 40.4991 26.6418C39.8324 26.7993 39.1642 26.3866 39.0067 25.7198C37.757 20.4307 33.076 16.4886 27.3209 16.4886Z"
                                                          fill="black" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                          d="M20.9879 4.07718C20.9879 2.35869 22.3798 0.966797 24.0983 0.966797H27.2969C27.982 0.966797 28.5374 1.52216 28.5374 2.20723C28.5374 2.89229 27.982 3.44765 27.2969 3.44765H24.0983C23.7499 3.44765 23.4688 3.72885 23.4688 4.07718V9.09656C23.4688 9.66576 23.0814 10.1619 22.5292 10.3C21.7064 10.5056 20.9862 10.7334 20.3018 11.0031C19.5123 11.3143 18.7537 11.6881 17.9263 12.1646C17.4319 12.4492 16.8071 12.36 16.4121 11.9482L12.9463 8.33478C12.9458 8.33435 12.9454 8.33393 12.945 8.3335C12.7036 8.08512 12.3086 8.0822 12.0675 8.31529L12.0633 8.31942L7.44023 12.7457C7.19215 12.9871 7.18931 13.3819 7.42231 13.6229L7.42567 13.6264L10.8949 17.2433C11.2823 17.6472 11.3513 18.2603 11.0634 18.7402C10.1871 20.2007 9.86626 21.5035 9.405 23.3768C9.38173 23.4713 9.35811 23.5672 9.33404 23.6647C9.19727 24.2186 8.70031 24.6078 8.12977 24.6078H3.11039C2.76206 24.6078 2.48085 24.889 2.48085 25.2374V31.6346C2.48085 32.3197 1.92549 32.875 1.24043 32.875C0.555358 32.875 0 32.3197 0 31.6346V25.2374C0 23.5188 1.39191 22.127 3.11039 22.127H7.15787C7.48339 20.822 7.8279 19.5895 8.474 18.3032L5.63861 15.3471C5.63799 15.3465 5.63738 15.3459 5.63677 15.3452C4.44507 14.1104 4.49152 12.1457 5.71755 10.9605L5.72182 10.9563L5.72183 10.9564L10.3456 6.52927C11.5805 5.33805 13.5449 5.38468 14.7299 6.61053L14.7333 6.614L17.5436 9.54396C18.1557 9.22362 18.7614 8.94371 19.3919 8.69515C19.9072 8.49204 20.4337 8.31198 20.9879 8.14842V4.07718Z"
                                                          fill="black" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                          d="M34.0119 4.07718C34.0119 2.35869 32.6199 0.966797 30.9015 0.966797H27.7029C27.0178 0.966797 26.4624 1.52216 26.4624 2.20723C26.4624 2.89229 27.0178 3.44765 27.7029 3.44765H30.9015C31.2499 3.44765 31.531 3.72885 31.531 4.07718V9.09656C31.531 9.66576 31.9184 10.1619 32.4706 10.3C33.2934 10.5056 34.0136 10.7334 34.698 11.0031C35.4875 11.3143 36.2461 11.6881 37.0734 12.1646C37.5679 12.4492 38.1927 12.36 38.5876 11.9482L42.0535 8.33478C42.0539 8.33435 42.0544 8.33393 42.0548 8.3335C42.2962 8.08512 42.6912 8.0822 42.9323 8.31529L42.9365 8.31942L47.5595 12.7457C47.8077 12.9871 47.8105 13.3819 47.5775 13.6229L47.5741 13.6264L44.1048 17.2433C43.7175 17.6472 43.6485 18.2603 43.9364 18.7402C44.8127 20.2007 45.1335 21.5035 45.5948 23.3768C45.6181 23.4713 45.6417 23.5672 45.6658 23.6647C45.8025 24.2186 46.2995 24.6078 46.87 24.6078H51.8894C52.2377 24.6078 52.5189 24.889 52.5189 25.2374V31.6346C52.5189 32.3197 53.0742 32.875 53.7594 32.875C54.4444 32.875 54.9998 32.3197 54.9998 31.6346V25.2374C54.9998 23.5188 53.6079 22.127 51.8894 22.127H47.8419C47.5163 20.822 47.1718 19.5895 46.5258 18.3032L49.3612 15.3471C49.3617 15.3465 49.3624 15.3459 49.363 15.3452C50.5547 14.1104 50.5083 12.1457 49.2822 10.9605L49.2779 10.9563V10.9564L44.6541 6.52927C43.4193 5.33805 41.4548 5.38468 40.2699 6.61053L40.2664 6.614L37.4562 9.54396C36.8441 9.22362 36.2383 8.94371 35.6079 8.69515C35.0926 8.49204 34.5661 8.31198 34.0119 8.14842V4.07718Z"
                                                          fill="black" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                          d="M44.9392 41.1917C43.3955 41.1917 41.97 41.656 40.801 42.4702C40.2389 42.8616 39.4658 42.7234 39.0742 42.1611C38.6827 41.599 38.821 40.8259 39.3832 40.4343C40.97 39.3293 42.8907 38.7109 44.9392 38.7109C50.3485 38.7109 54.7175 43.08 54.7175 48.4892V54.1339H42.1344C41.4492 54.1339 40.8938 53.5786 40.8938 52.8935C40.8938 52.2084 41.4492 51.653 42.1344 51.653H52.2367V48.4892C52.2367 44.4502 48.9783 41.1917 44.9392 41.1917Z"
                                                          fill="black" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                          d="M44.9392 29.8968C42.4987 29.8968 40.5205 31.8752 40.5205 34.3155C40.5205 36.7559 42.4987 38.7342 44.9392 38.7342C47.3795 38.7342 49.3578 36.7559 49.3578 34.3155C49.3578 31.8752 47.3795 29.8968 44.9392 29.8968ZM38.0396 34.3155C38.0396 30.505 41.1286 27.416 44.9392 27.416C48.7496 27.416 51.8386 30.505 51.8386 34.3155C51.8386 38.1261 48.7496 41.2151 44.9392 41.2151C41.1286 41.2151 38.0396 38.1261 38.0396 34.3155Z"
                                                          fill="black" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                          d="M1.3042 48.4892C1.3042 43.08 5.67331 38.7109 11.0825 38.7109C13.131 38.7109 15.0517 39.3293 16.6386 40.4343C17.2007 40.8259 17.3391 41.599 16.9475 42.1611C16.5561 42.7234 15.7829 42.8616 15.2208 42.4702C14.0518 41.656 12.6262 41.1917 11.0825 41.1917C7.04345 41.1917 3.78505 44.4502 3.78505 48.4892V51.653H14.4288C15.1138 51.653 15.6692 52.2084 15.6692 52.8935C15.6692 53.5786 15.1138 54.1339 14.4288 54.1339H1.3042V48.4892Z"
                                                          fill="black" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                          d="M11.0821 29.8969C8.64178 29.8969 6.66347 31.8752 6.66347 34.3155C6.66347 36.7559 8.64178 38.7342 11.0821 38.7342C13.5225 38.7342 15.5008 36.7559 15.5008 34.3155C15.5008 31.8752 13.5225 29.8969 11.0821 29.8969ZM4.18262 34.3155C4.18262 30.505 7.27165 27.416 11.0821 27.416C14.8927 27.416 17.9817 30.505 17.9817 34.3155C17.9817 38.1261 14.8927 41.2151 11.0821 41.2151C7.27164 41.2151 4.18262 38.1261 4.18262 34.3155Z"
                                                          fill="black" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                          d="M28.1584 38.9515C23.33 38.9515 19.3846 42.8763 19.3846 47.7253V51.6519H36.9567V47.7253C36.9567 42.8969 33.032 38.9515 28.183 38.9515H28.1584ZM16.9038 47.7253C16.9038 41.5021 21.9638 36.4707 28.1584 36.4707H28.183C34.4062 36.4707 39.4376 41.5307 39.4376 47.7253V54.1327H16.9038V47.7253Z"
                                                          fill="black" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                          d="M28.1829 25.7152C25.2125 25.7152 22.8046 28.1231 22.8046 31.0935C22.8046 34.0638 25.2125 36.4718 28.1829 36.4718C31.1532 36.4718 33.5611 34.0638 33.5611 31.0935C33.5611 28.1231 31.1532 25.7152 28.1829 25.7152ZM20.3237 31.0935C20.3237 26.753 23.8424 23.2344 28.1829 23.2344C32.5233 23.2344 36.042 26.753 36.042 31.0935C36.042 35.434 32.5233 38.9527 28.1829 38.9527C23.8424 38.9527 20.3237 35.434 20.3237 31.0935Z"
                                                          fill="black" />
                                                </g>
                                            </svg>
                                        </div>
                                        <div class="content-box">
                                            <h3 class="title"><span class="count">{{ $aboutUs->year_of_innovation ?? 20 }}</span>+</h3>
                                            <span class="sub-title">Years of Innovatio</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-4 wow fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
                                <div class="funfact-block-two">
                                    <div class="inner-box">
                                        <div class="icon">
                                            <svg width="55" height="60" viewBox="0 0 55 55" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                      d="M33.4754 3.05947H2.63782C2.55112 3.05947 2.48037 3.13022 2.48037 3.21703V51.7848C2.48037 51.8715 2.55112 51.9424 2.63782 51.9424H39.6442C39.731 51.9424 39.8016 51.8715 39.8016 51.7848V51.5964C39.8016 51.1203 40.1883 50.7337 40.6644 50.7337C41.1406 50.7337 41.5271 51.1203 41.5271 51.5964V51.7848C41.5271 52.822 40.6813 53.6679 39.6442 53.6679H2.63782C1.6008 53.6679 0.754883 52.822 0.754883 51.7848V3.21703C0.754883 2.1798 1.6008 1.33398 2.63782 1.33398H33.9155C34.1978 1.33398 34.4581 1.39157 34.6966 1.50049C34.8958 1.59151 35.0801 1.71866 35.2469 1.88539L40.9756 7.61412C41.1426 7.78106 41.2699 7.96558 41.361 8.16509V8.16531C41.4697 8.40343 41.5271 8.66354 41.5271 8.94566V19.6901C41.5271 20.1662 41.1406 20.5528 40.6644 20.5528C40.1883 20.5528 39.8016 20.1662 39.8016 19.6901V9.38588H34.8484C34.092 9.38588 33.4754 8.76901 33.4754 8.01293V3.05947ZM38.5817 7.66039L35.2008 4.27961V7.66039H38.5817ZM17.6218 44.0985C17.1455 44.0985 16.759 43.7119 16.759 43.2358C16.759 42.7597 17.1455 42.373 17.6218 42.373H26.6405C27.1166 42.373 27.5032 42.7597 27.5032 43.2358C27.5032 43.7119 27.1166 44.0985 26.6405 44.0985H17.6218ZM17.6218 39.881C17.1455 39.881 16.759 39.4945 16.759 39.0183C16.759 38.5421 17.1455 38.1555 17.6218 38.1555H25.0712C25.5474 38.1555 25.934 38.5421 25.934 39.0183C25.934 39.4945 25.5474 39.881 25.0712 39.881H17.6218ZM17.6218 31.4458C17.1455 31.4458 16.759 31.0593 16.759 30.5831C16.759 30.107 17.1455 29.7205 17.6218 29.7205H25.5366C26.0128 29.7205 26.3993 30.107 26.3993 30.5831C26.3993 31.0593 26.0128 31.4458 25.5366 31.4458H17.6218ZM17.6218 27.2284C17.1455 27.2284 16.759 26.8418 16.759 26.3657C16.759 25.8895 17.1455 25.5029 17.6218 25.5029H27.7007C28.1768 25.5029 28.5633 25.8895 28.5633 26.3657C28.5633 26.8418 28.1768 27.2284 27.7007 27.2284H17.6218ZM17.6218 14.5759C17.1455 14.5759 16.759 14.1893 16.759 13.7132C16.759 13.2371 17.1455 12.8504 17.6218 12.8504H34.2308C34.7069 12.8504 35.0935 13.2371 35.0935 13.7132C35.0935 14.1893 34.7069 14.5759 34.2308 14.5759H17.6218ZM17.6218 18.7934C17.1455 18.7934 16.759 18.4068 16.759 17.9306C16.759 17.4545 17.1455 17.068 17.6218 17.068H34.2308C34.7069 17.068 35.0935 17.4545 35.0935 17.9306C35.0935 18.4068 34.7069 18.7934 34.2308 18.7934H17.6218ZM5.70618 36.3821H13.4703C13.9468 36.3821 14.3331 36.7683 14.3331 37.2449V45.0091C14.3331 45.4855 13.9468 45.8718 13.4703 45.8718H5.70618C5.22973 45.8718 4.84343 45.4855 4.84343 45.0091V37.2449C4.84343 36.7683 5.22973 36.3821 5.70618 36.3821ZM6.56892 38.1076V44.1463H12.6076V38.1076H6.56892ZM7.42444 41.7687C7.08776 41.4319 7.08776 40.8852 7.42444 40.5486C7.76113 40.2119 8.30789 40.2119 8.64458 40.5486L9.08285 40.9867L10.8975 39.4371C11.2596 39.1279 11.8046 39.1709 12.1138 39.533C12.4231 39.895 12.38 40.4401 12.018 40.7494L9.59694 42.8168C9.25454 43.1092 8.74487 43.0891 8.42663 42.7708L7.42444 41.7687ZM5.70618 11.0772H13.4703C13.9468 11.0772 14.3331 11.4634 14.3331 11.9399V19.7041C14.3331 20.1805 13.9468 20.5668 13.4703 20.5668H5.70618C5.22973 20.5668 4.84343 20.1805 4.84343 19.7041V11.9399C4.84343 11.4634 5.22973 11.0772 5.70618 11.0772ZM6.56892 12.8026V18.8413H12.6076V12.8026H6.56892ZM7.42444 16.6176C7.08776 16.2809 7.08776 15.7343 7.42444 15.3976C7.76113 15.0608 8.30789 15.0608 8.64458 15.3976L9.08285 15.8358L10.8975 14.2862C11.2596 13.977 11.8046 14.0199 12.1138 14.3819C12.4231 14.7441 12.38 15.2891 12.018 15.5983L9.59694 17.6657C9.25454 17.9581 8.74487 17.9381 8.42663 17.6198L7.42444 16.6176ZM5.70618 23.7297H13.4703C13.9468 23.7297 14.3331 24.1158 14.3331 24.5924V32.3566C14.3331 32.833 13.9468 33.2193 13.4703 33.2193H5.70618C5.22973 33.2193 4.84343 32.833 4.84343 32.3566V24.5924C4.84343 24.1158 5.22973 23.7297 5.70618 23.7297ZM6.56892 25.4552V31.4938H12.6076V25.4552H6.56892ZM7.42444 29.1162C7.08776 28.7794 7.08776 28.2328 7.42444 27.8961C7.76113 27.5594 8.30789 27.5594 8.64458 27.8961L9.08285 28.3342L10.8975 26.7846C11.2596 26.4755 11.8046 26.5184 12.1138 26.8805C12.4231 27.2425 12.38 27.7876 12.018 28.0969L9.59694 30.1643C9.25454 30.4567 8.74487 30.4366 8.42663 30.1183L7.42444 29.1162ZM40.6663 49.2239C33.1861 49.2239 27.0838 43.1254 27.0838 35.6451C27.0838 28.165 33.1862 22.0626 40.6663 22.0626C48.1466 22.0626 54.2451 28.165 54.2451 35.6451C54.2451 43.1255 48.1466 49.2239 40.6663 49.2239ZM40.6663 47.4984C47.196 47.4984 52.5196 42.1749 52.5196 35.6451C52.5196 29.1153 47.1961 23.7881 40.6663 23.7881C34.1364 23.7881 28.8093 29.1153 28.8093 35.6451C28.8093 42.1749 34.1365 47.4984 40.6663 47.4984ZM38.9935 35.5413L44.565 29.9117L44.5666 29.91C45.6345 28.8367 47.3772 28.8315 48.4506 29.8994C49.5235 30.9667 49.5303 32.7033 48.4629 33.7817L48.4625 33.7822C45.9532 36.3141 43.463 38.8612 40.9424 41.3819C39.8696 42.4547 38.1276 42.4547 37.0547 41.3819L32.8767 37.2001C31.8043 36.1276 31.8027 34.3919 32.8752 33.3139L32.8767 33.3124C33.9496 32.2395 35.6916 32.2395 36.7645 33.3124L38.9935 35.5413ZM38.3866 37.3746L35.5444 34.5324C35.1452 34.1332 34.4972 34.133 34.0976 34.5317C33.6985 34.9337 33.6972 35.5803 34.0969 35.98L38.2748 40.1617C38.6743 40.5612 39.3229 40.5612 39.7224 40.1617C42.241 37.6432 44.7292 35.0979 47.2365 32.5679C47.6339 32.1664 47.633 31.5199 47.2337 31.1226C46.8347 30.7258 46.1871 30.728 45.7902 31.1266L39.6099 37.3715C39.4484 37.5347 39.2285 37.6268 38.9989 37.6273C38.7694 37.6279 38.5489 37.537 38.3866 37.3746Z"
                                                      fill="black" />
                                            </svg>
                                        </div>
                                        <div class="content-box">
                                            <h3 class="title"><span class="count">{{ $aboutUs->successful_projects ?? 500 }}</span>+</h3>
                                            <span class="sub-title">Successful Projects</span>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-6 col-lg-4 wow fadeInLeft" data-wow-delay="400ms" data-wow-duration="1500ms">
                                <div class="funfact-block-two">
                                    <div class="inner-box">
                                        <div class="icon">
                                            <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M10.8984 12.7153L12.6445 16.3247L16.6054 16.8638C17.3906 16.9692 17.6718 17.9419 17.1327 18.4575L14.2382 21.2349L14.9531 25.1724C15.0937 25.9458 14.2734 26.5317 13.5937 26.1567L10.0663 24.2583L6.53899 26.1567C5.8593 26.52 5.00383 25.9575 5.19133 25.1138L5.89446 21.2232L2.99993 18.4458C2.43743 17.9067 2.74212 16.9458 3.53899 16.8403L7.48821 16.3013L9.2343 12.6919C9.56243 12.0005 10.5702 12.0122 10.8984 12.7153ZM11.1796 17.5903L10.0663 15.27L8.94133 17.5903C8.81243 17.8599 8.5429 18.0708 8.22649 18.1177L5.68352 18.4575L7.5468 20.2388C7.75774 20.4497 7.87493 20.7544 7.81633 21.0708L7.3593 23.6021L9.6093 22.395C9.87883 22.2544 10.2187 22.231 10.4999 22.395L12.7616 23.6138L12.3163 21.1294C12.246 20.8247 12.3281 20.4849 12.5741 20.2388L14.4374 18.4575L11.9179 18.1177C11.6132 18.0825 11.3202 17.8833 11.1796 17.5903ZM30.8437 4.21925L32.5898 7.82862L36.5624 8.36769C37.3476 8.47315 37.6288 9.44581 37.0898 9.97315L34.1952 12.7505L34.9101 16.688C35.0507 17.4614 34.2304 18.0474 33.5507 17.6724L29.9999 15.7739L26.4726 17.6724C25.7929 18.0357 24.9374 17.4732 25.1249 16.6294L25.8281 12.7388L22.9218 9.96143C22.3593 9.42237 22.664 8.46144 23.4609 8.35597L27.4101 7.8169L29.1562 4.21925C29.5077 3.5044 30.5038 3.51612 30.8437 4.21925ZM31.1249 9.09425L29.9999 6.77393L28.8866 9.09425C28.7577 9.36378 28.4882 9.57472 28.1718 9.62159L25.6171 9.96143L27.4804 11.7427C27.7031 11.9536 27.8085 12.2583 27.7499 12.5747L27.2929 15.106L29.5546 13.8989C29.8241 13.7583 30.1523 13.7349 30.4452 13.8989L32.707 15.1177L32.2616 12.6333C32.1913 12.3286 32.2734 11.9888 32.5195 11.7427L34.3827 9.96143L31.8632 9.60987C31.5468 9.58643 31.2656 9.38722 31.1249 9.09425ZM50.7773 12.7153L52.5234 16.3247L56.4843 16.8638C57.2695 16.9692 57.5624 17.9419 57.0116 18.4575L54.1171 21.2349L54.832 25.1724C54.9726 25.9458 54.1523 26.5317 53.4726 26.1567L49.9452 24.2583L46.4179 26.1567C45.7382 26.52 44.8827 25.9575 45.0585 25.1138L45.7616 21.2232L42.8671 18.4458C42.3046 17.9067 42.6093 16.9458 43.4062 16.8403L47.3554 16.3013L49.1015 12.6919C49.4413 12.0005 50.4491 12.0122 50.7773 12.7153ZM51.0585 17.5903L49.9452 15.27L48.8202 17.5903C48.6913 17.8599 48.4335 18.0708 48.1054 18.1177L45.5624 18.4575L47.414 20.2388C47.6249 20.4497 47.7421 20.7544 47.6835 21.0708L47.2265 23.6021L49.4882 22.395C49.7577 22.2544 50.0976 22.231 50.3788 22.395L52.6523 23.6138L52.207 21.1294C52.1366 20.8247 52.2187 20.4849 52.4648 20.2388L54.3163 18.4575L51.7968 18.1177C51.4921 18.0825 51.1992 17.8833 51.0585 17.5903ZM25.6523 36.645C25.3945 36.1997 25.5468 35.6255 25.9921 35.3677C26.4374 35.1099 27.0116 35.2622 27.2695 35.7075L28.4999 37.8403L32.871 33.4692C33.2343 33.106 33.832 33.106 34.1952 33.4692C34.5585 33.8325 34.5585 34.4302 34.1952 34.7935L28.957 40.0317C28.5234 40.4653 27.7968 40.3716 27.4921 39.8442L25.6523 36.645ZM29.9999 26.7427C35.0976 26.7427 39.2343 30.8794 39.2343 35.9771C39.2343 41.0747 35.0976 45.2114 29.9999 45.2114C24.9023 45.2114 20.7656 41.0747 20.7656 35.9771C20.7656 30.8794 24.9023 26.7427 29.9999 26.7427ZM35.2031 30.7739C32.332 27.9028 27.6679 27.9028 24.7968 30.7739C21.9257 33.645 21.9257 38.3091 24.7968 41.1802C27.6679 44.0513 32.332 44.0513 35.2031 41.1802C38.0741 38.2974 38.0741 33.645 35.2031 30.7739ZM29.9999 20.9419C38.2968 20.9419 45.0234 27.6685 45.0234 35.9653C45.0234 39.106 44.0624 42.0239 42.4101 44.438L46.8984 52.2075C47.332 52.9341 46.7343 53.7544 45.9609 53.6372L41.3671 52.9107L38.9062 55.9341C38.4726 56.4966 37.664 56.4028 37.3476 55.8403L34.207 50.4028C31.4648 51.1997 28.5234 51.1997 25.7929 50.4028L22.6523 55.8403C22.3359 56.4028 21.5273 56.4966 21.0937 55.9341L18.6327 52.9107L14.039 53.6372C13.2538 53.7661 12.7031 52.9107 13.0781 52.2427L17.5898 44.438C13.5116 38.4732 14.2734 30.4458 19.3827 25.3364C22.0898 22.6294 25.8515 20.9419 29.9999 20.9419ZM41.1679 46.02C39.7382 47.6138 37.9804 48.8911 35.9882 49.7583L38.2851 53.731L40.2538 51.3169C40.4765 51.0357 40.8163 50.9302 41.1445 50.9888L44.3085 51.4927L41.1679 46.02ZM23.9999 49.7583C22.0195 48.8911 20.2616 47.6138 18.832 46.0317L15.6796 51.4927L18.8437 50.9888C19.1601 50.9302 19.5116 51.0474 19.7343 51.3169L21.7031 53.731L23.9999 49.7583ZM39.3046 26.6724C34.1718 21.5396 25.8398 21.5396 20.707 26.6724C15.5741 31.8052 15.5741 40.1372 20.707 45.27C25.8515 50.4028 34.1718 50.4028 39.3046 45.27C44.4374 40.1372 44.4374 31.8052 39.3046 26.6724Z"
                                                    fill="black" />
                                            </svg>
                                        </div>
                                        <div class="content-box">
                                            <h3 class="title"><span class="count">{{ $aboutUs->client_retention ?? 100 }}%</span>+</h3>
                                            <span class="sub-title">Client Retention</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Funfact area end here -->


    <section class="choose-section pt-120 pb-120">
        <div class="container">
            <div class="row g-4">
                <div class="col-xl-6 content-column">
                    <div class="inner-column">
                        <div class="sec-title mb-30">
                            <h6 class="sub-title wow fadeInUp" data-wow-delay="00ms" data-wow-duration="1500ms">Mission & Vision</h6>
                            <h2 class="title wow splt-txt" data-splitting>We simplify technology, empowering your business to grow with confidence.</h2>
                        </div>

                        <div class="choose-tab">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button"
                                            role="tab" aria-controls="home" aria-selected="true"> Our Vision</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button"
                                            role="tab" aria-controls="profile" aria-selected="false"> Our Mission</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button"
                                            role="tab" aria-controls="contact" aria-selected="false"> Our Values</button>
                                </li>
                            </ul>
                        </div>

                        <div class="tab-content mt-30" id="myTabContent">
                            {{-- Vision Tab --}}
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="content-box">
                                    @if($aboutUs?->vision)
                                        <div class="text">{!! $aboutUs->vision !!}</div>
                                    @else
                                        <p class="text">Our vision is to be Kuwait's most trusted and innovative IT solutions partner, helping businesses achieve digital excellence through smart, scalable, and secure technology solutions.</p>
                                    @endif

                                    @if($aboutUs?->vision_points && is_array($aboutUs->vision_points) && count($aboutUs->vision_points) > 0)
                                        <div class="list mt-30 mb-50">
                                            @php
                                                $visionPoints = $aboutUs->vision_points;
                                                $half = ceil(count($visionPoints) / 2);
                                                $firstHalf = array_slice($visionPoints, 0, $half);
                                                $secondHalf = array_slice($visionPoints, $half);
                                            @endphp
                                            <ul>
                                                @foreach($firstHalf as $point)
                                                    <li><i class="fa-solid fa-check"></i> {{ is_array($point) ? ($point['point'] ?? '') : $point }}</li>
                                                @endforeach
                                            </ul>
                                            <ul>
                                                @foreach($secondHalf as $point)
                                                    <li><i class="fa-solid fa-check"></i> {{ is_array($point) ? ($point['point'] ?? '') : $point }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @else
                                        <div class="list mt-30 mb-50">
                                            <ul>
                                                <li><i class="fa-solid fa-check"></i> Leading with innovation and integrity</li>
                                                <li><i class="fa-solid fa-check"></i> Building long-term digital partnerships</li>
                                            </ul>
                                            <ul>
                                                <li><i class="fa-solid fa-check"></i> Driving sustainable business growth</li>
                                                <li><i class="fa-solid fa-check"></i> Delivering reliable and modern IT solutions</li>
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            {{-- Mission Tab --}}
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="content-box">
                                    @if($aboutUs?->mission)
                                        <div class="text">{!! $aboutUs->mission !!}</div>
                                    @else
                                        <p class="text">Our mission is to deliver tailored IT solutions that enhance operational efficiency, strengthen online presence, and empower organizations to thrive in a connected world.</p>
                                    @endif

                                    @if($aboutUs?->mission_points && is_array($aboutUs->mission_points) && count($aboutUs->mission_points) > 0)
                                        <div class="list mt-30 mb-50">
                                            @php
                                                $missionPoints = $aboutUs->mission_points;
                                                $half = ceil(count($missionPoints) / 2);
                                                $firstHalf = array_slice($missionPoints, 0, $half);
                                                $secondHalf = array_slice($missionPoints, $half);
                                            @endphp
                                            <ul>
                                                @foreach($firstHalf as $point)
                                                    <li><i class="fa-solid fa-check"></i> {{ is_array($point) ? ($point['point'] ?? '') : $point }}</li>
                                                @endforeach
                                            </ul>
                                            <ul>
                                                @foreach($secondHalf as $point)
                                                    <li><i class="fa-solid fa-check"></i> {{ is_array($point) ? ($point['point'] ?? '') : $point }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @else
                                        <div class="list mt-30 mb-50">
                                            <ul>
                                                <li><i class="fa-solid fa-check"></i> Providing end-to-end IT services</li>
                                                <li><i class="fa-solid fa-check"></i> Ensuring client satisfaction through excellence</li>
                                            </ul>
                                            <ul>
                                                <li><i class="fa-solid fa-check"></i> Promoting digital transformation in every project</li>
                                                <li><i class="fa-solid fa-check"></i> Committed to quality, security, and innovation</li>
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            {{-- Values Tab --}}
                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                <div class="content-box">
                                    @if($aboutUs?->our_values)
                                        <div class="text">{!! $aboutUs->our_values !!}</div>
                                    @else
                                        <p class="text">Our core values define who we are and guide every solution we deliver — from innovation to customer satisfaction, we build with purpose and passion.</p>
                                    @endif

                                    @if($aboutUs?->our_values_points && is_array($aboutUs->our_values_points) && count($aboutUs->our_values_points) > 0)
                                        <div class="list mt-30 mb-50">
                                            @php
                                                $valuesPoints = $aboutUs->our_values_points;
                                                $half = ceil(count($valuesPoints) / 2);
                                                $firstHalf = array_slice($valuesPoints, 0, $half);
                                                $secondHalf = array_slice($valuesPoints, $half);
                                            @endphp
                                            <ul>
                                                @foreach($firstHalf as $point)
                                                    <li><i class="fa-solid fa-check"></i> {{ is_array($point) ? ($point['point'] ?? '') : $point }}</li>
                                                @endforeach
                                            </ul>
                                            <ul>
                                                @foreach($secondHalf as $point)
                                                    <li><i class="fa-solid fa-check"></i> {{ is_array($point) ? ($point['point'] ?? '') : $point }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @else
                                        <div class="list mt-30 mb-50">
                                            <ul>
                                                <li><i class="fa-solid fa-check"></i> Integrity and transparency in all dealings</li>
                                                <li><i class="fa-solid fa-check"></i> Continuous learning and improvement</li>
                                            </ul>
                                            <ul>
                                                <li><i class="fa-solid fa-check"></i> Teamwork that drives excellence</li>
                                                <li><i class="fa-solid fa-check"></i> Commitment to customer success</li>
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 image-column">
                    <div class="inner-column">
                        <figure class="image">
                            @if($aboutUs?->vision_mission_image)
                                <img class="wow imageUpToDown" src="{{ Storage::url($aboutUs->vision_mission_image) }}" alt="Mission & Vision">
                            @else
                                <img class="wow imageUpToDown" src="{{ asset('images/about/about-kuwait.jpg') }}" alt="Top World Networks Kuwait">
                            @endif
                            <div class="outer-box">
                                <div class="choose-block">
                                    <!-- pie-graph -->
                                    <div class="pie-graph">
                                        <div class="graph-outer">
                                            <input type="text" class="dial" data-fgColor="#000" data-bgColor="#FFFFFF33" data-width="70"
                                                   data-height="70" data-linecap="normal" value="{{ $aboutUs->client_satisfaction ?? 95 }}">
                                        </div>
                                        <i class="fa-solid icon fa-arrow-up-right"></i>
                                    </div>
                                    <div class="content-box">
                                        <div class="inner-text count-box"><span class="count-text" data-stop="{{ $aboutUs->client_satisfaction ?? 95 }}"
                                                                                data-speed="2000"></span>%</div>
                                        <h5 class="title">Client Satisfaction</h5>
                                    </div>
                                </div>

                                <div class="choose-block">
                                    <!-- pie-graph -->
                                    <div class="pie-graph">
                                        <div class="graph-outer">
                                            <input type="text" class="dial" data-fgColor="#000" data-bgColor="#FFFFFF33" data-width="70"
                                                   data-height="70" data-linecap="normal" value="{{ $aboutUs->projects_delivered ?? 85 }}">
                                        </div>
                                        <i class="fa-solid icon fa-arrow-up-right"></i>
                                    </div>
                                    <div class="content-box">
                                        <div class="inner-text count-box"><span class="count-text" data-stop="{{ $aboutUs->projects_delivered ?? 85 }}"
                                                                                data-speed="2000"></span>% </div>
                                        <h5 class="title">Projects Delivered</h5>
                                    </div>
                                </div>
                            </div>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
