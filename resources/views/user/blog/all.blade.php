@extends('user.dashboard')

@section('content')

<section class="page-title centred" style="background-image: url({{ asset('frontend/assets/images/web/banner_about.jpg') }})">
            <div class="auto-container">
                <div class="content-box clearfix">
                    <h1>Blog Post</h1>
                    <ul class="bread-crumb clearfix">
                        <li><a href="index.html">Home</a></li>
                        <li>Blog</li>
                    </ul>
                </div>
            </div>
        </section>
        <!--End Page Title-->


        <!-- sidebar-page-container -->
        <section class="sidebar-page-container blog-grid sec-pad-2">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                        <div class="blog-grid-content">
                            <div class="row clearfix">
                                @foreach ($data as $post )
                                <div class="col-lg-6 col-md-6 col-sm-12 news-block">
                                    <div class="news-block-one wow fadeInUp animated" data-wow-delay="600ms" data-wow-duration="1500ms">
                                        <div class="inner-box">
                                            <div class="image-box">
                                                <figure class="image"><a href="blog-details.html"><img src="{{ asset($post->image) }}" alt=""></a></figure>
                                                <span class="category">Featured</span>
                                            </div>
                                            <div class="lower-content">
                                                <h4><a href="blog-details.html">{{ $post->judul }}</a></h4>
                                                <ul class="post-info clearfix">
                                                    <li class="author-box">
                                                        <figure class="author-thumb"><img  style="width: 100%; height: 100%; object-fit: cover;" src="{{ !empty($post['writer']['image']) ? url('images/admin_images/'.$post['writer']['image']) : url('images/no_image.jpg')}}" alt=""></figure>
                                                        <h5><a href="blog-details.html">{{ $post['writer']['name'] }}</a></h5>
                                                    </li>
                                                    <li>{{ $post->created_at->format('M d Y') }}</li>
                                                </ul>
                                                <div class="text">
                                                    <p>{{ $post->info_pendek }}</p>
                                                </div>
                                                <div class="btn-box">
                                                    <a href="{{ route('blog.detail', $post->slug) }}" class="theme-btn btn-two">See Details</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                
                            </div>
                            <div class="pagination-wrapper">
                            {{ $data->links('vendor.pagination.custom-pagination') }}
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
        <!-- sidebar-page-container -->
@endsection