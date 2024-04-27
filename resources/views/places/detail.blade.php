<!DOCTYPE html>

<head>

<!-- Basic Page Needs
================================================== -->
<title>Flood</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- CSS
================================================== -->
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="{{ asset('css/main-color.css') }}" id="colors">
</head>

<body>

<!-- Wrapper -->
<div id="wrapper">

<!-- Header Container
================================================== -->
<header id="header-container">
	<!-- Header -->
	<div  id="header" class="not-sticky">
		<div class="container">
			
			<!-- Left Side Content -->
			<div class="left-side">
				
				<!-- Logo -->
				<div id="logo">
					<a href=""><img src="{{asset('images/logo.png')}}" alt=""></a>
				</div>

				<!-- Mobile Navigation -->
				<div class="mmenu-trigger">
					<button class="hamburger hamburger--collapse" type="button">
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</button>
				</div>

				<!-- Main Navigation -->
				<nav id="navigation" class="style-1">
					<ul id="responsive">
						<li><a href="{{route('home')}}">Home</a></li>
						<li><a href="#">Tentang Kami</a></li>
					</ul>
				</nav>
				<div class="clearfix"></div>
				<!-- Main Navigation / End -->
				
			</div>
			<!-- Left Side Content / End -->


			<!-- Right Side Content / End -->
			<div class="right-side">
				<!-- Header Widget -->
				<div class="header-widget">
					@if(Auth::user())
					<!-- User Menu -->
					<div class="user-menu">
						<div class="user-name"><span><img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70" alt=""></span>My Account</div>
						<ul>
                            <li><a href="{{route('dashboard')}}"><i class="sl sl-icon-settings"></i> Dashboard</a></li>
							<li><a href="{{route('setting')}}"><i class="sl sl-icon-settings"></i> Pengaturan</a></li>
							<li>
                                <a href="{{ route('logout') }}">
                                    <i class="sl sl-icon-power"></i> Logout
                                </a>
                            </li>
						</ul>
					</div>
					@else
					<!-- User Menu -->
					<a href="{{route('login')}}" class="button"><i class="sl sl-icon-login"></i> Masuk</a>
					<a href="{{route('register')}}" class="button border with-icon">Daftar</a>
                    @endif
				</div>
				<!-- Header Widget / End -->
			</div>
		</div>
	</div>
	<!-- Header / End -->

</header>
<div class="clearfix"></div>
<!-- Header Container / End -->


<!-- Slider
================================================== -->
<div class="listing-slider mfp-gallery-container margin-bottom-0">
	<a href="{{ asset('storage/images/' . $place->image1) }}" data-background-image="{{ asset('storage/images/' . $place->image1) }}" class="item mfp-gallery" title="Title 1"></a>
	<a href="{{ asset('storage/images/' . $place->image2) }}" data-background-image="{{ asset('storage/images/' . $place->image2) }}" class="item mfp-gallery" title="Title 3"></a>
	<a href="{{ asset('storage/images/' . $place->image3) }}" data-background-image="{{ asset('storage/images/' . $place->image3) }}" class="item mfp-gallery" title="Title 2"></a>
	<a href="{{ asset('storage/images/' . $place->image4) }}" data-background-image="{{ asset('storage/images/' . $place->image4) }}" class="item mfp-gallery" title="Title 4"></a>
</div>


