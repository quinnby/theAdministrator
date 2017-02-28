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
                    <!-- Employee Sidebar -->
                    <li><a href="{{ url('/user_dashboard') }}"><i class="fa fa-home"></i>Dashboard</a>
                    </li>
                    <li><a><i class="fa fa-user"></i> Personal Information<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ url('/user_profile') }}">View Profile</a></li>
                            <li><a href="{{ url('/edit_user_profile') }}">Edit Profile</a></li>
                        </ul>
                     <li><a><i class="fa fa-user"></i> Time Off<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ url('/request_time_off') }}">Request Time Off</a></li>
                            <li><a href="{{ url('/view_time_off') }}">View Time Off Requests</a></li>
                        </ul>
                        
                     <!-- Administrator Sidebar -->
                     <li><a><i class="fa fa-users"></i> Administrator <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ url('/manage_users') }}">Manage Users</a></li>
                            <li><a href="{{ url('/manage_departments') }}">Manage Departments</a></li>
                            <li><a href="{{ url('/manage_security') }}">Manage Security</a></li>
                        </ul>
                    </li>
                    
                      <!-- Administrator Sidebar -->
                    <li><a><i class="fa fa-user"></i> Performance Reviews<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ url('/create_performance_review') }}">Add Performance Review</a></li>
                            <li><a href="{{ url('/') }}">View Performance Reviews</a></li>
                        </ul>
                    </li>
                    
                    
                    
                    
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