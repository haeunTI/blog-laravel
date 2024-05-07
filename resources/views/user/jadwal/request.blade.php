@extends('user.dashboard')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<section class="page-title centred" style="background-image: url(assets/images/background/page-title-5.jpg);">
    <div class="auto-container">
        <div class="content-box clearfix">
            <h1>Request Jadwal  </h1>
            <ul class="bread-crumb clearfix">
                <li><a href="">Home</a></li>
                <li>Jadwal </li>
            </ul>
        </div>
    </div>
</section>

<section class="sidebar-page-container blog-details sec-pad-2">
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
                <div class="blog-details-content">
                    <div class="news-block-one">
                        <div class="inner-box">
                            <div class="lower-content">
                                <h3>Halaman Schedule Tour </h3>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama Property</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Waktu</th>
                                        <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                <tbody>
                                    @foreach ($req as $index => $item)
                                        <tr>
                                            <th scope="row">{{ $index+1 }}</th>
                                            <td>@if(isset($item['Item']))
                                            <?php $itemArray = json_decode($item['Item'], true); ?>
                                                {{ $itemArray['nama_property']}}
                                            @else
                                                N/A
                                            @endif</td>
                                            <td>{{ $item['tanggal_tour'] }}</td>
                                            <td>{{ $item['waktu_tour'] }}</td>
                                            <td>
                                                @if($item->status == 1)
                                                <span class="badge rounded-pill bg-success">Konfirm</span>
                                                @elseif($item->status ==0)
                                                <span class="badge rounded-pill bg-primary">Pending</span>
                                                @else
                                                <span class="badge rounded-pill bg-danger">Tolak</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>                        
                </div>
            </div> 
        </div>
    </div>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    @if(session('error'))
    <script>
        toastr.error("{{ session('error') }}");
    </script>
    @endif

    @if(session('success'))
        <script>
            toastr.success("{{ session('success') }}");
        </script>
    @endif
@endsection