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
<title>BidStates: Right Contractors</title>
<!-- include top header -->
<?php include 'includes_top.php';?>
<script type="text/javascript">
var baseurl = '<?php echo base_url();?>';
</script>
</head>

<body>
<div id="wrapper"> 
  <!-- include header -->
  <?php include 'header.php';?>
  <div class="intro">
    <div class="dtable hw100">
      <div class="dtable-cell hw100">
        <div class="container text-center">
          <h1 class="intro-title animated fadeInDown">Search and find the right contractor.</h1>
          <p class="sub animateme fittext3 animated fadeIn">Licensed, Insured, Qualified</p>
          <div class="row search-row animated fadeInUp">
          <form method="get" role="form" id="form_search" action="search">
            <div class="col-lg-4 col-sm-4 search-col relative locationicon"> <i class="icon-location-2 icon-append"></i>
              <input type="text" name="address" id="autocomplete-ajax" class="form-control locinput input-rel searchtag-input has-icon city-field"
                                                      placeholder="City/Zipcode..." value="">
            </div>
            <div class="col-lg-4 col-sm-4 search-col relative"> <i class="icon-docs icon-append"></i>
              <input type="text" name="ads" class="form-control has-icon type-field" placeholder="I'm looking for a ..." value="" >
            </div>
            <div class="col-lg-4 col-sm-4 search-col">
              <button type="submit" id="search_btn" class="btn btn-primary btn-search btn-block"> <i class="icon-search"></i> <strong>Find</strong> </button>
            <!--   <button type="submit" class="btn btn-primary btn-block btn-login">Submit</button>-->
            </div>
             </form>
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
<script>
$(document).ready(function()
{
//added coed for geolocation

$.get("//ipinfo.io", function (response) {
  //  $("#autocomplete-ajax").val( response.city + ", " + response.region);
}, "jsonp");

$(document).on("click","#search_btn",function(){ 

return;
	
	// Send data to the server
					$.ajax({
						url: baseurl + 'search/ajax_search',
						method: 'POST',
						dataType: 'json',
						data: {
							city: $(".city-field").val(),
							type: $(".type-field").val(),
						},
						error: function()
						{
							alert("An error occoured!");
						},
						success: function(response)
						{
							   console.log(response);
							   // Login status [success|invalid]
							   var $count = response.length;
							   
							   $('.search_result').html("");
															
							  // If login is invalid, we store the 
							  
							
								if($count >0)
								{
									
									for (var i = 0; i < response.length; i++) {
										ul = $('<ul/>');
										ul.append("<li> Company Name: " + response[i].company_name + "</li>");
										ul.append("<li> User Name:" + response[i].username + "</li>");
										ul.append("<li> Customer Name:" + response[i].customer_name + "</li>");
										ul.append("<li> Email:" + response[i].email + "</li>");
										ul.append("<li> Address:" + response[i].address +","+ response[i].city +","+ response[i].state +"</li>");
										ul.append("<br>");
										$('.search_result').append(ul);
									}
									
									
								}
								else
								{
									
								
										tr = $('<tr/>');
										tr.append("<td>No records found</td>");
										$('.search_result').append(tr);
									
									
									
								}
								
							
						}
					});
	
	
});



});
</script>
</body>
</html>