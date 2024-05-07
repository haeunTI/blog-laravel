@php
    $property_item = App\Models\Item::where("featured", 1)->get();
@endphp


<section class="feature-section sec-pad bg-color-1">
            <div class="auto-container">
                <div class="sec-title centred">
                    <h5>Features</h5>
                    <h2>Featured Property</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing sed do eiusmod tempor incididunt <br />labore dolore magna aliqua enim.</p>
                </div>
                <div class="row clearfix">

                    @foreach ( $property_item as $feature )
                    @php
                        $agent = App\Models\User::where("id", $feature->id_agent)->first();
                    @endphp
                    <div class="col-lg-4 col-md-6 col-sm-12 feature-block">
                        <div class="feature-block-one wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image"><img src="{{ $feature->pict_property }}" alt=""></figure>
                                    <div class="batch"><i class="icon-11"></i></div>
                                    <span class="category">Featured</span>
                                </div>
                                <div class="lower-content">
                                    <div class="author-info clearfix">
                                        <div class="author pull-left">
                                            <figure class="author-thumb"><img src="{{ $agent->image }}" alt=""></figure>
                                            <h6>{{ $agent->name }}</h6>
                                        </div>
                                        <div class="buy-btn pull-right"><a href="{{ route('frontend.item.detail', ['id' => $feature->id, 'slug' => $feature->slug_property]) }}">Untuk {{ $feature->status_property }}</a></div>
                                    </div>
                                    <div class="title-text"><h4><a href="{{ route('frontend.item.detail', ['id' => $feature->id, 'slug' => $feature->slug_property]) }}">{{ $feature->nama_property }}</a></h4></div>
                                    <div class="price-box clearfix">
                                        <div class="price-info pull-left">
                                            <h6>{{$feature['kota']}}</h6>
                                            <h4>Rp{{ $feature->harga_murah }}</h4>
                                        </div>
                                        <ul class="other-option pull-right clearfix">
                                            <li><a href="" class="action-btn" id="{{ $feature->id }}" onclick="banding(event, this.id)"><i class="icon-12"></i></a></li>
                                            <li><a href="" class="action-btn" id="{{ $feature->id }}" onclick="saved(event, this.id)"><i class="icon-13"></i></a></li>
                                        </ul>
                                    </div>
                                    <p>{{ $feature->info_pendek }}</p>
                                    <ul class="more-details clearfix">
                                        <li><i class="icon-14"></i>{{ $feature->ruang }} Ruang</li>
                                        <li><i class="icon-15"></i>{{ $feature->kamar_mandi }} WC</li>
                                        <li><i class="icon-16"></i>{{ $feature->ukuran_property }} Sq Ft</li>
                                    </ul>
                                    <div class="btn-box"><a href="{{ route('frontend.item.detail', ['id' => $feature->id, 'slug' => $feature->slug_property]) }}" class="theme-btn btn-two">See Details</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>


