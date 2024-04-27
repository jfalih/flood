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
					<h2>Users</h2>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="#">Home</a></li>
							<li><a href="#">Dashboard</a></li>
							<li>Users</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>

		<div class="row">
			
			<!-- Listings -->
			<div class="col-lg-12 col-md-12">
				<div class="dashboard-list-box margin-top-0">
					<h4>User List</h4>
					<ul>
                        @forelse ($users as $user)
                        <li>
							<div class="comments listing-reviews">
								<ul>
									<li>
										<div class="avatar"><img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70" alt="" /></div>
										<div class="comment-content">
                                            <div class="arrow-comment"></div>
											<div class="comment-by">{{$user->name}} <div class="comment-by-listing">role sebagai <a href="#">{{$user->role}}</a></div> <span class="date">Terdaftar Pada: {{$user->created_at}}</span></div>
											<a href="#small-dialog" class="rate-review popup-with-zoom-anim"><i class="sl sl-icon-note"></i> Edit</a>
                                            <a href="#small-dialog" class="rate-review popup-with-zoom-anim"><i class="sl sl-icon-close"></i> Delete</a>
										</div>
									</li>
								</ul>
							</div>
						</li>
                        @empty
                        <li>
                            <p>Tambah user terlebih dahulu</p>
                        </li>
                        @endforelse
					</ul>
				</div>
			</div>

            <a href="{{route('categories.create')}}" class="button preview">Tambah User <i class="fa fa-arrow-circle-right"></i></a>

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