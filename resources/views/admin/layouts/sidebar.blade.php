
<div class="dashboard-nav">
    <div class="dashboard-nav-inner">

        <ul data-submenu-title="Main">
            <li><a href=" @if(Auth::user()->role == 'admin') {{route('dashboard.admin')}} @else {{route('dashboard')}} @endif"><i class="sl sl-icon-settings"></i> Dashboard</a></li>
            <li><a><i class="sl sl-icon-heart"></i> Pengajuan Donor</a>
                @php
                    if(Auth::user()->role == "admin") {
                        $countActive = DB::table('submissions')->where('status', 'active')->count();
                        $countPending = DB::table('submissions')->where('status', 'pending')->count();
                        $countExpired = DB::table('submissions')->where('status', 'expired')->count();
                    } else {
                        $userId = Auth::id();
                        $countActive = DB::table('submissions')->where('status', 'active')->where('user_id', $userId)->count();
                        $countPending = DB::table('submissions')->where('status', 'pending')->where('user_id', $userId)->count();
                        $countExpired = DB::table('submissions')->where('status', 'expired')->where('user_id', $userId)->count();
                    }
                @endphp

                <ul>
                    <li><a href="{{ route('submission.index', ['status' => 'active']) }}">Active <span class="nav-tag green">{{ $countActive }}</span></a></li>
                    <li><a href="{{ route('submission.index', ['status' => 'pending']) }}">Pending <span class="nav-tag yellow">{{ $countPending }}</span></a></li>
                    <li><a href="{{ route('submission.index', ['status' => 'expired']) }}">Expired <span class="nav-tag red">{{ $countExpired }}</span></a></li>
                </ul>

            </li>
        </ul>

        @if(Auth::user()->role == 'admin')
        <ul data-submenu-title="Pengaturan Website">
            <li><a href="{{route('categories.index')}}"><i class="sl sl-icon-settings"></i> Kategori</a></li>
            <li><a href="{{route('place.index')}}"><i class="sl sl-icon-settings"></i> Tempat</a></li>
            <li><a href="{{route('stocks.index')}}"><i class="sl sl-icon-settings"></i> Stock</a></li>
            <li><a href=""><i class="sl sl-icon-settings"></i> Pengguna</a></li>
        </ul>
        @endif
        <ul data-submenu-title="Account">
            <li><a href="{{route('setting')}}"><i class="sl sl-icon-user"></i> My Profile</a></li>
            <li><a href="{{route('logout')}}"><i class="sl sl-icon-power"></i> Logout</a></li>
        </ul>
        
    </div>
</div>