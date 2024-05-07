@php
    $property = App\Models\Property::latest()->limit(5)->get();
@endphp


<section class="category-section centred">
            <div class="auto-container">
                <div class="inner-container wow slideInLeft animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                    <ul class="category-list clearfix">
                        @foreach ($property as $item)
                        @php
                            $number_of_property = App\Models\Item::where("id_property_type", $item->id)->get();
                        @endphp
                        <li>
                            <div class="category-block-one">
                                <div class="inner-box">
                                    <div class="icon-box"><i class="{{ $item->icon }}"></i></div>
                                    <h5><a href="{{ route('frontend.item.tipe', $item->id) }}">{{ $item->nama_tipe }}</a></h5>
                                    <span>{{ count($number_of_property) }}</span>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    <div class="more-btn"><a href="{{ route('frontend.item.daftar_tipe') }}" class="theme-btn btn-one">All Categories</a></div>
                </div>
            </div>
        </section>