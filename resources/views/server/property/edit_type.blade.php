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

                <h6 class="card-title">Ubah tipe property</h6>

                <form class="forms-sample" method="POST" action="{{ route('property.edit.data') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$data->id}}">
                    <div class="mb-3">
                        <label for="nama_tipe" class="form-label">Tipe</label>
                        <input type="text" name="nama_tipe" class="form-control" value="{{ $data->nama_tipe }}" id="nama_tipe" autocomplete="off" @error('nama_tipe') is-invalid @enderror>
                        @error('nama_tipe')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="icon" class="form-label">Icon</label>
                        <input type="text" name="icon" class="form-control" id="icon" value="{{ $data->icon }}" autocomplete="off" @error('icon') is-invalid @enderror>
                        @error('icon')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Ubah</button>
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