<!DOCTYPE html>
<html lang="en">
<head>
	<title>{{env('APP_NAME', 'Laravel')}}</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	{{-- <link rel="icon" type="image/png" href="images/icons/favicon.ico"/> --}}
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('login_css/vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('login_css/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('login_css/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('login_css/vendor/animate/animate.css')}}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{asset('login_css/vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('login_css/vendor/animsition/css/animsition.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('login_css/vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{asset('login_css/vendor/daterangepicker/daterangepicker.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('login_css/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('login_css/css/main.css')}}">
<!--===============================================================================================-->
</head>
<style>
    .loader {
        position: fixed;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background: url("{{ asset('img/loader.gif')}}") 50% 50% no-repeat white ;
        opacity: .8;
        background-size:120px 120px;
    }
</style>
<body style="background-color: #666666;">
	<div class="loader" id="loader" style="display: none;"></div>
	@yield('content')
	
<!--===============================================================================================-->
	<script src="{{asset('login_css/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('login_css/vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('login_css/vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{asset('login_css/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
	{{-- <script src="{{asset('login_css/vendor/select2/select2.min.js')}}"></script> --}}
<!--===============================================================================================-->
	{{-- <script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script> --}}
<!--===============================================================================================-->
	{{-- <script src="vendor/countdowntime/countdowntime.js"></script> --}}
<!--===============================================================================================-->
	<script src="{{asset('login_css/js/main.js')}}"></script>
    <script>
        function show() {
            document.getElementById("loader").style.display="block";
        }
        function logout() {
            event.preventDefault();
            document.getElementById('logout-form').submit();
        }
    </script>
</body>
</html>