<!-- Content
================================================== -->
<div class="container">
	<div class="row sticky-wrapper">
        <div class="col-lg-12 margin-top-75">
            @if ($errors->any())
            <div class="notification error large margin-bottom-4">
                <strong>Hmm.. Ada error nih!</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if ($submission)
            <div class="notification success large margin-bottom-4">
                <strong>Hai kamu punya jadwal, donor darah!</strong>
                <p>Kamu memiliki jadwal donor darah. Tanggal <b>{{$submission->donor_date}}</b>, jangan lupa untuk datang ketempat.</p>
            </div>
            @endif
        </div>
		<div class="col-lg-8 col-md-8 padding-right-30">

			<!-- Titlebar -->
			<div id="titlebar" class="listing-titlebar">
				<div class="listing-titlebar-title">
					<h2>{{$place->name}} <span class="listing-tag">{{$place->category->name}}</span></h2>
					<span>
						<a href="#listing-location" class="listing-address">
							<i class="fa fa-map-marker"></i>
							{{$place->address}}
						</a>
					</span>
				</div>
			</div>

			<!-- Listing Nav -->
			<div id="listing-nav" class="listing-nav-container">
				<ul class="listing-nav">
					<li><a href="#listing-overview" class="active">Overview</a></li>
					<li><a href="#listing-location">Location</a></li>
				</ul>
			</div>
			
			<!-- Overview -->
			<div id="listing-overview" class="listing-section">

				<!-- Description -->

				<p>{{$place->description}}</p>
				
				<!-- Listing Contacts -->
				<div class="listing-links-container">

					<ul class="listing-links contact-links">
						<li><a href="tel:12-345-678" class="listing-links"><i class="fa fa-phone"></i>{{$place->phone}}</a></li>
						<li><a href="mailto:mail@example.com" class="listing-links"><i class="fa fa-envelope-o"></i> {{$place->email}}</a>
						</li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="clearfix"></div>

			</div>

		
			<!-- Location -->
			<div id="listing-location" class="listing-section">
				<h3 class="listing-desc-headline margin-top-60 margin-bottom-30">Lokasi</h3>

				<div id="singleListingMap-container">
					<div id="singleListingMap" data-latitude="{{$place->latitude}}" data-longitude="{{$place->longitude}}" data-map-icon="im im-icon-Clinic"></div>
					<a href="#" id="streetView">Street View</a>
				</div>
			</div>
		</div>

		<!-- Sidebar
		================================================== -->
		<div class="col-lg-4 col-md-4 margin-top-75 sticky">
			<!-- Book Now -->
			<form method="POST" action="{{route('booking', $place)}}" class="boxed-widget booking-widget margin-top-35">
                @csrf
				<h3><i class="fa fa-calendar-check-o "></i> Pilih Tanggal</h3>
				<div class="row with-forms  margin-top-0">

					<!-- Date Range Picker - docs: https://www.daterangepicker.com/ -->
					<div class="col-lg-12">
						<input type="text" id="date-picker" placeholder="Date" name="date" readonly="readonly">
					</div>
				</div>
				
				<!-- Book Now -->
				<button type="submit" class="button book-now fullwidth margin-top-5">Menjadi Pendonor</button>
			</form>
			<!-- Book Now / End -->
            @if($place->category->name == "PMI")
			<!-- Opening Hours -->
			<div class="boxed-widget opening-hours margin-top-35">
				<div class="listing-badge now-closed">Stock Darah</div>
				<h3><i class="sl sl-icon-heart"></i> Informasi Stock Darah</h3>
				<ul>
                    @forelse($place->stocks as $stock)
                    <li>
                        <strong>{{$stock->name}}</strong><br>
                        <p>
                            Stock A+ ({{$stock->A_plus}}) | 
                            Stock A- ({{$stock->A_minus}}) | 
                            Stock B+ ({{$stock->B_plus}}) |  
                            Stock B- ({{$stock->B_minus}}) |  
                            Stock AB+ ({{$stock->AB_plus}}) | 
                            Stock AB- ({{$stock->AB_minus}}) | 
                            Stock O+ ({{$stock->O_plus}}) |  
                            Stock O- ({{$stock->O_minus}})
                        </p>
                    </li>
                    @empty
					<li>Stock Sedang Habis</li>
                    @endforelse
				</ul>
			</div>
            @endif
			<!-- Opening Hours -->
			<div class="boxed-widget opening-hours margin-top-35">
				<div class="listing-badge now-open">Now Open</div>
				<h3><i class="sl sl-icon-clock"></i> Opening Hours</h3>
				<ul>
					<li>Monday <span>9 AM - 5 PM</span></li>
					<li>Tuesday <span>9 AM - 5 PM</span></li>
					<li>Wednesday <span>9 AM - 5 PM</span></li>
					<li>Thursday <span>9 AM - 5 PM</span></li>
					<li>Friday <span>9 AM - 5 PM</span></li>
					<li>Saturday <span>9 AM - 3 PM</span></li>
					<li>Sunday <span>Closed</span></li>
				</ul>
			</div>
			<!-- Opening Hours / End -->
		</div>
		<!-- Sidebar / End -->

	</div>
</div>


<!-- Footer
================================================== -->
<div id="footer" class="margin-top-15">
	<!-- Main -->
	<div class="container">
		<div class="row">
            <div class="col-md-5 col-sm-6">
				<img class="footer-logo" src="{{asset('images/logo.png')}}" alt="">
				<br><br>
				<p>Donor darah dengan mudah, hanya dengan FLOOD.</p>
			</div>
            <div class="col-md-4 col-sm-6 ">
				<h4>Helpful Links</h4>
				<ul class="footer-links">
					<li><a href="#">Login</a></li>
					<li><a href="#">Sign Up</a></li>
				</ul>

				<ul class="footer-links">
					<li><a href="#">Tentang Kami</a></li>
				</ul>
				<div class="clearfix"></div>
			</div>		

			<div class="col-md-3  col-sm-12">
				<h4>Contact Us</h4>
				<div class="text-widget">
					<span>Jl. Telekomunikasi. 1, Terusan Buahbatu - Bojongsoang, Telkom University</span> <br>
					Phone: <span>+(62) 8123-4567 </span><br>
					E-Mail:<span> <a href="#">flood@flood.asia</a> </span><br>
				</div>

				<ul class="social-icons margin-top-20">
					<li><a class="facebook" href="#"><i class="icon-facebook"></i></a></li>
					<li><a class="twitter" href="#"><i class="icon-twitter"></i></a></li>
					<li><a class="gplus" href="#"><i class="icon-gplus"></i></a></li>
					<li><a class="vimeo" href="#"><i class="icon-vimeo"></i></a></li>
				</ul>

			</div>


		</div>
		
		<!-- Copyright -->
		<div class="row">
			<div class="col-md-12">
				<div class="copyrights">© 2024 Flood. All Rights Reserved.</div>
			</div>
		</div>

	</div>

