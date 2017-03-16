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
                    <li><a href="{{ url('/user/dashboard') }}"><i class="fa fa-home"></i>Dashboard</a>
                    </li>
                    
                    <!-- Employee Sidebar -->
                    @if (!auth()->guest() && auth()->user()->isOfType(2)) 

                    <li><a href="{{ url('/user/profile/' . auth()->user()->id) }}"><i class="fa fa-user"></i>My Profile</a>
                    </li>
                    <li><a href="{{ url('/schedule/') }}"><i class="fa fa-calendar"></i>Schedule</a>

                    <li><a href="{{ url('/user/profile/' . auth()->user()->id) }}"><i class="fa fa-user"></i>View My Profile</a>
                    </li>
                    <li><a href="{{ url('/schedule/' . auth()->user()->id) }}"><i class="fa fa-calendar"></i> My Schedule</a>
                    </li>
                    <li><a><i class="fa fa-user"></i> Time Off<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ url('/time_off/create') }}">Request Time Off</a></li>
                            <li><a href="{{ url('/time_off') }}">View Status of Requests</a></li>
                        </ul>
                    <li><a href="{{ url('/performance_review') }}"><i class="fa fa-book"></i>My Performance Reviews</a>
                    </li>
                    
                    @endif
                    
                    <!-- Administrator Sidebar -->
                    @if (!auth()->guest() && auth()->user()->isOfType(1))   
                     
                    <li><a><i class="fa fa-user"></i> My Profile<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ url('/user/profile/' . auth()->user()->id) }}">View Profile</a></li>
                            
                        </ul>
                    <li><a><i class="fa fa-users"></i> Employees <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ url('/users/create') }}">Add Employee</a></li>
                            <li><a href="{{ url('/users') }}">Manage Employees</a></li>
                        </ul>
                    <li><a><i class="fa fa-calendar"></i> Schedule<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ url('/schedule/create') }}">Create Schedule</a></li>
                            <li><a href="{{ url('/schedule/') }}">View Schedule</a></li>
                        </ul>
                    <li><a><i class="fa fa-clock-o"></i> Time Off<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ url('/time_off/create') }}">Request Time Off</a></li>
                            <li><a href="{{ url('/time_off') }}">Manage Time Off Requests</a></li>
                        </ul>
                    <li><a><i class="fa fa-book"></i> Performance Reviews<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ url('/performance_review/create') }}">Add Performance Review</a></li>
                            <li><a href="{{ url('/performance_review') }}">View Performance Reviews</a></li>
                        </ul>
                    <li><a><i class="fa fa-folder-open"></i> Departments<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ url('/departments/create') }}">Add Department</a></li>
                            <li><a href="{{ url('/departments') }}">Manage Departments</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-briefcase"></i> Job Titles<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ url('/jobtitles/create') }}">Add Job Title</a></li>
                            <li><a href="{{ url('/jobtitles') }}">Manage Job Titles</a></li>
                        </ul>
                    </li>
                    @endif
                   
                </ul>
            </div>
        </div>
        <!-- /sidebar menu -->
        
        
        <!-- /menu footer buttons -->
        
         <!-- Employee Footer -->
                @if (!auth()->guest() && auth()->user()->isOfType(2)) 
                <div class="sidebar-footer hidden-small">
                    <a data-toggle="tooltip" data-placement="top" title="View Schedule">
                        <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="View Tasks">
                        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="About" href="{{ url('/about') }}" >
                        <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ url('/logout') }}">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                    </a>
                </div>
                @endif
        
                            <!-- Administrator Footer -->
                    @if (!auth()->guest() && auth()->user()->isOfType(1))   
                     
                <div class="sidebar-footer hidden-small">
                    <a data-toggle="tooltip" data-placement="top" title="Manage Users" href="{{ url('/users') }}">
                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="View Tasks">
                        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="About" href="{{ url('/about') }}" >
                        <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ url('/logout') }}">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                    </a>
                </div>
                    @endif
        <!-- /menu footer buttons -->
    </div>
</div>