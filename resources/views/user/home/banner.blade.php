@php
    $property = App\Models\Property::latest()->get();
@endphp

<section class="banner-section" style="background-image: url({{ asset('frontend/assets/images/banner/banner-1.jpg') }});">
            <div class="auto-container">
                <div class="inner-container">
                    <div class="content-box centred">
                        <h2>Temukan Rumah Impian Anda<br>Bersama REALestate</h2>
                        <p>Kami Menawarkan Investasi Properti yang Menguntungkan dan Berkualitas</p>
                    </div>
                    <div class="search-field">
                        <div class="tabs-box">
                            <div class="tab-btn-box">
                                <ul class="tab-btns tab-buttons centred clearfix">
                                    <li class="tab-btn active-btn" data-tab="#tab-1">BUY</li>
                                    <li class="tab-btn" data-tab="#tab-2">RENT</li>
                                </ul>
                            </div>
                            <div class="tabs-content info-group">
                                <div class="tab active-tab" id="tab-1">
                                    <div class="inner-box">
                                        <div class="top-search">
                                            <form action="{{ route('item.cari.jual') }}" method="post" class="search-form">
                                                @csrf
                                                <div class="row clearfix">
                                                    <div class="col-lg-4 col-md-12 col-sm-12 column">
                                                        <div class="form-group">
                                                            <label>Search Property</label>
                                                            <div class="field-input">
                                                                <i class="fas fa-search"></i>
                                                                <input type="search" name="search" placeholder="Search by Property, Location or Landmark..." required="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-12 column">
                                                        <div class="form-group">
                                                            <label>Provinsi</label>
                                                            <div class="select-box">
                                                                <i class="far fa-compass"></i>
                                                                <select class="form-control" name="provinsi" id="provinsi">
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
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-12 column">
                                                        <div class="form-group">
                                                            <label>Property Type</label>
                                                            <div class="select-box">
                                                                <select class="wide" name="property_type">
                                                                    <option value="All">All Type</option>
                                                                    @foreach ($property as $tipe)
                                                                    <option value="{{ $tipe->id }}">{{ $tipe->nama_tipe }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="search-btn">
                                                    <button type="submit"><i class="fas fa-search"></i>Search</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab" id="tab-2">
                                    <div class="inner-box">
                                        <div class="top-search">
                                            <form action="{{ route('item.cari.sewa') }}" method="post" class="search-form">
                                                    @csrf
                                                    <div class="row clearfix">
                                                        <div class="col-lg-4 col-md-12 col-sm-12 column">
                                                            <div class="form-group">
                                                                <label>Search Property</label>
                                                                <div class="field-input">
                                                                    <i class="fas fa-search"></i>
                                                                    <input type="search" name="search" placeholder="Search by Property, Location or Landmark..." required="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-6 col-sm-12 column">
                                                            <div class="form-group">
                                                                <label>Provinsi</label>
                                                                <div class="select-box">
                                                                    <i class="far fa-compass"></i>
                                                                    <select class="form-control" name="provinsi" id="provinsi">
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
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-6 col-sm-12 column">
                                                            <div class="form-group">
                                                                <label>Property Type</label>
                                                                <div class="select-box">
                                                                    <select class="wide" name="property_type">
                                                                        <option value="All">All Type</option>
                                                                        @foreach ($property as $tipe)
                                                                        <option value="{{ $tipe->id }}">{{ $tipe->nama_tipe }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="search-btn">
                                                        <button type="submit"><i class="fas fa-search"></i>Search</button>
                                                    </div>
                                            </form>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>