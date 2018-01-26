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
 <title>Bidstates: Join Now</title>
 <!-- include top header -->
 <?php include 'includes_top.php';?>
 <!-- This is needed when you send requests via Ajax -->
 <script type="text/javascript">
var baseurl = '<?php echo base_url();?>';
</script>
 <script>
                  paceOptions = {
                        elements: true
                      };
 </script>
 <script src="<?php echo base_url();?>assets/js/pace.min.js"></script>
 </head>
 <body>
<div id="wrapper"> 
   <!-- include header -->
   <?php include 'header.php';?>
   <div class="main-container">
    <div class="container">
      <form id="contact" action="" method="post">
		<h3>Contact Us</h3>
		<h4>Contact us today, and get reply with in 24 hours!</h4>
		<fieldset>
		  <input placeholder="Your name" type="text" tabindex="1" required autofocus>
		</fieldset>
		<fieldset>
		  <input placeholder="Your Email Address" type="email" tabindex="2" required>
		</fieldset>
		<fieldset>
		  <input placeholder="Your Phone Number" type="tel" tabindex="3" required>
		</fieldset>
		<fieldset>
		  <input placeholder="Your Address" type="text" tabindex="4" required>
		</fieldset>
		<fieldset>
		  <input placeholder="Your Web Site starts with http://" type="url" tabindex="5" required>
		</fieldset>
		<fieldset>
		  <textarea placeholder="Type your Message Here...." tabindex="6" required></textarea>
		</fieldset>
		<fieldset>
		  <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
		</fieldset>
	  </form>
    </div>
   </div>
   <!-- include footer-->
   <?php include 'footer.php';?>
 </div>
<!-- include footer bottom-->
<?php include 'includes_bottom.php';?>
</body>
</html>
