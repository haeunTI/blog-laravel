@extends('admin.dashboard')

@section('container')
<div class="page-content">

    <div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
        </div>
    </div>
    </div>
    <div class="row profile-body">
    <!-- left wrapper start -->
    <!-- left wrapper end -->
    <!-- middle wrapper start -->
    <div class="col-md-12 col-xl-12 middle-wrapper">
        <div class="row">
        <div class="card">
              <div class="card-body">

                <h6 class="card-title">Tambah Amenity</h6>

                <form class="forms-sample" method="POST" action="{{ route('amenity.tambah.data') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Amenity</label>
                        <input type="text" name="nama" class="form-control" id="nama" autocomplete="off" @error('nama') is-invalid @enderror>
                        @error('nama')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Tambah</button>
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
@endsection