<div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
    <div class="sidebar-brand d-none d-md-flex">
        <svg class="sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">
            <use xlink:href="assets/brand/coreui.svg#full"></use>
        </svg>
        <svg class="sidebar-brand-narrow" width="46" height="46" alt="CoreUI Logo">
            <use xlink:href="assets/brand/coreui.svg#signet"></use>
        </svg>
    </div>
    <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">

        {{-- User Section --}}
        @if (Auth::guard('web')->check() && Auth::user()->role->name == 'user')
            <li class="nav-item"><a class="nav-link" href="{{ route('user.dashboard') }}">
                    <svg class="nav-icon">
                        <use xlink:href="{{ asset('core/vendors/@coreui/icons/svg/free.svg#cil-speedometer') }}"></use>
                    </svg> Dashboard</a>
            </li>
            <li class="nav-item"><a class="nav-link" href="{{ route('user.blog.index') }}">
                    <i class="nav-icon fa fa-rss"></i>Blogs</a>
            </li>
        @endif

        {{-- Admin Section --}}
        @if (Auth::guard('admin')->check() && Auth::user()->role->name == 'admin')
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.dashboard') }}">
                    <svg class="nav-icon">
                        <use xlink:href="{{ asset('core/vendors/@coreui/icons/svg/free.svg#cil-speedometer') }}"></use>
                    </svg> Dashboard</a>
            </li>
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.users.list') }}">
                    <i class="nav-icon fa fa-users"></i>Users</a>
            </li>
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.blogs.list') }}">
                    <i class="nav-icon fa fa-rss"></i>Blogs</a>
            </li>
        @endif


    </ul>
    <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
</div>
