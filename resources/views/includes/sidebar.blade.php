<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="{{ url('/') }}" class="site_title"><i class="fa fa-user"></i> <span>The Administrator</span></a>
        </div>
        
        <div class="clearfix"></div>
        
        <!-- menu profile quick info -->
        <div class="profile">
            <div class="profile_pic">
                <img src="{{ Gravatar::src(Auth::user()->email) }}" alt="Avatar of {{ Auth::user()->name }}" class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Welcome,</span>
                <h2>{{ Auth::user()->name }}</h2>
            </div>
        </div>
        <!-- /menu profile quick info -->
        
        <br/>
        
        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <br/><br/>
                <ul class="nav side-menu">
                    <br/>
                    @if (!auth()->guest() && auth()->user()->isOfType(1))   
                    <!-- Employee Sidebar -->
                    <li><a href="{{ url('/user/dashboard') }}"><i class="fa fa-home"></i>Dashboard</a>
                    </li>
                    <li><a><i class="fa fa-user"></i> Personal Information<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ url('/user/profile/' . auth()->user()->id) }}">View Profile</a></li>
                            <li><a href="{{ url('/user/profile/' . auth()->user()->id) . '/edit' }}">Edit Profile</a></li>
                        </ul>
                     <li><a><i class="fa fa-user"></i> Time Off<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ url('/time_off/create') }}">Request Time Off</a></li>
                            <li><a href="{{ url('/time_off') }}">View Time Off Requests</a></li>
                        </ul>
                    @endif
                    
                     @if (!auth()->guest() && auth()->user()->isOfType(1))   
                     <!-- Administrator Sidebar -->
                     <li><a><i class="fa fa-users"></i> Employees <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ url('/users/create') }}">Add Employee</a></li>
                            <li><a href="{{ url('/users') }}">Manage Employees</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-pencil"></i> Performance Reviews<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ url('/performance_review/create') }}">Add Performance Review</a></li>
                            <li><a href="{{ url('/performance_review') }}">View Performance Reviews</a></li>
                        </ul>
                    </li>
                    @endif
                   
                </ul>
            </div>
        </div>
        <!-- /sidebar menu -->
        
        
        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="About" href="{{ url('/about') }}" >
                <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ url('/logout') }}">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>