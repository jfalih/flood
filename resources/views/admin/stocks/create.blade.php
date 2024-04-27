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
					<h2>Add Stock</h2>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="#">Home</a></li>
							<li><a href="#">Dashboard</a></li>
							<li>Add Stock</li>
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
					<form method="POST" action="{{route('stocks.store')}}" enctype="multipart/form-data" class="add-listing-section">
                        @csrf
						<!-- Headline -->
						<div class="add-listing-headline">
							<h3><i class="sl sl-icon-doc"></i> Stock information</h3>
						</div>

						<!-- Title -->
						<div class="row with-forms">
							<div class="col-md-12">
								<h5>Place</h5>
								<select name="place_id" class="chosen-select-no-single" >
									<option label="blank">Select Place</option>	
                                    @forelse ($places as $place)
                                        <option value="{{ $place->id }}">{{ $place->name }}</option>
                                    @empty
                                        <option value="" disabled>Empty Place</option> <!-- Display if no categories available -->
                                    @endforelse
								</select>
							</div>
                            <!-- Field for Stock A plus -->
                            <div class="col-md-12">
                                <h5>Nama Darah <i class="tip" data-tip-content="Nama jenis darah"></i></h5>
                                <input placeholder="Nama Darah" name="name" class="search-field" type="text"/>
                            </div>
                            
                            <div class="col-md-12">
                                <h5>Stock A+ <i class="tip" data-tip-content="Jumlah stock A+ dari tempat kamu"></i></h5>
                                <input placeholder="Stock A+" name="A_plus" class="search-field" type="number"/>
                            </div>
                            
                            <!-- Add similar fields for other blood types -->
                            <!-- Field for Stock A minus -->
                            <div class="col-md-12">
                                <h5>Stock A- <i class="tip" data-tip-content="Jumlah stock A- dari tempat kamu"></i></h5>
                                <input placeholder="Stock A-" name="A_minus" class="search-field" type="number"/>
                            </div>
                            
                            <!-- Field for Stock B plus -->
                            <div class="col-md-12">
                                <h5>Stock B+ <i class="tip" data-tip-content="Jumlah stock B+ dari tempat kamu"></i></h5>
                                <input placeholder="Stock B+" name="B_plus" class="search-field" type="number"/>
                            </div>
                            
                            <!-- Field for Stock B minus -->
                            <div class="col-md-12">
                                <h5>Stock B- <i class="tip" data-tip-content="Jumlah stock B- dari tempat kamu"></i></h5>
                                <input placeholder="Stock B-" name="B_minus" class="search-field" type="number"/>
                            </div>
                            
                            <!-- Add similar fields for other blood types (AB+, AB-, O+, O-) -->
                            <!-- Field for Stock AB plus -->
                            <div class="col-md-12">
                                <h5>Stock AB+ <i class="tip" data-tip-content="Jumlah stock AB+ dari tempat kamu"></i></h5>
                                <input placeholder="Stock AB+" name="AB_plus" class="search-field" type="number"/>
                            </div>
                            
                            <!-- Field for Stock AB minus -->
                            <div class="col-md-12">
                                <h5>Stock AB- <i class="tip" data-tip-content="Jumlah stock AB- dari tempat kamu"></i></h5>
                                <input placeholder="Stock AB-" name="AB_minus" class="search-field" type="number"/>
                            </div>
                            
                            <!-- Field for Stock O plus -->
                            <div class="col-md-12">
                                <h5>Stock O+ <i class="tip" data-tip-content="Jumlah stock O+ dari tempat kamu"></i></h5>
                                <input placeholder="Stock O+" name="O_plus" class="search-field" type="number"/>
                            </div>
                            
                            <!-- Field for Stock O minus -->
                            <div class="col-md-12">
                                <h5>Stock O- <i class="tip" data-tip-content="Jumlah stock O- dari tempat kamu"></i></h5>
                                <input placeholder="Stock O-" name="O_minus" class="search-field" type="number"/>
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
