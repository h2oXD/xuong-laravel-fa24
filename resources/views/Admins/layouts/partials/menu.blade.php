<div class="sidenav-menu">

    <!-- Brand Logo -->
    <a href="{{route('admin.dashboard')}}" class="logo">
        <span class="logo-light">
            <span class="logo-lg"><img src="{{ asset('assets/admin/assets/images/logo.png') }}" alt="logo"></span>
            <span class="logo-sm"><img src="{{ asset('assets/admin/assets/images/logo-sm.png') }}" alt="small logo"></span>
        </span>

        <span class="logo-dark">
            <span class="logo-lg"><img src="{{ asset('assets/admin/assets/images/logo-dark.png') }}"
                    alt="dark logo"></span>
            <span class="logo-sm"><img src="{{ asset('assets/admin/assets/images/logo-sm.png') }}"
                    alt="small logo"></span>
        </span>
    </a>    
    <!-- Full Sidebar Menu Close Button -->
    <button class="button-close-fullsidebar">
        <i class="ti ti-x align-middle"></i>
    </button>

    <div data-simplebar>

        <!--- Sidenav Menu -->
        <ul class="side-nav">
            <li class="side-nav-title">Quản lý</li>
            <li class="side-nav-item">
                <a href="{{route('employees.index')}}" class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-user"></i></span>
                    <span class="menu-text"> Quản lý Employees </span>
                </a>
                <a href="{{route('students.index')}}" class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-user"></i></span>
                    <span class="menu-text"> Quản lý Students </span>
                </a>
            </li>
        </ul>
    </div>
    </li>
    </ul>

    <!-- Help Box -->
    <div class="help-box text-center">
        <img src="{{asset('assets/admin/assets/images/coffee-cup.svg" height="90" alt="Helper Icon Image" />
        <h5 class="mt-3 fw-semibold fs-16">Unlimited Access</h5>
        <p class="mb-3 text-muted">Upgrade to plan to get access to unlimited reports</p>
        <a href="javascript: void(0);" class="btn btn-danger btn-sm">Upgrade</a>
    </div>

    <div class="clearfix"></div>
</div>
</div>
