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
<header id="header-container" class="fixed fullwidth dashboard">

	<!-- Header -->
	<div id="header" class="not-sticky">
		<div class="container">
			
			<!-- Left Side Content -->
			<div class="left-side">
				
				<!-- Logo -->
				<div id="logo">
					<a href="{{route('dashboard.admin')}}"><img src="{{ asset('images/logo.png')}}" alt=""></a>
					<a href="{{route('dashboard.admin')}}" class="dashboard-logo"><img src="{{asset('images/logo.png')}}" alt=""></a>
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
						<li><a href="{{route('dashboard.admin')}}">Dashboard</a></li>
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
					
					<!-- User Menu -->
					<div class="user-menu">
						<div class="user-name"><span><img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70" alt=""></span>My Account</div>
						<ul>
							<li><a href="{{route('setting')}}"><i class="sl sl-icon-settings"></i> Pengaturan</a></li>
							<li>
                                <a href="{{ route('logout') }}">
                                    <i class="sl sl-icon-power"></i> Logout
                                </a>
                            </li>
						</ul>
					</div>
					<a href="{{url('/')}}" class="button border with-icon">Menjadi Pendonor <i class="sl sl-icon-plus"></i></a>
				</div>
				<!-- Header Widget / End -->
			</div>
			<!-- Right Side Content / End -->

		</div>
	</div>
	<!-- Header / End -->

</header>
<div class="clearfix"></div>
<!-- Header Container / End -->
@yield('content')



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
<script type="text/javascript" src="{{asset('scripts/dropzone.js')}}"></script>

@yield('js')

</body>

</html>
