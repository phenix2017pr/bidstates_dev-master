/**
 *	bs Login Script
 *
 *	Developed by Yashvir Singh Prince
 */

var bsResetPassword = bsResetPassword || {};

;(function($, window, undefined)
{
	"use strict";
	
	$(document).ready(function()
	{
	
		bsResetPassword.$container = $("#reset_password");
		
		
		// Login Form & Validation
		bsResetPassword.$container.validate({
			rules: {
				password: {
					required: true,
					atLeastOneLowercaseLetter: true,
                    atLeastOneUppercaseLetter: true,
                    atLeastOneNumber: true,
                    atLeastOneSymbol: true,
					minlength: 8,
					maxlength: 16
				},
				confirm_password: {
					required: true,
					equalTo: '#password',
					atLeastOneLowercaseLetter: true,
                    atLeastOneUppercaseLetter: true,
                    atLeastOneNumber: true,
                    atLeastOneSymbol: true,
					minlength: 8,
					maxlength: 16
				},
				
			
				
			},
			
			highlight: function(element){
				$(element).closest('.input-icon').addClass('validate-has-error');
			},
			
			
			unhighlight: function(element)
			{
				$(element).closest('.input-icon').removeClass('validate-has-error');
			},
			
			submitHandler: function(ev)
			{
				
				/* 
					Updated on v1.1.4
					Login form now processes the login data, here is the file: data/sample-login-form.php
				*/
				
				$(".login-page").addClass('logging-in'); // This will hide the login form and init the progress bar
					
					
				// Hide Errors
				$(".form-login-error").slideUp('fast');

				// We will wait till the transition ends				
				setTimeout(function()
				{
					
					// Send data to the server
					$.ajax({
						url: baseurl + 'login/ajax_reset_password',
						method: 'POST',
						dataType: 'json',
						data:bsResetPassword.$container.serialize(),
						error: function()
						{
							alert("An error occoured!");
						},
						success: function(response)
						{
							console.log(response);
							// Login status [success|invalid]
							var login_status = response.login_status;
							var status = response.status;
															
							// If login is invalid, we store the 
								if(status == 'invalid')
								{
									$(".login-page").removeClass('logging-in');
									/*var $errors_container = $(".form-login-error");
					                $errors_container.show();*/
									// Show Errors
				                    $(".form-login-error").slideDown('fast');
									
								}
								else
								if(status == 'true')
								{
									// Redirect to login page
									alert("Password Change Sucessfully!");
									setTimeout(function()
									{
										
										var redirect_url = baseurl;
										
										if(response.redirect_url && response.redirect_url.length)
										{
											redirect_url = response.redirect_url;
										}
										
										window.location.href = redirect_url;
									}, 1200);
								}
								
							
						}
					});
						
					
				}, 650);
			}
		});
		
		
		
	});
	
})(jQuery, window);