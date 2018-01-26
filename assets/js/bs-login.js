/**
 *	bs Login Script
 *
 *	Developed by Yashvir Singh Prince
 */

var bsLogin = bsLogin || {};

;(function($, window, undefined)
{
	"use strict";
	
	$(document).ready(function()
	{
	
		bsLogin.$container = $("#form_login");
		
		
		// Login Form & Validation
		bsLogin.$container.validate({
			rules: {
				email: {
					required: true	,
					email : true
				},
				
				password: {
					required: true
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
						url: baseurl + 'login/ajax_login',
						method: 'POST',
						dataType: 'json',
						data: {
							email: $("input#email").val(),
							password: $("input#password").val(),
						},
						error: function()
						{
							alert("An error occoured!");
						},
						success: function(response)
						{
							console.log(response);
							// Login status [success|invalid]
							var login_status = response.login_status;
															
							// If login is invalid, we store the 
								if(login_status == 'invalid')
								{
									$(".login-page").removeClass('logging-in');
									/*var $errors_container = $(".form-login-error");
					                $errors_container.show();*/
									// Show Errors
									var $error_msg="Please enter correct email and password!";
									$(".form-login-error").children("p") .html($error_msg);
				                    $(".form-login-error").slideDown('fast');
									
								}
								if(login_status == 'inactive')
								{
									
									$(".login-page").removeClass('logging-in');
									/*var $errors_container = $(".form-login-error");
					                $errors_container.show();*/
									// Show Errors
									var $error_msg="Your account is inactive.Please check your inbox and activate your account.";
									$(".form-login-error").children("p") .html($error_msg);
				                    $(".form-login-error").slideDown('fast');
								}
								else
								if(login_status == 'success')
								{
									// Redirect to login page
									setTimeout(function()
									{
										
										var redirect_url = baseurl;
										
										if(response.redirect_url && response.redirect_url.length)
										{
											redirect_url = response.redirect_url;
										}
										
										window.location.href = redirect_url;
									}, 400);
								}
								
							
						}
					});
						
					
				}, 650);
			}
		});
		
		
		
	});
	
})(jQuery, window);