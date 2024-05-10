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
					<h2>Add Place</h2>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="#">Home</a></li>
							<li><a href="#">Dashboard</a></li>
							<li>Add Place</li>
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
					<form method="POST" action="{{route('place.store')}}" enctype="multipart/form-data" class="add-listing-section">
                        @csrf
						<!-- Headline -->
						<div class="add-listing-headline">
							<h3><i class="sl sl-icon-doc"></i>Place information</h3>
						</div>

						<!-- Title -->
						<div class="row with-forms">
                            <!-- Status -->
							<div class="col-md-12">
								<h5>Place Category</h5>
								<select name="category_id" class="chosen-select-no-single" >
									<option label="blank">Select Category</option>	
                                    @forelse ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @empty
                                        <option value="" disabled>Empty Category</option> <!-- Display if no categories available -->
                                    @endforelse
								</select>
							</div>
							<div class="col-md-12">
								<h5>Place Name <i class="tip" data-tip-content="Nama tempat yang ingin ditambah"></i></h5>
								<input name="name" placeholder="Place Name" class="search-field" type="text" value="{{old('name')}}"/>
							</div>
							<div class="col-md-12">
								<h5>Place Address <i class="tip" data-tip-content="Alamat tempat kamu"></i></h5>
								<input name="address" placeholder="Address" class="search-field" type="text" value="{{old('address')}}"/>
							</div>
							<div class="col-md-12">
								<h5>Place Description <i class="tip" data-tip-content="Deskripsi tempat kamu"></i></h5>
								<input name="description" placeholder="Description" class="search-field" type="text" value="{{old('description')}}"/>
							</div>
							<div class="col-md-6">
								<h5>Latitude <i class="tip" data-tip-content="Deskripsi tempat kamu"></i></h5>
								<input name="latitude" placeholder="Latitude" class="search-field" type="text" value="{{old('latitude')}}"/>
							</div>
							<div class="col-md-6">
								<h5>Longitude <i class="tip" data-tip-content="Deskripsi tempat kamu"></i></h5>
								<input name="longitude" placeholder="Longitude" class="search-field" type="text" value="{{old('longitude')}}"/>
							</div>
							<div class="col-md-6">
								<h5>E-mail <i class="tip" data-tip-content="E-mail tempat kamu"></i></h5>
								<input name="email" placeholder="Alamat E-mail" class="search-field" type="text" value="{{old('email')}}"/>
							</div>
							<div class="col-md-6">
								<h5>Phone <i class="tip" data-tip-content="Nomor Hp tempat kamu"></i></h5>
								<input name="phone" placeholder="Phone" class="search-field" type="text" value="{{old('phone')}}"/>
							</div>
							<div class="col-md-3">
								<h5>Gambar<i class="tip" data-tip-content="Name of your business"></i></h5>
								<input class="search-field" name="image1" type="file" accept="images/*"/>
							</div>
							<div class="col-md-3">
								<h5>Gambar 2<i class="tip" data-tip-content="Name of your business"></i></h5>
								<input class="search-field" name="image2" type="file"/>
							</div>
							<div class="col-md-3">
								<h5>Gambar 3<i class="tip" data-tip-content="Name of your business"></i></h5>
								<input class="search-field" name="image3" type="file"/>
							</div>
							<div class="col-md-3">
								<h5>Gambar 4<i class="tip" data-tip-content="Name of your business"></i></h5>
								<input class="search-field" name="image4" type="file"/>
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
