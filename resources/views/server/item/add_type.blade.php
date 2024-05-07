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
                <h6 class="card-title">Tambah Property</h6>
                    <form class="forms-sample" method="POST" action="{{ route('item.tambah.data') }}" enctype="multipart/form-data" id="myForm">
                    @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3 form-group">
                                    <label for="nama_property" class="form-label">Nama</label>
                                    <input type="text" name="nama_property" class="form-control" id="nama_property" autocomplete="off" @error('nama_property') is-invalid @enderror>
                                    @error('nama_property')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3 form-group">
                                    <label for="status_property" class="form-label">Status Item</label>
                                    <select class="form-select" id="status_property" name="status_property" @error('status_property') is-invalid @enderror>
                                        <option selected disabled>Select status</option>
                                        <option value="jual">Untuk Dijual</option>
                                        <option value="sewa">Untuk Disewa</option>
                                    </select>
                                    @error('status_property')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div><!-- Row -->  
                        
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3 form-group">
                                    <label for="harga_murah" class="form-label">Harga Termurah</label>
                                    <input type="text" name="harga_murah" class="form-control" id="harga_murah" autocomplete="off" @error('harga_murah') is-invalid @enderror>
                                    @error('harga_murah')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3 form-group">
                                    <label for="harga_mahal" class="form-label">Harga Termahal</label>
                                    <input type="text" name="harga_mahal" class="form-control" id="harga_mahal" autocomplete="off" @error('harga_mahal') is-invalid @enderror>
                                    @error('harga_mahal')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3 form-group">
                                    <label for="pict_property" class="form-label">Foto (Main)</label>
                                    <input class="form-control" type="file" id="pict_property" name="pict_property">
                                    <img id="mainImage" alt="">
                                    @error('pict_property')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3 form-group">
                                    <label for="multi_images" class="form-label">Multi Image</label>
                                    <input class="form-control" type="file" id="multi_images" name="multi_images[]" multiple="">
                                    <div class="row" id="preview_img"></div> 
                                    <!-- error di preview! -->
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-3">
                                <div class="mb-3 form-group">
                                    <label class="form-label">Provinsi</label>
                                    <select class="form-control" name="provinsi" id="provinsi">
                                        <option value="Aceh">Aceh</option>
                                        <option value="Bali">Bali</option>
                                        <option value="Banten">Banten</option>
                                        <option value="Bengkulu">Bengkulu</option>
                                        <option value="Daerah Istimewa Yogyakarta">Daerah Istimewa Yogyakarta</option>
                                        <option value="DKI Jakarta">DKI Jakarta</option>
                                        <option value="Gorontalo">Gorontalo</option>
                                        <option value="Jambi">Jambi</option>
                                        <option value="Jawa Barat">Jawa Barat</option>
                                        <option value="Jawa Tengah">Jawa Tengah</option>
                                        <option value="Jawa Timur">Jawa Timur</option>
                                        <option value="Kalimantan Barat">Kalimantan Barat</option>
                                        <option value="Kalimantan Selatan">Kalimantan Selatan</option>
                                        <option value="Kalimantan Tengah">Kalimantan Tengah</option>
                                        <option value="Kalimantan Timur">Kalimantan Timur</option>
                                        <option value="Kalimantan Utara">Kalimantan Utara</option>
                                        <option value="Kepulauan Riau">Kepulauan Riau</option>
                                        <option value="Kepulauan Bangka Belitung">Kepulauan Bangka Belitung</option>
                                        <option value="Nusa Tenggara Barat">Nusa Tenggara Barat</option>
                                        <option value="Nusa Tenggara Timur">Nusa Tenggara Timur</option>
                                        <option value="Papua Barat">Papua Barat</option>
                                        <option value="Papua">Papua</option>
                                        <option value="Riau">Riau</option>
                                        <option value="Sulawesi Barat">Sulawesi Barat</option>
                                        <option value="Sulawesi Selatan">Sulawesi Selatan</option>
                                        <option value="Sulawesi Tengah">Sulawesi Tengah</option>
                                        <option value="Sulawesi Tenggara">Sulawesi Tenggara</option>
                                        <option value="Sulawesi Utara">Sulawesi Utara</option>
                                        <option value="Sumatera Barat">Sumatera Barat</option>
                                        <option value="Sumatera Selatan">Sumatera Selatan</option>
                                        <option value="Sumatera Utara">Sumatera Utara</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="mb-3 form-group">
                                    <label class="form-label">Kota</label>
                                    <input type="text" class="form-control" name="kota" id="kota" >
                                    @error('kota')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="mb-3 form-group">
                                    <label class="form-label">Kecamatan</label>
                                    <input type="text" class="form-control" name="kecamatan" id="kecamatan" >
                                    @error('kecamatan')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="mb-3 form-group">
                                    <label class="form-label">Kelurahan</label>
                                    <input type="text" class="form-control" name="kelurahan" id="kelurahan" >
                                    @error('kelurahan')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-3">
                                <div class="mb-3 form-group">
                                    <label class="form-label">Ruang</label>
                                    <input type="text" class="form-control" name="ruang" id="ruang">
                                    @error('ruang')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="mb-3 form-group">
                                    <label class="form-label">Kamar Mandi</label>
                                    <input type="text" class="form-control" name="kamar_mandi" id="kamar_mandi" >
                                    @error('kamar_mandi')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="mb-3 form-group">
                                    <label class="form-label">Gudang</label>
                                    <input type="text" class="form-control" name="gudang" id="gudang" >
                                    @error('gudang')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="mb-3 form-group">
                                    <label class="form-label">Ukuran Gudang</label>
                                    <input type="text" class="form-control" name="ukuran_gudang" id="ukuran_gudang" >
                                    @error('ukuran_gudang')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-4">
                                <div class="mb-3 form-group">
                                    <label class="form-label">Alamat</label>
                                    <input type="text" class="form-control" name="alamat" id="alamat" >
                                    @error('alamat')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="mb-3 form-group">
                                    <label class="form-label">Kode Pos</label>
                                    <input type="text" class="form-control" name="kodepos" id="kodepos" >
                                    @error('kodepos')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="mb-3 form-group">
                                    <label class="form-label">Ukuran Property</label>
                                    <input type="text" class="form-control" name="ukuran_property" id="ukuran_property" >
                                    @error('ukuran_property')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="mb-3 form-group">
                                    <label class="form-label">Tanggal Konstruksi</label>
                                    <input type="text" class="form-control" name="tanggal_konstruksi" id="tanggal_konstruksi" >
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-3">
                                <div class="mb-3 form-group">
                                    <label class="form-label">Video</label>
                                    <input type="text" class="form-control" name="video_property" id="video_property" >
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="mb-3 form-group">
                                    <label class="form-label">Property Type</label>
                                    <select class="form-select" id="id_property_type" name="id_property_type" @error('id_property_type') is-invalid @enderror>
                                        <option selected disabled>Select Tipe Property</option>
                                        @foreach ($tipe_property as $tipe )
                                            <option value="{{ $tipe->id }}">{{ $tipe->nama_tipe }}</option>
                                        @endforeach
                                    </select>
                                    @error('id_property_type')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="mb-3 form-group">
                                    <label class="form-label">Amenities</label>
                                    <select class="js-example-basic-multiple form-select" id="id_amenity" name="id_amenity[]" multiple="multiple" data-width="100%">
                                        @foreach ($amenities as $amenity )
                                            <option value="{{ $amenity->id }}">{{ $amenity->nama }}</option>
                                        @endforeach
									</select>
                                    @error('id_amenity')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="mb-3 form-group">
                                    <label class="form-label">Agent</label>
                                    <select class="form-select" id="id_agent" name="id_agent">
                                        <option selected disabled>Select Agent</option>
                                        @foreach ($agents as $agent )
                                            <option value="{{ $agent->id }}">{{ $agent->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('id_agent')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="mb-3 form-group">
                                    <label class="form-label">Short Description</label>
                                    <textarea class="form-control" id="info_pendek" name="info_pendek" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="mb-3 form-group">
                                    <label class="form-label">Long Description</label>
                                    <textarea class="form-control" name="info_panjang" id="tinymceExample" rows="10"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 form-group">
						    <div class="form-check form-check-inline">
                                <input type="checkbox" class="form-check-input" id="hot" name="hot" value="1">
									<label class="form-check-label" for="hot">
										Hot
									</label>
								</div>
							<div class="form-check form-check-inline">
                                <input type="checkbox" class="form-check-input" id="feature" name="feature" value="1">
									<label class="form-check-label" for="feature">
										Feature
									</label>
							</div>
                        </div>

                        <div class="row add_item">
                            <div class="col-md-4">
                                <div class="mb-3 form-group">
                                        <label for="facility_name" class="form-label">Facilities </label>
                                        <select name="facility_name[]" id="facility_name" class="form-control">
                                            <option value="">Select Facility</option>
                                            <option value="Hospital">Hospital</option>
                                            <option value="SuperMarket">Super Market</option>
                                            <option value="School">School</option>
                                            <option value="Entertainment">Entertainment</option>
                                            <option value="Pharmacy">Pharmacy</option>
                                            <option value="Airport">Airport</option>
                                            <option value="Railways">Railways</option>
                                            <option value="Bus Stop">Bus Stop</option>
                                            <option value="Beach">Beach</option>
                                            <option value="Mall">Mall</option>
                                            <option value="Bank">Bank</option>
                                        </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 form-group">
                                        <label for="distance" class="form-label"> Distance </label>
                                        <input type="text" name="distance[]" id="distance" class="form-control" placeholder="Distance (Km)">
                                </div>
                            </div>
                            <div class="form-group col-md-4" style="padding-top: 30px;">
                                <a class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i> Add More..</a>
                            </div>
                        </div> <!---end row-->             
                    <button type="submit" class="btn btn-primary me-2">Submit form</button>
                    </form>
            </div>
        </div>
    </div>
    <!-- middle wrapper end -->
    <!-- right wrapper start -->
    <!-- right wrapper end -->
    </div>

<div style="visibility: hidden">
   <div class="whole_extra_item_add" id="whole_extra_item_add">
      <div class="whole_extra_item_delete" id="whole_extra_item_delete">
         <div class="container mt-2">
            <div class="row">

               <div class="form-group col-md-4">
                  <label for="facility_name">Facilities</label>
                  <select name="facility_name[]" id="facility_name" class="form-control">
                        <option value="">Select Facility</option>
                        <option value="Hospital">Hospital</option>
                        <option value="SuperMarket">Super Market</option>
                        <option value="School">School</option>
                        <option value="Entertainment">Entertainment</option>
                        <option value="Pharmacy">Pharmacy</option>
                        <option value="Airport">Airport</option>
                        <option value="Railways">Railways</option>
                        <option value="Bus Stop">Bus Stop</option>
                        <option value="Beach">Beach</option>
                        <option value="Mall">Mall</option>
                        <option value="Bank">Bank</option>
                  </select>
               </div>
               <div class="form-group col-md-4">
                  <label for="distance">Distance</label>
                  <input type="text" name="distance[]" id="distance" class="form-control" placeholder="Distance (Km)">
               </div>
               <div class="form-group col-md-4" style="padding-top: 20px">
                  <span class="btn btn-success btn-sm addeventmore"><i class="fa fa-plus-circle">Add</i></span>
                  <span class="btn btn-danger btn-sm removeeventmore"><i class="fa fa-minus-circle">Remove</i></span>
               </div>
            </div>
         </div>
      </div>
   </div>
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

            $("#pict_property").change(function(e) {
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