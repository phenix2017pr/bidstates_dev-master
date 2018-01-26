<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url();?>assets/ico/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url();?>assets/ico/apple-touch-icon-114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url();?>assets/ico/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="<?php echo base_url();?>ico/apple-touch-icon-57-precomposed.html">
<link rel="shortcut icon" href="<?php echo base_url();?>assets/ico/favicon.png">
<title>BidStates: Reset Password</title>
<!-- include top header -->
<?php include 'includes_top.php';?>
<!-- This is needed when you send requests via Ajax -->
<script type="text/javascript">
var baseurl = '<?php echo base_url();?>';
</script>
</head>
<body>
<div id="wrapper"> 
  <!-- include header -->
  <?php include 'header.php';?>
  <div class="main-container">
    <div class="container">
      <div class="row">
        <div class="col-sm-5 login-box">
          <div class="panel panel-default">
            <div class="panel-intro text-center"> <img style="max-width: 150px;" src="<?php echo base_url();?>images/bidstates-sleek.png">
              <h2 class="logo-title"></h2>
            </div>
            <div class="form-login-error">
              <h3>Invalid Email</h3>
              <p>Please enter correct email address!</p>
            </div>
            <div class="panel-body">
              <form method="post"  id="reset_password" role="form">
              
               <!--<div class="form-group">
                  <label for="sender-email" class="control-label">Code:</label>
                  <div class="input-icon"> <i class="icon-user fa"></i>
                    <input name="code" id="code" type="text" placeholder="Code" class="form-control code">
                  </div>
                </div>-->
                
                <div class="form-group">
                  <label class="control-label">New Password</label>
                  <div class="input-icon"><i class="icon-lock fa"></i>
                    <input type="password" name="password" id="password" class="form-control" placeholder="New Password" required="">
                  </div>
                </div>
                <div class="form-group">
                  <label class=" control-label">Confirm Password</label>
                  <div class="input-icon"><i class="icon-lock fa"></i>
                    <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm Password" required="">
                  </div>
                </div>
                
                 <input type="hidden" name="account_type" id="account_type" value="<?php echo $account_type ?>" >
                 <input type="hidden" name="email" id="email" value="<?php echo $account_email ?>">
                  
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-lg btn-block" >Reset password</button>
                </div>
              </form>
            </div>
            <div class="panel-footer">
              <p class="text-center "> <a href="<?php echo base_url();?>login"> Back to Login </a> </p>
              <div style=" clear:both"></div>
            </div>
          </div>
          <div class="login-box-btm text-center">
            <p> Don't have an account? <br>
              <a href="signup.html"><strong>Sign Up and Get Listed!</strong> </a> </p>
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
