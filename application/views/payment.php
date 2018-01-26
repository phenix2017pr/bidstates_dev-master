<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Bidstates | Admin Dashboard </title>

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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
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
      <form action="" method="POST" id="payment-form" class="form-horizontal">
        <div class="row row-centered">
          <div class="col-md-4 col-md-offset-4">
            <div class="page-header">
              <h2 class="gdfg">Please enter your card credentials</h2>
            </div>
            <noscript>
              <div class="bs-callout bs-callout-danger">
                <h4>JavaScript is not enabled!</h4>
                <p>This payment form requires your browser to have JavaScript enabled. Please activate JavaScript and reload this page. Check <a href="http://enable-javascript.com" target="_blank">enable-javascript.com</a> for more informations.</p>
              </div>
            </noscript>

            <div class="alert alert-danger" id="a_x200" style="display: none;"> <strong>Error!</strong> <span class="payment-errors"></span> </div>
            <span class="payment-success">
  <?= $success ?>
  <?= $error ?>
  </span>
            <fieldset>

              <!-- Form Name -->
              <legend>Billing Details</legend>

              <!-- Street -->
              <div class="form-group">
                <label class="col-sm-4 control-label" for="textinput">Street</label>
                <div class="col-sm-6">
                  <input type="text" name="street" placeholder="Street" class="address form-control">
                </div>
              </div>

              <!-- City -->
              <div class="form-group">
                <label class="col-sm-4 control-label" for="textinput">City</label>
                <div class="col-sm-6">
                  <input type="text" name="city" placeholder="City" class="city form-control">
                </div>
              </div>

              <!-- State -->
              <div class="form-group">
                <label class="col-sm-4 control-label" for="textinput">State</label>
                <div class="col-sm-6">
                  <input type="text" name="state" maxlength="65" placeholder="State" class="state form-control">
                </div>
              </div>

              <!-- Postcal Code -->
              <div class="form-group">
                <label class="col-sm-4 control-label" for="textinput">Postal Code</label>
                <div class="col-sm-6">
                  <input type="text" name="zip" maxlength="9" placeholder="Postal Code" class="zip form-control">
                </div>
              </div>

              <!-- Country -->
              <div class="form-group">
                <label class="col-sm-4 control-label" for="textinput">Country</label>
                <div class="col-sm-6">
                  <!--input type="text" name="country" placeholder="Country" class="country form-control"-->
                  <div class="country bfh-selectbox bfh-countries" name="country" placeholder="Select Country" data-flags="true" data-filter="true"> </div>
                </div>
              </div>

              <!-- Email -->
              <div class="form-group">
                <label class="col-sm-4 control-label" for="textinput">Email</label>
                <div class="col-sm-6">
                  <input type="text" name="email" maxlength="65" placeholder="Email" class="email form-control">
                </div>
              </div>
            </fieldset>
            <fieldset>
              <legend>Card Details</legend>

              <!-- Card Holder Name -->
              <div class="form-group">
                <label class="col-sm-4 control-label"  for="textinput">Card Holder's Name</label>
                <div class="col-sm-6">
                  <input type="text" name="cardholdername" maxlength="70" placeholder="Card Holder Name" class="card-holder-name form-control">
                </div>
              </div>

              <!-- Card Number -->
              <div class="form-group">
                <label class="col-sm-4 control-label" for="textinput">Card Number</label>
                <div class="col-sm-6">
                  <input type="text" id="cardnumber" maxlength="19" placeholder="Card Number" class="card-number form-control">
                </div>
              </div>

              <!-- Expiry-->
              <div class="form-group">
                <label class="col-sm-4 control-label" for="textinput">Card Expiry Date</label>
                <div class="col-sm-6">
                  <div class="form-inline">
                    <select name="select2" data-stripe="exp-month" class="card-expiry-month stripe-sensitive required form-control">
                      <option value="01" selected="selected">01</option>
                      <option value="02">02</option>
                      <option value="03">03</option>
                      <option value="04">04</option>
                      <option value="05">05</option>
                      <option value="06">06</option>
                      <option value="07">07</option>
                      <option value="08">08</option>
                      <option value="09">09</option>
                      <option value="10">10</option>
                      <option value="11">11</option>
                      <option value="12">12</option>
                    </select>
                    <span> / </span>
                    <select name="select2" data-stripe="exp-year" class="card-expiry-year stripe-sensitive required form-control">
                    </select>
                    <script type="text/javascript">
                      jQuery(document).ready(function($) {
                        var select = $(".card-expiry-year"),
                            year = new Date().getFullYear();
                        for (var i = 0; i < 12; i++) {
                          select.append($("<option value='"+(i + year)+"' "+(i === 0 ? "selected" : "")+">"+(i + year)+"</option>"))
                        }
                      });

                    </script>
                  </div>
                </div>
              </div>

              <!-- CVV -->
              <div class="form-group">
                <label class="col-sm-4 control-label" for="textinput">CVV/CVV2</label>
                <div class="col-sm-3">
                  <input type="text" id="cvv" placeholder="CVV" maxlength="4" class="card-cvc form-control">
                </div>
              </div>

              <!-- Important notice -->
              <div class="form-group">
                <div class="panel panel-success">
                  <div class="panel-heading">
                    <h3 class="panel-title">Important notice</h3>
                  </div>
                  <div class="panel-body">
                    <p>Your card will be charged 100$ after trial period.</p>
                    <!-- <p>Your account statement will show the following booking text:
                       XXXXXXX </p>-->
                  </div>
                </div>

                <!-- Submit -->
                <div class="control-group">
                  <div class="controls">
                    <center>
                      <button class="btn btn-success" type="submit">Pay Now</button>
                    </center>
                  </div>
                </div>
            </fieldset>

          </div>
      </form>
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



<?php echo '<script> Stripe.setPublishableKey( "'. $this->config->item('publishable_key') . '");</script>'; ?>
<script>

  // this identifies your website in the createToken call below

  //  Stripe.setPublishableKey('pk_test_FTCj33E13cfQDqtsQqgNStK6');

  function stripeResponseHandler(status, response) {
    if (response.error) {
      // re-enable the submit button
      $('.submit-button').removeAttr("disabled");
      // show hidden div
      document.getElementById('a_x200').style.display = 'block';
      // show the errors on the form
      $(".payment-errors").html(response.error.message);
    } else {
      var form$ = $("#payment-form");
      // token contains id, last4, and card type
      var token = response['id'];
      // insert the token into the form so it gets submitted to the server
      form$.append("<input type='hidden'  name='stripeToken' value='" + token + "' />");
      // and submit
      form$.get(0).submit();
    }
  }
</script>
</body>
</html>











