<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.html">
<link rel="shortcut icon" href="assets/ico/favicon.png">
<title><?php echo $page_title;?> | Bidstates</title>
<!-- include top header -->
<?php include 'includes_top.php';?>
 <script type="text/javascript">
var baseurl = '<?php echo base_url();?>';
</script>
</head>
<body>
<div id="wrapper">
  <div class="header">
    <div class="container">
      <nav class="navbar navbar-site navbar-default" role="navigation">
        <div class="navbar-header">
          <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          <a href="account-home.html" class="navbar-brand logo logo-title"> <a href="#" class="navbar-brand logo logo-title"><img src="<?php echo base_url();?>images/blue-white.png"></a>
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="<?php echo base_url();?>login/logout">Signout <i class="glyphicon glyphicon-off"></i> </a></li>
              <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <span> <?php echo $user_info["company_name"]; ?></span> <i class="icon-user fa"></i> <i class=" icon-down-open-big fa"></i></a>
                <ul class="dropdown-menu user-menu">
                  <li class="active"><a href="<?php echo base_url().$this->session->userdata('login_type');?>/dashboard"><i class="icon-home"></i> Personal Home </a></li>
                  <li><a href="<?php echo base_url().$this->session->userdata('login_type');?>/profile/<?php  echo $user_info["username"]; ?>"><i class="icon-th-thumb"></i> Business Profile </a></li>
                  <li><a href="#"><i class="icon-heart"></i> Current Ads </a></li>
                  <li><a href="#"><i class="icon-star-circled"></i> Suspended Ads </a></li>
                  <li><a href="#"><i class="icon-folder-close"></i>Saved Searches</a></li>
                  <li><a href="#"><i class="icon-hourglass"></i>Suspended Ads </a></li>
                  <li><a href="#"><i class=" icon-money "></i> Submitted Ads </a></li>
                  <!--<li><a href="account-myads.html"><i class="icon-th-thumb"></i> My ads </a></li>
<li><a href="account-favourite-ads.html"><i class="icon-heart"></i> Favourite ads </a></li>
<li><a href="account-saved-search.html"><i class="icon-star-circled"></i> Saved search </a></li>
<li><a href="account-archived-ads.html"><i class="icon-folder-close"></i> Archived ads </a></li>
<li><a href="account-pending-approval-ads.html"><i class="icon-hourglass"></i> Pending approval </a></li>
<li><a href="statements.html"><i class=" icon-money "></i> Payment history </a></li>-->
                </ul>
              </li>
              <!--<li class="postadd"><a class="btn btn-block   btn-border btn-post btn-danger" href="post-ads.html">View Public Profile</a></li>-->
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </div>
  <div class="main-container">
    <div class="container">
      <div class="row">
        <div class="col-sm-3 page-sidebar">
          <aside>
            <div class="inner-box">
              <div class="user-panel-sidebar">
                <div class="collapse-box">
                  <h5 class="collapse-title no-border"> Management<a href="#MyClassified" data-toggle="collapse" class="pull-right"><i class="fa fa-angle-down"></i></a></h5>
                  <div class="panel-collapse collapse in" id="MyClassified">
                    <ul class="acc-list">
                      <li><a class="active" href="account-home.html"><i class="icon-home"></i> My Dashboard</a></li>
                    </ul>
                  </div>
                </div>
                <div class="collapse-box">
                  <h5 class="collapse-title"> BidStates Services <a href="#MyAds" data-toggle="collapse" class="pull-right"><i class="fa fa-angle-down"></i></a></h5>
                  <div class="panel-collapse collapse in" id="MyAds">
                    <ul class="acc-list">
                      <!--<li><a href="account-myads.html"><i class="icon-docs"></i> My ads <span class="badge">42</span> </a></li>
