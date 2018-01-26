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
<title><?php echo $page_title;?> | Bidstates</title>
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
      <?php if(isset($user_info["company_name"])) { ?>

	<div class="row">
	  <div class="col-lg-12">
		<div class="col-xs-12 col-sm-4">
		   <figure>
			  <img class="img-circle img-responsive" alt="" src="https://fb-s-b-a.akamaihd.net/h-ak-xfa1/v/t1.0-1/c9.0.160.160/p160x160/420257_10151474103567424_1224916620_n.jpg?oh=0932a7be9adb74fd949d0211d9128ad7&oe=58BA7A17&__gda__=1488564886_feb0fc02d6307304a3d43aecff5a804a">
		   </figure>
		   <div class="row">
			 <div class="col-xs-8 col-xs-offset-2 social-btns">
				 <div class="col-xs-3 col-md-1 col-lg-1 social-btn-holder">
					<a href="#" class="btn btn-social btn-block btn-google">
					<i class="fa fa-google"></i> </a>
				 </div>
				 <div class="col-xs-3 col-md-1 col-lg-1 social-btn-holder">
					<a href="#" class="btn btn-social btn-block btn-facebook">
					<i class="fa fa-facebook"></i> </a>
				 </div>
				 <div class="col-xs-3 col-md-1 col-lg-1 social-btn-holder">
					<a href="#" class="btn btn-social btn-block btn-twitter">
					<i class="fa fa-twitter"></i> </a>
				 </div>
				 <div class="col-xs-3 col-md-1 col-lg-1 social-btn-holder">
					<a href="#" class="btn btn-social btn-block btn-linkedin">
					<i class="fa fa-linkedin"></i> </a>
				 </div>
				 <div class="col-xs-3 col-md-1 col-lg-1 social-btn-holder">
					<a href="#" class="btn btn-social btn-block btn-github">
					<i class="fa fa-github"></i> </a>
				 </div>
				 <div class="col-xs-3 col-md-1 col-lg-1 social-btn-holder">
					<a href="#" class="btn btn-social btn-block btn-stackoverflow">
					<i class="fa fa-stack-overflow"></i> </a>
				 </div>
			  </div>			  
		   </div>
		</div>
		<div class="col-xs-12 col-sm-8">
		   <ul class="list-group">
			  <li class="list-group-item">John Doe</li>
			  <li class="list-group-item">Software Engineer</li>
			  <li class="list-group-item"><span class="glyphicon glyphicon-briefcase"></span> 5 years</li>
			  <li class="list-group-item"><span class="glyphicon glyphicon-map-marker"></span> U.S.A.</li>
			  <li class="list-group-item"><span class="glyphicon glyphicon-home"></span> 555 street Address,toedo 43606 U.S.A.</li>
			  <li class="list-group-item"><span class="glyphicon glyphicon-phone"></span> <a href="#" title="call">(+021) 956 789123</a></li>
			  <li class="list-group-item"><span class="glyphicon glyphicon-envelope"></span><a href="#" title="mail"> jenifer123@gmail.com</a></li>
		   </ul>
		</div>
	  </div>
	</div>

	<!-- title row -->
	 <div class="row user-menu-container">
        <div class="col-md-7 user-details">
            <div class="row coralbg white">
                <div class="col-md-6 no-pad">
                    <div class="user-pad">
                        <h3><?php echo $user_info["company_name"]; ?></h3>
                        <h4 class="white"><i class="fa fa-check-circle-o"></i> Miami, Flolida </h4>
						<!--h4 class="white"><i class="fa fa-check-circle-o"></i> <?php echo $user_info["city"]; ?>, <?php echo $user_info["state"]; ?></h4-->
                        <h4 class="white"><i class="fa fa-mail"></i> <?php echo $user_info["email"]; ?></h4>
                        <h4 class="white"><i class="fa fa-phone"> <?php echo $user_info["phone"]; ?></i> </h4>
                        <button type="button" class="btn btn-labeled btn-info" href="#">
                            <span class="btn-label"><i class="fa fa-pencil"></i></span>Contact Us</button>
                    </div>
                </div>
                <div class="col-md-6 no-pad">
					<div class="user-image">
                        <img src="https://farm7.staticflickr.com/6163/6195546981_200e87ddaf_b.jpg" class="img-responsive">
					</div>
                </div>
            </div>
            <div class="row overview">
                <div class="col-md-4 detail-pad text-center">
                    <h3>Bidstates ID</h3>
                    <h4> <?php echo $user_info["userid"]; ?></h4>
                </div>
                <div class="col-md-4 detail-pad text-center">
                    <h3>Descriptive Detail1</h3>
                    <h4>Detail 2</h4>
                </div>
                <div class="col-md-4 detail-pad text-center">
                    <h3>Descriptive Detail2</h3>
                    <h4>Detail 2</h4>
                </div>
            </div>
        </div>
        <div class="col-md-1 user-menu-btns">
            <div class="btn-group-vertical square" id="responsive">
                <a href="#" class="btn btn-block btn-default active">
                  <i class="fa fa-bell-o fa-3x"></i>
                </a>
                <a href="#" class="btn btn-default">
                  <i class="fa fa-envelope-o fa-3x"></i>
                </a>
                <a href="#" class="btn btn-default">
                  <i class="fa fa-laptop fa-3x"></i>
                </a>
                <a href="#" class="btn btn-default">
                  <i class="fa fa-cloud-upload fa-3x"></i>
                </a>
            </div>
        </div>
        <div class="col-md-4 user-menu user-pad">
            <div class="user-menu-content active">
                <h3>
                    Contact this Business
                </h3>
                <ul class="user-menu-list">
                    <li>
                        <h4><i class="fa fa-user coral"></i> This business is popular in your area.</h4>
                    </li>
                    <li>
                        <h4><i class="fa fa-heart-o coral"></i> Licensed & Insured.</h4>
                    </li>
                    <li>
                        <h4><i class="fa fa-paper-plane-o coral"></i> Accepting New Projects!</h4>
                    </li>
                    <li>
                        <button type="button" class="btn btn-labeled btn-success" href="#">
                            <span class="btn-label"><i class="fa fa-bell-o"></i></span>View all activity</button>
                    </li>
                </ul>
            </div>
            <div class="user-menu-content">
                <h3>
                    Your Inbox
                </h3>
                <ul class="user-menu-list">
                    <li>
                        <h4>From Roselyn Smith <small class="coral"><strong>NEW</strong> <i class="fa fa-clock-o"></i> 7:42 A.M.</small></h4>
                    </li>
                    <li>
                        <h4>From Jonathan Hawkins <small class="coral"><i class="fa fa-clock-o"></i> 10:42 A.M.</small></h4>
                    </li>
                    <li>
                        <h4>From Georgia Jennings <small class="coral"><i class="fa fa-clock-o"></i> 10:42 A.M.</small></h4>
                    </li>
                    <li>
                        <button type="button" class="btn btn-labeled btn-danger" href="#">
                            <span class="btn-label"><i class="fa fa-envelope-o"></i></span>View All Messages</button>
                    </li>
                </ul>
            </div>
            <div class="user-menu-content">
                <h3>
                    Trending
                </h3>
                <div class="row">
                    <div class="col-md-6">
                        <div class="view">
                            <div class="caption">
                                <p>47LabsDesign</p>
                                <a href="" rel="tooltip" title="Appreciate"><span class="fa fa-heart-o fa-2x"></span></a>
                                <a href="" rel="tooltip" title="View"><span class="fa fa-search fa-2x"></span></a>
                            </div>
                            <img src="http://24.media.tumblr.com/273167b30c7af4437dcf14ed894b0768/tumblr_n5waxesawa1st5lhmo1_1280.jpg" class="img-responsive">
                        </div>
                        <div class="info">
                            <p class="small" style="text-overflow: ellipsis">An Awesome Title</p>
                            <p class="small coral text-right"><i class="fa fa-clock-o"></i> Posted Today | 10:42 A.M.</small>
                        </div>
                        <div class="stats turqbg">
                            <span class="fa fa-heart-o"> <strong>47</strong></span>
                            <span class="fa fa-eye pull-right"> <strong>137</strong></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="view">
                            <div class="caption">
                                <p>47LabsDesign</p>
                                <a href="" rel="tooltip" title="Appreciate"><span class="fa fa-heart-o fa-2x"></span></a>
                                <a href="" rel="tooltip" title="View"><span class="fa fa-search fa-2x"></span></a>
                            </div>
                            <img src="http://24.media.tumblr.com/282fadab7d782edce9debf3872c00ef1/tumblr_n3tswomqPS1st5lhmo1_1280.jpg" class="img-responsive">
                        </div>
                        <div class="info">
                            <p class="small" style="text-overflow: ellipsis">An Awesome Title</p>
                            <p class="small coral text-right"><i class="fa fa-clock-o"></i> Posted Today | 10:42 A.M.</small>
                        </div>
                        <div class="stats turqbg">
                            <span class="fa fa-heart-o"> <strong>47</strong></span>
                            <span class="fa fa-eye pull-right"> <strong>137</strong></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="user-menu-content">
                <h2 class="text-center">
                    START SHARING
                </h2>
                <center><i class="fa fa-cloud-upload fa-4x"></i></center>
                <div class="share-links">
                    <center><button type="button" class="btn btn-lg btn-labeled btn-success" href="#" style="margin-bottom: 15px;">
                            <span class="btn-label"><i class="fa fa-bell-o"></i></span>A FINISHED PROJECT
                    </button></center>
                    <center><button type="button" class="btn btn-lg btn-labeled btn-warning" href="#">
                            <span class="btn-label"><i class="fa fa-bell-o"></i></span>A WORK IN PROGRESS
                    </button></center>
                </div>
            </div>
        </div>
    </div>

	<div class="pay-region">
		<div class="row">
			<div class="col-xs-12">
				<h2 class="page-header border-bottom">
					<i class="fa fa-globe"></i> Trust point Co.
					<small class="pull-right">Date: 2017/01/09</small>
				</h2>
			</div><!-- /.col -->
		</div>
		<!-- info row -->
		<div class="row invoice-info">
			<div class="col-sm-4 invoice-col">
				From
				<address>
					<strong>	</strong>
				</address>
			</div><!-- /.col -->
			<div class="col-sm-4 invoice-col">
				To
				<address>
					<strong>
						Shahid</strong>
					<br>
					Address:
					Kollanpur                                    <br>
					Phone:
					123456789                                   <br>
					Email:ggggg@gmail.com                                </address>
			</div><!-- /.col -->
			<div class="col-sm-4 invoice-col">
				<b>Invoice #007612</b><br>
				<br>
				<b>Order ID:</b> 4F3S8J<br>
				<b>Payment Due:</b> 2/22/2014<br>
				<b>Account:</b> 968-34567
			</div><!-- /.col -->
		</div><!-- /.row -->

		<!-- Table row -->
		<div class="row">
			<div class="col-xs-12 table-responsive">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Qty</th>
							<th>Sub Task</th>
							 <th>Price</th>
							<th>Sub Total</th>
						</tr>
					</thead>
					<tbody>
						
						
																<tr>
							<td>2</td>
							<td>18</td>
							<td>12500</td>
							<td>25000</td>
						</tr>
															</tbody>
				</table>
			</div><!-- /.col -->
		</div><!-- /.row -->
		<div class="row">
			<!-- accepted payments column -->
			<div class="col-md-12">
				<p class="lead">Amount Due 2/22/2014</p>
				<div class="table-responsive">
					<table class="table">
						<tbody>
							
							
							<tr>
								<th>Total:</th>
								<td> 50000</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div>
  
    <?php 
	}  else	{
	?>
	   
    <div class="no_records" style="text-align:center" >   No records founds </div>
	
	<?php }?>
</div>
  </div>
   
  <!-- include footer-->
  <?php include 'footer.php';?>
</div>
<!-- include footer bottom-->
<?php include 'includes_bottom.php';?>
</body>
</html>
