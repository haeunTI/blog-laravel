@extends('admin.dashboard');

@section('container')

<div class="page-content">
				<div class="row">
					<div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h6 class="card-title">Komentar</h6>
                <div class="table-responsive">
                  <table id="dataTableExample" class="table">
                    <thead>
                      <tr>
                        <th>Id</th>
                        <th>Judul Post</th>
                        <th>Nama User</th>
                        <th>Subyek</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($data as $comment)
                      <tr>
                        <td>{{ $comment->id }}</td>
                        <td>{{ $comment['Blog']['judul'] }}</td>
                        <td>{{ $comment['User']['name'] }}</td>
                        <td>{{ $comment->subject }}</td>
                        <td><a href="{{ route('comment.balas', $comment->id) }}">Reply</a> / <a id="delete" href="{{ route('post.hapus', $comment->id) }}">Hapus</a></td>
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