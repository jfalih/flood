@extends('admin.layouts.dashboard')
@section('content')
<!-- Dashboard -->
<div id="dashboard">

	<!-- Navigation
	================================================== -->

	<!-- Responsive Navigation Trigger -->
	<a href="#" class="dashboard-responsive-nav-trigger"><i class="fa fa-reorder"></i> Dashboard Navigation</a>
	@include('admin.layouts.sidebar')

	<!-- Content
	================================================== -->
	<div class="dashboard-content">

		<!-- Titlebar -->
		<div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<h2>Places</h2>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="#">Home</a></li>
							<li><a href="#">Dashboard</a></li>
							<li>Tempat</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>

		<div class="row">
			
			<!-- Listings -->
			<div class="col-lg-12 col-md-12">
				<div class="dashboard-list-box margin-top-0">
					<h4>Place List</h4>
					<ul>
                        @forelse ($places as $place)
						<li>
							<div class="list-box-listing">
								<div class="list-box-listing-img">
                                    <a href="#"><img src="{{ asset('storage/images/' . $place->image1) }}" alt=""></a>
                                </div>
								<div class="list-box-listing-content">
                                    <h3>{{$place->name}}</h3>
                                    <span>{{$place->address}}</span><br/>
                                    <div><i class="sl sl-icon-phone"></i> {{$place->phone}}</div>
                                    <div><i class="fa fa-envelope"></i> {{$place->email}}</div>
                                </div>
							</div>
							<form action="{{route('place.destroy', $place->id)}}" class="buttons-to-right" method="POST">
                                @csrf
                                @method("DELETE")
								<button type="submit" class="button gray"><i class="sl sl-icon-close"></i> Delete</button>
                            </form>
						</li>
                        @empty
                        <li>
                            <p>Tambah tempat terlebih dahulu</p>
                        </li>
                        @endforelse
					</ul>
				</div>
			</div>
            <div class="col-lg-12 col-md-12">
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

            <a href="{{route('place.create')}}" class="button preview">Tambah Tempat <i class="fa fa-arrow-circle-right"></i></a>

			<!-- Copyrights -->
			<div class="col-md-12">
				<div class="copyrights">© 2024 Flood. All Rights Reserved.</div>
			</div>
		</div>

	</div>
	<!-- Content / End -->


</div>
<!-- Dashboard / End -->
@endsection