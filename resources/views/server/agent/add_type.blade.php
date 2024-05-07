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

                <h6 class="card-title">Tambah Agen</h6>

                <form class="forms-sample" method="POST" action="{{ route('agent.tambah.data') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Agen</label>
                        <input type="text" name="nama" class="form-control" id="nama" autocomplete="off" @error('nama') is-invalid @enderror>
                        @error('nama')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password  Agen</label>
                        <input type="password" name="password" class="form-control" id="password" autocomplete="off" @error('password') is-invalid @enderror>
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email  Agen</label>
                        <input type="text" name="email" class="form-control" id="email" autocomplete="off" @error('email') is-invalid @enderror>
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Nomor  Agen</label>
                        <input type="text" name="phone" class="form-control" id="phone" autocomplete="off" @error('phone') is-invalid @enderror>
                        @error('phone')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Alamat  Agen</label>
                        <input type="text" name="address" class="form-control" id="address" autocomplete="off" @error('address') is-invalid @enderror>
                        @error('address')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="company" class="form-label">Company  Agen</label>
                        <input type="text" name="company" class="form-control" id="company" autocomplete="off" @error('company') is-invalid @enderror>
                        @error('company')
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