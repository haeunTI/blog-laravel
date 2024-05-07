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
                <h6 class="card-title">Balas Komentar</h6>
                    <form class="forms-sample" method="POST" action="{{ route('comment.publish.balas') }}" id="myForm">
                    @csrf

                        <input type="hidden" name="id" value="{{ $data->id }}">
                        <input type="hidden" name="id_user" value="{{ $data->id_user }}">
                        <input type="hidden" name="id_post" value="{{ $data->id_post }}">

                                <div class="mb-3 form-group">
                                    <label for="judul" class="form-label">Judul Post: </label>
                                    {{ $data['Blog']['judul'] }}
                                </div>
                            
                                <div class="mb-3 form-group">
                                <label for="nama" class="form-label">Nama User: </label>
                                {{ $data['User']['name'] }}

                                </div>
                                <div class="mb-3 form-group">
                                    <label for="subject" class="form-label">Subject: </label>
                                    {{ $data->subject }}

                                </div>
                            
                                <div class="mb-3 form-group">
                                <label for="message" class="form-label">Message: </label>
                                {{ $data->message}}
                                </div>

                                <div class="col-sm-6">
                                    <div class="mb-3 form-group">
                                        <label for="subject" class="form-label">subject</label>
                                        <input type="text" name="subject" class="form-control" id="subject" autocomplete="off" @error('subject') is-invalid @enderror>
                                        @error('subject')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            
                                <div class="col-sm-6">
                                    <div class="mb-3 form-group">
                                        <label for="message" class="form-label">message</label>
                                        <input type="text" name="message" class="form-control" id="message" autocomplete="off" @error('message') is-invalid @enderror>
                                        @error('message')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
          
                    <button type="submit" class="btn btn-primary me-2">Reply</button>
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