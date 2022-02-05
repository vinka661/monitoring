<ul class="navbar-nav bg-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        {{-- <div class="sidebar-brand-icon rotate-n-15"> --}}
        <div class="sidebar-brand-icon ">
            <i class="fas fa-laptop"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Monitoring FDT RCFA</div>
    </a>

    <!-- Divider -->
 

    <!-- Nav Item - Dashboard -->
    @can('admin')
    <li class="nav-item active">
        <a class="nav-link" href="{{route ('dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    {{-- <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Data Master
    </div> --}}
    <hr class="sidebar-divider my-0">

    <li class="nav-item active">
        <a class="nav-link" href="#">  
            <span>DATA MASTER</span></a>
    </li>
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Pages Collapse Menu -->
    <!-- Nav Item - Charts -->
    <li class="nav-item">
    <a class="nav-link" href="{{route ('area')}}">
            <i class="fas fa-map-marked-alt"></i>
            <span>Area</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route ('pic')}}">
                <i class="fas fa-user-friends"></i>
                <span>PIC</span></a>
    

    <!-- Divider -->
    {{-- <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        DATA MONITORING
    </div> --}}
    <hr class="sidebar-divider my-0">

    <li class="nav-item active">
        <a class="nav-link" href="#">  
            <span>DATA MONITORING</span></a>
    </li>
    <hr class="sidebar-divider my-0">

    <li class="nav-item">
        <a class="nav-link" href="{{route ('aset')}}">
                <i class="fas fa-wrench"></i>
                <span>Asset</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route ('rcfa')}}">
                <i class="fas fa-exclamation-triangle"></i>
                <span>RCFA</span>
        </a>
    </li>
    <!-- <li class="nav-item">
        <a class="nav-link" href="{{route ('fdt')}}">
                <i class="fas fa-check-circle"></i>
                <span>FDT</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route ('progres')}}">
                <i class="fas fa-spinner"></i>
                <span>Progres</span>
        </a>
    </li> -->
    <hr class="sidebar-divider my-0">

    <li class="nav-item active">
        <a class="nav-link" href="#">  
            <span>DATA LAPORAN</span></a>
    </li>
    <hr class="sidebar-divider my-0">
    <li class="nav-item">
        <a class="nav-link" href="{{route ('laporan')}}">
                <i class="fas fa-paste"></i>
                <span>Laporan</span>
        </a>
    </li>
    @endcan
    @can('pic')
        <li class="nav-item active">
            <a class="nav-link" href="{{route ('dashboard')}}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>
        <hr class="sidebar-divider my-0">
        <li class="nav-item active">
            <a class="nav-link" href="#">  
                <span>DATA MONITORING</span></a>
        </li>
        <hr class="sidebar-divider my-0">
        <li class="nav-item">
            @php
                $id = str_replace('@mail.com', '', Auth::user()->email);;
            @endphp
            <a class="nav-link" href="{{ url('pic_rcfa/'. $id) }}">
                    <i class="fas fa-exclamation-triangle"></i>
                    <span>RCFA</span>
            </a>
        </li>
        <!-- <li class="nav-item">
            <a class="nav-link" href="{{ url('pic_fdt/'. $id) }}">
                    <i class="fas fa-check-circle"></i>
                    <span>FDT</span>
            </a>
        </li> -->
        <!-- <li class="nav-item">
            @php
                $id = str_replace('@mail.com', '', Auth::user()->email);;
            @endphp
            <a class="nav-link" href="{{ url('pic_progres/'. $id) }}">
                    <i class="fas fa-spinner"></i>
                    <span>Progres</span>
            </a>
        </li> -->
    @endcan 
    @can('user')
    <hr class="sidebar-divider my-0">
    <li class="nav-item active">
            <a class="nav-link" href="{{route ('dashboard')}}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
    </li>
    <hr class="sidebar-divider my-0">
    <li class="nav-item active">
        <a class="nav-link" href="#">  
            <span>DATA LAPORAN</span></a>
    </li>
    <hr class="sidebar-divider my-0">
    <li class="nav-item">
        <a class="nav-link" href="{{route ('laporan')}}">
                <i class="fas fa-paste"></i>
                <span>Laporan</span>
        </a>
    </li>
    @endcan
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->
    {{-- <div class="sidebar-card d-none d-lg-flex">
        <img class="sidebar-card-illustration mb-2" src="../../img/undraw_rocket.svg" alt="...">
        <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
        <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
    </div> --}}

</ul>