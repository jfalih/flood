@extends('layouts.auth')

@section('content')
<!-- Titlebar
================================================== -->
<div id="titlebar" class="gradient">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h2><i class="sl sl-icon-login"></i> Masuk</h2>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs">
					<ul>
						<li><a href="#">Home</a></li>
						<li>Masuk</li>
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
				<form method="POST" action="{{ route('login') }}" id="add-listing" class="separated-form">
                    @csrf
					<!-- Section -->
					<div class="add-listing-section">
						<!-- Headline -->
						<div class="add-listing-headline">
							<h3><i class="sl sl-icon-user"></i> Hi, kembali lagi. Yuk masuk ke akun kamu!</h3>
						</div>
						<div class="row with-forms">
							<div class="col-md-12">
								<h5>E-mail <i class="tip" data-tip-content="Email kamu yang terdaftar"></i></h5>
								<input name="email" placeholder="Alamat E-mail" class="search-field" type="email" value="{{old('email')}}"/>
							</div>
						</div>
						<div class="row with-forms">
							<div class="col-md-12">
								<h5>Password <i class="tip" data-tip-content="Password akun kamu"></i></h5>
								<input name="password" placeholder="Password" class="search-field" type="password" value="{{old('password')}}"/>
							</div>
						</div>
                        <div class="row">
                            <div class="col-md-12">
                                <span>Belum memiliki akun? <a>Daftar Sekarang</a></span>
                            </div>
                        </div>
                        <button type="submit" class="button margin-top-15">Login</button>
					</div>
				</form>
			</div>

		</div>
</div>
	<!-- Content / End -->
<!-- Container / End -->

@endsection