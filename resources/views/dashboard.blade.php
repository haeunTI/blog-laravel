@extends('user.dashboard')

@section('content')
        <section class="page-title centred" style="background-image: url(assets/images/background/page-title-5.jpg);">
            <div class="auto-container">
                <div class="content-box clearfix">
                    <h1>User Profile </h1>
                    <ul class="bread-crumb clearfix">
                        <li><a href="index.html">Home</a></li>
                        <li>User Profile </li>
                    </ul>
                </div>
            </div>
        </section>
        <!--End Page Title-->


        <!-- sidebar-page-container -->
        <section class="sidebar-page-container blog-details sec-pad-2">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                        <div class="blog-sidebar">
                        @include('user.dasbor.profile_info')                    
                            <div class="sidebar-widget category-widget">
                                <div class="widget-title">
                                    <h4>Category</h4>
                                </div>
                                @include('user.dasbor.sidebar')
                            </div> 
                                            
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                        <div class="blog-details-content">
                            <div class="news-block-one">
                                <div class="inner-box">                        
                                    <div class="lower-content">
                                        <h3>Halaman Dasbor</h3>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="card-body" style="background-color: #1baf65;">
                                                    <h1 class="card-title" style="color: white; font-weight: bold;">{{ $accept }}</h1>
                                                    <h5 class="card-text"style="color: white;"> Approved Tour</h5>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="card-body" style="background-color: #ffc107;">
                                                <h1 class="card-title" style="color: white; font-weight: bold; ">{{ $pending }}</h1>
                                                <h5 class="card-text"style="color: white;"> Pending Tour</h5>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="card-body" style="background-color: #002758;">
                                                <h1 class="card-title" style="color: white; font-weight: bold;">{{ $reject }}</h1>
                                                <h5 class="card-text"style="color: white; "> Rejected Tour</h5>
                                                </div>

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
        <!-- sidebar-page-container -->

        <!-- subscribe-section -->
        <section class="subscribe-section bg-color-3">
            <div class="pattern-layer" style="background-image: url(assets/images/shape/shape-2.png);"></div>
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-6 col-sm-12 text-column">
                        <div class="text">
                            <span>Subscribe</span>
                            <h2>Sign Up To Our Newsletter To Get The Latest News And Offers.</h2>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 form-column">
                        <div class="form-inner">
                            <form action="contact.html" method="post" class="subscribe-form">
                                <div class="form-group">
                                    <input type="email" name="email" placeholder="Enter your email" required="">
                                    <button type="submit">Subscribe Now</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection