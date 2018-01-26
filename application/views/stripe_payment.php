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
  <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap-min.js"></script>
  <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap-formhelpers-min.js"></script>
  <script src="<?php echo base_url();?>assets/js/stripe_validate.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/bootstrap/js/bootstrapValidator-min.js"></script>
  <!-- Custom Theme Style -->
  <link href="<?php echo base_url();?>/assets/build/css/custom.min.css" rel="stylesheet">
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
            <h2 class="title-2"> <i class="icon-user-add"></i>Please enter your card credentials</h2>
			 <div class="alert alert-danger" id="a_x200" style="display: none;"> <strong>Error!</strong> <span class="payment-errors"></span> </div>
				<span class="payment-success">
			  </span>
            <div class="row">
               <div class="col-sm-12">
                
                <form  class="form-horizontal" method="post" action="<?php echo base_url();?>login/stripe_subscription" role="form" id="stripe-payment-form">
                   <fieldset>
					<legend>Card Details</legend>

              <!-- Card Holder Name -->
              <div class="form-group">
                <label class="col-sm-4 control-label"  for="textinput">Card Holder's Name</label>
                <div class="col-sm-6">
                  <input type="text" name="cardholdername" maxlength="70" placeholder="Card Holder Name" class="card-holder-name form-control" required/>
                </div>
              </div>

              <!-- Card Number -->
              <div class="form-group">
                <label class="col-sm-4 control-label" for="textinput">Card Number</label>
                <div class="col-sm-6">
                  <input type="text" id="cardnumber" maxlength="19" placeholder="Card Number" class="card-number form-control" required/>
                </div>
              </div>

              <!-- Expiry-->
              <div class="form-group">
                <label class="col-sm-4 control-label" for="textinput">Card Expiry Date</label>
                <div class="col-sm-6">
                  <div class="form-inline">
                    <select name="select2" data-stripe="exp-month" class="card-expiry-month stripe-sensitive required form-control" required/>
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
                   <select name="select2" data-stripe="exp-year" class="card-expiry-year stripe-sensitive required form-control" data-bv-field="expYear" required/>
					<option value="2017" selected="">2017</option>
					<option value="2018">2018</option>
					<option value="2019">2019</option>
					<option value="2020">2020</option>
					<option value="2021">2021</option>
					<option value="2022">2022</option>
					<option value="2023">2023</option>
					<option value="2024">2024</option>
					<option value="2025">2025</option>
					<option value="2026">2026</option>
					<option value="2027">2027</option>
					<option value="2028">2028</option>
					</select>
                  </div>
                </div>
              </div>

              <!-- CVV -->
              <div class="form-group">
                <label class="col-sm-4 control-label" for="textinput">CVV/CVV2</label>
                <div class="col-sm-3">
                  <input type="text" id="cvv" placeholder="CVV" maxlength="4" class="card-cvc form-control" required/>
                </div>
              </div>

              <!-- Important notice -->
              <div class="form-group">
                <div class="panel panel-success">
                  <div class="panel-heading">
                    <h3 class="panel-title">Important notice</h3>
                  </div>
                  <div class="panel-body">
                    <p>Your card will be charged monthly 100$ after 7 day trial period.</p>
                    <!-- <p>Your account statement will show the following booking text:
                       XXXXXXX </p>-->
                  </div>
                </div>

                <!-- Submit -->
                <div class="control-group">
                  <div class="controls">
                    <center>
                      <button class="btn btn-success" type="submit">Submit</button>
                    </center>
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
	  var error_msg =response.error.message;
	  if(error_msg!=''){
		  $(".a_x200").css('display',"block");
		  $(".payment-errors").html(response.error.message);
	  }
      
    } else {
      var form$ = $("#stripe-payment-form");
      // token contains id, last4, and card type
      var token = response['id'];
      // insert the token into the form so it gets submitted to the server
      form$.append("<input type='hidden'  name='stripeToken' value='" + token + "' />");
      // and submit
      form$.get(0).submit();
    }
  }
</script>
<style>
.page-content .inner-box{
	overflow :unset !important;
}
</style>
   <!-- include footer-->
   <?php include 'footer.php';?>
 </div>
<!-- include footer bottom-->
<?php include 'includes_bottom.php';?>
</body>
</html>
