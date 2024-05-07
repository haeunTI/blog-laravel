@extends('agent.dashboard');

@section('container_agent')

<div class="page-content">
				<div class="row">
					<div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h6 class="card-title">Tabel Request Jadwal Tour</h6>
                <div class="table-responsive">
                  <table id="dataTableExample" class="table">
                    <thead>
                      <tr>
                        <th>Id</th>
                        <th>Nama</th>
                        <th>Nama Property</th>
                        <th>Tanggal</th>
                        <th>Waktu</th>
                        <th>Status</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($data as $item)
                      <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item['User']['name'] }}</td>
                        <td>{{ $item['Item']['nama_property'] }}</td>
                        <td>{{ $item->tanggal_tour }}</td>
                        <td>{{ $item->waktu_tour }}</td>
                        <td>
                        @if ($item->status == 1)
                          <span class="badge rounded-pill bg-success">Confirmed</span>
                        @elseif ($item->status == 2)
                        <span class="badge rounded-pill bg-danger">Tolak</span>
                        @else
                        <span class="badge rounded-pill bg-primary">Pending</span>
                        @endif
                        </td>
                        <td><a href="{{ route('agent.jadwal.detail', $item->id) }}">View</a> / <a id="delete" href="{{ route('agent.jadwal.hapus', $item->id) }}">Hapus</a></td>
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