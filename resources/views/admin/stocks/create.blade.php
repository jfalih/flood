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
                                <select name="place_id" class="chosen-select-no-single">
                                    <option label="blank">Select Place</option>
                                    @forelse ($places as $place)
                                        <option value="{{ $place->id }}" {{ old('place_id') == $place->id ? 'selected' : '' }}>{{ $place->name }}</option>
                                    @empty
                                        <option value="" disabled>Empty Place</option>
                                    @endforelse
                                </select>
                            </div>                        
                            <!-- Field for Stock A plus -->
                            <div class="col-md-12">
                                <h5>Nama Darah <i class="tip" data-tip-content="Nama jenis darah"></i></h5>
                                <input placeholder="Nama Darah" name="name" class="search-field" type="text" value="{{old('name')}}"/>
                            </div>
                            
                            <div class="col-md-12">
                                <h5>Stock A+ <i class="tip" data-tip-content="Jumlah stock A+ dari tempat kamu"></i></h5>
                                <input placeholder="Stock A+" name="A_plus" class="search-field" type="number" value="{{old('A_plus')}}"/>
                            </div>
                            
                            <!-- Add similar fields for other blood types -->
                            <!-- Field for Stock A minus -->
                            <div class="col-md-12">
                                <h5>Stock A- <i class="tip" data-tip-content="Jumlah stock A- dari tempat kamu"></i></h5>
                                <input placeholder="Stock A-" name="A_minus" class="search-field" type="number" value="{{old('A_minus')}}"/>
                            </div>
                            
                            <!-- Field for Stock B plus -->
                            <div class="col-md-12">
                                <h5>Stock B+ <i class="tip" data-tip-content="Jumlah stock B+ dari tempat kamu"></i></h5>
                                <input placeholder="Stock B+" name="B_plus" class="search-field" type="number" value="{{old('B_plus')}}"/>
                            </div>
                            
                            <!-- Field for Stock B minus -->
                            <div class="col-md-12">
                                <h5>Stock B- <i class="tip" data-tip-content="Jumlah stock B- dari tempat kamu"></i></h5>
                                <input placeholder="Stock B-" name="B_minus" class="search-field" type="number" value="{{old('B_minus')}}" />
                            </div>
                            
                            <!-- Add similar fields for other blood types (AB+, AB-, O+, O-) -->
                            <!-- Field for Stock AB+ -->
                            <div class="col-md-12">
                                <h5>Stock AB+ <i class="tip" data-tip-content="Jumlah stock AB+ dari tempat kamu"></i></h5>
                                <input placeholder="Stock AB+" name="AB_plus" class="search-field" type="number" value="{{ old('AB_plus') }}"/>
                            </div>

                            <!-- Field for Stock AB- -->
                            <div class="col-md-12">
                                <h5>Stock AB- <i class="tip" data-tip-content="Jumlah stock AB- dari tempat kamu"></i></h5>
                                <input placeholder="Stock AB-" name="AB_minus" class="search-field" type="number" value="{{ old('AB_minus') }}"/>
                            </div>

                            <!-- Field for Stock O+ -->
                            <div class="col-md-12">
                                <h5>Stock O+ <i class="tip" data-tip-content="Jumlah stock O+ dari tempat kamu"></i></h5>
                                <input placeholder="Stock O+" name="O_plus" class="search-field" type="number" value="{{ old('O_plus') }}"/>
                            </div>

                            <!-- Field for Stock O- -->
                            <div class="col-md-12">
                                <h5>Stock O- <i class="tip" data-tip-content="Jumlah stock O- dari tempat kamu"></i></h5>
                                <input placeholder="Stock O-" name="O_minus" class="search-field" type="number" value="{{ old('O_minus') }}"/>
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
