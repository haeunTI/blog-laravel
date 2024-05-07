@extends('admin.dashboard');

@section('container')

<div class="page-content">
<nav class="page-breadcrumb">
					<ol class="breadcrumb">
                        <button type="button" class="btn btn-primary breadcrumb-item" data-bs-toggle="modal" data-bs-target="#tambahBlog">
                            Tambah
                        </button>
					</ol>
				</nav>

				<div class="row">
					<div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h6 class="card-title">Table Tipe Blog</h6>
                <div class="table-responsive">
                  <table id="dataTableExample" class="table">
                    <thead>
                      <tr>
                        <th>Id</th>
                        <th>Nama</th>
                        <th>Slug</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($data as $tipe_blog)
                      <tr>
                        <td>{{ $tipe_blog->id }}</td>
                        <td>{{ $tipe_blog->nama }}</td>
                        <td>{{ $tipe_blog->slug }}</td>
                        <td>
                          <button id="{{ $tipe_blog->id }}" onclick="categoryEdit(this.id)" type="button" class="btn btn-primary breadcrumb-item" data-bs-toggle="modal" data-bs-target="#ubahBlog">
                              Ubah
                          </button>  
                        <a class="btn btn-primary " id="delete" href="{{ route('tipe_blog.hapus', $tipe_blog->id) }}">Hapus</a>
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


<div class="modal fade" id="tambahBlog" tabindex="-1" aria-labelledby="tambahBlogLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahBlogLabel">Tambah Tipe Blog</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="forms-sample" method="POST" action="{{ route('tipe_blog.tambah.data') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">Tipe</label>
                    <input type="text" name="nama" class="form-control" id="nama" autocomplete="off" @error('nama') is-invalid @enderror>
                    @error('nama')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
      </div>
        <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="ubahBlog" tabindex="-1" aria-labelledby="ubahBlogLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ubahBlogLabel">Ubah Tipe Blog</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="forms-sample" method="POST" action="{{ route('tipe_blog.edit.data') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" id="cat_id">
                <div class="mb-3">
                    <label for="nama" class="form-label">Tipe</label>
                    <input type="text" name="nama" class="form-control" id="cat" autocomplete="off" @error('nama') is-invalid @enderror>
                    @error('nama')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
      </div>
        <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">

function categoryEdit(id) {
  console.log("hello")

    $.ajax({
      type: "GET",
      dataType: "json",
      url: '/tipe_blog/edit/'+id,
      success:function(data) {
        console.log(data)
        $('#cat').val(data.nama);
        $('#cat_id').val(data.id);
      }
    })
  }


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