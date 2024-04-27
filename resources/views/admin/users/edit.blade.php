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
                    <h2>Edit User</h2>
                    <!-- Breadcrumbs -->
                    <nav id="breadcrumbs">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Dashboard</a></li>
                            <li>Edit User</li>
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

                <div id="edit-user" class="add-listing-section">
                    <!-- User Edit Form -->
                    <form method="POST" action="{{ route('users.update', ['user' => $user->id]) }}">
                        @csrf
                        @method('PUT')

                        <!-- User Information -->
                        <div class="add-listing-headline">
                            <h3><i class="sl sl-icon-doc"></i> User information</h3>
                        </div>

                        <!-- Name -->
                        <div class="row with-forms">
                            <div class="col-md-12">
                                <h5>Name</h5>
                                <input name="name" class="search-field" type="text" value="{{ $user->name }}"/>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="row with-forms">
                            <div class="col-md-12">
                                <h5>Email</h5>
                                <input name="email" class="search-field" type="text" value="{{ $user->email }}"/>
                            </div>
                        </div>

                        <!-- Role -->
                        <div class="row with-forms">
                            <div class="col-md-12">
                                <h5>Role</h5>
                                <select name="role" class="chosen-select-no-single">
                                    <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
                                </select>
                            </div>
                        </div>

                        <!-- Update Button -->
                        <button type="submit" class="button preview">Update <i class="fa fa-arrow-circle-right"></i></button>

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
