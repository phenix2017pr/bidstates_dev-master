/**
 *	bs Login Script
 *
 *	Developed by Yashvir Singh Prince
 */

var updateUser = updateUser || {};

;(function($, window, undefined)
{
    "use strict";

    $(document).ready(function()
    {

        updateUser.$container = $("#form_edit_user");

        if ($('input[name=usertype]:checked', '#form_edit_user').val() == "customer") {
            updateUser.$container.find(".contractor-form").removeAttr("required").hide();
            updateUser.$container.find(".customer-form").attr("required", true).show();
        } else {
            updateUser.$container.find(".customer-form").removeAttr("required").hide();
            updateUser.$container.find(".contractor-form").attr("required", true).show();
        };
        $("#inputPassword4").hide();

        $('#inputPassword3').on('input', function() {
            if($(this).val() != "")
            {
                updateUser.$container.find(".new-password").attr("required", true).show();
            }
            else
            {
                updateUser.$container.find(".new-password").removeAttr("required").hide();
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
        updateUser.$container.validate({
            rules: {
                email: {
                    required: true,
                    email : true
                },

                new_password: {
                    required: true,
                    atLeastOneLowercaseLetter: true,
                    atLeastOneUppercaseLetter: true,
                    atLeastOneNumber: true,
                    atLeastOneSymbol: true,
                    minlength: 8,
                    maxlength: 16
                }
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
                    $.ajax({
                        url: baseurl + 'admin/update_user',
                        method: 'POST',
                        dataType: 'json',
                        data: updateUser.$container.serialize(),
                        error: function()
                        {
                            alert("An error occoured!");
                        },
                        success: function(response)
                        {
                            console.log(response);
                            // Login status [success|invalid]
                            var signup_status = response.status;

                            // If login is invalid, we store the
                            if(signup_status == 'fail')
                            {
                                alert("status is fail");
                                // var	$error_msg = response.error_msg
                                // $(".form-signup-error").children("p").html($error_msg);
                                //
                                // // Show Errors
                                // $(".form-signup-error").slideDown('fast');

                            }

                            if(signup_status == 'ok')
                            {

                                alert("Your account is created.Please check your inbox and activate your account");

                                console.log("here2");
                                // Redirect to login page
                                var redirect_url = baseurl + "admin/" + response.where;
                                setTimeout(function()
                                {
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