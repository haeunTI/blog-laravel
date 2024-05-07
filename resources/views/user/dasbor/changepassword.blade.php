@extends('user.dashboard')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<section class="page-title centred" style="background-image: url(assets/images/background/page-title-5.jpg);">
    <div class="auto-container">
        <div class="content-box clearfix">
            <h1>Ubah Password  </h1>
            <ul class="bread-crumb clearfix">
                <li><a href="">Home</a></li>
                <li>Ubah Password </li>
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
                                <h3>Halaman Ubah Password </h3>
                                <form class="forms-sample" method="POST" action="{{ route('user.update.password') }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" id="password" autocomplete="off" @error('password') is-invalid @enderror>
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="new_password" class="form-label">New Password</label>
                                    <input type="password" name="new_password" class="form-control" id="new_password" autocomplete="off" @error('new_password') is-invalid @enderror>
                                    @error('new_password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="new_password_confirmation" class="form-label">Confirm New Password</label>
                                    <input type="password" name="new_password_confirmation" class="form-control" id="new_password_confirmation" autocomplete="off" @error('new_password_confirmation') is-invalid @enderror>
                                    @error('new_password_confirmation')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary me-2">Update</button>
                            </form>
                            </div>
                        </div>
                    </div>                        
                </div>
            </div> 
        </div>
    </div>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
@endsection