@extends('admin.dashboard')

@section('container')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="page-content">

    <div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
        </div>
    </div>
    </div>
    <div class="row profile-body">
    <!-- left wrapper start -->
    <!-- left wrapper end -->
    <!-- middle wrapper start -->
    <div class="col-md-12 col-xl-12 middle-wrapper">
        <div class="row">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Edit Post</h6>
                    <form class="forms-sample" method="POST" action="{{ route('post.edit.data') }}" enctype="multipart/form-data" id="myForm">
                    @csrf
                    <input type="hidden" name="id" value="{{ $data->id }}">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3 form-group">
                                    <label for="judul" class="form-label">Judul</label>
                                    <input type="text" value="{{ $data->judul }}" name="judul" class="form-control" id="judul" autocomplete="off" @error('judul') is-invalid @enderror>
                                    @error('judul')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3 form-group">
                                    <label for="kategori" class="form-label">Kategori Blog</label>
                                    <select class="form-select" id="kategori" name="kategori" @error('kategori') is-invalid @enderror>
                                        @foreach ($blog_cat as $category )
                                            <option {{ $category->id == $data->blog_cat_id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->nama }}</option>
                                        @endforeach
                                    </select>
                                    @error('kategori')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div><!-- Row -->  
                        
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="mb-3 form-group">
                                    <label for="image" class="form-label">Foto (Main)</label>
                                    <input class="form-control" type="file" id="image" name="image">
                                    <img id="mainImage" alt="" src="{{ asset($data->image) }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="mb-3 form-group">
                                    <label class="form-label">Short Description</label>
                                    <textarea class="form-control" id="info_pendek" name="info_pendek" rows="3">{{ $data->info_pendek }}</textarea>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="mb-3 form-group">
                                    <label class="form-label">Long Description</label>
                                    <textarea class="form-control" name="info_panjang" id="tinymceExample" rows="10">{{ $data->info_panjang }}</textarea>
                                </div>
                            </div>
                        </div>
          
                    <button type="submit" class="btn btn-primary me-2">Submit form</button>
                    </form>
            </div>
        </div>
    </div>
    <!-- middle wrapper end -->
    <!-- right wrapper start -->
    <!-- right wrapper end -->
    </div>


            <!----For Section-------->
<script type="text/javascript">
   $(document).ready(function(){
      var counter = 0;
      $(document).on("click",".addeventmore",function(){
            var whole_extra_item_add = $("#whole_extra_item_add").html();
            $(this).closest(".add_item").append(whole_extra_item_add);
            counter++;
      });
      $(document).on("click",".removeeventmore",function(event){
            $(this).closest("#whole_extra_item_delete").remove();
            counter -= 1
      });
   });
</script>

</div>
    <script type="text/javascript">
        $(document).ready(function() {

            $("#image").change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $("#mainImage").attr('src',e.target.result).width(100).height(80);
                }
                reader.readAsDataURL(e.target.files['0']);
            })
        })

        $(document).ready(function() {
            $(document).on('change', '#multi_images', function() {
                if (window.File && window.FileReader && window.FileList && window.Blob) {
                    var data = $(this)[0].files;
                    
                    $.each(data, function(index, file) {
                        if(/(\.|\/)(gif|jpe?g|png|webp)$/i.test(file.type)) {
                            var fRead = new FileReader();
                            fRead.onload = (function(file) {
                                return function(e) {
                                    var img = $('<img/>').addClass('thumb').attr('src', e.target.result).width(100).height(80);
                                    $('#preview_img').append(img);
                                };
                            })(file);
                            fRead.readAsDataURL(file);
                        }
                    });
                } else {
                    alert("Your browser doesn't support File API!");
                }
            });
        });

    </script>

<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                nama_property: {
                    required : true,
                },
                status_property: {
                    required : true,
                },
                harga_murah: {
                    required : true,
                },
                harga_mahal: {
                    required : true,
                },
                 id_property_type: {
                    required : true,
                },
        },
            messages :{
                nama_property: {
                    required : 'Please Enter Property Name',
                },
                status_property: {
                    required : 'Please Select Property Status',
                },
                harga_mahal: {
                    required : 'Please Enter Lowest Price',
                },
                harga_mahal: {
                    required : 'Please Enter Max Price',
                },
                id_property_type: {
                    required : 'Please Select Property Type',
                }, 
                 
            },
            errorElement : 'span', 
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });
    
</script>
@endsection