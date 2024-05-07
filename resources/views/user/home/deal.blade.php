@php
    $property_item = App\Models\Item::where("hot", 1)->where('status', 1)->limit(3)->get();
@endphp

<section class="deals-section sec-pad">
            <div class="auto-container">
                <div class="sec-title">
                    <h5>Hot Property</h5>
                    <h2>Our Best Deals</h2>
                </div>
                 
                <div class="row clearfix">
                    @foreach ( $property_item as $hot )
                        @php
                            $agent = App\Models\User::where("id", $hot->id_agent)->first();
                        @endphp
                        <div class="col-lg-4 col-md-6 col-sm-12 feature-block">
                            <div class="feature-block-one wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                                <div class="inner-box">
                                    <div class="image-box">
                                        <figure class="image"><img src="{{$hot->pict_property}}" alt=""></figure>
                                        <div class="batch"><i class="icon-11"></i></div>
                                        <span class="category">Hot</span>
                                    </div>
                                    <div class="lower-content">
                                        <div class="author-info clearfix">
                                            <div class="author pull-left">
                                                <figure class="author-thumb"><img src="{{$agent->image}}" alt=""></figure>
                                                <h6>{{ $agent->name }}</h6>
                                            </div>
                                            <div class="buy-btn pull-right"><a href="{{ route('frontend.item.detail', ['id' => $hot->id, 'slug' => $hot->slug_property]) }}">For Buy</a></div>
                                        </div>
                                        <div class="title-text"><h4><a href="{{ route('frontend.item.detail', ['id' => $hot->id, 'slug' => $hot->slug_property]) }}">Villa on Grand Avenue</a></h4></div>
                                        <div class="price-box clearfix">
                                            <div class="price-info pull-left">
                                                <h6>{{$hot['kota']}}</h6>
                                                <h4>Rp{{ $hot->harga_murah }}</h4>
                                            </div>
                                            <ul class="other-option pull-right clearfix">
                                                <li><a href="" class="action-btn" id="{{ $hot->id }}" onclick="banding(event, this.id)"><i class="icon-12"></i></a></li>
                                                <li><a href="" class="action-btn" id="{{ $hot->id }}" onclick="saved(event, this.id)"><i class="icon-13"></i></a></li>
                                            </ul>
                                        </div>
                                        
                                        <ul class="more-details clearfix">
                                        <li><i class="icon-14"></i>{{ $hot->ruang }} Ruang</li>
                                        <li><i class="icon-15"></i>{{ $hot->kamar_mandi }} WC</li>
                                        <li><i class="icon-16"></i>{{ $hot->ukuran_property }} Sq Ft</li>
                                        </ul>
                                        <div class="btn-box"><a href="{{ route('frontend.item.detail', ['id' => $hot->id, 'slug' => $hot->slug_property]) }}" class="theme-btn btn-two">See Details</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </section>