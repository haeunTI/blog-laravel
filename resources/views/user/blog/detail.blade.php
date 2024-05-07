@extends('user.dashboard')
@section('content')
<section class="page-title centred" style="background-image: url({{ asset('frontend/assets/images/web/banner_about.jpg') }})">
            <div class="auto-container">
                <div class="content-box clearfix">
                    <h1>Blog Details</h1>
                    <ul class="bread-crumb clearfix">
                        <li><a href="index.html">Home</a></li>
                        <li>Blog Details</li>
                    </ul>
                </div>
            </div>
        </section>
        <!--End Page Title-->


        <!-- sidebar-page-container -->
        <section class="sidebar-page-container blog-details sec-pad-2">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                        <div class="blog-details-content">
                            <div class="news-block-one">
                                <div class="inner-box">
                                    <div class="image-box">
                                        <figure class="image"><img src="{{ asset($data->image) }}" alt=""></figure>
                                    </div>
                                    <div class="lower-content">
                                        <h3>{{ $data->judul }}</h3>
                                        <ul class="post-info clearfix">
                                            <li class="author-box">
                                                <figure class="author-thumb"><img src="" alt=""></figure>
                                                <h5><a href="blog-details.html">{{ $data['writer']['name'] }}</a></h5>
                                            </li>
                                            <li>{{ $data->created_at->format('M d Y') }}</li>
                                        </ul>
                                        <div class="text">
                                        <p>{!! $data->info_panjang !!}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @php
                                $comment = App\Models\Komentar::where("id_post", $data->id)->where("id_parent", NULL)->limit(5)->get();
                            @endphp

                            <div class="comments-area">
                                <div class="group-title">
                                    <h4><?=count($comment)?> Comments</h4>
                                </div>

                                <div class="comment-box">
                                    @foreach ($comment as $com)
                                    <div class="comment">
                                        <figure class="thumb-box">
                                            <img src="{{!empty($com->user->image)? url('images/user_images/'.$com->user->image) : url('images/no_image.jpg')}}" alt="">
                                        </figure>
                                        <div class="comment-inner">
                                            <div class="comment-info clearfix">
                                                <p><b>{{ $com->User->name }}</b></p>
                                                <span>{{ $com->created_at->format('M d Y') }}</span>
                                            </div>
                                            <div class="text">
                                                <p>Subject: {{ $com->subject }}</p>
                                                <p>{{ $com->message }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    @php
                                        $reply = App\Models\Komentar::where("id_parent", $com->id)->get();
                                    @endphp
                                        @foreach ($reply as $balas)
                                        <div class="comment">                                            
                                            <div class="comment-inner">
                                                <div class="comment-info clearfix">
                                                    <h5>Admin</h5>
                                                    <span>{{ $balas->created_at->format('M d Y') }}</span>
                                                </div>
                                                <div class="text">
                                                    <h6>{{ $balas->subject }}</h6>
                                                    <p>{{ $balas->message }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    @endforeach
                                </div>
                            </div>
                            <div class="comments-form-area">
                                <div class="group-title">
                                    <h4>Leave a Comment</h4>
                                </div>
                                @auth
                                <form action="{{ route('blog.tambah.komentar') }}" method="post" class="comment-form default-form">
                                    @csrf
                                    <input type="hidden" name="id_post" value="{{ $data->id }}">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                            <input type="text" name="subject" placeholder="Subject" required="">
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                            <textarea name="message" placeholder="Your message"></textarea>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn">
                                            <button type="submit" class="theme-btn btn-one">Submit Now</button>
                                        </div>
                                    </div>
                                </form>
                                @else 
                                    <p><b>Anda harus login terlebih dahulu untuk men-komentar!</b></p>
                                    <a href="{{route('login')}}">Login</a>
                                @endauth
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                        <div class="blog-sidebar">
                            <div class="sidebar-widget social-widget">
                                <div class="widget-title">
                                    <h4>Follow Us On</h4>
                                </div>
                                <ul class="social-links clearfix">
                                    <li><a href="blog-1.html"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="blog-1.html"><i class="fab fa-google-plus-g"></i></a></li>
                                    <li><a href="blog-1.html"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="blog-1.html"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li><a href="blog-1.html"><i class="fab fa-instagram"></i></a></li>
                                </ul>
                            </div>
                            <div class="sidebar-widget category-widget">
                                <div class="widget-title">
                                    <h4>Category</h4>
                                </div>
                                <div class="widget-content">
                                    <ul class="category-list clearfix">
                                        @foreach ($category as $cat)

                                        @php
                                            
                                        $post = App\Models\blogPost::where('blog_cat_id',$cat->id)->get();
                                        @endphp
                                        <li><a href="{{ url('/blog/cat/list/'.$cat->id) }}">{{ $cat->nama }}<span>({{ count($post) }})</span></a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="sidebar-widget post-widget">
                                <div class="widget-title">
                                    <h4>Recent Posts</h4>
                                </div>
                                <div class="post-inner">
                                    @foreach ($recent_post as $recent)
                                    <div class="post">
                                        <figure class="post-thumb"><a href="blog-details.html"><img src="{{ asset($recent->image) }}" alt=""></a></figure>
                                        <h5><a href="blog-details.html">{{ $recent->judul }}</a></h5>
                                        <span class="post-date">{{ $recent->created_at->format('M d Y') }}</span>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection