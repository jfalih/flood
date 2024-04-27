@extends('admin.layouts.dashboard')

@section('content')
    
<!-- Dashboard -->
<div id="dashboard">

	<!-- Navigation
	================================================== -->

	<!-- Responsive Navigation Trigger -->
	<a href="#" class="dashboard-responsive-nav-trigger"><i class="fa fa-reorder"></i> Dashboard Navigation</a>
	
	<div class="dashboard-nav">
        @include('admin.layouts.sidebar')
	</div>
	<!-- Navigation / End -->


	<!-- Content
	================================================== -->
	<div class="dashboard-content">

		<!-- Titlebar -->
		<div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<h2>My Profile</h2>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="#">Home</a></li>
							<li><a href="#">Dashboard</a></li>
							<li>My Profile</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>

		<div class="row">

            @if(session('success'))
            <div class="col-md-12">
                <div class="notification success large">
                    <strong>Yey.. Berhasil nih!</strong>
                    <p>{{ session('success') }}</p>
                </div>
            </div>
            @endif

            @if ($errors->any())
            <div class="col-md-12">
                <div class="notification error large margin-bottom-4">
                    <strong>Hmm.. Ada error nih!</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endif
			<!-- Profile -->
            <div class="col-lg-6 col-md-12">
                <div class="dashboard-list-box margin-top-0">
                    <h4 class="gray">Profile Details</h4>
                    <div class="dashboard-list-box-static">
                        
                        <!-- Details -->
                        <form method="POST" action="{{ route('profile.update') }}">
                            @csrf
                            <div class="my-profile">
                                <label>Your Name</label>
                                <input name="name" value="{{ auth()->user()->name }}" type="text">
                                <label>Email</label>
                                <input name="email" value="{{ auth()->user()->email }}" type="email">
                            </div>
                
                            <button type="submit" class="button margin-top-15">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
            

			<!-- Change Password -->
			<div class="col-lg-6 col-md-12">
				<div class="dashboard-list-box margin-top-0">
					<h4 class="gray">Change Password</h4>
					<div class="dashboard-list-box-static">

                        <!-- Change Password Form -->
                        <form method="POST" action="{{ route('password.change') }}">
                            @csrf

                            <!-- Current Password -->
                            <div class="my-profile">
                                <label class="margin-top-0">Current Password</label>
                                <input type="password" name="current_password" required>
                                
                                <!-- New Password -->
                                <label>New Password</label>
                                <input type="password" name="new_password" required>

                                <!-- Confirm New Password -->
                                <label>Confirm New Password</label>
                                <input type="password" name="new_password_confirmation" required>

                                <!-- Submit Button -->
                                <button type="submit" class="button margin-top-15">Change Password</button>
                            </div>
                        </form>

					</div>
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
@endsection