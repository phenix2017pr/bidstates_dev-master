/**
 *	bs Login Script
 *
 *	Developed by Yashvir Singh Prince
 */

var bsPreferencesUpdate = bsPreferencesUpdate || {};

;(function($, window, undefined)
{
	"use strict";
	
	$(document).ready(function()
	{
	
	      bsPreferencesUpdate.$container = $("#form_preferences_details");
		  
		$(".preferences-check").change(function() {
			
			
					// Send data to the server
					$.ajax({
						url: baseurl + 'login/ajax_update_preferences',
						method: 'POST',
						dataType: 'json',
						data: bsPreferencesUpdate.$container.serialize(),
						error: function()
						{
							alert("An error occoured!");
						},
						success: function(response)
						{
							console.log(response);
							// Login status [success|failure]
							var update_status = response.update_status;
															
							// If login is invalid, we store the 
								if(update_status == 'failure')
								{
									
									/*var $errors_container = $(".form-login-error");
					                $errors_container.show();*/
									console.log("here");
									
								    var	$error_msg = response.error_msg
									$(".form-signup-error").children("p").html($error_msg);
									
									// Show Errors
				                    $(".form-signup-error").slideDown('fast');
									
								}
								
								if(update_status == 'success')
								{
									
									alert("Your Preferences has been successfully updated");
									
									
									
								}
								
							
						}
					});
						
			
			
		   
		});
		
				
		
		
		
	});
	
})(jQuery, window);