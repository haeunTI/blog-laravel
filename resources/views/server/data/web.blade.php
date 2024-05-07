@extends('admin.dashboard')

@section('container')
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script> -->
<div class="page-content">
    <div class="row profile-body">
        <div class="col-md-8 col-xl-8 middle-wrapper">
        <div class="row">
            <div class="card">
            <div class="card-body">
                <h6 class="card-title">Update Site Setting   </h6>
                    <form id="myForm" method="POST" action="{{ route('update.data.web') }}" class="forms-sample" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $data->id }}">

                        <div class="form-group mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nomor </label>
                            <input type="text" name="nomor" class="form-control" value="{{ $data->nomor }}" > 
                        </div>

                        <div class="form-group mb-3">
                            <label for="exampleInputEmail1" class="form-label">Alamat </label>
                            <input type="text" name="alamat" class="form-control" value="{{ $data->alamat }}" > 
                        </div>


                        <div class="form-group mb-3">
                            <label for="exampleInputEmail1" class="form-label">    email   </label>
                            <input type="email" name="email" class="form-control" value="{{ $data->email }}" > 
                        </div>

                        <div class="form-group mb-3">
                            <label for="exampleInputEmail1" class="form-label"> copyright   </label>
                            <input type="text" name="copyright" class="form-control" value="{{ $data->copyright }}" > 
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Logo   </label>
                            <input class="form-control"  name="logo" type="file" id="image">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">    </label>
                            <img id="showImage" name="logo" class="wd-80 rounded-circle" src="{{ asset($data->logo) }}" alt="profile">
                        </div>

                        <button type="submit" class="btn btn-primary me-2">Save Changes </button>

                    </form>
            </div>
            </div>
        </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>


@endsection