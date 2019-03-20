$.fn.serializefiles = function() {
    var obj = $(this);
    /* ADD FILE TO PARAM AJAX */
    var formData = new FormData();
    $.each($(obj).find("input[type='file']"), function(i, tag) {
        $.each($(tag)[0].files, function(i, file) {
            formData.append(tag.name, file);
        });
    });
    var params = $(obj).serializeArray();
    $.each(params, function (i, val) {
        formData.append(val.name, val.value);
    });

    return formData;
};

var Form = {

    validate: {

        notify : function (notify) {

            var icon = (typeof notify.icon !== typeof undefined) ? '<em class="fa fa-' + notify.icon +  '"></em> ' : '';

            $.notify({
                message: notify.html || (icon + notify.message),
                pos: notify.pos || 'bottom-right',
                status: notify.status,
                timeout: notify.timeout || 300
            });
        },

        sweetalert: function (title ,success) {

            swal({
                title              : title,
                type               : 'warning',
                showCancelButton   : true,
                showCloseButton    : true,
                confirmButtonColor : '#3085d6',
            },success);
        },

        init: function ($cont) {

            $($cont).each(function () {

                var validator = $(this).validate({

                    submitHandler: function (form, e) {

                        e.preventDefault();

                        var $data,
                            $this                 = this,
                            $form                 = $(form),
                            $button               = $($this.submitButton),
                            $method               = $button.data('method');


                        $method = $button.data('method')
                            ? $button.data('method')
                            : $form.find('[name=_method]').val()
                                ? $form.find('[name=_method]').val()
                                : $form.attr('method');

                        $method = $button.data('method') || $method;

                        switch ($method.toLowerCase()) {
                            case 'post':
                            case 'put' : {
                                $data = $form.serializefiles();
                            }; break;
                            case 'delete': {
                                $data = {};
                            }; break;
                        }

                        $call = function () {

                            $.ajax({
                                url: $form.attr('action'),
                                type: 'POST',
                                data: $data,
                                cache: false,
                                dataType: 'json',
                                processData: false,
                                contentType: false,
                                success: function (res) {

                                    Form.validate.notify({message: OPERATION_MESSAGE_SUCCESS, status: 'success'});

                                    window.location.href = res.redirect;
                                }

                            }).fail(function (res) {

                                Form.validate.notify({message: OPERATION_MESSAGE_FAIL, status: 'danger'});

                                var errors = typeof res.responseJSON != typeof undefined
                                    ? res.responseJSON.errors
                                    : [];

                                $.each(errors, function (k, v) {

                                    var error = $form.find('#error_' + k.replace(/-|_/g,'-'));
                                    error.children().remove();
                                    error.append(`
                                        <span class="invalid-feedback d-inline-block" role="alert">
                                            <strong>${v}</strong>
                                        </span>
                                    `);
                                });

                            });
                        };

                        if($method == 'delete') {
                            Form.validate.sweetalert('Are you sure?' ,function () {
                                $call();
                            });
                        } else {
                            $call();
                        }

                    },
                    ignore: [],
                    errorClass: 'invalid-feedback d-inline-block',
                    errorElement: 'span',
                    errorPlacement: function (error, e) {
                        var elem = jQuery(e);
                        elem.closest('.form-group').find('div[id*=error_]').append(error);
                    },
                    highlight: function (e, errorClass, validClass) {
                        var elem = jQuery(e);
                        elem.addClass('is-invalid');
                    },
                    unhighlight: function (e, errorClass, validClass) {
                        var elem = jQuery(e);
                        elem.removeClass('is-invalid');
                    },
                    success: function (e) {
                        var elem = jQuery(e);
                        elem.removeClass('is-invalid');
                    }
                });
            });

            $($cont).find('.autocomplete').change(function () {
                $(this).valid();
            });

            Form.validate.initAdditionalValidationClass();
        },

        initAdditionalValidationClass: function () {

            jQuery.validator.addClassRules({
                number:{
                    required: true,
                    number: true
                },
                email:{
                    required: true,
                    email: true,
                },
                url:{
                    required: true,
                    url: true,
                },
                date:{
                    required: true,
                    date: true
                },
                min:{
                    required: true,
                    minlength: 5
                },
                max:{
                    required: true,
                    maxlength: 5
                },
                range:{
                    required: true,
                    rangelength: [5, 10]
                },
                digits:{
                    required: true,
                    digits: true
                }    ,
                minVal:{
                    required: true,
                    min: 5
                },
                maxVal:{
                    required: true,
                    max: 100
                },
                rangeVal:{
                    required: true,
                    range: [5, 100]
                }
            });
        },

        resetForm: function ($cont) {

            $($cont).validate().resetForm();
        },

        load: function () {
            Form.validate.init('form.ajax-form');
        },
    },
};


/**=========================================================
 * Module: From
 =========================================================*/

(function(window, document, $, undefined) {

    $(function() {
        Form.validate.load();
    });

})(window, document, window.jQuery);
