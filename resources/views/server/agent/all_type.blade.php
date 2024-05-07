@extends('admin.dashboard');

@section('container')

<div class="page-content">
<nav class="page-breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{route('agent.tambah')}}">Tambah</a></li>
					</ol>
				</nav>

				<div class="row">
					<div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h6 class="card-title">Table Agen</h6>
                <div class="table-responsive">
                  <table id="dataTableExample" class="table">
                    <thead>
                      <tr>
                        <th>Id</th>
                        <th>Nama</th>
                        <th>Foto</th>
                        <th>Username</th>
                        <th>email</th>
                        <th>Nomor</th>
                        <th>status</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($data as $agent)
                      <tr>
                        <td>{{ $agent->id }}</td>
                        <td>{{ $agent->name }}</td>
                        <td><img src="{{  !empty($data->image) ? url('images/agent_images/'.$data->image) : url('images/no_image.jpg')}}" alt=""></td>
                        <td>{{ $agent->username }}</td>
                        <td>{{ $agent->email }}</td>
                        <td>{{ $agent->phone }}</td>
                        <td>
                        @if ($agent->status == "active")
                          <span class="badge rounded-pill bg-success">Active</span>
                        @else
                        <span class="badge rounded-pill bg-danger">Inactive</span>
                        @endif
                        </td>
                        </td>
                        <td><a href="{{ route('agent.edit', $agent->id) }}">Edit</a> / <a id="delete" href="{{ route('agent.hapus', $agent->id) }}">Hapus</a>
                        / @if ($agent->status == "inactive")
                        <a href="{{ route('agent.activate', $agent->id) }}">Aktivasi</a>
                        @else
                        <a href="{{ route('agent.inactivate', $agent->id) }}">Inaktivasi</a>
                        @endif
                      
                      </td>
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

<script type="text/javascript">
  $(function() {
    $('.toggle-class').change(function() {
        var status = $(this).prop('checked') == true ? 1 : 0; 
        var user_id = $(this).data('id'); 
         
        $.ajax({
            type: "GET",
            dataType: "json",
            url: '/changeStatus',
            data: {'status': status, 'user_id': user_id},
            success: function(data){
              // console.log(data.success)

                // Start Message 

            const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  icon: 'success', 
                  showConfirmButton: false,
                  timer: 3000 
            })
            if ($.isEmptyObject(data.error)) {
                    
                    Toast.fire({
                    type: 'success',
                    title: data.success, 
                    })

            }else{
               
           Toast.fire({
                    type: 'error',
                    title: data.error, 
                    })
                }

              // End Message   


            }
        });
    })
  })
</script>

@endsection