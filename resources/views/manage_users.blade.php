@extends('layouts.blank')

@push('stylesheets')
    <!-- Example -->
    <!--<link href=" <link href="{{ asset("css/myFile.min.css") }}" rel="stylesheet">" rel="stylesheet">-->
@endpush

@section('main_container')
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>The Administrator || Users</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">


            <br />

        
            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/img.jpg" alt="">John Doe
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Profile</a></li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Help</a></li>
                    <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Contacts Design</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_content">
                    <div class="row">
                      <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                        <ul class="pagination pagination-split">
                          <li><a href="#">A</a></li>
                          <li><a href="#">B</a></li>
                          <li><a href="#">C</a></li>
                          <li><a href="#">D</a></li>
                          <li><a href="#">E</a></li>
                          <li>...</li>
                          <li><a href="#">W</a></li>
                          <li><a href="#">X</a></li>
                          <li><a href="#">Y</a></li>
                          <li><a href="#">Z</a></li>
                        </ul>
                      </div>

                      <div class="clearfix"></div>

                      <div class="col-md-4 col-sm-4 col-xs-12 profile_details">
                        <div class="well profile_view">
                          <div class="col-sm-12">
                            <h4 class="brief"><i>Digital Strategist</i></h4>
                            <div class="left col-xs-7">
                              <h2>Nicole Pearson</h2>
                              <p><strong>About: </strong> Web Designer / UX / Graphic Artist / Coffee Lover </p>
                              <ul class="list-unstyled">
                                <li><i class="fa fa-building"></i> Address: </li>
                                <li><i class="fa fa-phone"></i> Phone #: </li>
                              </ul>
                            </div>
                            <div class="right col-xs-5 text-center">
                              <img src="images/img.jpg" alt="" class="img-circle img-responsive">
                            </div>
                          </div>
                          <div class="col-xs-12 bottom text-center">
                            <div class="col-xs-12 col-sm-6 emphasis">
                              <p class="ratings">
                                <a>4.0</a>
                                <a href="#"><span class="fa fa-star"></span></a>
                                <a href="#"><span class="fa fa-star"></span></a>
                                <a href="#"><span class="fa fa-star"></span></a>
                                <a href="#"><span class="fa fa-star"></span></a>
                                <a href="#"><span class="fa fa-star-o"></span></a>
                              </p>
                            </div>
                            <div class="col-xs-12 col-sm-6 emphasis">
                              <button type="button" class="btn btn-success btn-xs"> <i class="fa fa-user">
                                </i> <i class="fa fa-comments-o"></i> </button>
                              <button type="button" class="btn btn-primary btn-xs">
                                <i class="fa fa-user"> </i> View Profile
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-4 col-sm-4 col-xs-12 profile_details">
                        <div class="well profile_view">
                          <div class="col-sm-12">
                            <h4 class="brief"><i>Digital Strategist</i></h4>
                            <div class="left col-xs-7">
                              <h2>Nicole Pearson</h2>
                              <p><strong>About: </strong> Web Designer / UI. </p>
                              <ul class="list-unstyled">
                                <li><i class="fa fa-building"></i> Address: </li>
                                <li><i class="fa fa-phone"></i> Phone #: </li>
                              </ul>
                            </div>
                            <div class="right col-xs-5 text-center">
                              <img src="images/user.png" alt="" class="img-circle img-responsive">
                            </div>
                          </div>
                          <div class="col-xs-12 bottom text-center">
                            <div class="col-xs-12 col-sm-6 emphasis">
                              <p class="ratings">
                                <a>4.0</a>
                                <a href="#"><span class="fa fa-star"></span></a>
                                <a href="#"><span class="fa fa-star"></span></a>
                                <a href="#"><span class="fa fa-star"></span></a>
                                <a href="#"><span class="fa fa-star"></span></a>
                                <a href="#"><span class="fa fa-star-o"></span></a>
                              </p>
                            </div>
                            <div class="col-xs-12 col-sm-6 emphasis">
                              <button type="button" class="btn btn-success btn-xs"> <i class="fa fa-user">
                                </i> <i class="fa fa-comments-o"></i> </button>
                              <button type="button" class="btn btn-primary btn-xs">
                                <i class="fa fa-user"> </i> View Profile
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-4 col-sm-4 col-xs-12 profile_details">
                        <div class="well profile_view">
                          <div class="col-sm-12">
                            <h4 class="brief"><i>Digital Strategist</i></h4>
                            <div class="left col-xs-7">
                              <h2>Nicole Pearson</h2>
                              <p><strong>About: </strong> Web Designer / UI. </p>
                              <ul class="list-unstyled">
                                <li><i class="fa fa-building"></i> Address: </li>
                                <li><i class="fa fa-phone"></i> Phone #: </li>
                              </ul>
                            </div>
                            <div class="right col-xs-5 text-center">
                              <img src="images/user.png" alt="" class="img-circle img-responsive">
                            </div>
                          </div>
                          <div class="col-xs-12 bottom text-center">
                            <div class="col-xs-12 col-sm-6 emphasis">
                              <p class="ratings">
                                <a>4.0</a>
                                <a href="#"><span class="fa fa-star"></span></a>
                                <a href="#"><span class="fa fa-star"></span></a>
                                <a href="#"><span class="fa fa-star"></span></a>
                                <a href="#"><span class="fa fa-star"></span></a>
                                <a href="#"><span class="fa fa-star-o"></span></a>
                              </p>
                            </div>
                            <div class="col-xs-12 col-sm-6 emphasis">
                              <button type="button" class="btn btn-success btn-xs"> <i class="fa fa-user">
                                </i> <i class="fa fa-comments-o"></i> </button>
                              <button type="button" class="btn btn-primary btn-xs">
                                <i class="fa fa-user"> </i> View Profile
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-4 col-sm-4 col-xs-12 profile_details">
                        <div class="well profile_view">
                          <div class="col-sm-12">
                            <h4 class="brief"><i>Digital Strategist</i></h4>
                            <div class="left col-xs-7">
                              <h2>Nicole Pearson</h2>
                              <p><strong>About: </strong> Web Designer / UI. </p>
                              <ul class="list-unstyled">
                                <li><i class="fa fa-building"></i> Address: </li>
                                <li><i class="fa fa-phone"></i> Phone #: </li>
                              </ul>
                            </div>
                            <div class="right col-xs-5 text-center">
                              <img src="images/user.png" alt="" class="img-circle img-responsive">
                            </div>
                          </div>
                          <div class="col-xs-12 bottom text-center">
                            <div class="col-xs-12 col-sm-6 emphasis">
                              <p class="ratings">
                                <a>4.0</a>
                                <a href="#"><span class="fa fa-star"></span></a>
                                <a href="#"><span class="fa fa-star"></span></a>
                                <a href="#"><span class="fa fa-star"></span></a>
                                <a href="#"><span class="fa fa-star"></span></a>
                                <a href="#"><span class="fa fa-star-o"></span></a>
                              </p>
                            </div>
                            <div class="col-xs-12 col-sm-6 emphasis">
                              <button type="button" class="btn btn-success btn-xs"> <i class="fa fa-user">
                                </i> <i class="fa fa-comments-o"></i> </button>
                              <button type="button" class="btn btn-primary btn-xs">
                                <i class="fa fa-user"> </i> View Profile
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                      
                      <div class="col-md-4 col-sm-4 col-xs-12 profile_details">
                        <div class="well profile_view">
                          <div class="col-sm-12">
                            <h4 class="brief"><i>Digital Strategist</i></h4>
                            <div class="left col-xs-7">
                              <h2>Nicole Pearson</h2>
                              <p><strong>About: </strong> Web Designer / UX / Graphic Artist / Coffee Lover </p>
                              <ul class="list-unstyled">
                                <li><i class="fa fa-building"></i> Address: </li>
                                <li><i class="fa fa-phone"></i> Phone #: </li>
                              </ul>
                            </div>
                            <div class="right col-xs-5 text-center">
                              <img src="images/img.jpg" alt="" class="img-circle img-responsive">
                            </div>
                          </div>
                          <div class="col-xs-12 bottom text-center">
                            <div class="col-xs-12 col-sm-6 emphasis">
                              <p class="ratings">
                                <a>4.0</a>
                                <a href="#"><span class="fa fa-star"></span></a>
                                <a href="#"><span class="fa fa-star"></span></a>
                                <a href="#"><span class="fa fa-star"></span></a>
                                <a href="#"><span class="fa fa-star"></span></a>
                                <a href="#"><span class="fa fa-star-o"></span></a>
                              </p>
                            </div>
                            <div class="col-xs-12 col-sm-6 emphasis">
                              <button type="button" class="btn btn-success btn-xs"> <i class="fa fa-user">
                                </i> <i class="fa fa-comments-o"></i> </button>
                              <button type="button" class="btn btn-primary btn-xs">
                                <i class="fa fa-user"> </i> View Profile
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-4 col-sm-4 col-xs-12 profile_details">
                        <div class="well profile_view">
                          <div class="col-sm-12">
                            <h4 class="brief"><i>Digital Strategist</i></h4>
                            <div class="left col-xs-7">
                              <h2>Nicole Pearson</h2>
                              <p><strong>About: </strong> Web Designer / UI. </p>
                              <ul class="list-unstyled">
                                <li><i class="fa fa-building"></i> Address: </li>
                                <li><i class="fa fa-phone"></i> Phone #: </li>
                              </ul>
                            </div>
                            <div class="right col-xs-5 text-center">
                              <img src="images/user.png" alt="" class="img-circle img-responsive">
                            </div>
                          </div>
                          <div class="col-xs-12 bottom text-center">
                            <div class="col-xs-12 col-sm-6 emphasis">
                              <p class="ratings">
                                <a>4.0</a>
                                <a href="#"><span class="fa fa-star"></span></a>
                                <a href="#"><span class="fa fa-star"></span></a>
                                <a href="#"><span class="fa fa-star"></span></a>
                                <a href="#"><span class="fa fa-star"></span></a>
                                <a href="#"><span class="fa fa-star-o"></span></a>
                              </p>
                            </div>
                            <div class="col-xs-12 col-sm-6 emphasis">
                              <button type="button" class="btn btn-success btn-xs"> <i class="fa fa-user">
                                </i> <i class="fa fa-comments-o"></i> </button>
                              <button type="button" class="btn btn-primary btn-xs">
                                <i class="fa fa-user"> </i> View Profile
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-4 col-sm-4 col-xs-12 profile_details">
                        <div class="well profile_view">
                          <div class="col-sm-12">
                            <h4 class="brief"><i>Digital Strategist</i></h4>
                            <div class="left col-xs-7">
                              <h2>Nicole Pearson</h2>
                              <p><strong>About: </strong> Web Designer / UI. </p>
                              <ul class="list-unstyled">
                                <li><i class="fa fa-building"></i> Address: </li>
                                <li><i class="fa fa-phone"></i> Phone #: </li>
                              </ul>
                            </div>
                            <div class="right col-xs-5 text-center">
                              <img src="images/user.png" alt="" class="img-circle img-responsive">
                            </div>
                          </div>
                          <div class="col-xs-12 bottom text-center">
                            <div class="col-xs-12 col-sm-6 emphasis">
                              <p class="ratings">
                                <a>4.0</a>
                                <a href="#"><span class="fa fa-star"></span></a>
                                <a href="#"><span class="fa fa-star"></span></a>
                                <a href="#"><span class="fa fa-star"></span></a>
                                <a href="#"><span class="fa fa-star"></span></a>
                                <a href="#"><span class="fa fa-star-o"></span></a>
                              </p>
                            </div>
                            <div class="col-xs-12 col-sm-6 emphasis">
                              <button type="button" class="btn btn-success btn-xs"> <i class="fa fa-user">
                                </i> <i class="fa fa-comments-o"></i> </button>
                              <button type="button" class="btn btn-primary btn-xs">
                                <i class="fa fa-user"> </i> View Profile
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-4 col-sm-4 col-xs-12 profile_details">
                        <div class="well profile_view">
                          <div class="col-sm-12">
                            <h4 class="brief"><i>Digital Strategist</i></h4>
                            <div class="left col-xs-7">
                              <h2>Nicole Pearson</h2>
                              <p><strong>About: </strong> Web Designer / UI. </p>
                              <ul class="list-unstyled">
                                <li><i class="fa fa-building"></i> Address: </li>
                                <li><i class="fa fa-phone"></i> Phone #: </li>
                              </ul>
                            </div>
                            <div class="right col-xs-5 text-center">
                              <img src="images/user.png" alt="" class="img-circle img-responsive">
                            </div>
                          </div>
                          <div class="col-xs-12 bottom text-center">
                            <div class="col-xs-12 col-sm-6 emphasis">
                              <p class="ratings">
                                <a>4.0</a>
                                <a href="#"><span class="fa fa-star"></span></a>
                                <a href="#"><span class="fa fa-star"></span></a>
                                <a href="#"><span class="fa fa-star"></span></a>
                                <a href="#"><span class="fa fa-star"></span></a>
                                <a href="#"><span class="fa fa-star-o"></span></a>
                              </p>
                            </div>
                            <div class="col-xs-12 col-sm-6 emphasis">
                              <button type="button" class="btn btn-success btn-xs"> <i class="fa fa-user">
                                </i> <i class="fa fa-comments-o"></i> </button>
                              <button type="button" class="btn btn-primary btn-xs">
                                <i class="fa fa-user"> </i> View Profile
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-4 col-sm-4 col-xs-12 profile_details">
                        <div class="well profile_view">
                          <div class="col-sm-12">
                            <h4 class="brief"><i>Digital Strategist</i></h4>
                            <div class="left col-xs-7">
                              <h2>Nicole Pearson</h2>
                              <p><strong>About: </strong> Web Designer / UI. </p>
                              <ul class="list-unstyled">
                                <li><i class="fa fa-building"></i> Address: </li>
                                <li><i class="fa fa-phone"></i> Phone #: </li>
                              </ul>
                            </div>
                            <div class="right col-xs-5 text-center">
                              <img src="images/user.png" alt="" class="img-circle img-responsive">
                            </div>
                          </div>
                          <div class="col-xs-12 bottom text-center">
                            <div class="col-xs-12 col-sm-6 emphasis">
                              <p class="ratings">
                                <a>4.0</a>
                                <a href="#"><span class="fa fa-star"></span></a>
                                <a href="#"><span class="fa fa-star"></span></a>
                                <a href="#"><span class="fa fa-star"></span></a>
                                <a href="#"><span class="fa fa-star"></span></a>
                                <a href="#"><span class="fa fa-star-o"></span></a>
                              </p>
                            </div>
                            <div class="col-xs-12 col-sm-6 emphasis">
                              <button type="button" class="btn btn-success btn-xs"> <i class="fa fa-user">
                                </i> <i class="fa fa-comments-o"></i> </button>
                              <button type="button" class="btn btn-primary btn-xs">
                                <i class="fa fa-user"> </i> View Profile
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
<!-- Google Analytics -->
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-23581568-13', 'auto');
ga('send', 'pageview');

</script>
  </body>
</html>