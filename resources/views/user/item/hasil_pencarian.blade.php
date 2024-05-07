@extends('user.dashboard')
@section('content')
<section class="page-title-two bg-color-1 centred">
            <div class="pattern-layer">
                <div class="pattern-1" style="background-image: url(assets/images/shape/shape-9.png);"></div>
                <div class="pattern-2" style="background-image: url(assets/images/shape/shape-10.png);"></div>
            </div>
            <div class="auto-container">
                <div class="content-box clearfix">
                    <h1>Property List</h1>
                    <ul class="bread-crumb clearfix">
                        <li><a href="index.html">Home</a></li>
                        <li>Property List</li>
                    </ul>
                </div>
            </div>
        </section>
        <!--End Page Title-->


        <!-- property-page-section -->
        <section class="property-page-section property-list">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                        <div class="default-sidebar property-sidebar">
                            <div class="filter-widget sidebar-widget">
                                <div class="widget-title">
                                    <h5>Property</h5>
                                </div>
                                @php
                                    $property = App\Models\Property::latest()->get();
                                @endphp
                                <form action="{{ route('item.cari.semua') }}" method="post">
                                    @csrf
                                    <div class="widget-content">
                                        <div class="select-box">
                                            <select class="wide"  name="status_property" id="status_property" >
                                            <option data-display="Semua Status" id="status">Semua Status</option>
                                            <option value="jual">Dijual</option>
                                            <option value="sewa">Disewa</option>
                                            </select>
                                        </div>
                                        <div class="select-box">
                                            <select class="wide" name="provinsi" id="provinsi">
                                                <option data-display="Pilih Provinsi">Pilih Provinsi</option>
                                                <option value="Aceh">Aceh</option>
                                                <option value="Bali">Bali</option>
                                                <option value="Banten">Banten</option>
                                                <option value="Bengkulu">Bengkulu</option>
                                                <option value="Daerah Istimewa Yogyakarta">Daerah Istimewa Yogyakarta</option>
                                                <option value="DKI Jakarta">DKI Jakarta</option>
                                                <option value="Gorontalo">Gorontalo</option>
                                                <option value="Jambi">Jambi</option>
                                                <option value="Jawa Barat">Jawa Barat</option>
                                                <option value="Jawa Tengah">Jawa Tengah</option>
                                                <option value="Jawa Timur">Jawa Timur</option>
                                                <option value="Kalimantan Barat">Kalimantan Barat</option>
                                                <option value="Kalimantan Selatan">Kalimantan Selatan</option>
                                                <option value="Kalimantan Tengah">Kalimantan Tengah</option>
                                                <option value="Kalimantan Timur">Kalimantan Timur</option>
                                                <option value="Kalimantan Utara">Kalimantan Utara</option>
                                                <option value="Kepulauan Riau">Kepulauan Riau</option>
                                                <option value="Kepulauan Bangka Belitung">Kepulauan Bangka Belitung</option>
                                                <option value="Nusa Tenggara Barat">Nusa Tenggara Barat</option>
                                                <option value="Nusa Tenggara Timur">Nusa Tenggara Timur</option>
                                                <option value="Papua Barat">Papua Barat</option>
                                                <option value="Papua">Papua</option>
                                                <option value="Riau">Riau</option>
                                                <option value="Sulawesi Barat">Sulawesi Barat</option>
                                                <option value="Sulawesi Selatan">Sulawesi Selatan</option>
                                                <option value="Sulawesi Tengah">Sulawesi Tengah</option>
                                                <option value="Sulawesi Tenggara">Sulawesi Tenggara</option>
                                                <option value="Sulawesi Utara">Sulawesi Utara</option>
                                                <option value="Sumatera Barat">Sumatera Barat</option>
                                                <option value="Sumatera Selatan">Sumatera Selatan</option>
                                                <option value="Sumatera Utara">Sumatera Utara</option>
                                            </select>
                                        </div>
                                        <div class="select-box">
                                            <select class="wide" id="property_type" name="property_type">
                                            <option data-display="Tipe Properti">Tipe Properti</option>
                                                @foreach ($property as $tipe)
                                                    <option value="{{ $tipe->id }}">{{ $tipe->nama_tipe }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="select-box">
                                            <select class="wide"  name="ruang" id="ruang">
                                            <option data-display="Ruangan">Ruangan</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            </select>
                                        </div>
                                        <div class="select-box">
                                            <select class="wide" name="kamar_mandi" id="kamar_mandi">
                                                <option data-display="Kamar Mandi">Kamar Mandi</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                        <div class="filter-btn">
                                            <button type="submit" class="theme-btn btn-one"><i class="fas fa-filter"></i>&nbsp;Filter</button>
                                        </div>
                                    </div>
                                </form>
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
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                        <div class="property-content-side">
                            <div class="item-shorting clearfix">
                                <div class="left-column pull-left">
                                    <h5>Search Reasults: <span>Showing {{ count($data) }} Listings</span></h5>
                                </div>
                            </div>
                            <div class="wrapper list">
                                <div class="deals-list-content list-item">
                                    @foreach ($data as $item )
                                    <div class="deals-block-one">
                                        <div class="inner-box">
                                            <div class="image-box">
                                                <figure class="image"><img src="{{ asset($item['pict_property']) }}" alt="" style="height:350px;"></figure>
                                                <div class="batch"><i class="icon-11"></i></div>
                                                @if($item->featured == 1)
                                                    <span class="category">Featured</span>
                                                @else
                                                    <span class="category">New</span>
                                                @endif
                                                <div class="buy-btn"><a href="{{ route('frontend.item.detail', ['id' => $item->id, 'slug' => $item->slug_property]) }}">Di{{ $item['status_property'] }}</a></div>
                                            </div>
                                            <div class="lower-content">
                                                <div class="title-text"><h4><a href="{{ route('frontend.item.detail', ['id' => $item->id, 'slug' => $item->slug_property]) }}">{{ $item['nama_property'] }}</a></h4></div>
                                                <div class="price-box clearfix">
                                                    <div class="price-info pull-left">
                                                        <h6>{{$item['kota']}}</h6>
                                                        <h4>Rp {{ $item['harga_murah'] }}</h4>
                                                    </div>
                                                    <div class="author-box pull-right">
                                                        <figure class="author-thumb"> 
                                                            <img src="assets/images/feature/author-1.jpg" alt="">
                                                            <span>{{ $item['agent']['nama'] }}</span>
                                                        </figure>
                                                    </div>
                                                </div>
                                                <p>{{ $item['info_pendek'] }}</p>
                                                <ul class="more-details clearfix">
                                                    <li><i class="icon-14"></i>{{ $item['ruang'] }} ruangan</li>
                                                    <li><i class="icon-15"></i>{{ $item['kamar_mandi'] }} wc</li>
                                                    <li><i class="icon-16"></i>{{ $item['ukuran_property'] }} Sq Ft</li>
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
                            <div class="pagination-wrapper">
                            {{ $data->links('vendor.pagination.custom-pagination') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- property-page-section end -->
@endsection