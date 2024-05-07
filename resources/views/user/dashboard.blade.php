<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

<title>REALestate</title>

<!-- Fav Icon -->
<link rel="icon" href="{{asset('frontend/assets/images/favicon.ico')}}" type="image/x-icon">

<meta name="csrf-token" content=" {{ csrf_token() }} ">
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<!-- Stylesheets -->
<link href="{{ asset('frontend/assets/css/font-awesome-all.css') }} " rel="stylesheet">
<link href="{{ asset('frontend/assets/css/flaticon.css') }}" rel="stylesheet">
<link href="{{ asset('frontend/assets/css/owl.css') }}" rel="stylesheet">
<link href="{{ asset('frontend/assets/css/bootstrap.css') }}" rel="stylesheet">
<link href="{{ asset('frontend/assets/css/jquery.fancybox.min.css') }}" rel="stylesheet">
<link href="{{ asset('frontend/assets/css/animate.css') }}" rel="stylesheet">
<link href="{{ asset('frontend/assets/css/jquery-ui.css') }}" rel="stylesheet">
<link href="{{ asset('frontend/assets/css/nice-select.css') }}" rel="stylesheet">
<link href="{{ asset('frontend/assets/css/color/theme-color.css') }}" id="jssDefault" rel="stylesheet">
<link href="{{ asset('frontend/assets/css/switcher-style.css') }}" rel="stylesheet">
<link href="{{ asset('frontend/assets/css/style.css') }}" rel="stylesheet">
<link href="{{ asset('frontend/assets/css/responsive.css') }}" rel="stylesheet">
<link href="{{ asset('frontend/assets/css/kota.css') }}" rel="stylesheet">





<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0- 
     alpha/css/bootstrap.css" rel="stylesheet">
	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>


<body>

    <div class="boxed_wrapper">



        <!-- main header -->
        @include('user.home.header')
        <!-- main-header end -->

        <!-- Mobile Menu  -->
        @include('user.home.mobile_menu')

        
        <!-- whole content -->
        @yield('content')

        <!-- main-footer -->
        @include('user.home.footer')
        <!-- main-footer end -->



        <!--Scroll to top-->
        <button class="scroll-top scroll-to-target" data-target="html">
            <span class="fal fa-angle-up"></span>
        </button>
    </div>

    @if(session('success'))
        <script>
            toastr.success("{{ session('success') }}");
        </script>
    @endif

    @if(session('error'))
        <script>
            toastr.error("{{ session('error') }}");
        </script>
    @endif


    <!-- jequery plugins -->
    <script src="{{asset('frontend/assets/js/jquery.js')}}"></script>
    <script src="{{asset('frontend/assets/js/popper.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/owl.js')}}"></script>
    <script src="{{asset('frontend/assets/js/wow.js')}}"></script>
    <script src="{{asset('frontend/assets/js/validation.js')}}"></script>
    <script src="{{asset('frontend/assets/js/jquery.fancybox.js')}}"></script>
    <script src="{{asset('frontend/assets/js/appear.js')}}"></script>
    <script src="{{asset('frontend/assets/js/scrollbar.js')}}"></script>
    <script src="{{asset('frontend/assets/js/isotope.js')}}"></script>
    <script src="{{asset('frontend/assets/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/jQuery.style.switcher.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/jquery-ui.js')}}"></script>
    <script src="{{asset('frontend/assets/js/nav-tool.js')}}"></script>

    <!-- main-js -->
    <script src="{{asset('frontend/assets/js/script.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>

        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        })

        function saved (event, id) {
            event.preventDefault();
            var token = $('meta[name="csrf-token"]').attr('content'); // Get CSRF token from meta tag

            $.ajax({
                type: "POST",
                url: "/save-item/" + id,
                data: {
                    id: id,
                    _token: token // Include CSRF token in the request data
                },

                success:function(data){
                    console.log(data)

                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    })

                    console.log("here");

                    if($.isEmptyObject(data.error)){
                        Toast.fire({
                            type:'success',
                            icon: 'success',
                            title: data.success,
                        })
                    } else {
                        Toast.fire({
                            type:'error',
                            icon: 'error',
                            title: data.error,
                        })
                    }
                }
            })
        }

        function banding (event, id) {
            console.log("here")
            event.preventDefault();
            var token = $('meta[name="csrf-token"]').attr('content'); // Get CSRF token from meta tag

            $.ajax({
                type: "POST",
                url: "/banding-item/" + id,
                data: {
                    id: id,
                    _token: token // Include CSRF token in the request data
                },

                success:function(data){
                    console.log(data)

                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    })

                    console.log("here");

                    if($.isEmptyObject(data.error)){
                        Toast.fire({
                            type:'success',
                            icon: 'success',
                            title: data.success,
                        })
                    } else {
                        Toast.fire({
                            type:'error',
                            icon: 'error',
                            title: data.error,
                        })
                    }
                }
            })
        }

    </script>

</body><!-- End of .page_wrapper -->
</html>
