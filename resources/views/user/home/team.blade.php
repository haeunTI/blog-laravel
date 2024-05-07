@php
    $agen = App\Models\User::where("role", "agent")->where("status", "active")->orderBy('id', 'DESC')->limit(7)->get();
@endphp

<section class="team-section sec-pad centred bg-color-1">
            <div class="pattern-layer" style="background-image: url({{ asset('frontend/assets/images/shape/shape-1.png)') }};"></div>
            <div class="auto-container">
                <div class="sec-title">
                    <h5>Our Agents</h5>
                    <h2>Meet Our Excellent Agents</h2>
                </div>
                <div class="single-item-carousel owl-carousel owl-theme owl-dots-none nav-style-one">
                    @foreach ($agen as $team)
                    <div class="team-block-one">
                        <div class="inner-box">
                            <figure class="image-box"><img style="width:370px; height:370px;" src="{{ !empty($team->image) ? url('images/agent_images/'.$team->image) : url('images/no_image.jpg')}}" alt=""></figure>
                            <div class="lower-content">
                                <div class="inner">
                                    <h4><a href="{{ route('agent.tentang', $team->id) }}">{{ $team['name'] }}</a></h4>
                                    <span class="designation">{{ $team['company'] }}</span>
                                    <span class="designation">{{ $team['email'] }}</span>
                                    <ul class="social-links clearfix">
                                        <li><a href="index.html"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="index.html"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="index.html"><i class="fab fa-google-plus-g"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>