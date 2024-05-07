@extends('user.dashboard')
@section('content')

        <!--Page Title-->
        <section class="page-title centred" style="background-image: url({{ asset('frontend/assets/images/web/banner_about.jpg') }})">
            <div class="auto-container">
                <div class="content-box clearfix">
                    <h1>Agents List View</h1>
                    <ul class="bread-crumb clearfix">
                        <li><a href="index.html">Home</a></li>
                        <li>Agents List View</li>
                    </ul>
                </div>
            </div>
        </section>
        <!--End Page Title-->


        <!-- agents-page-section -->
        <section class="agents-page-section agents-list">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                        <div class="default-sidebar agent-sidebar">
                            <div class="agents-search sidebar-widget">
                                <div class="widget-title">
                                    <h5>Find Agent</h5>
                                </div>
                                <div class="search-inner">
                                    <form action="{{ route('agent.cari') }}" method="get">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" name="name" placeholder="Enter Agent Name" required="" id="name">
                                        </div>
                                        <div class="form-group">
                                            <button class="theme-btn btn-one">Search Agent</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="featured-widget sidebar-widget">
                                <div class="widget-title">
                                    <h5>Featured Properties</h5>
                                </div>
                                <div class="single-item-carousel owl-carousel owl-theme owl-nav-none dots-style-one">
                                    @foreach ($featured as $feature )
                                    <div class="feature-block-one">
                                        <div class="inner-box">
                                            <div class="image-box">
                                                <figure class="image"><img src="{{ asset($feature->pict_property) }}" alt=""></figure>
                                                <div class="batch"><i class="icon-11"></i></div>
                                                <span class="category">Featured</span>
                                            </div>
                                            <div class="lower-content">
                                                <div class="title-text"><h4><a href="{{ route('frontend.item.detail', ['id' => $feature->id, 'slug' => $feature->slug_property]) }}">{{ $feature->nama_property }}</a></h4></div>
                                                <div class="price-box clearfix">
                                                    <div class="price-info">
                                                        <h6>Harga mulai dari</h6>
                                                        <h4>Rp {{ $feature->harga_murah }}</h4>
                                                    </div>
                                                </div>
                                                <p>{{ $feature->info_pendek }}</p>
                                                <div class="btn-box"><a href="{{ route('frontend.item.detail', ['id' => $feature->id, 'slug' => $feature->slug_property]) }}" class="theme-btn btn-two">See Details</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                        <div class="agents-content-side">
                            <div class="item-shorting clearfix">
                                <div class="left-column pull-left">
                                    <h5>Search Results: <span>Showing {{count($data)}} Listings</span></h5>
                                </div>
                            </div>
                            <div class="wrapper list">
                                <div class="agents-list-content list-item">
                                    @foreach ($data as $agent)
                                    <div class="agents-block-one">
                                        <div class="inner-box">
                                            <figure class="image-box"><img style="width:224px; height:224px;" src="{{ !empty($agent->image) ? url('images/agent_images/'.$agent->image) : url('images/no_image.jpg')}}" alt=""></figure>
                                            <div class="content-box">
                                                <div class="upper clearfix">
                                                    <div class="title-inner pull-left">
                                                        <h4><a href="{{ route('agent.tentang', $agent->id) }}">{{ $agent['name'] }}</a></h4>
                                                        <span class="designation">{{ $agent['company'] }}</span>
                                                    </div>
                                                    <ul class="social-list pull-right clearfix">
                                                        <li><a href="agents-list.html"><i class="fab fa-facebook-f"></i></a></li>
                                                        <li><a href="agents-list.html"><i class="fab fa-twitter"></i></a></li>
                                                        <li><a href="agents-list.html"><i class="fab fa-linkedin-in"></i></a></li>
                                                    </ul>
                                                </div>
                                                <ul class="info clearfix">
                                                    <li><i class="fab fa fa-envelope"></i><a href="mailto:bean@realshed.com">{{ $agent['email'] }}</a></li>
                                                    <li><i class="fab fa fa-phone"></i><a href="tel:03030571965">{{ $agent['phone'] }}</a></li>
                                                </ul>
                                                <div class="btn-box">
                                                    <a href="{{ route('agent.tentang', $agent->id) }}" class="theme-btn btn-two">View Profile</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach

                                </div>
                            </div>
                            <div class="pagination-wrapper">
                            {{ $data->links('vendor.pagination.custom-pagination') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- agents-page-section end -->

@endsection

   