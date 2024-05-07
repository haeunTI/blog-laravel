@extends('user.dashboard')

@php
    $web = App\Models\DataWeb::find(1);
@endphp

@section('content')
<section class="page-title centred" style="background-image: url({{ asset('frontend/assets/images/web/banner_about.jpg') }})">
            <div class="auto-container">
                <div class="content-box clearfix">
                    <h1>Contact Us</h1>
                    <ul class="bread-crumb clearfix">
                        <li><a href="index.html">Home</a></li>
                        <li>Contact Us</li>
                    </ul>
                </div>
            </div>
        </section>
        <!--End Page Title-->


        <!-- contact-info-section -->
        <section class="contact-info-section sec-pad centred">
            <div class="auto-container">
                <div class="sec-title">
                    <h5>Contact us</h5>
                    <h2>Get In Touch</h2>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-4 col-md-6 col-sm-12 info-block">
                        <div class="info-block-one">
                            <div class="inner-box">
                                <div class="icon-box"><i class="icon-32"></i></div>
                                <h4>Email Address</h4>
                                <p><a href="mailto:info@example.com">{{ $web->email }}</a><br /></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 info-block">
                        <div class="info-block-one">
                            <div class="inner-box">
                                <div class="icon-box"><i class="icon-33"></i></div>
                                <h4>Phone Number</h4>
                                <p><a href="tel:+23055873407">{{ $web->nomor }}</a><br /></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 info-block">
                        <div class="info-block-one">
                            <div class="inner-box">
                                <div class="icon-box"><i class="icon-34"></i></div>
                                <h4>Office Address</h4>
                                <p>{{ $web->alamat }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- contact-info-section end -->


        <!-- contact-section -->
        <section class="contact-section bg-color-1">
            <div class="auto-container">
                <div class="row align-items-center clearfix">
                    <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                        <div class="content-box">
                            <div class="sec-title">
                                <h5>Contact</h5>
                                <h2>Contact Us</h2>
                            </div>
                            <div class="form-inner">
                                    <form action="{{ route('send.contact') }}" method="post">
                                    @csrf
                                    <div class="row clearfix">
                                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <input type="text" name="username" placeholder="Your Name" required="" value="{{ Auth::check() ? Auth::user()->name : '' }}">
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <input type="email" name="email" placeholder="Email address" required="" value="{{ Auth::check() ? Auth::user()->email : '' }}">
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                            <input type="text" name="subject" placeholder="Subject" required="">
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                            <textarea name="message" placeholder="Message"></textarea>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn">
                                            <button class="theme-btn btn-one" type="submit" name="submit">Send Message</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 map-column">
                        <div class="google-map-area">
                            <figure class="image"><img src="{{ asset('frontend/assets/images/web/about.jpg') }}" alt=""></figure>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection