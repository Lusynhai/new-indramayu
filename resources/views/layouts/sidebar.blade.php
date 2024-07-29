<aside class="aside aside-fixed">
    <div class="aside-header">
        <a href="{{ url('/') }}" class="aside-logo">Disbud<span>Indramayu</span></a>
        <a href="#" class="aside-menu-link">
            <i data-feather="menu"></i>
            <i data-feather="x"></i>
        </a>
    </div>
    <div class="aside-body">
        @auth
            <div class="aside-loggedin">
                <div class="d-flex align-items-center justify-content-start">
                    <a href="#" class="avatar"><img src="https://placehold.co/387" class="rounded-circle" alt=""></a>
                    <div class="aside-alert-link">
                        <a href="#" class="new" data-bs-toggle="tooltip" title="You have 2 unread messages"><i data-feather="message-square"></i></a>
                        {{-- <a href="{{ route('admin.notifications') }}" class="new" data-bs-toggle="tooltip" title="You have {{ App\Models\PengajuanObjekBudaya::unreadNotificationsCount() }} new notifications"> --}}
                            <i data-feather="bell"></i>
                        </a>
                        <a href="#" data-bs-toggle="tooltip" title="Sign out"><i data-feather="log-out"></i></a>
                    </div>
                </div>
                <div class="aside-loggedin-user">
                    <a href="#loggedinMenu" class="d-flex align-items-center justify-content-between mg-b-2" data-bs-toggle="collapse">
                        <h6 class="tx-semibold mg-b-0">{{ Auth::user()->name }}</h6>
                    </a>
                    <p class="tx-color-03 tx-12 mg-b-0">Administrator</p>
                </div>
            </div><!-- aside-loggedin -->
        @else
            <div class="aside-loggedin">
                <div class="d-flex align-items-center justify-content-start">
                    <a href="#" class="avatar"><img src="https://placehold.co/387" class="rounded-circle" alt=""></a>
                    <div class="aside-alert-link">
                        <a href="#" class="new" data-bs-toggle="tooltip" title="You have 2 unread messages"><i data-feather="message-square"></i></a>
                        {{-- <a href="{{ route('admin.notifications') }}" class="new" data-bs-toggle="tooltip" title="You have {{ App\Models\PengajuanObjekBudaya::unreadNotificationsCount() }} new notifications"> --}}
                            <i data-feather="bell"></i>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <a href="#" data-bs-toggle="tooltip" title="Sign out"><i data-feather="log-out"></i></a>
                    </div>
                </div>
                <div class="aside-loggedin-user">
                    <a href="#loggedinMenu" class="d-flex align-items-center justify-content-between mg-b-2" data-bs-toggle="collapse">
                        <h6 class="tx-semibold mg-b-0">Guest</h6>
                    </a>
                    <p class="tx-color-03 tx-12 mg-b-0">Please log in</p>
                </div>
            </div><!-- aside-loggedin -->
        @endauth
        <ul class="nav nav-aside">
            {{-- <li class="nav-label"><a href="{{ route('admin.index') }}"><span>Dashboard</span></a></li> --}}
            <li class="nav-label mg-t-25">Pages</li>
            <li class="nav-item"><a href="{{ route('adats.index') }}" class="nav-link"><i data-feather="shopping-bag"></i> <span>Adat Istiadat</span></a></li>
            <li class="nav-item"><a href="{{ route('cagarbudayas.index') }}" class="nav-link"><i data-feather="globe"></i> <span>Cagar Budaya</span></a></li>
            <li class="nav-item"><a href="{{ route('rituses.index') }}" class="nav-link"><i data-feather="pie-chart"></i> <span>Ritus</span></a></li>
            <li class="nav-item"><a href="{{ route('kesenians.index') }}" class="nav-link"><i data-feather="life-buoy"></i> <span>Kesenian</span></a></li>
            {{-- <li class="nav-item"><a href="{{ route('admin.pengajuans.index') }}" class="nav-link"><i data-feather="life-buoy"></i> <span>Pengajuan Objek Budaya</span></a></li> --}}
        </ul>
    </div>
</aside>
