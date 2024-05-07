@extends('agent.dashboard')

@section('container_agent')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="page-content">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">DATA PROPERTY ITEM TERINCI</h2>
                    <div class="table-responsive pt-3">
                        <table class="table table-info">
                            <thead>
                                <tr>
                                    <th>Kategori</th>
                                    <th>Informasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Nama</td>
                                    <td>{{ $data->nama_property }}</td>
                                </tr>
                                <tr>
                                    <td>Tipe</td>
                                    <td>{{ $data['type']['nama_tipe'] }}</td>
                                </tr>
                                <tr>
                                    <td>Jual/Sewa</td>
                                    <td>{{ $data->status_property }}</td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>
                                    @if ($data->status == 1)
                                    <span class="badge rounded-pill bg-success">Active</span>
                                    @else
                                    <span class="badge rounded-pill bg-danger">Inactive</span>
                                    @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Harga Murah</td>
                                    <td>{{ $data->harga_murah }}</td>
                                </tr>
                                <tr>
                                    <td>Harga Mahal</td>
                                    <td>{{ $data->harga_mahal }}</td>
                                </tr>
                                <tr>
                                    <td>Kode</td>
                                    <td>{{ $data->kode_property }}</td>
                                </tr>
                                <tr>
                                    <td>Ukuran</td>
                                    <td>{{ $data->ukuran_property }}</td>
                                </tr>
                                <tr>
                                    <td>Foto Property</td>
                                    <td><img src="{{ asset($data->pict_property) }}" alt=""></td>
                                </tr>
                                <tr>
                                    <td>Informasi Pendek</td>
                                    <td>{{ $data->info_pendek }}</td>
                                </tr>
                                <tr>
                                    <td>Informasi Panjang</td>
                                    <td style="max-width:400px; word-wrap: break-word; overflow-wrap: break-word; overflow:auto; ">{!! $data->info_panjang !!}</td>
                                </tr>
                                <tr>
                                    <td>Jumlah Ruang</td>
                                    <td>{{ $data->ruang }}</td>
                                </tr>
                                <tr>
                                    <td>Jumlah Kamar Mandi</td>
                                    <td>{{ $data->kamar_mandi }}</td>
                                </tr>
                                <tr>
                                    <td>Jumlah Gudang</td>
                                    <td>{{ $data->gudang }}</td>
                                </tr>
                                <tr>
                                    <td>Ukuran Gudang</td>
                                    <td>{{ $data->ukuran_gudang }}</td>
                                </tr>
                                <tr>
                                    <td>Video</td>
                                    <td>{{ $data->video_property }}</td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>{{ $data->alamat }}</td>
                                </tr>
                                <tr>
                                    <td>Provinsi</td>
                                    <td>{{ $data->provinsi }}</td>
                                </tr>
                                <tr>
                                    <td>Kota</td>
                                    <td>{{ $data->kota }}</td>
                                </tr>
                                <tr>
                                    <td>Kecamatan</td>
                                    <td>{{ $data->kecamatan }}</td>
                                </tr>
                                <tr>
                                    <td>Kelurahan</td>
                                    <td>{{ $data->kelurahan }}</td>
                                </tr>
                                <tr>
                                    <td>Kode Pos</td>
                                    <td>{{ $data->kode_pos }}</td>
                                </tr>
                                <tr>
                                    <td>Agent</td>
                                    @if ( $data->id_agent == NULL)
                                    <td>Admin</td>
                                    @else
                                    <td>{{ $data['agent']['name'] }}</td>    
                                    @endif
                                </tr>
                                <tr>
                                    <td>Amenity</td>
                                    <td>
                                    <select class="js-example-basic-multiple form-select" id="id_amenity" name="id_amenity[]" multiple="multiple" data-width="100%">
                                        @foreach ($amenities as $amenity )
                                            <option value="{{ $amenity->id }}" {{ (in_array($amenity->id, $current_amenity)) ? "selected" : " "}}>{{ $amenity->nama }}</option>
                                        @endforeach
									</select>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <br><br>
                        @if ($data->status == 1)
                        <form class="forms-sample" method="POST" action="{{ route('agent.item.rinci.inactive') }}">
                            @csrf
                            <input type="hidden" name="id_item" value="{{$data->id}}">
                            <input type="submit" class="btn btn-danger" value="Inaktivasi">
                        </form>
                        @else
                        <form class="forms-sample" method="POST" action="{{ route('agent.item.rinci.active') }}">
                            @csrf
                            <input type="hidden" name="id_item" value="{{$data->id}}">
                            <input type="submit" class="btn btn-success" value="Aktivasi">
                        </form>
                        @endif
                        
                    </div>
                </div>
            </div>
        </div>
    </div>             
</div>  

@endsection