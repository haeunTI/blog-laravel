@extends('user.dashboard')

@section('content')
        <section class="page-title-two bg-color-1 centred">
            <div class="pattern-layer">
                <div class="pattern-1" style="background-image: url({{ asset('frontend/assets/images/shape/shape-9.png)') }});"></div>
                <div class="pattern-2" style="background-image: url({{ asset('frontend/assets/images/shape/shape-10.png)') }});"></div>
            </div>
            <div class="auto-container">
                <div class="content-box clearfix">
                    <h1>Login</h1>
                    <ul class="bread-crumb clearfix">
                        <li><a href="{{route('user.index')}}">Home</a></li>
                        <li>Login</li>
                    </ul>
                </div>
            </div>
        </section>

        <section class="ragister-section centred sec-pad">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-xl-8 col-lg-12 col-md-12 offset-xl-2 big-column">             
                        <div class="tabs-box">
                            <div class="tabs-content">
                                <div class="tab active-tab" id="tab-1">
                                    <div class="inner-box">
                                        <h4>Agent Login</h4>
                                        <form action="{{ route('login') }}" method="post"  class="default-form">
                                            @csrf

                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="text" name="login" id="login" required="">
                                                @error('login')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" name="password" id="password" required="">
                                                @error('password')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group message-btn">
                                                <button type="submit" class="theme-btn btn-one">Sign in</button>
                                            </div>
                                        </form>
                                        <div class="othre-text">
                                            <p>Have not any account? <a href="{{route('agent.register')}}">Register Now</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ragister-section end -->


        <!-- subscribe-section -->
        <section class="subscribe-section bg-color-3">
            <div class="pattern-layer" style="background-image: url({{ asset('frontend/assets/images/shape/shape-2.png)') }});"></div>
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