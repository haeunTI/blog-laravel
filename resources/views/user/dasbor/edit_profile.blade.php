@extends('user.dashboard')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<section class="page-title centred" style="background-image: url(assets/images/background/page-title-5.jpg);">
    <div class="auto-container">
        <div class="content-box clearfix">
            <h1>User Profile </h1>
            <ul class="bread-crumb clearfix">
                <li><a href="">Home</a></li>
                <li>User Profile </li>
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
                                <h3>Halaman Edit Profile</h3>
                                <form action="{{ route('user.profile.update') }}" method="post" class="default-form" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" name="name" id="name" value="{{ $data->name }}" required="">
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" id="email" value="{{ $data->email }}" required="">
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>No. Hp</label>
                                        <input type="text" name="phone" id="phone" value="{{ $data->phone }}" >
                                        @error('phone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <input type="text" name="address" id="address" value="{{ $data->address }}" >
                                    </div>
                                    <div class="form-group">
                                        <label for="image" class="form-label">Profile</label>
                                        <input class="form-control" type="file" id="image" name="image">
                                        <img id="profile" class="wd-70" src="{{!empty($data->image)? url('images/user_images/'.$data->image) : url('images/no_image.jpg')}}" alt=""></a></figure>
                                    </div>
                                    <div class="form-group message-btn">
                                        <button type="submit" class="theme-btn btn-one">Save Changes </button>
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

<script type="text/javascript">
        $(document).ready(function() {

            $("#image").change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $("#profile").attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            })
        })
    </script>
@endsection