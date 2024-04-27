@extends('admin.layouts.dashboard')

<!-- Dashboard -->
<div id="dashboard">

    <!-- Navigation -->
    <a href="#" class="dashboard-responsive-nav-trigger"><i class="fa fa-reorder"></i> Dashboard Navigation</a>
    @include('admin.layouts.sidebar')

    <!-- Content -->
    <div class="dashboard-content">

        <!-- Titlebar -->
        <div id="titlebar">
            <div class="row">
                <div class="col-md-12">
                    <h2>Add User</h2>
                    <!-- Breadcrumbs -->
                    <nav id="breadcrumbs">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Dashboard</a></li>
                            <li>Add User</li>
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

                <div id="add-user" class="add-listing-section">
                    <!-- User Add Form -->
                    <form method="POST" action="{{ route('users.store') }}">
                        @csrf

                        <!-- User Information -->
                        <div class="add-listing-headline">
                            <h3><i class="sl sl-icon-doc"></i> User information</h3>
                        </div>

                        <!-- Name -->
                        <div class="row with-forms">
                            <div class="col-md-12">
                                <h5>Name</h5>
                                <input name="name" class="search-field" type="text" value="{{ old('name') }}"/>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="row with-forms">
                            <div class="col-md-12">
                                <h5>Email</h5>
                                <input name="email" class="search-field" type="email" value="{{ old('email') }}"/>
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="row with-forms">
                            <div class="col-md-12">
                                <h5>Password</h5>
                                <input name="password" class="search-field" type="password" value="{{ old('password') }}"/>
                            </div>
                        </div>

                        <!-- Role -->
                        <div class="row with-forms">
                            <div class="col-md-12">
                                <h5>Role</h5>
                                <select name="role" class="chosen-select-no-single">
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>
                                </select>
                            </div>
                        </div>

                        <!-- Add Button -->
                        <button type="submit" class="button preview">Add User <i class="fa fa-arrow-circle-right"></i></button>

                    </form>
                </div>
            </div>

            <!-- Copyright -->
            <div class="col-md-12">
                <div class="copyrights">© 2024 Flood. All Rights Reserved.</div>
            </div>
        </div>

    </div>
    <!-- Content / End -->

</div>
<!-- Dashboard / End -->
