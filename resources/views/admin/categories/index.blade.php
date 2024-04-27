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
					<h2>Categories</h2>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="#">Home</a></li>
							<li><a href="#">Dashboard</a></li>
							<li>Categories</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>

		<div class="row">
			
			<!-- Listings -->
			<div class="col-lg-12 col-md-12">
				<div class="dashboard-list-box margin-top-0">
					<h4>Category List</h4>
					<ul>
                        @forelse ($categories as $category)
						<li>
							<div class="list-box-listing">
								<div class="list-box-listing-img">
                                    <a href="#"><img src="{{ asset('storage/images/' . $category->image) }}" alt=""></a>
                                </div>
								<div class="list-box-listing-content">
                                    <h3>{{$category->name}}</h3>
                                    <span><i class="{{$category->icon}}"></i> {{$category->icon}}</span>
                                </div>
							</div>
							<form action="{{route('categories.destroy', $category->id)}}" class="buttons-to-right" method="POST">
                                @csrf
                                @method("DELETE")
								<button type="submit" class="button gray"><i class="sl sl-icon-close"></i> Delete</button>
                            </form>
						</li>
                        @empty
                        <li>
                            <p>Tambah category terlebih dahulu</p>
                        </li>
                        @endforelse
					</ul>
				</div>
			</div>

            <a href="{{route('categories.create')}}" class="button preview">Tambah Kategori <i class="fa fa-arrow-circle-right"></i></a>

			<!-- Copyrights -->
			<div class="col-md-12">
				<div class="copyrights">© 20214Flood. All Rights Reserved.</div>
			</div>
		</div>

	</div>
	<!-- Content / End -->


</div>
<!-- Dashboard / End -->
@endsection