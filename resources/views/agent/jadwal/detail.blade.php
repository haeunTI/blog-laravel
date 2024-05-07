@extends('agent.dashboard')
@section('container_agent')

<div class="page-content">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                <h6 class="card-title">Schedule Request Details </h6>
                <form method="post" action="{{route('agent.jadwal.confirm')}}">
                    @csrf
                    <input type="hidden" name="id" value="{{ $data->id }}">
                    <input type="hidden" name="email" value="{{ $data->User->email }}">
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
                                    <td>Request Send Time  </td>
                                    <td>{{ $data->created_at->format('l M d Y') }}</td>

                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <br><br>
                    <div class="mb-3">
                        <label for="action" class="form-label">Choose Action:</label>
                        <select class="form-select" id="action" name="action">
                            <option value="tolak">Tolak</option>
                            <option value="setuju">Setuju</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">Submit </button>
                    <br><br>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>






@endsection