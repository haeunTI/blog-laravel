@extends('user.dashboard')
@section('content')

<section class="page-title centred" style="background-image: url({{ asset('frontend/assets/images/web/banner_about.jpg') }})">
            <div class="auto-container">
                <div class="content-box clearfix">
                    <h1>Agen {{ $data->name }} Details</h1>
                    <ul class="bread-crumb clearfix">
                        <li><a href="index.html">Home</a></li>
                        <li>Agen {{ $data->name }} Details</li>
                    </ul>
                </div>
            </div>
        </section>
        <!--End Page Title-->


        <!-- agent-details -->
        <section class="agent-details">
            <div class="auto-container">
                <div class="agent-details-content">
                    <div class="agents-block-one">
                        <div class="inner-box mr-0">
                            <figure class="image-box"><img style="width:270px; height:270px;" src="{{ !empty($data->image) ? url('images/agent_images/'.$data->image) : url('images/no_image.jpg')}}" alt=""></figure>
                            <div class="content-box">
                                <div class="upper clearfix">
                                    <div class="title-inner pull-left">
                                        <h4>{{ $data->name }}</h4>
                                        <span class="designation">{{ $data->company }}</span>
                                    </div>
                                    <ul class="social-list pull-right clearfix">
                                        <li><a href="{{ route('agent.tentang', $data->id) }}"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="{{ route('agent.tentang', $data->id) }}"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="{{ route('agent.tentang', $data->id) }}"><i class="fab fa-linkedin-in"></i></a></li>
                                    </ul>
                                </div>
                                <!-- <div class="text">
                                    <p>Success isn’t really that difficult. There is a significant portion of the population here in North America, that actually want and need success to be hard! Why? So they then have a built-in excuse.when things don’t go their way! Pretty sad situation, to say the least. Have some fun and hypnotize yourself to be your very own Ghost of Christmas future”</p>
                                </div> -->
                                <ul class="info clearfix mr-0">
                                    <li><i class="fab fa fa-envelope"></i><a href="mailto:{{ $data->email }}">{{ $data->email }}</a></li>
                                    <li><i class="fab fa fa-phone"></i><a href="tel:{{ $data->phone }}">{{ $data->phone }}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- agent-details end -->


        <!-- agents-page-section -->
        <section class="agents-page-section agent-details-page">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                        <div class="agents-content-side tabs-box">
                            <div class="group-title">
                                <h3>Listing By {{ $data->name }}</h3>
                            </div>



                            <div class="tabs-content">
                                <div class="tab active-tab" id="tab-1">
                                    <div class="wrapper list">
                                        <div class="deals-list-content list-item">
                                            @foreach ($items as $item )
                                            <div class="deals-block-one">
                                                <div class="inner-box">
                                                    <div class="image-box">
                                                        <figure class="image"><img src="{{ asset($item->pict_property) }}" alt=""></figure>
                                                        <div class="batch"><i class="icon-11"></i></div>
                                                        @if($item->featured == 1)
                                                            <span class="category">Featured</span>
                                                        @else
                                                            <span class="category">New</span>
                                                        @endif
                                                        <div class="buy-btn"><a href="{{ route('frontend.item.detail', ['id' => $item->id, 'slug' => $item->slug_property]) }}">Untuk Di{{ $item->status_property }}</a></div>
                                                    </div>
                                                    <div class="lower-content">
                                                        <div class="title-text"><h4><a href="{{ route('frontend.item.detail', ['id' => $item->id, 'slug' => $item->slug_property]) }}">{{ $item->nama_property }}</a></h4></div>
                                                        <div class="price-box clearfix">
                                                            <div class="price-info pull-left">
                                                                <h6>Harga Murah</h6>
                                                                <h4>Rp {{ $item->harga_murah }}</h4>
                                                            </div>
                                                            <div class="author-box pull-right">
                                                                <figure class="author-thumb"> 
                                                                    <img src="{{ !empty($data->image) ? url('images/agent_images/'.$data->image) : url('images/no_image.jpg')}}" alt="">
                                                                    <span>{{ $data->name }}</span>
                                                                </figure>
                                                            </div>
                                                        </div>
                                                        <p>{{ $item->info_pendek }}</p>
                                                        <ul class="more-details clearfix">
                                                            <li><i class="icon-14"></i>{{ $item->ruangan }} Ruangan</li>
                                                            <li><i class="icon-15"></i>{{ $item->kamar_mandi }} wC</li>
                                                            <li><i class="icon-16"></i>{{ $item->ukuran_property }} Sq Ft</li>
                                                        </ul>
                                                        <div class="other-info-box clearfix">
                                                            <div class="btn-box pull-left"><a href="{{ route('frontend.item.detail', ['id' => $item->id, 'slug' => $item->slug_property]) }}" class="theme-btn btn-two">See Details</a></div>
                                                            <ul class="other-option pull-right clearfix">
                                                            <li><a href="" class="action-btn" id="{{ $item->id }}" onclick="banding(event, this.id)"><i class="icon-12"></i></a></li>
                                                            <li><a href="" class="action-btn" id="{{ $item->id }}" onclick="saved(event, this.id)"><i class="icon-13"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                        <div class="default-sidebar agent-sidebar">
                            <div class="agents-contact sidebar-widget">
                                <div class="widget-title">
                                    <h5>Contact To {{ $data->name }}</h5>
                                </div>
                                @auth
                                    @php
                                        $id = Auth::user()->id;
                                        $userData = App\Models\User::whereId($id)->first();
                                    @endphp
                                    <div class="form-inner">
                                        <form action="{{ route('agent.detail.qna') }}" method="post" class="default-form">
                                            @csrf
                                            <input type="hidden" name="id_agent" value="{{ $data->id }}">
                                            
                                            <div class="form-group">
                                                <input type="text" name="name" placeholder="Your name" required="" value="{{ $userData->name }}">
                                            </div>
                                            <div class="form-group">
                                                <input type="email" name="email" placeholder="Your Email" required="" value="{{ $userData->email }}">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="phone" placeholder="Phone" required="" value="{{ $userData->phone }}">
                                            </div>
                                            <div class="form-group">
                                                <textarea name="message" placeholder="Message"></textarea>
                                            </div>
                                            <div class="form-group message-btn">
                                                <button type="submit" class="theme-btn btn-one">Send Message</button>
                                            </div>
                                        </form>
                                    </div>
                                @else
                                <div class="form-inner">
                                    <form action="{{ route('agent.detail.qna') }}" method="post" class="default-form">
                                        @csrf
                                        <input type="hidden" name="id_agent" value="{{ $data->id }}">
                                        
                                        <div class="form-group">
                                            <input type="text" name="name" placeholder="Your name" required="" >
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="email" placeholder="Your Email" required="" >
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="phone" placeholder="Phone" required="">
                                        </div>
                                        <div class="form-group">
                                            <textarea name="message" placeholder="Message"></textarea>
                                        </div>
                                        <div class="form-group message-btn">
                                            <button type="submit" class="theme-btn btn-one">Send Message</button>
                                        </div>
                                    </form>
                                </div>
                                @endauth
                            </div>
                            <div class="category-widget sidebar-widget">
                                <div class="widget-title">
                                    <h5>Status Of Property</h5>
                                </div>
                                <ul class="category-list clearfix">
                                    <li><a href="{{ route('frontend.item.sewa') }}">Disewa <span>({{ count($sewa) }})</span></a></li>
                                    <li><a href="{{ route('frontend.item.jual') }}">Dijual <span>({{ count($jual) }})</span></a></li>
                                </ul>
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
                </div>
            </div>
        </section>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

@endsection