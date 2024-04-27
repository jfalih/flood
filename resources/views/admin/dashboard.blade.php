@extends('admin.layouts.dashboard')
@section('content')
<!-- Dashboard -->
<div id="dashboard">

	<!-- Navigation
	================================================== -->

	<!-- Responsive Navigation Trigger -->
	<a href="#" class="dashboard-responsive-nav-trigger"><i class="fa fa-reorder"></i> Dashboard Navigation</a>
    @include('admin.layouts.sidebar')
	<!-- Navigation / End -->


	<!-- Content
	================================================== -->
	<div class="dashboard-content">

		<!-- Titlebar -->
		<div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<h2>Selamat Datang, Admin {{Auth::user()->name}}!</h2>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="#">Home</a></li>
							<li>Dashboard</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
		<!-- Content -->
		<div class="row">
			<!-- Item -->
			<div class="col-lg-3 col-md-6">
				<div class="dashboard-stat color-3">
					<div class="dashboard-stat-content"><h4>{{Auth::user()->trombosit}}</h4><span>Pengajuan Donor</span></div>
					<div class="dashboard-stat-icon"><i class="im im-icon-Blood"></i></div>
				</div>
			</div>

			<div class="col-lg-3 col-md-6">
				<div class="dashboard-stat color-2">
					<div class="dashboard-stat-content"><h4>{{$categoryCount}}</h4><span>Total Kategori</span></div>
					<div class="dashboard-stat-icon"><i class="im im-icon-Dashboard"></i></div>
				</div>
			</div>

			
			<!-- Item -->
			<div class="col-lg-3 col-md-6">
				<div class="dashboard-stat color-1">
					<div class="dashboard-stat-content"><h4>{{$placeCount}}</h4> <span>Total Tempat</span></div>
					<div class="dashboard-stat-icon"><i class="im im-icon-Home"></i></div>
				</div>
			</div>

			<!-- Item -->
			<div class="col-lg-3 col-md-6">
				<div class="dashboard-stat color-4">
					<div class="dashboard-stat-content"><h4>{{$userCount}}</h4> <span>Total Pendonor</span></div>
					<div class="dashboard-stat-icon"><i class="im im-icon-Heart"></i></div>
				</div>
			</div>
		</div>


		<div class="row">
			
			
			<!-- Invoices -->
            <div class="col-lg-6 col-md-12">
                <!-- Section -->
                <div class="dashboard-list-box add-listing-section">
                    <div class="add-listing-headline">
                        <h3><i class="sl sl-icon-doc"></i> Pilih Tempat Yang Ingin Dilihat Stocknya</h3>
                    </div>
                    <!-- Title -->
                    <div class="row with-forms">
                        <div class="col-md-12">
                            <h5>Place</h5>
                            <select id="place_id" name="place_id" class="chosen-select-no-single" >
                                <option label="blank">Select Place</option>	
                                @forelse ($places as $place)
                                    <option value="{{ $place->id }}">{{ $place->name }}</option>
                                @empty
                                    <option value="" disabled>Empty Place</option> <!-- Display if no categories available -->
                                @endforelse
                            </select>
                        </div>                       
                    </div>
                </div>
                <!-- Section / End -->
			</div>

            <div class="col-lg-6 col-md-12">
				<div class="dashboard-list-box invoices with-icons">
					<h4>Stock List</h4>
                    <ul id="stock-list">
                        <li>Pilih tempat terlebih dahulu</li>
					</ul>
				</div>
			</div>
		</div>
        <div class="row">
            

			<!-- Recent Activity -->
			<div class="col-lg-6 col-md-12">
				<div class="dashboard-list-box with-icons">
					<h4>Aktifitas Kamu</h4>
					<ul>
						<li>
							<i class="list-box-icon sl sl-icon-layers"></i> Daftar menjadi <strong><a href="#">pendonor</a></strong> telah disetujui!
							<a href="#" class="close-list-item"><i class="fa fa-close"></i></a>
						</li>
					</ul>
				</div>
			</div>


			<div class="col-lg-6 col-md-12">
				<div class="dashboard-list-box with-icons">
					<h4>Pengajuan Donor</h4>
					<ul>
						<li>
							<i class="list-box-icon sl sl-icon-layers"></i> Daftar menjadi <strong><a href="#">pendonor</a></strong> telah disetujui!
							<a href="#" class="close-list-item"><i class="fa fa-close"></i></a>
						</li>
					</ul>
				</div>
			</div>


			<!-- Copyrights -->
			<div class="col-md-12">
				<div class="copyrights">© 2021 Flood. All Rights Reserved.</div>
			</div>
        </div>

	</div>
	<!-- Content / End -->


