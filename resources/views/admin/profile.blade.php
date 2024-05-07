@extends('admin.dashboard')

@section('container')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="page-content">

    <div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
        </div>
    </div>
    </div>
    <div class="row profile-body">
    <!-- left wrapper start -->
    <div class="d-none d-md-block col-md-4 col-xl-4 left-wrapper">
        <div class="card rounded">
        <div class="card-body">
            <div class="d-flex align-items-center justify-content-between mb-2">
            <div>
                <img class="wd-100 rounded-circle" src="{{ !empty($data->image) ? url('images/admin_images/'.$data->image) : url('images/no_image.jpg')}}" alt="profile">
                <span class="h4 ms-3 text-white">{{ $data->name }}</span>
            </div>
            </div>
            <div class="mt-3">
            <label class="tx-11 fw-bolder mb-0 text-uppercase">Email:</label>
            <p class="text-muted">{{ $data->email }}</p>
            </div>
            <div class="mt-3">
            <label class="tx-11 fw-bolder mb-0 text-uppercase">Phone:</label>
            <p class="text-muted">{{ $data->phone }}</p>
            </div>
            <div class="mt-3">
            <label class="tx-11 fw-bolder mb-0 text-uppercase">Address:</label>
            <p class="text-muted">{{ $data->address }}</p>
            </div>
            <div class="mt-3 d-flex social-links">
            <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                <i data-feather="github"></i>
            </a>
            <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                <i data-feather="twitter"></i>
            </a>
            <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                <i data-feather="instagram"></i>
            </a>
            </div>
        </div>
        </div>
    </div>
    <!-- left wrapper end -->
    <!-- middle wrapper start -->
    <div class="col-md-8 col-xl-8 middle-wrapper">
        <div class="row">
        <div class="card">
              <div class="card-body">

                <h6 class="card-title">Update Admin Profile</h6>

                <form class="forms-sample" method="POST" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" id="email" value="{{ $data->email }}">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="text" name="phone" class="form-control" id="phone" autocomplete="off" value="{{ $data->phone }}">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" name="address" class="form-control" id="address" autocomplete="off" value="{{ $data->address }}">
                    </div>
                    <div class="mb-3">
                        <label for="photo" class="form-label">Photo</label>
                        <input type="file" name="photo" class="form-control" id="photo" autocomplete="off" value="{{ $data->photo }}">
                    </div>
                    <div class="mb-3">
                        <label for="profile" class="form-label"></label>
                        <img id="profile" class="wd-70 img-fluid rounded-circle" src="{{ !empty($data->image) ? url('images/admin_images/'.$data->image) : url('images/no_image.jpg')}}" alt="profile">
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Update</button>
                </form>

              </div>
            </div>
        </div>
    </div>
    <!-- middle wrapper end -->
    <!-- right wrapper start -->
    <!-- right wrapper end -->
    </div>

</div>

    <script type="text/javascript">
        $(document).ready(function() {

            $("#photo").change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $("#profile").attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            })
        })
    </script>
@endsection