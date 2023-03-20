<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('user.dashboard')}}" class="brand-link">
        <img src="{{asset('adminlte/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">
            <span>Poll Game</span>
        </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('adminlte/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">
                    {{Auth::user()->name}}
                </a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{route('user.dashboard')}}" class="nav-link @if ($navItem == 'dashboard')
                        active
                    @endif">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item @if($navItem == "user-list" || $navItem == "user-create" ) menu-is-opening menu-open @endif">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user-alt"></i>
                        <p>
                            Users
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('user.index')}}" class="nav-link @if($navItem == "user-list") active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Users List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('user.create')}}" class="nav-link @if($navItem == "user-create") active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item @if($navItem == "sports-list" || $navItem == "sports-create" ) menu-is-opening menu-open @endif">
                    <a href="#" class="nav-link">
                       <i class="nav-icon fa-solid fa-person-running"></i>
                        <p>
                            Sports
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('sports.index')}}" class="nav-link @if($navItem == "sports-list") active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sports List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('sports.create')}}" class="nav-link @if($navItem == "sports-create") active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item @if($navItem == "tournament-list" || $navItem == "tournament-create" ) menu-is-opening menu-open @endif">
                    <a href="#" class="nav-link">
                       <i class="nav-icon fa-solid fa-trophy"></i>
                        <p>
                            Tournament
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('tournament.index')}}" class="nav-link @if($navItem == "tournament-list") active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tournaments List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('tournament.create')}}" class="nav-link @if($navItem == "tournament-create") active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item @if($navItem == "team-list" || $navItem == "team-create" ) menu-is-opening menu-open @endif">
                    <a href="#" class="nav-link">
                       <i class="nav-icon fa-solid fa-people-group"></i>
                        <p>
                            Teams
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('team.index')}}" class="nav-link @if($navItem == "team-list") active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Team List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('team.create')}}" class="nav-link @if($navItem == "team-create") active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item @if($navItem == "match-list" || $navItem == "match-create" ) menu-is-opening menu-open @endif">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa-solid fa-fire-flame-curved"></i>
                        <p>
                            Match
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('match.index')}}" class="nav-link @if($navItem == "match-list") active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Match List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('match.create')}}" class="nav-link @if($navItem == "match-create") active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item @if($navItem == "poll-list" || $navItem == "poll-create" ) menu-is-opening menu-open @endif">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa-solid fa-dice"></i>
                        <p>
                            Poll
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('poll.index')}}" class="nav-link @if($navItem == "poll-list") active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Poll List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('poll.create')}}" class="nav-link @if($navItem == "poll-create") active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
