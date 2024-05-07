@extends('admin.dashboard');

@section('container')

<div class="page-content">
<nav class="page-breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{route('item.tambah')}}">Tambah</a></li>
					</ol>
				</nav>

				<div class="row">
					<div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h6 class="card-title">Table Property</h6>
                <div class="table-responsive">
                  <table id="dataTableExample" class="table">
                    <thead>
                      <tr>
                        <th>Id</th>
                        <th>Nama</th>
                        <th>ID</th>
                        <th>Foto</th>
                        <th>Tipe Property</th>
                        <th>Kota</th>
                        <th>Status</th>
                        <th>Aksi</th>
                        <th>Details</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($data as $item)
                      <tr>
                        <td>{{ $item->kode_property }}</td>
                        <td>{{ $item->nama_property }}</td>
                        <td><img src="{{asset($item->pict_property)}}" style="width: 70px; height: 40px;" alt=""></td>
                        <td>{{ $item['type']['nama_tipe'] }}</td>
                        <td>{{ $item->status_property }}</td>
                        <td>{{ $item->kota }}</td>
                        <td>
                        @if ($item->status == 1)
                          <span class="badge rounded-pill bg-success">Active</span>
                        @else
                        <span class="badge rounded-pill bg-danger">Inactive</span>
                        @endif
                        </td>
                        <td><a href="{{ route('item.edit', $item->id) }}">Edit</a> / <a id="delete" href="{{ route('item.hapus', $item->id) }}">Hapus</a></td>
                        <td><a href="{{ route('item.rinci', $item->id) }}">View</a></td>
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