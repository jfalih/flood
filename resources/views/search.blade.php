<!DOCTYPE html>

<head>

<!-- Basic Page Needs
================================================== -->
<title>Flood</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- CSS
================================================== -->
<link rel="stylesheet" href="{{asset('css/style.css')}}">
<link rel="stylesheet" href="{{asset('css/main-color.css')}}" id="colors">

</head>

<body>

<!-- Wrapper -->
<div id="wrapper">

<!-- Header Container
================================================== -->
<header id="header-container" class="fixed fullwidth">

	<!-- Header -->
	<!-- Header -->
	<div id="header" class="not-sticky">
		<div class="container">
			
			<!-- Left Side Content -->
			<div class="left-side">
				
				<!-- Logo -->
				<div id="logo">
					<a href=""><img src="images/logo.png" alt=""></a>
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
							<li><a href="{{route('dashboard')}}"><i class="sl sl-icon-settings"></i> Pengaturan</a></li>
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
	<!-- Header / End -->

</header>
<div class="clearfix"></div>
<!-- Header Container / End -->


<!-- Content
================================================== -->
<div class="fs-container">

	<div class="fs-inner-container content">
		<div class="fs-content">

			<!-- Search -->
			<section class="search">

				<div class="row">
					<div class="col-md-12">

							<!-- Row With Forms -->
							<div class="row with-forms">

                                <form  method="GET" action="{{route('search')}}">
								<!-- Filters -->
								<div class="col-fs-12">

									<!-- Panel Dropdown / End -->
									<div class="panel-dropdown">
										<a href="#">Categories</a>
										<div class="panel-dropdown-content checkboxes categories">
											
											<!-- Checkboxes -->
											<div class="row">
                                                @foreach($categories as $category)
												<div class="col-md-6">
                                                    <input id="check-{{ $category->id }}" type="checkbox" name="categories[]" value="{{ $category->id }}" {{ in_array($category->id, $selectedCategories) ? 'checked' : '' }}>
                                                    <label for="check-{{ $category->id }}">{{ $category->name }}</label>
												</div>
                                                @endforeach
											</div>
											
											<!-- Buttons -->
											<div class="panel-buttons">
												<button class="panel-cancel">Cancel</button>
												<button type="submit" class="panel-apply">Apply</button>
											</div>

										</div>
									</div>
									<!-- Panel Dropdown / End -->
								</div>
								<!-- Filters / End -->

								<!-- Main Search Input -->
								<div class="col-fs-6 margin-top-20">
									<div class="input-with-icon">
										<i class="sl sl-icon-magnifier"></i>
										<input name="keyword" type="text" placeholder="Apa yang kamu cari?" value="{{$keyword}}"/>
									</div>
								</div>
                                </form>
								<!-- Main Search Input -->
								<div class="col-fs-6">
									<div class="input-with-icon location">
							
										<div id="autocomplete-container" data-autocomplete-tip="type and hit enter">
											<input id="autocomplete-input" type="text" placeholder="Location">
										</div>
										<a href="#"><i class="fa fa-map-marker"></i></a>
									</div>
								</div>
	
							</div>
							<!-- Row With Forms / End -->
					</div>
				</div>

			</section>
			<!-- Search / End -->


		<section class="listings-container margin-top-30">
			<!-- Sorting / Layout Switcher -->
			<div class="row fs-switcher">

				<div class="col-md-6">
					<!-- Showing Results -->
					<p class="showing-results">{{$places->count()}} Tempat Ditemukan </p>
				</div>

			</div>


			<!-- Listings -->
			<div class="row fs-listings">
                @foreach($places->items() as $place)
				<!-- Listing Item -->
				<div class="col-lg-6 col-md-12">
					<a href="{{route('places.detail', ['id' => $place->id])}}" class="listing-item-container" data-marker-id="1">
						<div class="listing-item">
							<img  src="{{ asset('storage/images/' . $place->image1) }}" alt="">
							<div class="listing-item-content">
								<span class="tag">{{$place->category->name}}</span>
								<h3>{{$place->name}} <i class="verified-icon"></i></h3>
								<span style="
                                height: 2em; /* Adjust the height to fit two lines */
                                overflow: hidden;
                                display: block;

                                white-space: nowrap; /* Prevent wrapping */
                                text-overflow: ellipsis; /* Add ellipsis if content overflows */">{{$place->address}}</span>
							</div>
						</div>
					</a>
				</div>
				<!-- Listing Item / End -->
                @endforeach
			</div>
			<!-- Listings Container / End -->


			<!-- Pagination Container -->
			<div class="row fs-listings">
				<div class="col-md-12">

					<!-- Pagination -->
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12">
							<!-- Pagination -->
							<div class="pagination-container margin-top-15 margin-bottom-40">
								<nav class="pagination">
									<ul>
										  <!-- Previous Page Link -->
                                            @if ($places->onFirstPage())
                                            @else
                                                <li><a href="{{ $places->previousPageUrl() }}" rel="prev"><i class="sl sl-icon-arrow-left"></i></a></li>
                                            @endif
                                
                                            <!-- Pagination Elements -->
                                            @foreach ($places->getUrlRange(1, $places->lastPage()) as $page => $url)
                                                @if ($page == $places->currentPage())
                                                    <li><a class="current-page">{{ $page }}</a></li>
                                                @else
                                                    <li><a href="{{ $url }}">{{ $page }}</a></li>
                                                @endif
                                            @endforeach
                                
                                            <!-- Next Page Link -->
                                            @if ($places->hasMorePages())
                                              <li><a href="{{ $places->nextPageUrl() }}" rel="next"><i class="sl sl-icon-arrow-right"></i></a></li>
                                            @else
                                            @endif
									</ul>
								</nav>
							</div>
						</div>
					</div>
					<div class="clearfix"></div>
					<!-- Pagination / End -->
					
					<!-- Copyrights -->
					<div class="copyrights margin-top-0">© 2024 Flood. All Rights Reserved.</div>

				</div>
			</div>
			<!-- Pagination Container / End -->
		</section>

		</div>
	</div>
	<div class="fs-inner-container map-fixed">

		<!-- Map -->
		<div id="map-container">
		    <div id="map" data-map-scroll="true">
		        <!-- map goes here -->
		    </div>
		</div>

	</div>
