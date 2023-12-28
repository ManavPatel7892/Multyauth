<!-- Main left sidebar menu -->
<div id="left-sidebar" class="sidebar">
    <a href="#" class="menu_toggle"><i class="fa fa-angle-left" style="margin-top: 7px;"></i></a>
    <div class="navbar-brand">
        <a href="index.html"><img src="{{asset('assets/images/icon.svg')}}" alt="Mooli Logo" class="img-fluid logo"><span>Mooli</span></a>
        <button type="button" class="btn-toggle-offcanvas btn btn-sm float-right"><i class="fa fa-close"></i></button>
    </div>
    <div class="sidebar-scroll">
        <div class="user-account">
            <div class="user_div">
                <img src="{{asset('assets/images/user.png')}}" class="user-photo" alt="User Profile Picture">
            </div>
            <div class="dropdown">
                <span>Web Developer,</span>
                <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown"><strong>{{ Auth::user()->name; }}</strong></a>
                <ul class="dropdown-menu dropdown-menu-right account vivify flipInY">
                    {{-- <li><a href="page-profile.html"><i class="fa fa-user"></i>My Profile</a></li> --}}
                    <div class="mt-3 space-y-1">
                        <x-responsive-nav-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-responsive-nav-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-responsive-nav-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-responsive-nav-link>
                        </form>
                    </div>
                </ul>
            </div>
        </div>
        <nav id="left-sidebar-nav" class="sidebar-nav">
            <ul id="main-menu" class="metismenu animation-li-delay">
                <li class="header">Main</li>
                <?php
                     if(Auth::id()){
                        $role=Auth()->user()->role;

                        if($role=='superadmin')
                        {
                            return view('user.user');
                            return view('admin.admin');
                        }
                        else if($role=='admin')
                        {
                            return view('user.user');
                        }
                        else
                        {
                            return redirect()->back();
                        }
                    }
                ?>
                <li class="active"><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
                <li><a href="{{route('user')}}"><i class="fa fa-comments"></i> <span>Users</span></a></li>
                <li><a href="{{route('admin')}}"><i class="fa fa-comments"></i> <span>Admin</span></a></li>
            </ul>
    </div>
</div>
