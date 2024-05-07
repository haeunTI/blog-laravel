@extends('user.dashboard')

@section('content')
    <section class="page-title-two bg-color-1 centred">
            <div class="pattern-layer">
                <div class="pattern-1" style="background-image: url(assets/images/shape/shape-9.png);"></div>
                <div class="pattern-2" style="background-image: url(assets/images/shape/shape-10.png);"></div>
            </div>
            <div class="auto-container">
                <div class="content-box clearfix">
                    <h1>Categories</h1>
                    <ul class="bread-crumb clearfix">
                        <li><a href="index.html">Home</a></li>
                        <li>Categories</li>
                    </ul>
                </div>
            </div>
        </section>
  
        <section class="category-section category-page centred mr-0 pt-120 pb-90">
            <div class="auto-container">
                <div class="inner-container wow slideInLeft animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                    <ul class="category-list clearfix">
                        @foreach ($data as $tipe)
                        @php
                            $number_of_property = App\Models\Item::where("id_property_type", $tipe->id)->get();
                        @endphp
                        <li>
                            <div class="category-block-one">
                                <div class="inner-box">
                                    <div class="icon-box"><i class="{{ $tipe['icon'] }}"></i></div>
                                    <h5><a href="{{ route('frontend.item.tipe', $tipe->id) }}">{{ $tipe['nama_tipe'] }}</a></h5>
                                    <span>{{count($number_of_property)}}</span>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </section>
@endsection