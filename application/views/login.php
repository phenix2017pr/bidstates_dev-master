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
<title>Bidstates:Login</title>
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
	<?php if(isset($success)){ echo $success; }
			if(isset($error)){ echo $error; }
	?>
	
      <div class="row">
        <div class="col-sm-5 login-box">
          <div class="panel panel-default">
            <div class="panel-intro text-center"> <img style="max-width: 150px;" src="<?php echo base_url();?>images/bidstates-sleek.png">
              <h2 class="logo-title"></h2>
            </div>
            <div class="panel-body">
              <div class="form-login-error">
                <h3>Invalid login</h3>
                <p>Please enter correct email and password!</p>
              </div>
              <form method="post" role="form" id="form_login">
                <div class="form-group">
                  <label for="sender-email" class="control-label">Username:</label>
                  <div class="input-icon"> <i class="icon-user fa"></i>
                    <input id="email" name="email" type="text" placeholder="Username" class="form-control email" required="">
                  </div>
                </div>
                <div class="form-group">
                  <label for="user-pass" class="control-label">Password:</label>
                  <div class="input-icon"> <i class="icon-lock fa"></i>
                    <input type="password" name="password" class="form-control" placeholder="Password" id="password" required="">
                  </div>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-login">Submit</button>
                  
                  <!-- <a href="$" class="btn btn-primary  btn-block">Submit</a>--> 
                  
                </div>
              </form>
            </div>
            <div class="panel-footer">
              <div class="checkbox pull-left">
                <label>
                  <input type="checkbox" value="1" name="remember" id="remember">
                  Keep me logged in</label>
              </div>
              <p class="text-center pull-right"> <a href="<?php echo base_url();?>login/forgot_password"> Lost your password? </a> </p>
              <div style=" clear:both"></div>
            </div>
          </div>
          <div class="login-box-btm text-center">
            <p> Don't have an account? <br>
              <a href="<?php echo base_url();?>login/signup"><strong>Sign Up !</strong> </a> </p>
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
