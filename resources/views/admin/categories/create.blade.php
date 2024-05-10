@extends('admin.layouts.dashboard')
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
					<h2>Add Category</h2>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="#">Home</a></li>
							<li><a href="#">Dashboard</a></li>
							<li>Add Category</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-12">

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

				<div id="add-listing">

					<!-- Section -->
					<form method="POST" action="{{route('categories.store')}}" enctype="multipart/form-data" class="add-listing-section">
                        @csrf
						<!-- Headline -->
						<div class="add-listing-headline">
							<h3><i class="sl sl-icon-doc"></i> Category information</h3>
						</div>

						<!-- Title -->
						<div class="row with-forms">
							<div class="col-md-12">
								<h5>Category Title <i class="tip" data-tip-content="Name of your business"></i></h5>
								<input name="name" class="search-field" type="text" value="{{old('name')}}"/>
							</div>
							<div class="col-md-12">
								<h5>Category Icon <i class="tip" data-tip-content="Name of your business"></i></h5>
								<input name="icon" class="search-field" type="text" value="{{old('icon')}}"/>
							</div>
							<div class="col-md-12">
								<h5>Category Background Image<i class="tip" data-tip-content="Name of your business"></i></h5>
								<input class="search-field" name="image" type="file"/>
							</div>
						</div>

                        <button type="submit" class="button preview">Tambah <i class="fa fa-arrow-circle-right"></i></button>

					</form>
					<!-- Section / End -->
				</div>
			</div>

			<!-- Copyrights -->
			<div class="col-md-12">
				<div class="copyrights">© 2024 Flood. All Rights Reserved.</div>
			</div>

		</div>

	</div>
	<!-- Content / End -->


</div>
<!-- Dashboard / End -->
