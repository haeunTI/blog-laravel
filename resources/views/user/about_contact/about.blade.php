@extends('user.dashboard')

@section('content')

        <section class="page-title centred" style="background-image: url({{ asset('frontend/assets/images/web/banner_about.jpg') }})">
            <div class="auto-container">
                <div class="content-box clearfix">
                    <h1>About Us</h1>
                    <ul class="bread-crumb clearfix">
                        <li><a href="index.html">Home</a></li>
                        <li>About Us</li>
                    </ul>
                </div>
            </div>
        </section>


        <section class="about-section about-page pb-0">
            <div class="auto-container">
                <div class="inner-container">
                    <div class="row align-items-center clearfix">
                        <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                            <div class="image_block_2">
                                <div class="image-box">
                                    <figure class="image"><img src="{{ asset('frontend/assets/images/web/about.jpg') }}" alt=""></figure>
                                    <div class="text wow fadeInLeft animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                                        <h2>20</h2>
                                        <h4>Years of <br />Experience</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                            <div class="content_block_3">
                                <div class="content-box">
                                    <div class="sec-title">
                                        <h5>About</h5>
                                        <h2>RealEstate</h2>
                                    </div>
                                    <div class="text">
                                        <p>Dolor sit amet consectetur elit sed do eiusmod tempor incididunt labore et dolore magna aliqua enim ad minim veniam quis nostrud exercitation ullamco laboris aliquip ex ea commodo consequat duis aute irure.</p>
                                        <p>dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur excepteur sint occaecat.</p>
                                    </div>
                                    <ul class="list clearfix">
                                        <li>consectetur elit sed do eius</li>
                                        <li>consectetur elit sed</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- about-section end -->


        <!-- feature-style-three -->
        <section class="feature-style-three centred pb-110">
            <div class="auto-container">
                <div class="sec-title">
                    <h5>Our Services</h5>
                    <h2>Property Services</h2>
                </div>
                <div class="three-item-carousel owl-carousel owl-theme owl-nav-none dots-style-one">
                    <div class="feature-block-two">
                        <div class="inner-box">
                            <div class="icon-box"><i class="icon-1"></i></div>
                            <h4>Excellent Reputation</h4>
                            <p>Lorem ipsum dolor sit consectetur sed eiusm tempor incididunt dolore magna.</p>
                        </div>
                    </div>
                    <div class="feature-block-two">
                        <div class="inner-box">
                            <div class="icon-box"><i class="icon-26"></i></div>
                            <h4>Best Local Agents</h4>
                            <p>Lorem ipsum dolor sit consectetur sed eiusm tempor incididunt dolore magna.</p>
                        </div>
                    </div>
                    <div class="feature-block-two">
                        <div class="inner-box">
                            <div class="icon-box"><i class="icon-21"></i></div>
                            <h4>Personalized Service</h4>
                            <p>Lorem ipsum dolor sit consectetur sed eiusm tempor incididunt dolore magna.</p>
                        </div>
                    </div>
                    <div class="feature-block-two">
                        <div class="inner-box">
                            <div class="icon-box"><i class="icon-1"></i></div>
                            <h4>Excellent Reputation</h4>
                            <p>Lorem ipsum dolor sit consectetur sed eiusm tempor incididunt dolore magna.</p>
                        </div>
                    </div>
                    <div class="feature-block-two">
                        <div class="inner-box">
                            <div class="icon-box"><i class="icon-26"></i></div>
                            <h4>Best Local Agents</h4>
                            <p>Lorem ipsum dolor sit consectetur sed eiusm tempor incididunt dolore magna.</p>
                        </div>
                    </div>
                    <div class="feature-block-two">
                        <div class="inner-box">
                            <div class="icon-box"><i class="icon-21"></i></div>
                            <h4>Personalized Service</h4>
                            <p>Lorem ipsum dolor sit consectetur sed eiusm tempor incididunt dolore magna.</p>
                        </div>
                    </div>
                    <div class="feature-block-two">
                        <div class="inner-box">
                            <div class="icon-box"><i class="icon-1"></i></div>
                            <h4>Excellent Reputation</h4>
                            <p>Lorem ipsum dolor sit consectetur sed eiusm tempor incididunt dolore magna.</p>
                        </div>
                    </div>
                    <div class="feature-block-two">
                        <div class="inner-box">
                            <div class="icon-box"><i class="icon-26"></i></div>
                            <h4>Best Local Agents</h4>
                            <p>Lorem ipsum dolor sit consectetur sed eiusm tempor incididunt dolore magna.</p>
                        </div>
                    </div>
                    <div class="feature-block-two">
                        <div class="inner-box">
                            <div class="icon-box"><i class="icon-21"></i></div>
                            <h4>Personalized Service</h4>
                            <p>Lorem ipsum dolor sit consectetur sed eiusm tempor incididunt dolore magna.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- feature-style-three end -->


        <!-- cta-section -->
        <section class="cta-section alternate-2 pb-240 centred" style="background-image: url(assets/images/background/cta-1.jpg);">
            <div class="auto-container">
                <div class="inner-box clearfix">
                    <div class="text">
                        <h2>Looking to Buy a New Property or <br />Sell an Existing One?</h2>
                    </div>
                    <div class="btn-box">
                        <a href="{{ route('frontend.item.sewa') }}" class="theme-btn btn-three">Rent Properties</a>
                        <a href="{{ route('frontend.item.jual') }}" class="theme-btn btn-one">Buy Properties</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- cta-section end -->


        <!-- funfact-section -->
        <section class="funfact-section centred">
            <div class="auto-container">
                <div class="inner-container wow slideInLeft animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                    <div class="row clearfix">
                        <div class="col-lg-3 col-md-6 col-sm-12 funfact-block">
                            <div class="funfact-block-one">
                                <div class="inner-box">
                                    <div class="count-outer count-box">
                                        <span class="count-text" data-speed="1500" data-stop="1270">0</span>
                                    </div>
                                    <p>Total Professionals</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 funfact-block">
                            <div class="funfact-block-one">
                                <div class="inner-box">
                                    <div class="count-outer count-box">
                                        <span class="count-text" data-speed="1500" data-stop="2350">0</span>
                                    </div>
                                    <p>Total Property Sell</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 funfact-block">
                            <div class="funfact-block-one">
                                <div class="inner-box">
                                    <div class="count-outer count-box">
                                        <span class="count-text" data-speed="1500" data-stop="2540">0</span>
                                    </div>
                                    <p>Total Property Rent</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 funfact-block">
                            <div class="funfact-block-one">
                                <div class="inner-box">
                                    <div class="count-outer count-box">
                                        <span class="count-text" data-speed="1500" data-stop="8270">0</span>
                                    </div>
                                    <p>Total Customers</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- funfact-section end -->


        <!-- testimonial-style-four -->
        <section class="testimonial-style-four sec-pad centred">
            <div class="auto-container">
                <div class="sec-title">
                    <h5>Testimonials</h5>
                    <h2>What They Say About Us</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing sed do eiusmod tempor incididunt <br />labore dolore magna aliqua enim.</p>
                </div>
                <div class="three-item-carousel owl-carousel owl-theme owl-nav-none dots-style-one">
                    <div class="testimonial-block-three">
                        <div class="inner-box">
                            <div class="icon-box"><i class="icon-18"></i></div>
                            <h4>“Our goal each day is to ensure that our residents’ needs are not only met but exceeded.”</h4>
                            <h5>Rebeka Dawson</h5>
                            <span class="designation">Instructor</span>
                        </div>
                    </div>
                    <div class="testimonial-block-three">
                        <div class="inner-box">
                            <div class="icon-box"><i class="icon-18"></i></div>
                            <h4>“Our goal each day is to ensure that our residents’ needs are not only met but exceeded.”</h4>
                            <h5>Marc Kenneth</h5>
                            <span class="designation">Founder CEO</span>
                        </div>
                    </div>
                    <div class="testimonial-block-three">
                        <div class="inner-box">
                            <div class="icon-box"><i class="icon-18"></i></div>
                            <h4>“Our goal each day is to ensure that our residents’ needs are not only met but exceeded.”</h4>
                            <h5>Owen Lester</h5>
                            <span class="designation">Manager</span>
                        </div>
                    </div>
                    <div class="testimonial-block-three">
                        <div class="inner-box">
                            <div class="icon-box"><i class="icon-18"></i></div>
                            <h4>“Our goal each day is to ensure that our residents’ needs are not only met but exceeded.”</h4>
                            <h5>Rebeka Dawson</h5>
                            <span class="designation">Instructor</span>
                        </div>
                    </div>
                    <div class="testimonial-block-three">
                        <div class="inner-box">
                            <div class="icon-box"><i class="icon-18"></i></div>
                            <h4>“Our goal each day is to ensure that our residents’ needs are not only met but exceeded.”</h4>
                            <h5>Marc Kenneth</h5>
                            <span class="designation">Founder CEO</span>
                        </div>
                    </div>
                    <div class="testimonial-block-three">
                        <div class="inner-box">
                            <div class="icon-box"><i class="icon-18"></i></div>
                            <h4>“Our goal each day is to ensure that our residents’ needs are not only met but exceeded.”</h4>
                            <h5>Owen Lester</h5>
                            <span class="designation">Manager</span>
                        </div>
                    </div>
                    <div class="testimonial-block-three">
                        <div class="inner-box">
                            <div class="icon-box"><i class="icon-18"></i></div>
                            <h4>“Our goal each day is to ensure that our residents’ needs are not only met but exceeded.”</h4>
                            <h5>Rebeka Dawson</h5>
                            <span class="designation">Instructor</span>
                        </div>
                    </div>
                    <div class="testimonial-block-three">
                        <div class="inner-box">
                            <div class="icon-box"><i class="icon-18"></i></div>
                            <h4>“Our goal each day is to ensure that our residents’ needs are not only met but exceeded.”</h4>
                            <h5>Marc Kenneth</h5>
                            <span class="designation">Founder CEO</span>
                        </div>
                    </div>
                    <div class="testimonial-block-three">
                        <div class="inner-box">
                            <div class="icon-box"><i class="icon-18"></i></div>
                            <h4>“Our goal each day is to ensure that our residents’ needs are not only met but exceeded.”</h4>
                            <h5>Owen Lester</h5>
                            <span class="designation">Manager</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- testimonial-style-four end -->


        <!-- clients-section -->
        <section class="clients-section bg-color-1">
            <div class="pattern-layer" style="background-image: url(assets/images/shape/shape-1.png);"></div>
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-4 col-md-12 col-sm-12 title-column">
                        <div class="sec-title">
                            <h5>Our Pertners</h5>
                            <h2>We’re going to Became Partners for the Long Run.</h2>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-12 col-sm-12 inner-column">
                        <div class="clients-logo">
                            <ul class="logo-list clearfix">
                                <li>
                                    <figure class="logo"><a href="index-2.html"><img src="assets/images/clients/clients-1.png" alt=""></a></figure>
                                </li>
                                <li>
                                    <figure class="logo"><a href="index-2.html"><img src="assets/images/clients/clients-2.png" alt=""></a></figure>
                                </li>
                                <li>
                                    <figure class="logo"><a href="index-2.html"><img src="assets/images/clients/clients-3.png" alt=""></a></figure>
                                </li>
                                <li>
                                    <figure class="logo"><a href="index-2.html"><img src="assets/images/clients/clients-4.png" alt=""></a></figure>
                                </li>
                                <li>
                                    <figure class="logo"><a href="index-2.html"><img src="assets/images/clients/clients-5.png" alt=""></a></figure>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

@endsection