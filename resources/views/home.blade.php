@extends('layouts.app')

@section('title', 'Flood - Donor darah kamu dengan mudah')
@section('content')
<!-- Banner
================================================== -->
<div class="main-search-container plain-color">
	<div class="main-search-inner">

		<div class="container">
			<div class="row">
				<form method="GET" action="{{route('search')}}" class="col-md-12">
					<div class="main-search-headlines">
						<h2>
							Cari 
							<span class="typed-words"></span>
							Terdekat
						</h2>
						<h4>Jelajahi apapun kebutuhan donor kamu.</h4>
					</div>
					<div class="main-search-input">

						<div class="main-search-input-item">
							<input name="keyword" type="text" placeholder="Apa yang kamu cari?" value=""/>
						</div>
						<button class="button" type="submit">Search</button>
					</div>
				</form>
			</div>
			<!-- Features Categories -->
			<div class="row">
				<div class="col-md-12">
					<h5 class="highlighted-categories-headline">Atau jelajahi kategori unggulan kami:</h5>
					  
					<div class="highlighted-categories">
						<!-- Box -->
						@foreach($categories as $cat)
						<a href="{{route('search', ['categories[]' => $cat->id])}}" class="highlighted-category">
					    	<i class="{{$cat->icon}}"></i>
					    	<h4>{{$cat->name}}</h4>
						</a>	
						@endforeach	
					</div>
					
				</div>
			</div>
			<!-- Featured Categories - End -->
		</div>

	</div>

	<!-- Main Search Photo Slider -->
	<div class="container msps-container">

		<div class="main-search-photo-slider">
			<div class="msps-slider-container">
				<div class="msps-slider">
					<div class="item"><img src="https://images.unsplash.com/photo-1579684385127-1ef15d508118?q=80&w=2960&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="item" title="Title 1"/></div>
					<div class="item"><img src="https://plus.unsplash.com/premium_photo-1661769338046-e07bc03ff32a?q=80&w=2942&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="item" title="Title 1"/></div>
				</div>
			</div>
		</div>

		<div class="msps-shapes" id="scene">

			<div class="layer" data-depth="0.2">
				<svg height="40" width="40" class="shape-a">
					<circle cx="20" cy="20" r="17" stroke-width="4" fill="transparent" stroke="#C400FF" />
				</svg>
			</div>

			<div class="layer" data-depth="0.5">
				<svg width="90" height="90" viewBox="0 0 500 800" class="shape-b">
				<g transform="translate(281,319)">
				<path fill="transparent" style="transform:rotate(25deg)" stroke-width="35" stroke="#F56C83" fill  d="M260.162831,132.205081
				A18,18 0 0,1 262.574374,141.205081
				A18,18 0 0,1 244.574374,159.205081H-244.574374
				A18,18 0 0,1 -262.574374,141.205081
				A18,18 0 0,1 -260.162831,132.205081L-15.588457,-291.410162
				A18,18 0 0,1 0,-300.410162
				A18,18 0 0,1 15.588457,-291.410162Z"/></g></svg>
			</div>

			<div class="layer" data-depth="0.2" data-invert-x="false" data-invert-y="false" style="z-index: -10">
				<svg height="200" width="200" viewbox="0 0 250 250" class="shape-c">
				<path d="
				    M 0, 30
				    C 0, 23.400000000000002 23.400000000000002, 0 30, 0
				    S 60, 23.400000000000002 60, 30
				        36.599999999999994, 60 30, 60
				        0, 36.599999999999994 0, 30
				" fill="#FADB5F" transform="rotate(
				    -25,
				    100,
				    100
				) translate(
				    0
				    0
				) scale(3.5)"></path>
				</svg>
			</div>


			<div class="layer" data-depth="0.6" style="z-index: -10">
				<svg height="120" width="120" class="shape-d">
					<circle cx="60" cy="60" r="60" fill="#222" />
				</svg>
			</div>


			<div class="layer" data-depth="0.2">
				<svg height="70" width="70" viewBox="0 0 200 200"  class="shape-e">
					<path fill="#FF0066" d="M68.5,-24.5C75.5,-0.8,58.7,28.5,33.5,46.9C8.4,65.4,-25.2,73.1,-42.2,60.2C-59.2,47.4,-59.6,13.9,-49.8,-13.7C-40,-41.3,-20,-63.1,5.4,-64.8C30.7,-66.6,61.5,-48.3,68.5,-24.5Z" transform="translate(100 100)" />
				</svg>
			</div>

		</div>
	</div>



</div>


