<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="{{asset('landing/img/fav.png')}}">
	<!-- Author Meta -->
	<meta name="author" content="colorlib">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>Layanan Pengaduan Masyarakat</title>

	<link href="https://fonts.googleapis.com/css?family=Playfair+Display:700|Roboto:400,400i,500" rel="stylesheet">
	<!--
			CSS
			============================================= -->
	<link rel="stylesheet" href="{{asset('landing/css/linearicons.css')}}">
	<link rel="stylesheet" href="{{asset('landing/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('landing/css/bootstrap.css')}}">
	<link rel="stylesheet" href="{{asset('landing/css/magnific-popup.css')}}">
	<link rel="stylesheet" href="{{asset('landing/css/owl.carousel.css')}}">
	<link rel="stylesheet" href="{{asset('landing/css/hexagons.min.css')}}">
	<link rel="stylesheet" href="{{asset('landing/css/nice-select.css')}}">
	<link rel="stylesheet" href="{{asset('landing/css/main.css')}}">
</head>

<body id="about">

	<!--================ Offcanvus Menu Area =================-->
	<div class="side_menu">
		@include('template.masyarakatsidebar')
	</div>
	<!--================ End Offcanvus Menu Area =================-->

	<!--================ Canvus Menu Area =================-->
	<div class="canvus_menu">
		<div class="container">
			<div class="toggle_icon" title="Menu Bar">
				<span></span>
			</div>
		</div>
	</div>
	<!--================ End Canvus Menu Area =================-->

	<!--================Home Banner Area =================-->
	<section class="banner_area ">
		<div class="banner_inner overlay d-flex align-items-center">
			<div class="container">
				<div class="banner_content text-left">
					<h2>Layanan Pengaduan</h2>
				</div>
			</div>
		</div>
	</section>
	<!--================End Home Banner Area =================-->

	<!--================ Start Video Area =================-->
	
	<section class="testimonial-area section-gap-bottom">
		<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-10 text-center">
				<div class="section-title">
					<h1>Layanan <span>Aspirasi</span> &amp; <span>Pengaduan</span><br>Rakyat.</h1>
				</div>
			</div>
		</div>
		<div class="row justify-content-center">
			@yield('content')
		</div>
	</div>
	</section>
	<!--================ End video Area =================-->

	<!--================ Start CTA Area =================-->
	<!--================ End CTA Area =================-->

	<!--================ Start Team Area =================-->
	<!--================ End Team Area =================-->

	<!--================ Start Testimonial Area =================-->
	<!--================ End Testimonial Area =================-->

	<!--================ start footer Area  =================-->
	<!-- <footer class="footer-area section_gap">
		<div class="container">
		</div>
		<div class="footer-bottom d-flex justify-content-between align-items-center flex-wrap">
			<div class="container">
				<div class="row justify-content-between">
					<div class="col-lg-12">
						<div>
							<p class="footer-text m-0">
	Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer> -->
	<!--================ End footer Area  =================-->


	<script src="{{asset('landing/js/vendor/jquery-2.2.4.min.js')}}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
	 crossorigin="anonymous"></script>
	<script src="{{asset('landing/js/vendor/bootstrap.min.js')}}"></script>
	<script src="{{asset('landing/js/jquery.ajaxchimp.min.js')}}"></script>
	<script src="{{asset('landing/js/jquery.magnific-popup.min.js')}}"></script>
	<script src="{{asset('landing/js/parallax.min.js')}}"></script>
	<script src="{{asset('landing/js/owl.carousel.min.js')}}"></script>
	<script src="{{asset('landing/js/jquery.nice-select.min.js')}}"></script>
	<script src="{{asset('landing/js/jquery.sticky.js')}}"></script>
	<script src="{{asset('landing/js/hexagons.min.js')}}"></script>
	<script src="{{asset('landing/js/jquery.counterup.min.js')}}"></script>
	<script src="{{asset('landing/js/waypoints.min.js')}}"></script>
	<script src="{{asset('landing/js/main.js')}}"></script>
</body>

</html>