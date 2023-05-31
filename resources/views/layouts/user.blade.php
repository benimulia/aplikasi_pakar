
<!DOCTYPE html>
<html lang="zxx">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="description" content="Orbitor,business,company,agency,modern,bootstrap4,tech,software">
  <meta name="author" content="themefisher.com">

  <title>Aplikasi Diagnosis Penyakit Usus</title>

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="{{asset('userx/images/favicon.ico')}}" />

  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="{{asset('userx/plugins/bootstrap/css/bootstrap.min.css')}}">
  <!-- Icon Font Css -->
  <link rel="stylesheet" href="{{asset('userx/plugins/icofont/icofont.min.css')}}">
  <!-- Slick Slider  CSS -->
  <link rel="stylesheet" href="{{asset('userx/plugins/slick-carousel/slick/slick.css')}}">
  <link rel="stylesheet" href="{{asset('userx/plugins/slick-carousel/slick/slick-theme.css')}}">

  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="{{asset('userx/css/style.css')}}">


<!-- maps -->

	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.2.0/dist/leaflet.css" />
    <link rel="stylesheet" href="leaflet-routing-machine.css" />


  @yield('style')

</head>

<body id="top">

<header>
	<div class="header-top-bar">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-6">
					<ul class="top-bar-info list-inline-item pl-0 mb-0">
						<li class="list-inline-item"><a href="mailto:support@gmail.com"><i class="icofont-support-faq mr-2"></i>boy.afrianda@ti.ukdw.ac.id</a></li>
						<li class="list-inline-item"><i class="icofont-location-pin mr-2"></i>Address Nologaten, Yogyakarta </li>
					</ul>
				</div>
				<div class="col-lg-6">
					<div class="text-lg-right top-right-bar mt-2 mt-lg-0">
						<a href="tel:+23-345-67890" >
							<span>Call Now : </span>
							<span class="h4">+62-821-6499-6021</span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<nav class="navbar navbar-expand-lg navigation" id="navbar">
		<div class="container">
		 	 <a class="navbar-brand" href="index.html">
			  	{{-- <img src="{{asset('userx/images/logo.png')}}" alt="" class="img-fluid"> --}}
				  <h2>ONLINE DIAGNOSIS</h2>
			  </a>

		  	<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarmain" aria-controls="navbarmain" aria-expanded="false" aria-label="Toggle navigation">
			<span class="icofont-navigation-menu"></span>
		  </button>
	  
		  <div class="collapse navbar-collapse" id="navbarmain">
			<ul class="navbar-nav ml-auto">
			  <li class="nav-item active"><a class="nav-link" href="/home">Home</a></li>
			   <li class="nav-item"><a class="nav-link" href="/tentang">Tentang</a></li>
			    <li class="nav-item"><a class="nav-link" href="/konsultasi">Diagnosis Penyakit</a></li>
             <li class="nav-item"><a class="nav-link" href="/biografi-pakar">Dokter Spesialis</a></li>
             <li class="nav-item"><a class="nav-link" href="/jelajah-klinik-apotik">Klinik & Apotik</a></li>

			 <li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="department.html" id="dropdown02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Akun Saya<i class="icofont-thin-down"></i></a>
					<ul class="dropdown-menu" aria-labelledby="dropdown02">
						@if (Auth::check())
						<li><a class="dropdown-item" href="/login">{{ Auth::user()->name }}</a></li>
						@endif
						<li><a class="dropdown-item" href="/login">Login</a></li>
						<li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> Logout </a>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							@csrf
						</form>
						<li><a class="dropdown-item" href="/register">Daftar Akun</a></li>
						@if (Auth::check()&& Auth::user()->level == 'admin')
						<li><a class="dropdown-item" href="/admin-home">Admin Panel</a></li>
						@endif
						
					</ul>
			  	</li>
			</ul>
		  </div>
		</div>
	</nav>
</header>

@yield('page-content')

