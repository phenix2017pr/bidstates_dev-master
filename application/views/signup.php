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
       <div class="row">
        <div class="col-md-8 page-content">
           <div class="inner-box category-content">
            <h2 class="title-2"> <i class="icon-user-add"></i>Create your account, Its free</h2>
            <div class="row">
               <div class="col-sm-12">
                
                <form  class="form-horizontal" method="post" role="form" id="form_signup">
                   <fieldset>
                    <div class="form-group required">
                       <label class="col-md-4 control-label"></label>
                       <div class="col-md-6">
                        <div class="radio">
                           <label>
                            <input type="radio" name="usertype" id="optionsRadios1" value="customer" checked>
                            Customer</label>
                         </div>
                        <div class="radio">
                           <label>
                            <input type="radio" name="usertype" id="optionsRadios2" value="contractor">
                            Contractor</label>
                         </div>
                        <div class="radio">
                           <label>
                            <input type="radio" name="usertype" id="optionsRadios3" value="subcontractor" >
                            Subcontractor</label>
                         </div>
                      </div>
                     </div>
                    <div class="form-group required customer-form">
                       <label class="col-md-4 control-label">First Name <sup>*</sup> </label>
                       <div class="col-md-6">
                        <input name="first-name" placeholder="First Name" class="form-control input-md" required="" type="text">
                      </div>
                     </div>
                    <div class="form-group required customer-form">
                       <label class="col-md-4 control-label">Last Name <sup>*</sup> </label>
                       <div class="col-md-6">
                        <input name="last-name" placeholder="Last Name" class="form-control input-md" required="" type="text">
                      </div>
                     </div>
                         <div class="form-group required contractor-form">
                       <label class="col-md-4 control-label">Company Name <sup>*</sup> </label>
                       <div class="col-md-6">
                        <input name="company-name" placeholder="Company Name" class="form-control input-md" required="" type="text">
                      </div>
                     </div>
                    <div class="form-group required contractor-form">
                       <label class="col-md-4 control-label">Customer Name <sup>*</sup> </label>
                       <div class="col-md-6">
                        <input name="customer-name" placeholder="Customer Name" class="form-control input-md" required="" type="text">
                      </div>
                     </div>
                    <div class="form-group required">
                       <label class="col-md-4 control-label">Phone Number <sup>*</sup> </label>
                       <div class="col-md-6">
                        <input name="phone_number" placeholder="Phone Number" class="form-control input-md" required="" type="tel">
                        <div class="checkbox">
                           <label>
                            <input name="hide_number" type="checkbox" value="1" >
                            <small>Hide the phone number on the published ads (consumers.)</small> </label>
                         </div>
                      </div>
                     </div>
                    <div class="form-group">
                       <label class="col-md-4 control-label">Are you licensed and insured for the practice in your area?</label>
                       <div class="col-md-6">
                        <div class="radio">
                           <label for="Gender-0">
                            <input name="licensed" id="Gender-0" value="1" checked="checked" type="radio">
                            Yes</label>
                         </div>
                        <div class="radio">
                           <label for="Gender-1">
                            <input name="licensed" id="Gender-1" value="0" type="radio">
                            No</label>
                         </div>
                        <small>Verification may be required.</small>
                        </label>
                      </div>
                     </div>
                    
                    <div class="form-group required">
                       <label for="inputEmail3" class="col-md-4 control-label">Email <sup>*</sup> </label>
                       <div class="col-md-6">
                        <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email" required="">
                      </div>
                     </div>
                    <div class="form-group required">
                       <label for="inputPassword3" class="col-md-4 control-label">Password</label>
                       <div class="col-md-6">
                        <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password" required="">
                        <p class="help-block">Minimim: 8 characters, capital letter(s) required, Must contain a number</p>
                      </div>
                     </div>
                    <div class="form-group">
                       <label class="col-md-4 control-label"></label>
                       <div class="col-md-8">
                        <div class="termbox mb10">
                           <label class="checkbox-inline" for="checkboxes-1">
                            <input name="terms" id="checkboxes-1" value="1" type="checkbox" required="">
                            I have read and agree to the <a href="#">Terms & Conditions</a> </label>
                         </div>
                        <div style="clear:both"></div>
                        <!--<a class="btn btn-primary" href="#">Register</a> -->
                        <button type="submit" class="btn btn-primary btn-block btn-signup">Register</button>
                        
                        </div>
                     </div>
                  </fieldset>
                 </form>
                 <div class="form-signup-error">
                   <h3>Signup Error</h3>
                   <p>There is a problem in signup!</p>
                 </div>
              </div>
             </div>
          </div>
         </div>
        <div class="col-md-4 reg-sidebar">
           <div class="reg-sidebar-inner text-center">
            <div class="promo-text-box"> <i class=" icon-picture fa fa-4x icon-color-1"></i>
               <h3> <strong>Get a Bidstates&#8482 Profile</strong> </h3>
               <p>Your Bidstates&#8482 profile makes you accessible to search engines and in your area.</p>
             </div>
            <div class="promo-text-box"> <i class=" icon-pencil-circled fa fa-4x icon-color-2"></i>
               <h3> <strong>Complete 360 Control</strong> </h3>
               <p>See customer reviews, testimonials, and critical information with the click of a button. You're in control.</p>
             </div>
            <div class="promo-text-box"> <i class="  icon-heart-2 fa fa-4x icon-color-3"></i>
               <h3> <strong>Be the De Facto Contractor</strong> </h3>
               <p>Let customers know that you're the right contractor to make their dreams come true. Offer competitive pricing and free quotes for best results.</p>
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
