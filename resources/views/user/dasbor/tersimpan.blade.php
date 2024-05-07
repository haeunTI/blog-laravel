@extends('user.dashboard')

@section('content')

<section class="page-title centred" style="background-image: url({{ asset('frontend/assets/images/web/banner_about.jpg') }})">
    <div class="auto-container">
        <div class="content-box clearfix">
            <h1>Properti Tersimpan </h1>
            <ul class="bread-crumb clearfix">
                <li><a href="">Dasbor</a></li>
                <li>Tersimpan </li>
            </ul>
        </div>
    </div>
</section>

@php
    
@endphp

<section class="property-page-section property-list">
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                <div class="blog-sidebar">
                    @include('user.dasbor.profile_info')
                    <div class="sidebar-widget category-widget">
                        <div class="widget-title">
                            <h4>Category</h4>
                        </div>
                        @include('user.dasbor.sidebar')
                    </div> 
                </div>
            </div>
            <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                <div class="property-content-side">
                    <div class="wrapper list">
                        <div class="deals-list-content list-item">
                            @foreach ($saved as $item )
                            <div class="deals-block-one">
                                <div class="inner-box">
                                    <div class="image-box">
                                        <figure class="image"><img src="{{ asset($item['property']->pict_property) }}" alt=""></figure>
                                        <div class="batch"><i class="icon-11"></i></div>
                                        <div class="buy-btn"><a href="property-details.html">For {{ $item['property']->status_property }}</a></div>
                                    </div>
                                    <div class="lower-content">
                                        <div class="title-text"><h4><a href="property-details.html">{{ $item['property']->nama_property}}</a></h4></div>
                                        <div class="price-box clearfix">
                                            <div class="price-info pull-left">
                                                <h6>Start From</h6>
                                                <h4>Rp.{{ $item['property']->harga_murah }}</h4>
                                            </div>
                                        </div>
                                        <p>{{ $item['property']->info_pendek }}</p>
                                        <ul class="more-details clearfix">
                                            <li><i class="icon-14"></i>{{ $item['property']->ruang }} Ruang</li>
                                            <li><i class="icon-15"></i>{{ $item['property']->kamar_mandi }}WC</li>
                                            <li><i class="icon-16"></i>{{ $item['property']->ukuran_property }} Sq Ft</li>
                                        </ul>
                                        <div class="other-info-box clearfix">
                                            <div class="btn-box pull-left"><a href="property-details.html" class="theme-btn btn-two">See Details</a></div>
                                            <ul class="other-option pull-right clearfix">
                                                <li><a id="{{$item->id}}" onclick="unSave(event, this.id)"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                             </div>
                            @endforeach
                        </div>          
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script type="text/javascript">
     $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        })

        function unSave (event, id) {
            event.preventDefault();
            var token = $('meta[name="csrf-token"]').attr('content'); // Get CSRF token from meta tag

            $.ajax({
                type: "POST",
                url: "/unsave-item/" + id,
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

                    console.log("here");

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

    // function wishlist(){
    //     $.ajax({
    //         type: "GET",
    //         dataType: 'json',
    //         url: "/user/get/tersimpan/",

    //         success:function(data) {
    //             console.log(data);
    //             $('#count').text(data.count);

    //             var rows = "";

    //             $.each(data.saved, function(key, value){
    //                 rows+= `<div class="deals-block-one">
    //                             <div class="inner-box">
    //                                 <div class="image-box">
    //                                     <figure class="image"><img src="/${value.property.pict_property}" alt=""></figure>
    //                                     <div class="batch"><i class="icon-11"></i></div>
    //                                     <div class="buy-btn"><a href="property-details.html">For ${value.property.status_property}</a></div>
    //                                 </div>
    //                                 <div class="lower-content">
    //                                     <div class="title-text"><h4><a href="property-details.html">${value.property.nama_property}</a></h4></div>
    //                                     <div class="price-box clearfix">
    //                                         <div class="price-info pull-left">
    //                                             <h6>Start From</h6>
    //                                             <h4>${value.property.harga_murah}</h4>
    //                                         </div>
    //                                     </div>
    //                                     <p>Lorem ipsum dolor sit amet consectetur adipisicing sed eiusm do tempor incididunt labore.</p>
    //                                     <ul class="more-details clearfix">
    //                                         <li><i class="icon-14"></i>${value.property.ruangan} Ruang</li>
    //                                         <li><i class="icon-15"></i>${value.property.kamar_mandi} WC</li>
    //                                         <li><i class="icon-16"></i>${value.property.ukuran_property} Sq Ft</li>
    //                                     </ul>
    //                                     <div class="other-info-box clearfix">
    //                                         <div class="btn-box pull-left"><a href="property-details.html" class="theme-btn btn-two">See Details</a></div>
    //                                         <ul class="other-option pull-right clearfix">
    //                                             <li><a href="property-details.html"><i class="icon-13"></i></a></li>
    //                                         </ul>
    //                                     </div>
    //                                 </div>
    //                             </div>
    //                          </div>`
    //             });

    //             $('#saved').html(rows);
    //         }
    //     })
    // }

    // wishlist();
</script>
@endsection