<li><a href="account-favourite-ads.html"><i class="icon-heart"></i> Favourite ads <span class="badge">42</span> </a></li>
<li><a href="account-saved-search.html"><i class="icon-star-circled"></i> Saved search <span class="badge">42</span> </a></li>
<li><a href="account-archived-ads.html"><i class="icon-folder-close"></i> Archived ads <span class="badge">42</span></a></li>
<li><a href="account-pending-approval-ads.html"><i class="icon-hourglass"></i> Pending approval <span class="badge">42</span></a></li>-->
                      <li><a href="#"><i class="icon-docs"></i> Public Business Profile<span class="badge">42</span> </a></li>
                      <li><a href="#"><i class="icon-heart"></i> Current Ads <span class="badge">42</span> </a></li>
                      <li><a href="#"><i class="icon-star-circled"></i> Saved searches <span class="badge">42</span> </a></li>
                      <li><a href="#"><i class="icon-folder-close"></i> Suspended Ads <span class="badge">42</span></a></li>
                      <li><a href="#"><i class="icon-hourglass"></i> Submitted Ads <span class="badge">42</span></a></li>
                    </ul>
                  </div>
                </div>
                <div class="collapse-box">
                  <h5 class="collapse-title"> Terminate Account <a href="#TerminateAccount" data-toggle="collapse" class="pull-right"><i class="fa fa-angle-down"></i></a></h5>
                  <div class="panel-collapse collapse in" id="TerminateAccount">
                    <ul class="acc-list">
                      <!--<li><a href="account-close.html"><i class="icon-cancel-circled "></i> Close account </a></li>-->
                      <li><a href="#"><i class="icon-cancel-circled "></i> Close account </a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </aside>
        </div>
        <div class="col-sm-9 page-content">
          <div class="inner-box">
            <div class="row">
              <div class="col-md-5 col-xs-4 col-xxs-12">
                <h3 class="no-padding text-center-480 useradmin"><a href="#"><img class="userImg" src="<?php echo base_url();?>images/user.jpg" alt="user"> <?php echo $user_info["company_name"]; ?> </a> </h3>
              </div>
              <div class="col-md-7 col-xs-8 col-xxs-12">
                <div class="header-data text-center-xs">
                  <div class="hdata">
                    <div class="mcol-left"> <i class="fa fa-eye ln-shadow"></i> </div>
                    <div class="mcol-right">
                      <p><a href="#">7000</a> <em>views</em></p>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="hdata">
                    <div class="mcol-left"> <i class="icon-th-thumb ln-shadow"></i> </div>
                    <div class="mcol-right">
                      <p><a href="#">12</a><em>Ads</em></p>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="hdata">
                    <div class="mcol-left"> <i class="fa fa-user ln-shadow"></i> </div>
                    <div class="mcol-right">
                      <p><a href="#">18</a> <em>Favorites </em></p>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="inner-box">
          
          <div class="welcome-msg">
              <h3 class="page-sub-header2 clearfix no-padding">Hello <?php echo $user_info["company_name"]; ?> </h3>
              <span class="page-sub-header-sub small">You last logged in <?php echo $user_info["last_logged_in"]; ?> ago</span> </div>
            <div id="accordion" class="panel-group">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title"> <a href="#collapseB1" data-toggle="collapse"> My details </a> </h4>
                </div>
                <div class="panel-collapse collapse in" id="collapseB1">
                  <div class="panel-body">
                  
                    <form class="form-horizontal"  method="post" role="form" id="form_account_details">
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Company Name</label>
                        <div class="col-sm-9">
                          <input type="text" name="company-name" class="form-control input-md" placeholder="Jhon" value="<?php echo $user_info["company_name"]; ?>" required="">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Customer Name</label>
                        <div class="col-sm-9">
                          <input type="text" name="customer-name" class="form-control input-md" placeholder="Doe" value="<?php echo $user_info["customer_name"]; ?>" required="">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">User Name</label>
                        <div class="col-sm-9">
                          <input type="text" name="username" class="form-control input-md" placeholder="Username" value="<?php echo $user_info["username"]; ?>" required="">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-9">
                          <input type="email" id="email" name="email" class="form-control input-md" placeholder="jhon.deo@example.com" value="<?php echo $user_info["email"]; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Street Address</label>
                        <div class="col-sm-9">
                          <input type="text"  name="address" class="form-control" placeholder="Address" value="<?php echo $user_info["address"]; ?>" required="">
                        </div>
                      </div>
                       <div class="form-group">
                        <label class="col-sm-3 control-label">City</label>
                        <div class="col-sm-9">
                          <input type="text"  name="city" class="form-control" placeholder="City" value="<?php echo $user_info["city"]; ?>" required="">
                        </div>
                      </div>
                       <div class="form-group">
                        <label class="col-sm-3 control-label">State</label>
                        <div class="col-sm-9">
                        
                        <?php // print_r($states);?>
                        
                        
                        <select name="state" class="form-control" required="">
                        
						<?php 
                        foreach($states as $state) 
                            {
                                $selected = ($user_info["state"]==$state['name']) ? " selected='selected' " : "" ;
                                echo "<option $selected value=".$state['name'].">".$state['name']."</option>";
                            } 
                        ?>
                             
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="Phone" class="col-sm-3 control-label">Phone</label>
                        <div class="col-sm-9">
                          <input type="text"  name="phone_number" class="form-control" id="Phone" placeholder="880 124 9820" value="<?php echo $user_info["phone"]; ?>" required="">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Postcode</label>
                        <div class="col-sm-9">
                          <input type="text"  name="postcode" class="form-control" placeholder="111111" value="<?php echo $user_info["postcode"]; ?>" required="">
                        </div>
                      </div>
                      <div class="form-group hide">
                        <label class="col-sm-3 control-label">Facebook account map</label>
                        <div class="col-sm-9">
                          <div class="form-control"> <a class="link" href="fb.html">Jhone.doe</a> <a class=""> <i class="fa fa-minus-circle"></i></a> </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9"> </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                          <button type="submit" class="btn btn-default">Update</button>
                        </div>
                      </div>
                    </form>
                    <div class="form-signup-error">
                    <h3>Update Error</h3>
                   <p>There is a problem in update account!</p>
                 </div>
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title"> <a href="#collapseB2" data-toggle="collapse"> Settings </a> </h4>
                </div>
                <div class="panel-collapse collapse" id="collapseB2">
                  <div class="panel-body">
                    <form class="form-horizontal"   method="post" role="form" id="form_settings_details">
                      <div class="form-group">
                        <div class="col-sm-12">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox" id="comments"  name="comments" <?php echo ($user_info["comments"]==1 ? 'checked' : '');?>>
                              Comments are enabled on my ads </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">New Password</label>
                        <div class="col-sm-9">
                          <input type="password" name="password" id="password" class="form-control" placeholder="" required="">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Confirm Password</label>
                        <div class="col-sm-9">
                          <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="" required="">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                          <button type="submit" class="btn btn-default">Update</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title"> <a href="#collapseB3" data-toggle="collapse"> Preferences </a> </h4>
                </div>
                <div class="panel-collapse collapse" id="collapseB3">
                  <div class="panel-body">
                   <form class="form-horizontal"   method="post" role="form" id="form_preferences_details">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <div class="checkbox">
                          <label>
                            <input type="checkbox" id="newsletter"  class="preferences-check" name="newsletter" <?php echo ($user_info["newsletter"]==1 ? 'checked' : '');?>>
                            I want to receive newsletter. </label>
                        </div>
                        <div class="checkbox">
                          <label>
                            <input type="checkbox" id="advice" class="preferences-check"  name="advice" <?php echo ($user_info["advice"]==1 ? 'checked' : '');?>>
                            I want to receive advice on buying and selling. </label>
                        </div>
                      </div>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
 <!-- include footer-->
<?php include 'footer.php';?>
</div>
<!-- include footer bottom--> 
<?php include 'includes_bottom.php';?>
</body>
</html>