</div>
<!-- Dashboard / End -->
@endsection

@section('js')
<script>
    $(document).ready(function() {
        $('#place_id').on('change', function() {
            var placeId = $(this).val();
            var deleteRoute = '{{ route("stocks.destroy", ["stock" => ":stockId"]) }}';

            $.ajax({
                url: '{{ route("getStocksByPlace") }}', // Define your route for fetching stocks by place
                type: 'GET',
                data: { place_id: placeId },
                success: function(response) {
                    // Update the stock list based on the response
                    var stockList = $('#stock-list');
                    stockList.empty(); // Clear the existing list
                    if (response.length > 0) {
                        $.each(response, function(index, stock) {
                            var totalStock = stock.A_plus + stock.A_minus + stock.B_plus + stock.B_minus + stock.AB_plus + stock.AB_minus + stock.O_plus + stock.O_minus;
                            var listItem = '<li id="stock-item-' + stock.id + '"><i class="list-box-icon sl sl-icon-heart"></i><strong>' + stock.name + '</strong><ul><li>';
                            if (totalStock == 0) {
                                listItem += 'Habis';
                            } else {
                                listItem += 'Sisa Stok: ' + totalStock;
                            }
                            var stockDate = new Date(stock.updated_at);
                            var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', hour: 'numeric', minute: 'numeric', second: 'numeric', timeZone: 'Asia/Jakarta' };
                            var formattedDate = stockDate.toLocaleString('id-ID', options);

                            listItem += '</li><li>Update Terakhir: ' + formattedDate + '</li></ul>';
                              // Display stock information for each blood type
                            listItem += '<ul>';
                            listItem += '<li>Stock A+ ' + stock.A_plus + '</li>';
                            listItem += '<li>Stock A- ' + stock.A_minus + '</li>';
                            listItem += '<li>Stock B+ ' + stock.B_plus + '</li>'; // Adding Stock B+
                            listItem += '<li>Stock B- ' + stock.B_minus + '</li>'; // Adding Stock B-
                            listItem += '<li>Stock AB+ ' + stock.AB_plus + '</li>'; // Adding Stock AB+
                            listItem += '<li>Stock AB- ' + stock.AB_minus + '</li>'; // Adding Stock AB-
                            listItem += '<li>Stock O+ ' + stock.O_plus + '</li>'; // Adding Stock O+
                            listItem += '<li>Stock O- ' + stock.O_minus + '</li>'; // Adding Stock O-
                            // Add more blood types if needed

                            listItem += '</ul>';
                            listItem += '</li>';
                            stockList.append(listItem);
                        });
                    } else {
                        stockList.append('<li>Stock kosong, tambah terlebih dahulu</li>');
                    }
                },
                error: function(xhr, status, error) {
                    console.error(error);
                    // Handle error
                }
            });
        });
    });

    $(document).on('click', '.delete-stock', function(e) {
        e.preventDefault();
        var deleteUrl = $(this).attr('href'); // Get the delete URL from the href attribute
        var stockId = $(this).data('id'); // Get the ID from the data-id attribute of the clicked anchor
        $.ajax({
            url: deleteUrl,
            type: 'POST', // Use POST method
            data: {_token: '{{ csrf_token() }}', _method: 'DELETE'},
            success: function(response) {
                // Remove the deleted stock item from the list
                $('#stock-item-' + stockId).remove(); // Remove the list item from the DOM using jQuery

                // Check if the stock list is empty after deletion
                if ($('#stock-list').children().length === 0) {
                    // If empty, add a new <li> element
                    $('#stock-list').append('<li>Stock kosong, tambah terlebih dahulu</li>');
                }
            },
            error: function(xhr, status, error) {
                // Handle error
                // Show an alert with the error message
                alert('Error: ' + error);
            }
        });
    });

</script>
@endsection