<!-- Content
================================================== -->
<section class="fullwidth margin-top-0 padding-top-0 padding-bottom-40" data-background-color="#fcfcfc">
<div class="container">
	<div class="row">

		<div class="col-md-12">
			<h3 class="headline margin-top-75">
				<strong class="headline-with-separator">Categories</strong>
			</h3>
		</div>

		<div class="col-md-12">
			<div class="categories-boxes-container-alt margin-top-5 margin-bottom-30">
				@foreach($categories as $cat)
				<!-- Box -->
				<a href="{{route('search', ['categories[]' => $cat->id])}}" class="category-small-box-alt">
					<i class="{{$cat->icon}}"></i>
					<h4>{{$cat->name}}</h4>
					<span class="category-box-counter-alt">{{$cat->places()->count()}}</span>
					<img src="{{asset('storage/images/' . $cat->image) }}">
				</a>
				@endforeach
			</div>
		</div>
	</div>
</div>
</section>
<!-- Category Boxes / End -->


<!-- Listings -->
<div class="container margin-top-70">
	<div class="row">

		<div class="col-md-12">
			<h3 class="headline centered margin-bottom-45">
					<strong class="headline-with-separator">Tempat Paling Sering Dikunjungi</strong>
				<span>Tempat yang paling sering dikunjungi oleh pengguna kami.</span>
			</h3>
		</div>

		<div class="col-md-12">
			<div class="simple-slick-carousel dots-nav">
			@foreach($places as $place)
			<!-- Listing Item -->
			<div class="carousel-item">
				<a href="{{route('places.detail', $place)}}" class="listing-item-container">
					<div class="listing-item">
						<img src="{{ asset('storage/images/' . $place->image1) }}" alt="">
						<div class="listing-item-content">
							<span class="tag">{{$place->category->name}}</span>
							<h3>{{$place->name}}</h3>
							<span>{{$place->address}}</span>
						</div>
					</div>
				</a>
			</div>
			<!-- Listing Item / End -->
			@endforeach
			</div>
			
		</div>

	</div>
</div>
<!-- Listings / End -->


<section class="fullwidth margin-top-70 padding-top-75 padding-bottom-70" data-background-color="#f9f9f9">
	<!-- Info Section -->
	<div class="container">

		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h3 class="headline centered">
					Apa Yang Mereka Katakan
					<span class="margin-top-25">Kami mengumpulkan ulasan dari pengguna kami sehingga Anda bisa mendapatkan opini jujur tentang seperti apa pengalaman menggunakan situs web kami sebenarnya!</span>
				</h3>
			</div>
		</div>

	</div>
	<!-- Info Section / End -->

	<!-- Categories Carousel -->
	<div class="fullwidth-carousel-container margin-top-20">
		<div class="testimonial-carousel testimonials">

			<!-- Item -->
			<div class="fw-carousel-review">
				<div class="testimonial-box">
					<div class="testimonial">Donor darah jadi lebih mudah sekarang, hanya dengan klik jadi pendonor bisa langsung mengetahui tempat dan jadwalnya.</div>
				</div>
				<div class="testimonial-author">
					<h4>Jan Falih Fadhillah <span>Mahasiswa</span></h4>
				</div>
			</div>
			
			<!-- Item -->
			<div class="fw-carousel-review">
				<div class="testimonial-box">
					<div class="testimonial">Seru.. Donor darah di Flood! bisa dapat informasi kesehatannya juga..</div>
				</div>
				<div class="testimonial-author">
					<h4>M Abiya Makruf <span>Mahasiswa</span></h4>
				</div>
			</div>
		</div>
	</div>
	<!-- Categories Carousel / End -->

</section>


<!-- Parallax -->
<div class="parallax"
	data-background="images/slider-bg-02.jpg"
	data-color="#36383e"
	data-color-opacity="0.6"
	data-img-width="800"
	data-img-height="505">

	<!-- Infobox -->
	<div class="text-content white-font">
		<div class="container">

			<div class="row">
				<div class="col-lg-6 col-sm-8">
					<h2>Jaga Kesehatan Kamu</h2>
					<p>Setiap langkah kecil dalam menjaga kesehatanmu membawa perubahan besar dalam hidup. Dengan mengutamakan kesehatanmu, kamu bukan hanya memperpanjang usia, tetapi juga meningkatkan kualitas hidup secara keseluruhan. Mari bersama-sama memulai perjalanan menuju kehidupan yang lebih sehat dan lebih bahagia.</p>
					<a href="{{route('register')}}" class="button margin-top-25">Mulai Sekarang</a>
				</div>
			</div>

		</div>
	</div>

	<!-- Infobox / End -->

</div>
<!-- Parallax / End -->
@endsection