<!-- footer Start -->
<footer class="footer section gray-bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 mr-auto col-sm-6">
				<div class="widget mb-5 mb-lg-0">
					<div class="logo mb-4">
						<img src="images/logo.png" alt="" class="img-fluid">
					</div>
					<p>Aplikasi diagmosis penyakit usus berbasis web, merupakan platform untuk memudahkan pasien melakukan konsultasi mengenai keluhan penyakit
                  ataupun gejala yang timbul pada pasien.
               </p>

					<ul class="list-inline footer-socials mt-4">
						<li class="list-inline-item"><a href="https://www.facebook.com/themefisher"><i class="icofont-facebook"></i></a></li>
						<li class="list-inline-item"><a href="https://twitter.com/themefisher"><i class="icofont-twitter"></i></a></li>
						<li class="list-inline-item"><a href="https://www.pinterest.com/themefisher/"><i class="icofont-linkedin"></i></a></li>
					</ul>
				</div>
			</div>

			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="widget mb-6 mb-lg-0">
					<h4 class="text-capitalize mb-6">Klinik Terpercaya</h4>
					<div class="divider mb-4"></div>

					<ul class="list-unstyled footer-menu lh-35">
						<li><a href="#">Surgery </a></li>
						<li><a href="#">Wome's Health</a></li>
						<li><a href="#">Radiology</a></li>
						<li><a href="#">Cardioc</a></li>
						<li><a href="#">Medicine</a></li>
					</ul>
				</div>
			</div>

			<div class="col-lg-2 col-md-6 col-sm-6">
				<div class="widget mb-5 mb-lg-0">
					<h4 class="text-capitalize mb-3">Apotik</h4>
					<div class="divider mb-4"></div>

					<ul class="list-unstyled footer-menu lh-35">
						<li><a href="#">Terms & Conditions</a></li>
						<li><a href="#">Privacy Policy</a></li>
						<li><a href="#">Company Support </a></li>
						<li><a href="#">FAQuestions</a></li>
						<li><a href="#">Company Licence</a></li>
					</ul>
				</div>
			</div>

			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="widget widget-contact mb-5 mb-lg-0">
					<h4 class="text-capitalize mb-3">Admin Aplikasi</h4>
					<div class="divider mb-4"></div>

					<div class="footer-contact-block mb-4">
						<div class="icon d-flex align-items-center">
							<i class="icofont-email mr-3"></i>
							<span class="h6 mb-0">Support Available for 24/7</span>
						</div>
						<h4 class="mt-2"><a href="tel:+23-345-67890">boyafrianda@gmail.com</a></h4>
					</div>

					<div class="footer-contact-block">
						<div class="icon d-flex align-items-center">
							<i class="icofont-support mr-3"></i>
							<span class="h6 mb-0">CS Admin 24 Jm</span>
						</div>
						<h4 class="mt-2"><a href="tel:+23-345-67890">+62-822-6064-6685</a></h4>
					</div>
				</div>
			</div>
		</div>
		
		<div class="footer-btm py-4 mt-5">
			<div class="row align-items-center justify-content-between">
				<div class="col-lg-6">
					<div class="copyright">
						&copy; Copyright Reserved to <span class="text-color">Novena</span> by <a href="https://themefisher.com/" target="_blank">Themefisher</a>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="subscribe-form text-lg-right mt-5 mt-lg-0">
						<form action="#" class="subscribe">
							<input type="text" class="form-control" placeholder="Your Email address">
							<a href="#" class="btn btn-main-2 btn-round-full">Subscribe</a>
						</form>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-4">
					<a class="backtop js-scroll-trigger" href="#top">
						<i class="icofont-long-arrow-up"></i>
					</a>
				</div>
			</div>
		</div>
	</div>
</footer>

   
<!-- 
    Essential Scripts
    =====================================-->
@yield('js')
    
    <!-- Main jQuery -->
    <script src="{{asset('userx/plugins/jquery/jquery.js')}}"></script>
    <!-- Bootstrap 4.3.2 -->
    <script src="{{asset('userx/plugins/bootstrap/js/popper.js')}}"></script>
    <script src="{{asset('userx/plugins/bootstrap/js/bootstrap.min.')}}js"></script>
    <script src="{{asset('userx/plugins/counterup/jquery.easing.js')}}"></script>
    <!-- Slick Slider -->
    <script src="{{asset('userx/plugins/slick-carousel/slick/slick.min.js')}}"></script>
    <!-- Counterup -->
    <script src="{{asset('userx/plugins/counterup/jquery.waypoints.min.js')}}"></script>
    
    <script src="{{asset('userx/plugins/shuffle/shuffle.min.js')}}"></script>
    <script src="{{asset('userx/plugins/counterup/jquery.counterup.min.js')}}"></script>
    <!-- Google Map -->
    {{-- <script src="{{asset('userx/plugins/google-map/map.js')}}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkeLMlsiwzp6b3Gnaxd86lvakimwGA6UA&callback=initMap"></script>    
     --}}
    <script src="{{asset('userx/js/script.js')}}"></script>
    <script src="{{asset('userx/js/contact.js')}}"></script>
	





  </body>
  </html>
   