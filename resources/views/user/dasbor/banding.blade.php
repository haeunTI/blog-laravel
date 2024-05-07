@extends('user.dashboard')

@section('content')

<section class="page-title-two bg-color-1 centred">
            <div class="pattern-layer">
                <div class="pattern-1" style="background-image: url(assets/images/shape/shape-9.png);"></div>
                <div class="pattern-2" style="background-image: url(assets/images/shape/shape-10.png);"></div>
            </div>
            <div class="auto-container">
                <div class="content-box clearfix">
                    <h1>Compare Properties</h1>
                    <ul class="bread-crumb clearfix">
                        <li><a href="index.html">Home</a></li>
                        <li>Compare Properties</li>
                    </ul>
                </div>
            </div>
        </section>

        <section class="properties-section centred">
            <div class="auto-container">
                <div class="table-outer">
                    <table class="properties-table">
                        <tbody>
                            @if (count($perbandingan) > 0)
                                <tr>
                                    @foreach ($perbandingan as  $data)
                                    <th>
                                        <div class="property-info">
                                            <figure class="image-box"><img src="{{ asset($data['property']->pict_property) }}" alt=""></figure>
                                            <div class="title">{{ $data['property']->nama_property }}</div>
                                            <div class="price">Rp {{ $data['property']->harga_murah }}</div>
                                            <div class="city">City: {{ $data['property']->kota }}</div>
                                            <div class="area">Area: {{ $data['property']->ukuran_property }} Sq Ft</div>
                                            <div class="rooms">Rooms: {{ $data['property']->ruang }}</div>
                                            <div class="bathrooms">Bathrooms: {{ $data['property']->kamar_mandi }}</div>
                                            <div class="garage">Garage: {{ $data['property']->gudang }}</div>
                                            <div class="year-of-build">Year of Build: {{ $data['property']->tanggal_konstruksi }}</div>
                                            <div class="status">Status Property: Di{{ $data['property']->status_property }}</div>
                                            <div class="action" style="cursor:pointer;"><a id="{{$data->id}}" onclick="hapus(event, this.id)"><i class="fa fa-trash"></i>Remove</a></div>
                                        </div>
                                    </th>
                                    @endforeach
                                </tr>
                                <tr>
                                @foreach ($perbandingan as  $data)
                                    <td>
                                        <div class="amenities">
                                            <p><strong>Amenities</strong></p>
                                            @if (json_decode($data->amenities) && count(json_decode($data->amenities)) > 0)
                                                @foreach (json_decode($data->amenities) as $amenity)
                                                    <p><i class="yes fas fa-check"></i> {{ $amenity }}</p>
                                                @endforeach
                                            @else
                                                <p>No amenities available</p>
                                            @endif
                                        </div>
                                    </td>
                                    @endforeach
                                </tr>
                                <tr>
                                @foreach ($perbandingan as  $data)
                                <td>
                                    <div class="nearby-facilities">
                                        <p><strong>Nearby Facilities</strong></p>
                                        @if (json_decode($data->fasilitas) && count(json_decode($data->fasilitas)) > 0)
                                            @foreach (json_decode($data->fasilitas) as $fasilitas)
                                                <p>{{ $fasilitas->nama_fasilitas }} (Distance: {{ $fasilitas->distance }} km)</p>
                                            @endforeach
                                        @else
                                            <p>No facilities available</p>
                                        @endif
                                    </div>
                                </td>
                                @endforeach
                                </tr>
                            @else
                                <tr>
                                    <td colspan="3">No comparison yet</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    
        <!-- properties-section end -->

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


    <script>
     $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        })

        function hapus (event, id) {
            event.preventDefault();
            var token = $('meta[name="csrf-token"]').attr('content'); // Get CSRF token from meta tag

            $.ajax({
                type: "POST",
                url: "/hapus-item/" + id,
                data: {
                    id: id,
                    _token: token // Include CSRF token in the request data
                },

                success:function(data){
                    console.log(data)

                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    })

                    if($.isEmptyObject(data.error)){
                        Toast.fire({
                            type:'success',
                            icon: 'success',
                            title: data.success,
                        })
                        location.reload();
                    } else {
                        Toast.fire({
                            type:'error',
                            icon: 'error',
                            title: data.error,
                        })
                    }
                }
            })
        }

    
    </script>
    
@endsection