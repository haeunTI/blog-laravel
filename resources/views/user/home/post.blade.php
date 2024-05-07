@php
    $blog = App\Models\blogPost::latest()->limit(3)->get();
@endphp

<section class="news-section sec-pad">
            <div class="auto-container">
                <div class="sec-title centred">
                    <h5>News & Article</h5>
                    <h2>Stay Update With Realshed</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing sed do eiusmod tempor incididunt <br />labore dolore magna aliqua enim.</p>
                </div>
                <div class="row clearfix">
                    @foreach ($blog as $post )
                    <div class="col-lg-4 col-md-6 col-sm-12 news-block">
                        <div class="news-block-one wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image"><a href="{{ route('blog.detail', $post->slug) }}"><img src="{{ asset($post->image) }}" alt=""></a></figure>
                                    <span class="category">Featured</span>
                                </div>
                                <div class="lower-content">
                                    <h4><a href="{{ route('blog.detail', $post->slug) }}">{{ $post->judul }}</a></h4>
                                    <ul class="post-info clearfix">
                                        <li class="author-box">
                                            <figure class="author-thumb"><img src="{{ asset('frontend/assets/images/news/author-1.jpg') }}" alt=""></figure>
                                            <h5><a href="{{ route('blog.detail', $post->slug) }}">{{ $post['writer']['name'] }}</a></h5>
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
            </div>
        </section>