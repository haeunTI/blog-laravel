@php
    $web = App\Models\DataWeb::find(1);
@endphp

<header class="main-header">
            <!-- header-top -->
            <div class="header-top">
                <div class="top-inner clearfix">
                    <div class="left-column pull-left">
                        <ul class="info clearfix">
                            <li><i class="far fa-map-marker-alt"></i>{{ $web->alamat }}</li>
                            <li><i class="far fa-clock"></i>Senin - Jumat  9.00 - 18.00</li>
                            <li><i class="far fa-phone"></i><a href="tel:2512353256">{{ $web->nomor }}</a></li>
                        </ul>
                    </div>
                    <div class="right-column pull-right">
                       @auth
                       <div class="sign-box">
                            <a href="{{ route('dashboard') }}"><i class="fas fa-user"></i>Dasbor</a>
                            <a href="{{ route('user.logout') }}"><i class="fas fa-user"></i>Logout</a>
                        </div>
                       @else
                       <div class="sign-box">
                            <a href="{{ route('login') }}"><i class="fas fa-user"></i>Login</a>
                        </div>
                       @endauth
                    </div>
                </div>
            </div>
            <!-- header-lower -->
            <div class="header-lower">
                <div class="outer-box">
                    <div class="main-box">
                        <div class="logo-box">
                            <figure class="logo"><a href="{{ route('user.index') }}"><img src="{{asset($web->logo)}}"></figure>
                        </div>
                        <div class="menu-area clearfix">
                            <!--Mobile Navigation Toggler-->
                            <div class="mobile-nav-toggler">
                                <i class="icon-bar"></i>
                                <i class="icon-bar"></i>
                                <i class="icon-bar"></i>
                            </div>
                            <nav class="main-menu navbar-expand-md navbar-light">
                                <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                    <ul class="navigation clearfix">
                                        <li class="current"><a href="{{ route('user.index') }}"><span>Home</span></a></li>
                                        <li><a href="{{ route('user.about') }}"><span>Tentang Kami</span></a></li>
                                        <li class="dropdown"><a href=""><span>Property</span></a>
                                            <ul>
                                                <li><a href="{{ route('frontend.item.sewa') }}">Disewa</a></li>
                                                <li><a href="{{ route('frontend.item.jual') }}">Dijual</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="{{ route('agent.list') }}"><span>Daftar Agen</span></a></li> 
                                        <li><a href="{{ route('blog.all') }}"><span>Blog</span></a></li> 
                                        <li><a href="{{ route('user.contact') }}"><span>Contact Us</span></a></li> 
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <!--sticky Header-->
            <div class="sticky-header">
                <div class="outer-box">
                    <div class="main-box">
                        <div class="logo-box">
                            <figure class="logo"><a href="{{route('user.index')}}" src="{{asset($web->logo)}}"></a></figure>
                        </div>
                       
                    </div>
                </div>
            </div>
</header>