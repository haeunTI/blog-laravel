@extends('admin.dashboard')
@section('container')

<div class="page-content">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                <h6 class="card-title">Schedule Request Details </h6>
                    <div class="table-responsive pt-3">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td>User Name </td>
                                    <td>{{ $data->User->name }}</td>

                                </tr>
                                <tr>
                                    <td>Property Name </td>
                                    <td>{{ $data->item->nama_property }}</td>

                                </tr>
                                <tr>
                                    <td>Tour Date  </td>
                                    <td>{{ $data->tanggal_tour }}</td>

                                </tr>
                                <tr>
                                    <td>Tour Time  </td>
                                    <td>{{ $data->waktu_tour }}</td>

                                </tr>
                                <tr>
                                    <td>Message  </td>
                                    <td>{{ $data->message }}</td>

                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>
                                    @if ($data->status == 1)
                                    <span class="badge rounded-pill bg-success">Confirmed</span>
                                    @elseif ($data->status == 2)
                                    <span class="badge rounded-pill bg-danger">Tolak</span>
                                    @else
                                    <span class="badge rounded-pill bg-primary">Pending</span>
                                    @endif
                                    </td>

                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <br><br>
                </div>
            </div>
        </div>
    </div>
</div>






@endsection