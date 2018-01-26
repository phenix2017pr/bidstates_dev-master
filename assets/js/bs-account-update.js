/**
 *	bs Login Script
 *
 *	Developed by Yashvir Singh Prince
 */

var bsAccountUpdate = bsAccountUpdate || {};

;(function($, window, undefined)
{
	"use strict";
	
	$(document).ready(function()
	{
	
		bsAccountUpdate.$container = $("#form_account_details");
		
		
		
		/**
		 * Custom validator for contains at least one lower-case letter
		 */
		$.validator.addMethod("atLeastOneLowercaseLetter", function (value, element) {
			return this.optional(element) || /[a-z]+/.test(value);
		}, "Must have at least one lowercase letter");
		 
		/**
		 * Custom validator for contains at least one upper-case letter.
		 */
		$.validator.addMethod("atLeastOneUppercaseLetter", function (value, element) {
			return this.optional(element) || /[A-Z]+/.test(value);
		}, "Must have at least one uppercase letter");
		 
		/**
		 * Custom validator for contains at least one number.
		 */
		$.validator.addMethod("atLeastOneNumber", function (value, element) {
			return this.optional(element) || /[0-9]+/.test(value);
		}, "Must have at least one number");
		 
		/**
		 * Custom validator for contains at least one symbol.
		 */
		$.validator.addMethod("atLeastOneSymbol", function (value, element) {
			return this.optional(element) || /[!@#$%^&*()]+/.test(value);
		}, "Must have at least one symbol");
		
		$.validator.addMethod("alphanumeric", function(value, element) {
            return this.optional(element) || /^\w+$/i.test(value);
        }, "Letters, numbers, and underscores only please");
		
		$.validator.addMethod("exactlength", function(value, element, param) {
		 return this.optional(element) || value.length == param;
		}, $.validator.format("Please enter exactly {0} characters."));
				
		
		
		// Login Form & Validation
		bsAccountUpdate.$container.validate({
			rules: {
				username: {
					required: true	,
					alphanumeric: true,
					minlength: 7,
					maxlength: 15,
				},
				email: {
					required: true	,
					email : true,
					
				},
				phone_number: {
					required: true,
					number: true,
					exactlength: 10,
				},
				postcode: {
					required: true,
					number: true,
					exactlength: 5,
				},
				
			},
			
			highlight: function(element){
				$(element).closest('.col-sm-9').addClass('validate-has-error');
			},
			
			
			unhighlight: function(element)
			{
				$(element).closest('.col-sm-9').removeClass('validate-has-error');
			},
			
			submitHandler: function(ev)
			{
				
				/* 
					Updated on v1.1.4
					Login form now processes the login data, here is the file: data/sample-login-form.php
				*/
				
		
					
					
				// Hide Errors
				$(".form-signup-error").slideUp('fast');

				// We will wait till the transition ends				
				setTimeout(function()
				{
					
					console.log("here");
					
					//return;
					// Send data to the server
					$.ajax({
						url: baseurl + 'login/ajax_update_account',
						method: 'POST',
						dataType: 'json',
						data: bsAccountUpdate.$container.serialize(),
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
									
									alert("Your account has been successfully updated");
									
									console.log("here2");
									
								}
								
							
						}
					});
						
					
				}, 650);
			}
		});
		
		
		
	});
	
})(jQuery, window);