</div>
<!-- Footer / End -->


<!-- Back To Top Button -->
<div id="backtotop"><a href="#"></a></div>

</div>
<!-- Wrapper / End -->


<!-- Scripts
================================================== -->
<script type="text/javascript" src="{{asset('scripts/jquery-3.6.0.min.js')}}"></script>
<script type="text/javascript" src="{{asset('scripts/jquery-migrate-3.3.2.min.js')}}"></script>
<script type="text/javascript" src="{{asset('scripts/mmenu.min.js')}}"></script>
<script type="text/javascript" src="{{asset('scripts/chosen.min.js')}}"></script>
<script type="text/javascript" src="{{asset('scripts/slick.min.js')}}"></script>
<script type="text/javascript" src="{{asset('scripts/rangeslider.min.js')}}"></script>
<script type="text/javascript" src="{{asset('scripts/magnific-popup.min.js')}}"></script>
<script type="text/javascript" src="{{asset('scripts/waypoints.min.js')}}"></script>
<script type="text/javascript" src="{{asset('scripts/counterup.min.js')}}"></script>
<script type="text/javascript" src="{{asset('scripts/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('scripts/tooltips.min.js')}}"></script>
<script type="text/javascript" src="{{asset('scripts/custom.js')}}"></script>

<!-- Maps -->
<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script>
<script type="text/javascript" src="{{asset('scripts/infobox.min.js')}}"></script>
<script type="text/javascript" src="{{asset('scripts/markerclusterer.js')}}"></script>
<script type="text/javascript" src="{{asset('scripts/maps.js')}}"></script>	

<!-- Booking Widget - Quantity Buttons -->
<script src="{{asset('scripts/quantityButtons.js')}}"></script>

<!-- Date Range Picker - docs: https://www.daterangepicker.com/ -->
<script src="{{asset('scripts/moment.min.js')}}"></script>
<script src="{{asset('scripts/daterangepicker.js')}}"></script>
<script>
// Calendar Init
$(function() {
	$('#date-picker').daterangepicker({
		"opens": "left",
		singleDatePicker: true,

		// Disabling Date Ranges
		isInvalidDate: function(date) {
		// Disabling Date Range
		var disabled_start = moment('09/02/2018', 'MM/DD/YYYY');
		var disabled_end = moment('09/06/2018', 'MM/DD/YYYY');
		return date.isAfter(disabled_start) && date.isBefore(disabled_end);

		// Disabling Single Day
		// if (date.format('MM/DD/YYYY') == '08/08/2018') {
		//     return true; 
		// }
		}
	});
});

// Calendar animation
$('#date-picker').on('showCalendar.daterangepicker', function(ev, picker) {
	$('.daterangepicker').addClass('calendar-animated');
});
$('#date-picker').on('show.daterangepicker', function(ev, picker) {
	$('.daterangepicker').addClass('calendar-visible');
	$('.daterangepicker').removeClass('calendar-hidden');
});
$('#date-picker').on('hide.daterangepicker', function(ev, picker) {
	$('.daterangepicker').removeClass('calendar-visible');
	$('.daterangepicker').addClass('calendar-hidden');
});
</script>


<!-- Replacing dropdown placeholder with selected time slot -->
<script>
$(".time-slot").each(function() {
	var timeSlot = $(this);
	$(this).find('input').on('change',function() {
		var timeSlotVal = timeSlot.find('strong').text();

		$('.panel-dropdown.time-slots-dropdown a').html(timeSlotVal);
		$('.panel-dropdown').removeClass('active');
	});
});
</script>


<!-- Style Switcher
================================================== -->
<script src="{{asset('scripts/switcher.js')}}"></script>

<div id="style-switcher">
	<h2>Color Switcher <a href="#"><i class="sl sl-icon-settings"></i></a></h2>
	
	<div>
		<ul class="colors" id="color1">
			<li><a href="#" class="main" title="Main"></a></li>
			<li><a href="#" class="blue" title="Blue"></a></li>
			<li><a href="#" class="green" title="Green"></a></li>
			<li><a href="#" class="orange" title="Orange"></a></li>
			<li><a href="#" class="navy" title="Navy"></a></li>
			<li><a href="#" class="yellow" title="Yellow"></a></li>
			<li><a href="#" class="peach" title="Peach"></a></li>
			<li><a href="#" class="beige" title="Beige"></a></li>
			<li><a href="#" class="purple" title="Purple"></a></li>
			<li><a href="#" class="celadon" title="Celadon"></a></li>
			<li><a href="#" class="red" title="Red"></a></li>
			<li><a href="#" class="brown" title="Brown"></a></li>
			<li><a href="#" class="cherry" title="Cherry"></a></li>
			<li><a href="#" class="cyan" title="Cyan"></a></li>
			<li><a href="#" class="gray" title="Gray"></a></li>
			<li><a href="#" class="olive" title="Olive"></a></li>
		</ul>
	</div>
		
</div>
<!-- Style Switcher / End -->


</body>

</html>