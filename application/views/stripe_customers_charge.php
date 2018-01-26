<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bidstates | Admin Dashboard </title>

    <!--  <link rel="stylesheet" href="--><?php //echo base_url();?><!--assets/bootstrap/css/bootstrap-min.css">-->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap/css/bootstrap-formhelpers-min.css" media="screen">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap/css/bootstrapValidator-min.css"/>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/font-awesome.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap/css/bootstrap-side-notes.css" />
    <!-- Bootstrap -->
    <link href="<?php echo base_url();?>/assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url();?>/assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url();?>/assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?php echo base_url();?>/assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="<?php echo base_url();?>/assets/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="<?php echo base_url();?>/assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>/assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>/assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>/assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>/assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
     
    <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap-min.js"></script>
    <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap-formhelpers-min.js"></script>
    <script src="<?php echo base_url();?>assets/js/stripe_validate.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/bootstrap/js/bootstrapValidator-min.js"></script>
    <!-- Custom Theme Style -->
    <link href="<?php echo base_url();?>/assets/build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="#" class="site_title"><i class="fa fa-paw"></i> <span>Bidstates</span></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile">
                    <div class="profile_pic">
                        <img src="images/img.jpg" alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Welcome,</span>
                        <h2>Admin</h2>
                    </div>
                </div>
                <!-- /menu profile quick info -->

                <br />

                <!-- sidebar menu -->


                <?php include "backend/sidebar-menu.php" ?>


                <!-- /sidebar menu -->

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
                    <a data-toggle="tooltip" data-placement="top" title="Logout">
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
                                <img src="images/img.jpg" alt="">Team Admine
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
                                <li> <a href="<?php echo base_url(); ?>admin/logout"><i class="fa fa-sign-out pull-right"></i>Log Out</a></li></li>
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

            <table class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline" style="margin-bottom: 0!important;">
                <thead>
                <tr>
                    <th>id</th>
                    <th>customer</th>
                    <th>Description</th>
                    <th>Amount</th>
                    <th>Currency</th>
                    <th>Paid</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach($stripe_customers_charge["data"] as  $customer){ ?>
                    <tr>
                        <td><?php echo $customer->id ?></td>
                        <td><?php echo $customer->customer ?></td>
                        <td><?php echo $customer->description ?></td>
                        <td><?php echo $customer->amount ?></td>
                        <td><?php echo $customer->currency ?></td>
                        <td><?php echo $customer->paid ?></td>
                    </tr>
                <?php } ?>

                </tbody>
            </table>

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
<script src="<?php echo base_url();?>/assets/vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url();?>/assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>/assets/vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="<?php echo base_url();?>/assets/vendors/nprogress/nprogress.js"></script>
<!-- Chart.js -->
<script src="<?php echo base_url();?>/assets/vendors/Chart.js/dist/Chart.min.js"></script>
<!-- gauge.js -->
<script src="<?php echo base_url();?>/assets/vendors/gauge.js/dist/gauge.min.js"></script>



<!-- Custom Theme Scripts -->
<script src="<?php echo base_url();?>/assets/build/js/custom.min.js"></script>

<!-- Datatables -->
<script src="<?php echo base_url();?>/assets/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>/assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url();?>/assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url();?>/assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="<?php echo base_url();?>/assets/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="<?php echo base_url();?>/assets/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url();?>/assets/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url();?>/assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="<?php echo base_url();?>/assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="<?php echo base_url();?>/assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url();?>/assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="<?php echo base_url();?>/assets/vendors/datatables.net-scroller/js/datatables.scroller.min.js"></script>
<script src="<?php echo base_url();?>/assets/vendors/jszip/dist/jszip.min.js"></script>
<script src="<?php echo base_url();?>/assets/vendors/pdfmake/build/pdfmake.min.js"></script>
<script src="<?php echo base_url();?>/assets/vendors/pdfmake/build/vfs_fonts.js"></script>


</body>
</html>