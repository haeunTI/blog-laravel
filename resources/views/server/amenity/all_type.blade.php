@extends('admin.dashboard');

@section('container')

<div class="page-content">
<nav class="page-breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{route('amenity.tambah')}}">Tambah</a></li>
					</ol>
				</nav>

				<div class="row">
					<div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h6 class="card-title">Table Amenity</h6>
                <div class="table-responsive">
                  <table id="dataTableExample" class="table">
                    <thead>
                      <tr>
                        <th>Id</th>
                        <th>Nama</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($data as $amenity)
                      <tr>
                        <td>{{ $amenity->id }}</td>
                        <td>{{ $amenity->nama }}</td>
                        <td><a href="{{ route('amenity.edit', $amenity->id) }}">Edit</a> / <a id="delete" href="{{ route('amenity.hapus', $amenity->id) }}">Hapus</a></td>
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

@endsection