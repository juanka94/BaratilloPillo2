
$(document).ready(function() {
    $('.registerform').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            pr_codigo: {
                message: 'The code is not valid',
                validators: {
                    notEmpty: {
                        message: 'The code is required and cannot be empty'
                    },
                    stringLength: {
                        min: 1,
                        max: 4,
                        message: 'The code must be more than 6 and less than 30 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_]+$/,
                        message: 'The username can only consist of alphabetical, number and underscore'
                    }
                }
            },
             pr_nombre: {
                message: 'The name is not valid',
                validators: {
                    notEmpty: {
                        message: 'The name is required and cannot be empty'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_]+$/,
                        message: 'The name can only consist of alphabetical, number and underscore'
                    }
                }
            },
             pr_categoria: {
                message: 'The category is not valid',
                validators: {
                    notEmpty: {
                        message: 'The category is required and cannot be empty'
                    }
                }
            },
             pr_preciocompra: {
                message: 'The price is not valid',
                validators: {
                    notEmpty: {
                        message: 'The price is required and cannot be empty'
                    }
                }
            },
             pr_precioventa: {
                message: 'The price is not valid',
                validators: {
                    notEmpty: {
                        message: 'The price is required and cannot be empty'
                    }
                }
        }, pr_usuario: {
                message: 'The code is not valid',
                validators: {
                    notEmpty: {
                        message: 'The code is required and cannot be empty'
                    }
                    
            }
        },
             pr_password: {
                message: 'The password is not valid',
                validators: {
                    notEmpty: {
                        message: 'The password is required and cannot be empty'
                    }
                }
            }
    }
    });
});

