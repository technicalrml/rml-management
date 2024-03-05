<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <img src="{{asset('img/rml-logo.png')}}" style="width: 50%; height: 50%;">
        </div>
        <div class="sidebar-brand-text mx-3">
{{--           RML Management--}}
        </div>
    </a>
    <hr class="sidebar-divider my-0">
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Interface
    </div>
    <li class="nav-item {{ $active == 'dashboard' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-list-alt"></i>
            <span>Dashboard</span></a>
    </li>
    @if(auth()->user()->role_id == 'RL001'||auth()->user()->role_id == 'RL002' || auth()->user()->role_id == 'RL005')
    <li class="nav-item {{ $active == 'ticket' ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
           aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-ticket-alt"></i>
            <span>Cases</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
             data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Tickets </h6>
                <a class="collapse-item" href="{{ route('viewticket') }}">Ticket Open</a>
                <a class="collapse-item" href="{{ route('viewticketclose') }}">Ticket Close</a>
            </div>
        </div>
    </li>
    @endif
    <li class="nav-item {{ $active == 'license' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('viewlicense') }}">
            <i class="fas fa-fw fa-list-alt"></i>
            <span>License</span></a>
    </li>
    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        Management
    </div>

    <li class="nav-item {{ $active == 'product' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('viewproduct') }}">
            <i class="fas fa-fw fa-box"></i>
            <span>Product</span></a>
    </li>

    @if(auth()->user()->role_id == 'RL001'||auth()->user()->role_id == 'RL002')
    <li class="nav-item {{ $active == 'customer' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('viewcustomer') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Customer</span></a>
    </li>
    @endif

    @if(auth()->user()->role_id == 'RL001')
        <li class="nav-item {{ $active == 'role' ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('viewrole') }}">
                <i class="fas fa-fw fa-address-book"></i>
                <span>Role</span></a>
        </li>

        <li class="nav-item {{ $active == 'user' ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('viewuser') }}">
                <i class="fas fa-fw fa-user-alt"></i>
                <span>User</span></a>
        </li>
        <hr class="sidebar-divider d-none d-md-block">
    @endif



    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
