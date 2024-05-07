@extends('admin.dashboard');

@section('container')

<div class="page-content">
<nav class="page-breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{route('property.tambah')}}">Tambah</a></li>
					</ol>
				</nav>

				<div class="row">
					<div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h6 class="card-title">Table Tipe Property</h6>
                <div class="table-responsive">
                  <table id="dataTableExample" class="table">
                    <thead>
                      <tr>
                        <th>Id</th>
                        <th>Nama</th>
                        <th>Icon</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($data as $types)
                      <tr>
                        <td>{{ $types->id }}</td>
                        <td>{{ $types->nama_tipe }}</td>
                        <td>{{ $types->icon }}</td>
                        <td><a href="{{ route('property.edit', $types->id) }}">Edit</a> / <a id="delete" href="{{ route('property.hapus', $types->id) }}">Hapus</a></td>
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