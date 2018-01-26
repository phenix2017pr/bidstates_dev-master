/**
 *	bs Login Script
 *
 *	Developed by Yashvir Singh Prince
 */

var bsSignup = bsSignup || {};

;(function($, window, undefined)
{
	"use strict";

	$(document).ready(function()
	{

		bsSignup.$container = $("#form_signup");

        console.log(bsSignup.$container);

        bsSignup.$container[0].reset();

		bsSignup.$container.find(".contractor-form").removeAttr("required").hide();

        if ($('input[name=usertype]:checked', '#form_signup').val() == "customer") {
            bsSignup.$container.find(".contractor-form").removeAttr("required").hide();
            bsSignup.$container.find(".customer-form").attr("required", true).show();
        } else {
            bsSignup.$container.find(".customer-form").removeAttr("required").hide();
            bsSignup.$container.find(".contractor-form").attr("required", true).show();
        };

		// Change form fields based on customer type
		$('#form_signup input[name=usertype]').on('change', function() {
            var  $user_type=$('input[name=usertype]:checked', '#form_signup').val();
			  if($user_type=="customer")
			  {
				bsSignup.$container.find(".contractor-form").removeAttr("required").hide();
				bsSignup.$container.find(".customer-form").attr("required", true).show();
			  }
			  else
			  {
			    bsSignup.$container.find(".customer-form").removeAttr("required").hide();
				bsSignup.$container.find(".contractor-form").attr("required", true).show();
			  }
        });

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



		// Login Form & Validation
		bsSignup.$container.validate({
			rules: {
				email: {
					required: true	,
					email : true
				},

				password: {
					required: true,
					atLeastOneLowercaseLetter: true,
                    atLeastOneUppercaseLetter: true,
                    atLeastOneNumber: true,
                    atLeastOneSymbol: true,
					minlength: 8,
					maxlength: 16
				},
				phone_number: {
					required: true,
					number: true,
					minlength: 10,
					maxlength: 10,
				},

			},

			highlight: function(element){
				$(element).closest('.col-md-6').addClass('validate-has-error');
			},


			unhighlight: function(element)
			{
				$(element).closest('.col-md-6').removeClass('validate-has-error');
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

					//console.log("here");

					//return;
					// Send data to the server
					$.ajax({
						url: baseurl + 'login/ajax_signup',
						method: 'POST',
						dataType: 'json',
						data: bsSignup.$container.serialize(),
						error: function()
						{
							alert("An error occoured!");
						},
						success: function(response)
						{
							console.log(response);
							// Login status [success|invalid]
							var signup_status = response.signup_status;

							// If login is invalid, we store the
								if(signup_status == 'failure')
								{
                                    alert("status is fail");

									/*var $errors_container = $(".form-login-error");
					                $errors_container.show();*/
									console.log("here");

								    var	$error_msg = response.error_msg
									$(".form-signup-error").children("p").html($error_msg);

									// Show Errors
				                    $(".form-signup-error").slideDown('fast');

								}

								if(signup_status == 'success')
								{

									alert("Your account is created.Please check your inbox and activate your account");

									console.log("here2");
									// Redirect to login page
									setTimeout(function()
									{

										var redirect_url = baseurl;
										if (response.redirect_url == "none") {}
										if(response.redirect_url && response.redirect_url.length)
										{
											redirect_url = response.redirect_url;
										}
										console.log(redirect_url);
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