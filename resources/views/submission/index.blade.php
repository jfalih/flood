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
					<h2>Submission {{$status}}</h2>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="#">Home</a></li>
							<li><a href="#">Dashboard</a></li>
							<li>Submission {{$status}}</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
        <div class="row">

		<div class="row">
			<!-- Item -->
			<div class="col-lg-4 col-md-6">
				<div class="dashboard-stat color-1">
					<div class="dashboard-stat-content"><h4>{{$countActive}}</h4><span>Active</span></div>
					<div class="dashboard-stat-icon"><i class="im im-icon-Security-Check"></i></div>
				</div>
			</div>

			
			<!-- Item -->
			<div class="col-lg-4 col-md-6">
				<div class="dashboard-stat color-3">
					<div class="dashboard-stat-content"><h4>{{$countPending}}</h4> <span>Pending</span></div>
					<div class="dashboard-stat-icon"><i class="im im-icon-Alarm"></i></div>
				</div>
			</div>

			<!-- Item -->
			<div class="col-lg-4 col-md-6">
				<div class="dashboard-stat color-4">
					<div class="dashboard-stat-content"><h4>{{$countExpired}}</h4> <span>Expired</span></div>
					<div class="dashboard-stat-icon"><i class="im im-icon-Lock"></i></div>
				</div>
			</div>
		</div>
        </div>
		<div class="row">
            <div class="col-lg-12 col-md-12">
                @if(session('success'))
                <div class="notification success large">
					<strong>Yey.. Berhasil nih!</strong>
					<p>{{ session('success') }}</p>
				</div>
                @endif

                @if(session('error'))
                <div class="notification error large">
					<strong>Yey.. Berhasil nih!</strong>
					<p>{{ session('error') }}</p>
				</div>
                @endif
            </div>
			<!-- Listings -->
			<div class="col-lg-12 col-md-12">
				<div class="dashboard-list-box invoices with-icons margin-top-20">
					<h4>Pengajuan Terakhir</h4>
					<ul>
                        @forelse ($submissions as $sub)
						<li><i class="list-box-icon sl sl-icon-doc"></i>
							<strong>@if(Auth::user()->role == 'user') Menjadi Pendonor @else {{$sub->user->name}} mengajukan donor  @endif di {{$sub->place->name}}</strong>
							<ul>
								<li class="pending">{{$sub->status}}</li>
                                <li>Pengajuan: {{$sub->donor_date}}</li>
                                @if($sub->status == 'expired')<li>Dibatalkan Pada: {{$sub->updated_at}}</li>@endif
							</ul>
							<div class="buttons-to-right">
                                @if(Auth::user()->role == 'admin' && $sub->status == 'pending')
                                <a href="{{route('submission.admin.approve', $sub)}}" class="button gray">Approve</a>
                                @endif
                                @if($sub->status !== 'expired' && $sub->status !== 'active')
                                <a href="@if(Auth::user()->role == 'user') {{route('submission.cancel', $sub)}} @else {{route('submission.admin.cancel', $sub)}} @endif" class="button gray">Batalkan</a>
                                @endif
								<a href="{{route('places.detail', $sub->place)}}" class="button gray">Lihat Tempat</a>
							</div>
						</li>
                        @empty
                        <li>Kamu belum melmiliki pendonoran {{$status}}.</li>
                        @endforelse
					</ul>
				</div>
			</div>

            <a href="{{route('home')}}" class="button preview">Menjadi Pendonor <i class="fa fa-arrow-circle-right"></i></a>

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