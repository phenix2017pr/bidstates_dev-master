<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bidstates | Admin Dashboard </title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url(); ?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url(); ?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url(); ?>assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?php echo base_url(); ?>assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="<?php echo base_url(); ?>assets/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="<?php echo base_url(); ?>assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="<?php echo base_url(); ?>assets/build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="#" class="site_title"><i class="fa fa-paw"></i> <span>Gentellela Alela!</span></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile">
                    <div class="profile_pic">
                        <img src="images/img.jpg" alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Welcome,</span>
                        <h2>Admin User</h2>
                    </div>
                </div>


                <!-- side bar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <h3>General</h3>
                        <ul class="nav side-menu">
                            <li>
                                <a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="<?php echo base_url();?>admin/dashboard">Dashboard</a></li>
                                </ul>
                            </li>
                            <li class="active">
                                <a><i class="fa fa-edit"></i> Manage Accounts <span
                                        class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu" style="display: block;">
                                    <li><a href="<?php echo base_url(); ?>admin/accounts">Manage Contractor</a></li>
                                    <li><a href="<?php echo base_url(); ?>admin/addContractor">Add Contractor</a></li>
                                    <li><a href="<?php echo base_url(); ?>admin/customers">Manage Customer</a></li>
                                    <li><a href="<?php echo base_url(); ?>admin/addCustomer">Add Customer</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>

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
                    <a href="<?php echo base_url(); ?>logout" data-toggle="tooltip" data-placement="top" title="Logout">
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
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                               aria-expanded="false">
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
                                <li><a href="<?php echo base_url(); ?>logout"><i class="fa fa-sign-out pull-right"></i>
                                        Log Out</a></li>
                            </ul>
                        </li>

                        <li role="presentation" class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown"
                               aria-expanded="false">
                                <i class="fa fa-envelope-o"></i>
                                <span class="badge bg-green">6</span>
                            </a>
                            <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                                <li>
                                    <a>
                                        <span class="image"><img src="images/img.jpg" alt="Profile Image"/></span>
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
                                        <span class="image"><img src="images/img.jpg" alt="Profile Image"/></span>
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
                                        <span class="image"><img src="images/img.jpg" alt="Profile Image"/></span>
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
                                        <span class="image"><img src="images/img.jpg" alt="Profile Image"/></span>
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
            <?php
            echo $body;
            ?>
        </div>

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
<script src="<?php echo base_url(); ?>assets/vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url(); ?>assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>assets/vendors/fastclick/lib/fastclick.js"></script>

<script src="<?php echo base_url();?>assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url();?>assets/vendors/iCheck/icheck.min.js"></script>
<!-- Skycons -->
<script src="<?php echo base_url();?>assets/vendors/skycons/skycons.js"></script>
<!-- Flot -->
<script src="<?php echo base_url();?>assets/vendors/Flot/jquery.flot.js"></script>
<script src="<?php echo base_url();?>assets/vendors/Flot/jquery.flot.pie.js"></script>
<script src="<?php echo base_url();?>assets/vendors/Flot/jquery.flot.time.js"></script>
<script src="<?php echo base_url();?>assets/vendors/Flot/jquery.flot.stack.js"></script>
<script src="<?php echo base_url();?>assets/vendors/Flot/jquery.flot.resize.js"></script>
<!-- Flot plugins -->
<script src="<?php echo base_url();?>assets/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
<script src="<?php echo base_url();?>assets/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
<script src="<?php echo base_url();?>assets/vendors/flot.curvedlines/curvedLines.js"></script>
<!-- DateJS -->
<script src="<?php echo base_url();?>assets/vendors/DateJS/build/date.js"></script>
<!-- JQVMap -->
<script src="<?php echo base_url();?>assets/vendors/jqvmap/dist/jquery.vmap.js"></script>
<script src="<?php echo base_url();?>assets/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
<script src="<?php echo base_url();?>assets/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>




<!-- bootstrap-daterangepicker -->
<script src="<?php echo base_url(); ?>assets/vendors/moment/moment.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

<!-- Custom Theme Scripts -->
<script src="<?php echo base_url(); ?>assets/build/js/custom.min.js"></script>

<script src="<?php echo base_url();?>assets/js/jquery.validate.min.js"></script>
<script src="<?php echo base_url();?>assets/js/bs-login.js"></script>
<script src="<?php echo base_url();?>assets/backend/user.js"></script>
<script src="<?php echo base_url();?>assets/js/bs-forgot-password.js"></script>
<script src="<?php echo base_url();?>assets/js/bs-reset-password.js"></script>
<script src="<?php echo base_url();?>assets/js/bs-account-update.js"></script>
<script src="<?php echo base_url();?>assets/js/bs-settings-update.js"></script>
<script src="<?php echo base_url();?>assets/js/bs-preferences-update.js"></script>
<script src="<?php echo base_url();?>assets/js/bs-search-profile.js"></script>
<script src="<?php echo base_url();?>assets/js/owl.carousel.min.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.matchHeight-min.js"></script>
<script src="<?php echo base_url();?>assets/js/hideMaxListItem.js"></script>
<script src="<?php echo base_url();?>assets/plugins/jquery.fs.scroller/jquery.fs.scroller.js"></script>
<script src="<?php echo base_url();?>assets/plugins/jquery.fs.selecter/jquery.fs.selecter.js"></script>

<script>
    var baseurl = "<?php echo base_url();?>";
</script>
</body>
</html>