</div>


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


<!-- Leaflet // Docs: https://leafletjs.com/ -->
<script src="{{asset('scripts/leaflet.min.js')}}"></script>

<!-- Leaflet Maps Scripts -->
<script src="{{asset('scripts/leaflet-markercluster.min.js')}}"></script>
<script src="{{asset('scripts/leaflet-gesture-handling.min.js')}}"></script>
<script>

/* ----------------- Start Document ----------------- */
$(document).ready(function(){
if(document.getElementById("map") !== null){

	// Touch Gestures
	if ( $('#map').attr('data-map-scroll') == 'true' || $(window).width() < 992 ) {
		var scrollEnabled = false;
	} else {
		var scrollEnabled = true;
	}

	var mapOptions = {
		gestureHandling: scrollEnabled,
	}

	// Map Init
	window.map = L.map('map',mapOptions);
	$('#scrollEnabling').hide();


	// ----------------------------------------------- //
	// Popup Output
	// ----------------------------------------------- //
	function locationData(locationURL,locationImg,locationTitle, locationAddress) {
	  return(''+
	    '<a href="'+ locationURL +'" class="leaflet-listing-img-container">'+
	       '<div class="infoBox-close"><i class="fa fa-times"></i></div>'+
	       '<img src="'+locationImg+'" alt="">'+

	       '<div class="leaflet-listing-item-content">'+
	          '<h3>'+locationTitle+'</h3>'+
	          '<span>'+locationAddress+'</span>'+
	       '</div>'+

	    '</a>')
	}


	// Listing rating on popup (star-rating or numerical-rating)
	var infoBox_ratingType = 'star-rating';

	map.on('popupopen', function () {
		if (infoBox_ratingType = 'numerical-rating') {
			numericalRating('.leaflet-popup .'+infoBox_ratingType+'');
		}
		if (infoBox_ratingType = 'star-rating') {
			starRating('.leaflet-popup .'+infoBox_ratingType+'');
		}
	});


	// ----------------------------------------------- //
	// Locations
	// ----------------------------------------------- //
	var places = {!! json_encode($places->items()) !!};
    var placeUrl = '{{ route("places.detail", ["id" => ":id"]) }}'; // Define the route with a placeholder for the ID
    var locations = places.map((place, index) => {
        var url = placeUrl.replace(':id', place.id); // Replace the placeholder with the actual place ID
        var thumbnailUrl = '{{ asset("storage/images") }}' + '/' + place.image1; // Concatenate asset URL with image path
        var iconCategory = place.category.icon
        return [
            locationData(url, thumbnailUrl, place.name, place.address), 
            parseFloat(place.latitude), 
            parseFloat(place.longitude), 
            index + 1, 
            '<i class="'+ iconCategory +'"></i>'
        ]
    });

    console.log(locations);

    
	// ----------------------------------------------- //
	// Map Provider
	// ----------------------------------------------- //

	// Open Street Map 
	// -----------------------//
	L.tileLayer(
		'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
		attribution: '&copy; <a href="http://openstreetmap.org">OpenStreetMap</a> Contributors',
		maxZoom: 18,
	}).addTo(map);


	// MapBox (Requires API Key)
	// -----------------------//
	// L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}@2x.png?access_token={accessToken}', {
	//     attribution: " &copy;  <a href='https://www.mapbox.com/about/maps/'>Mapbox</a> &copy;  <a href='http://www.openstreetmap.org/copyright'>OpenStreetMap</a>",
	//     maxZoom: 18,
	//     id: 'mapbox.streets',
	//     accessToken: 'ACCESS_TOKEN'
	// }).addTo(map);


	// ThunderForest (Requires API Key)
	// -----------------------//
	// var ThunderForest_API_Key = 'API_KEY';
	// var tileUrl = 'https://tile.thunderforest.com/neighbourhood/{z}/{x}/{y}.png?apikey='+ThunderForest_API_Key,
	// layer = new L.TileLayer(tileUrl, {maxZoom: 18});
	// map.addLayer(layer);


	// ----------------------------------------------- //
	// Markers
	// ----------------------------------------------- //
        markers = L.markerClusterGroup({
            spiderfyOnMaxZoom: true,
            showCoverageOnHover: false,
          });
       
        for (var i = 0; i < locations.length; i++) {

          var listeoIcon = L.divIcon({
              iconAnchor: [20, 51], // point of the icon which will correspond to marker's location
              popupAnchor: [0, -51],
              className: 'listeo-marker-icon',
              html:  '<div class="marker-container">'+
                       '<div class="marker-card">'+
                          '<div class="front face">' + locations[i][4] + '</div>'+
                          '<div class="back face">' + locations[i][4] + '</div>'+
                          '<div class="marker-arrow"></div>'+
                       '</div>'+
                     '</div>'
            }
          );

            var popupOptions =
              {
              'maxWidth': '270',
              'className' : 'leaflet-infoBox'
              }
                var markerArray = [];
            marker = new L.marker([locations[i][1],locations[i][2]], {
                icon: listeoIcon,
                
              })
              .bindPopup(locations[i][0],popupOptions );
              //.addTo(map);
              marker.on('click', function(e){
                
               // L.DomUtil.addClass(marker._icon, 'clicked');
              });
              map.on('popupopen', function (e) {
              //   L.DomUtil.addClass(e.popup._source._icon, 'clicked');
            

              // }).on('popupclose', function (e) {
              //   if(e.popup){
              //     L.DomUtil.removeClass(e.popup._source._icon, 'clicked');  
              //   }
                
              });
              markers.addLayer(marker);
        }
        map.addLayer(markers);

    
        markerArray.push(markers);
        if(markerArray.length > 0 ){
          map.fitBounds(L.featureGroup(markerArray).getBounds().pad(0.2)); 
        }


	// Custom Zoom Control
	map.removeControl(map.zoomControl);

	var zoomOptions = {
		zoomInText: '<i class="fa fa-plus" aria-hidden="true"></i>',
		zoomOutText: '<i class="fa fa-minus" aria-hidden="true"></i>',
	};

	// Creating zoom control
	var zoom = L.control.zoom(zoomOptions);
	zoom.addTo(map);

}


// ----------------------------------------------- //
// Single Listing Map
// ----------------------------------------------- //
function singleListingMap() {

	var lng = parseFloat($( '#singleListingMap' ).data('longitude'));
	var lat =  parseFloat($( '#singleListingMap' ).data('latitude'));
	var singleMapIco =  "<i class='"+$('#singleListingMap').data('map-icon')+"'></i>";

	var listeoIcon = L.divIcon({
	    iconAnchor: [20, 51], // point of the icon which will correspond to marker's location
	    popupAnchor: [0, -51],
	    className: 'listeo-marker-icon',
	    html:  '<div class="marker-container no-marker-icon ">'+
	                     '<div class="marker-card">'+
	                        '<div class="front face">' + singleMapIco + '</div>'+
	                        '<div class="back face">' + singleMapIco + '</div>'+
	                        '<div class="marker-arrow"></div>'+
	                     '</div>'+
	                   '</div>'
	    
	  }
	);

	var mapOptions = {
	    center: [lat,lng],
	    zoom: 13,
	    zoomControl: false,
	    gestureHandling: true
	}

	var map_single = L.map('singleListingMap',mapOptions);
	var zoomOptions = {
	   zoomInText: '<i class="fa fa-plus" aria-hidden="true"></i>',
	   zoomOutText: '<i class="fa fa-minus" aria-hidden="true"></i>',
	};

	// Zoom Control
	var zoom = L.control.zoom(zoomOptions);
	zoom.addTo(map_single);

	map_single.scrollWheelZoom.disable();

	marker = new L.marker([lat,lng], {
	      icon: listeoIcon,
	}).addTo(map_single);

	// Open Street Map 
	// -----------------------//
	L.tileLayer(
		'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
		attribution: '&copy; <a href="http://openstreetmap.org">OpenStreetMap</a> Contributors',
		maxZoom: 18,
	}).addTo(map_single);


	// MapBox (Requires API Key)
	// -----------------------//
	// L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}@2x.png?access_token={accessToken}', {
	//     attribution: " &copy;  <a href='https://www.mapbox.com/about/maps/'>Mapbox</a> &copy;  <a href='http://www.openstreetmap.org/copyright'>OpenStreetMap</a>",
	//     maxZoom: 18,
	//     id: 'mapbox.streets',
	//     accessToken: 'ACCESS_TOKEN'
	// }).addTo(map_single);
	

	// Street View Button URL
	$('a#streetView').attr({
		href: 'https://www.google.com/maps/search/?api=1&query='+lat+','+lng+'',
		target: '_blank'
	});
}

// Single Listing Map Init
if(document.getElementById("singleListingMap") !== null){
	singleListingMap();
}


});
</script>

<!-- Leaflet Geocoder + Search Autocomplete // Docs: https://github.com/perliedman/leaflet-control-geocoder -->
<script src="{{asset('scripts/leaflet-autocomplete.js')}}"></script>
<script src="{{asset('scripts/leaflet-control-geocoder.js')}}"></script>


</body>

</html>