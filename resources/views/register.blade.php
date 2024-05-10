@extends('layouts.auth')

@section('content')
<!-- Titlebar
================================================== -->
<div id="titlebar" class="gradient">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h2><i class="sl sl-icon-login"></i> Daftar Akun</h2>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs">
					<ul>
						<li><a href="#">Home</a></li>
						<li>Daftar</li>
					</ul>
				</nav>

			</div>
		</div>
	</div>
</div>


<!-- Content
================================================== -->


<!-- Container -->
<div class="container">

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
				<div id="add-listing" class="separated-form">
					<!-- Section -->
					<form method="POST" action="{{ route('register') }}" class="add-listing-section">
                        @csrf
						<!-- Headline -->
						<div class="add-listing-headline">
							<h3><i class="sl sl-icon-user"></i> Daftar dengan mudah sekarang!</h3>
						</div>
						<div class="row with-forms">
							<div class="col-md-12">
								<h5>Nama Lengkap <i class="tip" data-tip-content="Nama lengkap kamu"></i></h5>
								<input name="name" placeholder="Nama Lengkap" class="search-field" type="text" value="{{old('name')}}" />
                                @error('name')
                                <div style="margin-top: -10px" class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
							</div>
						</div>
						<div class="row with-forms">
							<div class="col-md-12">
								<h5>E-mail <i class="tip" data-tip-content="Email kamu yang terdaftar"></i></h5>
								<input name="email" placeholder="Alamat E-mail" class="search-field" type="text" value="{{old('email')}}" />
                                @error('email')
                                <div style="margin-top: -10px" class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
							</div>
						</div>
						<div class="row with-forms">
							<div class="col-md-12">
								<h5>Password <i class="tip" data-tip-content="Password akun kamu"></i></h5>
								<input name="password" placeholder="Password" class="search-field" type="password" value="{{old('password')}}" />
                                @error('password')
                                <div style="margin-top: -10px" class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
							</div>
						</div>
						<div class="row with-forms">
							<div class="col-md-12">
								<h5>Konfirmasi Password <i class="tip" data-tip-content="Password akun kamu"></i></h5>
								<input name="password_confirmation" placeholder="Konfirmasi Password" class="search-field" type="password" value="{{old('password_confirmation')}}" />
                                @error('password_confirmation')
                                <div style="margin-top: -10px" class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
							</div>
						</div>
                        <div class="row">
                            <div class="col-md-12">
                                <span>Kamu sudah punya akun? <a>Login Sekarang</a></span>
                            </div>
                        </div>
                        <button type="submit" class="button margin-top-15">Register</button>
                        <button class="button margin-top-15">Reset</button>
					</form>
				</div>
			</div>

		</div>
</div>
	<!-- Content / End -->
<!-- Container / End -->

@endsection