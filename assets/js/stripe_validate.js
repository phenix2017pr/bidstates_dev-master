
    $(document).ready(function($) {
        $('#payment-form').bootstrapValidator({
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            submitHandler: function(validator, form, submitButton) {
                // createToken returns immediately - the supplied callback submits the form if there are no errors
                Stripe.card.createToken({
                    number: $('.card-number').val(),
                    cvc: $('.card-cvc').val(),
                    exp_month: $('.card-expiry-month').val(),
                    exp_year: $('.card-expiry-year').val(),
                    name: $('.card-holder-name').val(),
                    address_line1: $('.address').val(),
                    address_city: $('.city').val(),
                    address_zip: $('.zip').val(),
                    address_state: $('.state').val(),
                    address_country: $('.country').val()
                }, stripeResponseHandler);
                return false; // submit from callback
            },
            fields: {
                street: {
                    validators: {
                        notEmpty: {
                            message: 'The street is required and cannot be empty'
                        },
                        stringLength: {
                            min: 6,
                            max: 96,
                            message: 'The street must be more than 6 and less than 96 characters long'
                        }
                    }
                },
                city: {
                    validators: {
                        notEmpty: {
                            message: 'The city is required and cannot be empty'
                        }
                    }
                },
                zip: {
                    validators: {
                        notEmpty: {
                            message: 'The zip is required and cannot be empty'
                        },
                        stringLength: {
                            min: 3,
                            max: 9,
                            message: 'The zip must be more than 3 and less than 9 characters long'
                        }
                    }
                },
                email: {
                    validators: {
                        notEmpty: {
                            message: 'The email address is required and can\'t be empty'
                        },
                        emailAddress: {
                            message: 'The input is not a valid email address'
                        },
                        stringLength: {
                            min: 6,
                            max: 65,
                            message: 'The email must be more than 6 and less than 65 characters long'
                        }
                    }
                },
                cardholdername: {
                    validators: {
                        notEmpty: {
                            message: 'The card holder name is required and can\'t be empty'
                        },
                        stringLength: {
                            min: 6,
                            max: 70,
                            message: 'The card holder name must be more than 6 and less than 70 characters long'
                        }
                    }
                },
                cardnumber: {
                    selector: '#cardnumber',
                    validators: {
                        notEmpty: {
                            message: 'The credit card number is required and can\'t be empty'
                        },
                        creditCard: {
                            message: 'The credit card number is invalid'
                        },
                    }
                },
                expMonth: {
                    selector: '[data-stripe="exp-month"]',
                    validators: {
                        notEmpty: {
                            message: 'The expiration month is required'
                        },
                        digits: {
                            message: 'The expiration month can contain digits only'
                        },
                        callback: {
                            message: 'Expired',
                            callback: function(value, validator) {
                                value = parseInt(value, 10);
                                var year         = validator.getFieldElements('expYear').val(),
                                    currentMonth = new Date().getMonth() + 1,
                                    currentYear  = new Date().getFullYear();
                                if (value < 0 || value > 12) {
                                    return false;
                                }
                                if (year == '') {
                                    return true;
                                }
                                year = parseInt(year, 10);
                                if (year > currentYear || (year == currentYear && value > currentMonth)) {
                                    validator.updateStatus('expYear', 'VALID');
                                    return true;
                                } else {
                                    return false;
                                }
                            }
                        }
                    }
                },
                expYear: {
                    selector: '[data-stripe="exp-year"]',
                    validators: {
                        notEmpty: {
                            message: 'The expiration year is required'
                        },
                        digits: {
                            message: 'The expiration year can contain digits only'
                        },
                        callback: {
                            message: 'Expired',
                            callback: function(value, validator) {
                                value = parseInt(value, 10);
                                var month        = validator.getFieldElements('expMonth').val(),
                                    currentMonth = new Date().getMonth() + 1,
                                    currentYear  = new Date().getFullYear();
                                if (value < currentYear || value > currentYear + 100) {
                                    return false;
                                }
                                if (month == '') {
                                    return false;
                                }
                                month = parseInt(month, 10);
                                if (value > currentYear || (value == currentYear && month > currentMonth)) {
                                    validator.updateStatus('expMonth', 'VALID');
                                    return true;
                                } else {
                                    return false;
                                }
                            }
                        }
                    }
                },
                cvv: {
                    selector: '#cvv',
                    validators: {
                        notEmpty: {
                            message: 'The cvv is required and can\'t be empty'
                        },
                        cvv: {
                            message: 'The value is not a valid CVV',
                            creditCardField: 'cardnumber'
                        }
                    }
                },
            }
        });
    });
	
	
    $(document).ready(function($) {
        $('#stripe-payment-form').bootstrapValidator({
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            submitHandler: function(validator, form, submitButton) {
                // createToken returns immediately - the supplied callback submits the form if there are no errors
                Stripe.card.createToken({
                    number: $('.card-number').val(),
                    cvc: $('.card-cvc').val(),
                    exp_month: $('.card-expiry-month').val(),
                    exp_year: $('.card-expiry-year').val(),
                    name: $('.card-holder-name').val()
                }, stripeResponseHandler);
                return false; // submit from callback
            },
            fields: {
                cardholdername: {
                    validators: {
                        notEmpty: {
                            message: 'The card holder name is required and can\'t be empty'
                        },
                        stringLength: {
                            min: 6,
                            max: 70,
                            message: 'The card holder name must be more than 6 and less than 70 characters long'
                        }
                    }
                },
                cardnumber: {
                    selector: '#cardnumber',
                    validators: {
                        notEmpty: {
                            message: 'The credit card number is required and can\'t be empty'
                        },
                        creditCard: {
                            message: 'The credit card number is invalid'
                        },
                    }
                },
                expMonth: {
                    selector: '[data-stripe="exp-month"]',
                    validators: {
                        notEmpty: {
                            message: 'The expiration month is required'
                        },
                        digits: {
                            message: 'The expiration month can contain digits only'
                        },
                        callback: {
                            message: 'Expired',
                            callback: function(value, validator) {
                                value = parseInt(value, 10);
                                var year         = validator.getFieldElements('expYear').val(),
                                    currentMonth = new Date().getMonth() + 1,
                                    currentYear  = new Date().getFullYear();
                                if (value < 0 || value > 12) {
                                    return false;
                                }
                                if (year == '') {
                                    return true;
                                }
                                year = parseInt(year, 10);
                                if (year > currentYear || (year == currentYear && value > currentMonth)) {
                                    validator.updateStatus('expYear', 'VALID');
                                    return true;
                                } else {
                                    return false;
                                }
                            }
                        }
                    }
                },
                expYear: {
                    selector: '[data-stripe="exp-year"]',
                    validators: {
                        notEmpty: {
                            message: 'The expiration year is required'
                        },
                        digits: {
                            message: 'The expiration year can contain digits only'
                        },
                        callback: {
                            message: 'Expired',
                            callback: function(value, validator) {
                                value = parseInt(value, 10);
                                var month        = validator.getFieldElements('expMonth').val(),
                                    currentMonth = new Date().getMonth() + 1,
                                    currentYear  = new Date().getFullYear();
                                if (value < currentYear || value > currentYear + 100) {
                                    return false;
                                }
                                if (month == '') {
                                    return false;
                                }
                                month = parseInt(month, 10);
                                if (value > currentYear || (value == currentYear && month > currentMonth)) {
                                    validator.updateStatus('expMonth', 'VALID');
                                    return true;
                                } else {
                                    return false;
                                }
                            }
                        }
                    }
                },
                cvv: {
                    selector: '#cvv',
                    validators: {
                        notEmpty: {
                            message: 'The cvv is required and can\'t be empty'
                        },
                        cvv: {
                            message: 'The value is not a valid CVV',
                            creditCardField: 'cardnumber'
                        }
                    }
                },
            }
        });
    });


