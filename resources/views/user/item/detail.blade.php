@extends('user.dashboard')
@section('content')

<section class="property-details property-details-one">
            <div class="auto-container">
                <div class="top-details clearfix">
                    <div class="left-column pull-left clearfix">
                        <h3>{{ $data->nama_property }}</h3>
                        <div class="author-info clearfix">
                            <div class="author-box pull-left">
                                <figure class="author-thumb"><img src="assets/images/feature/author-1.jpg" alt=""></figure>
                                <h6>{{ $agent->name }}</h6>
                            </div>
                            <ul class="rating clearfix pull-left">
                                <li><i class="icon-39"></i></li>
                                <li><i class="icon-39"></i></li>
                                <li><i class="icon-39"></i></li>
                                <li><i class="icon-39"></i></li>
                                <li><i class="icon-40"></i></li>
                            </ul>
                        </div>
                    </div>
                    <div class="right-column pull-right clearfix">
                        <div class="price-inner clearfix">
                            <ul class="category clearfix pull-left">
                                <li><a href="property-details.html">{{ $property_type->nama_tipe }}</a></li>
                                <li><a href="property-details.html">For {{ $data->status_property }}</a></li>
                            </ul>
                            <div class="price-box pull-right">
                                <h3>Rp{{ $data->harga_murah }}</h3>
                            </div>
                        </div>
                        <ul class="other-option pull-right clearfix">
                            <li><a href="property-details.html"><i class="icon-37"></i></a></li>
                            <li><a href="property-details.html"><i class="icon-38"></i></a></li>
                            <li><a href="" class="action-btn" id="{{ $data->id }}" onclick="banding(event, this.id)"><i class="icon-12"></i></a></li>
                            <li><a href="" class="action-btn" id="{{ $data->id }}" onclick="saved(event, this.id)"><i class="icon-13"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                        <div class="property-details-content">
                            <div class="carousel-inner">
                                <div class="single-item-carousel owl-carousel owl-theme owl-dots-none">
                                @if (!$multi_images->isEmpty())
                                    @foreach ($multi_images as $image)
                                        <figure class="image-box"><img src="{{ asset($image->image) }}" alt=""></figure>  
                                    @endforeach
                                @else
                                    <figure class="image-box"><img src="{{ asset($data->pict_property) }}" alt=""></figure>  
                                @endif

                                </div>
                            </div>
                            <div class="discription-box content-widget">
                                <div class="title-box">
                                    <h4>Property Description</h4>
                                </div>
                                <div class="text">
                                {!! $data->info_panjang !!}
                                </div>
                            </div>
                            <div class="details-box content-widget">
                                <div class="title-box">
                                    <h4>Property Details</h4>
                                </div>
                                <ul class="list clearfix">
                                    <li>Property ID: <span>{{ $data->kode_property }}</span></li>
                                    <li>Rooms: <span>{{ $data->ruang }}</span></li>
                                    <li>Garage Size: <span>{{ $data->ukuran_gudang }}Sq Ft</span></li>
                                    <li>Property Price: <span>{{ $data->harga_murah }}</span></li>
                                    <li>Year Built: <span>{{ $data->tanggal_konstruksi }}</span></li>
                                    <li>Property Type: <span>{{ $property_type->nama_tipe }}    </span></li>
                                    <li>Bathrooms: <span>{{ $data->kamar_mandi }}</span></li>
                                    <li>Property Status: <span>{{ $data->status_property }}</span></li>
                                    <li>Property Size: <span>{{ $data->ukuran_property }} Sq Ft</span></li>
                                    <li>Garage: <span>{{ $data->gudang }}</span></li>
                                </ul>
                            </div>
                            <div class="amenities-box content-widget">
                                <div class="title-box">
                                    <h4>Amenities</h4>
                                </div>
                                <ul class="list clearfix">
                                    @foreach ($amenities as $amenity )
                                        <li>{{ $amenity }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="location-box content-widget">
                                <div class="title-box">
                                    <h4>Location</h4>
                                </div>
                                <ul class="info clearfix">
                                    <li><span>Alamat:</span> {{$data->alamat}}</li>
                                    <li><span>Provinsi:</span> {{$data->provinsi}}</li>
                                    <li><span>Kota:</span> {{$data->kota}}</li>
                                    <li><span>Kecamatan:</span> {{$data->kecematan}}</li>
                                    <li><span>Keluruhan:</span> {{$data->keluruhan}}</li>
                                    <li><span>Zip/Postal Code:</span> {{$data->kode_pos}}</li>
                                </ul>
                            </div>
                            <div class="nearby-box content-widget">
                                <div class="title-box">
                                    <h4>What’s Nearby?</h4>
                                </div>
                                <div class="inner-box">
                                    <div class="single-item">
                                        <div class="icon-box"><i class="fas fa-book-reader"></i></div>
                                        <div class="inner">
                                            <h5>Places:</h5>
                                            @foreach ($fasilitas as $fas )
                                            <div class="box clearfix">
                                                <div class="text pull-left">
                                                    <h6>{{ $fas->nama_fasilitas }}<span>({{ $fas->distance }} km)</span></h6>
                                                </div>
                                                <ul class="rating pull-right clearfix">
                                                    <li><i class="icon-39"></i></li>
                                                    <li><i class="icon-39"></i></li>
                                                    <li><i class="icon-39"></i></li>
                                                    <li><i class="icon-39"></i></li>
                                                    <li><i class="icon-40"></i></li>
                                                </ul>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="statistics-box content-widget">
                                <div class="title-box">
                                    <h4>Video</h4>
                                </div>
                                <figure class="image-box">
                                    <iframe width="560" height="315" src="{{ $data->video_property }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                </figure>
                            </div>
                            @auth
                            <div class="schedule-box content-widget">
                                <div class="title-box">
                                    <h4>Schedule A Tour</h4>
                                </div>
                                <div class="form-inner">
                                    <form action="{{ route('schedule') }}" method="post">
                                        @csrf
                                        @php
                                            $id = Auth::user()->id;
                                            $userData = App\Models\User::whereId($id)->first();
                                        @endphp
                                        <input type="hidden" name="id_agent" value="{{ $agent->id }}">
                                        <input type="hidden" name="id_property" value="{{ $data->id }}">
                                        <input type="hidden" name="id_user" value="{{ $userData->id }}">

                                        <div class="row clearfix">
                                            <div class="col-lg-6 col-md-12 col-sm-12 column">
                                                <div class="form-group">
                                                    <i class="far fa-calendar-alt"></i>
                                                    <input type="text" name="tanggal_tour" placeholder="Tour Date" id="datepicker">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12 col-sm-12 column">
                                                <div class="form-group">
                                                    <i class="far fa-clock"></i>
                                                    <input type="text" name="waktu_tour" placeholder="Any Time">
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 column">
                                                <div class="form-group">
                                                    <textarea name="message" placeholder="Your message"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 column">
                                                <div class="form-group message-btn">
                                                    <button type="submit" class="theme-btn btn-one">Submit Now</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            @endauth
                            
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                        <div class="property-sidebar default-sidebar">
                            <div class="author-widget sidebar-widget">
                                <div class="author-box">
                                    <figure class="author-thumb"><img src="assets/images/resource/author-1.jpg" alt=""></figure>
                                    <div class="inner">
                                        <h4>{{ $agent->name }}</h4>
                                        <ul class="info clearfix">
                                            <li><i class="fas fa-map-marker-alt"></i>{{ $agent->address }}</li>
                                            <li><i class="fas fa-phone"></i><a href="tel:03030571965">{{ $agent->phone }}</a></li>
                                        </ul>
                                        <div class="btn-box"><a href="agents-details.html">View Listing</a></div>
                                    </div>
                                </div>
                                @auth
                                    @php
                                        $id = Auth::user()->id;
                                        $userData = App\Models\User::whereId($id)->first();
                                    @endphp
                                    @include('user.item.login_ed_form')
                                @else
                                    @include('user.item.form')
                                @endauth

                                                 
                            </div>
                        </div>
                    </div>
                </div>
                <div class="similar-content">
                    <div class="title">
                        <h4>Similar Properties</h4>
                    </div>
                    <div class="row clearfix">
                        @foreach ($rekomendasi as $related)
                        @php
                            $agent = App\Models\User::where("id", $related->id_agent)->first();
                        @endphp
                        <div class="col-lg-4 col-md-6 col-sm-12 feature-block">
                        <div class="feature-block-one wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image"><img src="{{ asset($related->pict_property) }}" alt=""></figure>
                                    <div class="batch"><i class="icon-11"></i></div>
                                    <span class="category">{{ $related['type']->nama_tipe }}</span>
                                </div>
                                <div class="lower-content">
                                    <div class="author-info clearfix">
                                        <div class="author pull-left">
                                            <figure class="author-thumb"><img src="{{ $agent->image }}" alt=""></figure>
                                            <h6>{{ $agent->name }}</h6>
                                        </div>
                                        <div class="buy-btn pull-right"><a href="{{ route('frontend.item.detail', ['id' => $related->id, 'slug' => $related->slug_property]) }}">Untuk {{ $related->status_property }}</a></div>
                                    </div>
                                    <div class="title-text"><h4><a href="{{ route('frontend.item.detail', ['id' => $related->id, 'slug' => $related->slug_property]) }}">{{ $related->nama_property }}</a></h4></div>
                                    <div class="price-box clearfix">
                                        <div class="price-info pull-left">
                                            <h6>Start From</h6>
                                            <h4>Rp{{ $related->harga_murah }}</h4>
                                        </div>
                                        <ul class="other-option pull-right clearfix">
                                            <li><a href="" class="action-btn" id="{{ $related->id }}" onclick="banding(event, this.id)"><i class="icon-12"></i></a></li>
                                            <li><a href="" class="action-btn" id="{{ $related->id }}" onclick="saved(event, this.id)"><i class="icon-13"></i></a></li>
                                        </ul>
                                    </div>
                                    <p>{{ $related->info_pendek }}</p>
                                    <ul class="more-details clearfix">
                                        <li><i class="icon-14"></i>{{ $related->ruang }} Ruang</li>
                                        <li><i class="icon-15"></i>{{ $related->kamar_mandi }} WC</li>
                                        <li><i class="icon-16"></i>{{ $related->ukuran_property }} Sq Ft</li>
                                    </ul>
                                    <div class="btn-box"><a href="{{ route('frontend.item.detail', ['id' => $related->id, 'slug' => $related->slug_property]) }}" class="theme-btn btn-two">See Details</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


@endsection