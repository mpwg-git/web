var fe_core = (function() {
    return new function() {
        this.showLoader = function() {
            $('.ajax-loader').show();
        }
        this.hideLoader = function() {
            $('.ajax-loader').hide();
        }
        this.jsFormValidation = function(formIdName, successCallBack) {
            function isValidEmailAddress(emailAddress) {
                var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
                return pattern.test(emailAddress);
            };

            function checkVal(id, val) {
                var div_error = jQuery('#' + id + "_error");
                var input_error = jQuery('#' + id);
                if (val.split(' ').join('') == "") {
                    div_error.show();
                    input_error.addClass("error");
                    return true;
                } else {
                    div_error.hide();
                    input_error.removeClass("error");
                    return false;
                }
            }

            function checkCheck(id, val) {
                var div_error = jQuery('#' + id + "_error");
                var input_error = jQuery('#' + id);
                if (input_error.is(':checked')) {
                    div_error.hide();
                    input_error.removeClass("error");
                    return false;
                } else {
                    input_error.addClass("error");
                    div_error.show();
                    return true;
                }
            }

            function checkEMail(id, val) {
                var div_error = jQuery('#' + id + "_error");
                var input_error = jQuery('#' + id);
                if (!isValidEmailAddress(val)) {
                    input_error.addClass("error");
                    div_error.show();
                    return true;
                } else {
                    input_error.removeClass("error");
                    div_error.hide();
                    return false;
                }
            }

            function checkLength(id, val) {
                var div_error_minlen = jQuery('#' + id + "_minlength_error");
                var div_error = jQuery('#' + id + "_error");
                var input_error = jQuery('#' + id);
                var minlength = parseInt(input_error.data('minlength'), 10) || 0;
                var ret;
                if (val.length < minlength) {
                    input_error.addClass("error");
                    div_error_minlen.show();
                    ret = true;
                } else if (val.split(' ').join('') == "") {
                    input_error.addClass("error");
                    div_error.show();
                    ret = true;
                } else {
                    input_error.removeClass("error");
                    div_error.hide();
                    div_error_minlen.hide();
                    ret = false;
                }
                return ret;
            }

            function __isNumber(n) {
                return !isNaN(parseFloat(n)) && isFinite(n) && n % 1 == 0;
            }

            function checkNumber(id, val) {
                var div_error = jQuery('#' + id + "_error");
                var input_error = jQuery('#' + id);
                var max = jQuery('#' + id).attr('rel_max');
                if (typeof max !== 'undefined' && max !== false) {
                    if (!__isNumber(val) || jQuery('#' + id).val() > parseInt(max, 10)) {
                        input_error.addClass("error");
                        div_error.show();
                        return true;
                    }
                }
                if (!__isNumber(val) || jQuery('#' + id).val() < 20) {
                    input_error.addClass("error");
                    div_error.show();
                    return true;
                } else {
                    input_error.removeClass("error");
                    div_error.hide();
                    return false;
                }
            }
            jQuery('#' + formIdName + ' [rel|=required_check]').click(function() {
                var id = this.id;
                var val = jQuery(this).attr('checked');
                checkCheck(id, val);
            });
            jQuery('#' + formIdName + ' [rel|=required]').blur(function() {
                var id = this.id;
                var val = jQuery(this).val();
                checkVal(id, val);
            });
            jQuery('#' + formIdName + ' [rel|=required_email]').blur(function() {
                var id = this.id;
                var val = jQuery(this).val();
                checkEMail(id, val);
            });
            jQuery('#' + formIdName + ' [rel|=required_numeric]').blur(function() {
                var id = this.id;
                var val = jQuery(this).val();
                checkNumber(id, val);
            });
            jQuery('#' + formIdName + ' [rel|=required_minlength]').blur(function() {
                var id = this.id;
                var val = jQuery(this).val();
                checkLength(id, val);
            });
            try {
                if (jQuery('#wzActionInvisibleCaptcha')) {
                    jQuery('#wzActionInvisibleCaptcha').attr('name', 'wzActionInvisibleCaptchaNOW');
                }
            } catch (e) {}
            var error = false;
            jQuery('#' + formIdName + ' [rel|=required]').each(function() {
                var id = this.id;
                var val = jQuery(this).val();
                if (checkVal(id, val)) {
                    error = true;
                }
            });
            jQuery('#' + formIdName + ' [rel|=required_check]').each(function() {
                var id = this.id;
                var val = jQuery(this).attr('checked');
                if (checkCheck(id, val)) {
                    error = true;
                }
            });
            jQuery('#' + formIdName + ' [rel|=required_email]').each(function() {
                var id = this.id;
                var val = jQuery(this).val();
                if (checkEMail(id, val)) {
                    error = true;
                }
            });
            jQuery('#' + formIdName + ' [rel|=required_numeric]').each(function() {
                var id = this.id;
                var val = jQuery(this).val();
                if (checkNumber(id, val)) {
                    error = true;
                }
            });
            jQuery('#' + formIdName + ' [rel|=required_minlength]').each(function() {
                var id = this.id;
                var val = jQuery(this).val();
                if (checkLength(id, val)) {
                    error = true;
                }
            });
            jQuery('#' + formIdName + ' [rel|=required_radio_oneofmany]').each(function() {
                var id = this.id;
                var val = jQuery(this).val();
                var name = jQuery(this).attr('name');
                var div_error = jQuery('#' + name + "_error");
                var checked = false;
                if (jQuery('input[name=' + name + ']:checked').length > 0) {
                    checked = true;
                    div_error.hide();
                }
                if (checked === false) {
                    error = true;
                    div_error.show();
                }
            });
            return !error;
        }
        this.jsFormValidation2 = function(formIdName, successCallBack) {
            function isValidEmailAddress(emailAddress) {
                var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
                return pattern.test(emailAddress);
            };

            function checkVal(id, val) {
                var div_error = jQuery('#' + id + "_error");
                var input_error = jQuery('#' + id);
                if (val.split(' ').join('') == "") {
                    div_error.show();
                    input_error.addClass("error");
                    return true;
                } else {
                    div_error.hide();
                    input_error.removeClass("error");
                    return false;
                }
            }

            function checkCheck(id, val) {
                var div_error = jQuery('#' + id + "_error");
                var input_error = jQuery('#' + id);
                if (input_error.is(':checked')) {
                    div_error.hide();
                    input_error.removeClass("error");
                    return false;
                } else {
                    input_error.addClass("error");
                    div_error.show();
                    return true;
                }
            }

            function checkEMail(id, val) {
                var div_error = jQuery('#' + id + "_error");
                var input_error = jQuery('#' + id);
                if (!isValidEmailAddress(val)) {
                    input_error.addClass("error");
                    div_error.show();
                    return true;
                } else {
                    input_error.removeClass("error");
                    div_error.hide();
                    return false;
                }
            }

            function checkLength(id, val) {
                var div_error_minlen = jQuery('#' + id + "_minlength_error");
                var div_error = jQuery('#' + id + "_error");
                var input_error = jQuery('#' + id);
                var minlength = parseInt(input_error.data('minlength'), 10) || 0;
                var ret;
                if (val.length < minlength) {
                    input_error.addClass("error");
                    div_error_minlen.show();
                    ret = true;
                } else if (val.split(' ').join('') == "") {
                    input_error.addClass("error");
                    div_error.show();
                    ret = true;
                } else {
                    input_error.removeClass("error");
                    div_error.hide();
                    div_error_minlen.hide();
                    ret = false;
                }
                return ret;
            }

            function __isNumber(n) {
                return !isNaN(parseFloat(n)) && isFinite(n) && n % 1 == 0;
            }

            function checkNumber(id, val) {
                var div_error = jQuery('#' + id + "_error");
                var input_error = jQuery('#' + id);
                var max = jQuery('#' + id).attr('rel_max');
                if (typeof max !== 'undefined' && max !== false) {
                    if (!__isNumber(val) || jQuery('#' + id).val() > parseInt(max, 10)) {
                        input_error.addClass("error");
                        div_error.show();
                        return true;
                    }
                }
                if (!__isNumber(val) || jQuery('#' + id).val() < 20) {
                    input_error.addClass("error");
                    div_error.show();
                    return true;
                } else {
                    input_error.removeClass("error");
                    div_error.hide();
                    return false;
                }
            }
            jQuery('#' + formIdName + ' [rel|=required2_check]').click(function() {
                var id = this.id;
                var val = jQuery(this).attr('checked');
                checkCheck(id, val);
            });
            jQuery('#' + formIdName + ' [rel|=required2]').blur(function() {
                var id = this.id;
                var val = jQuery(this).val();
                checkVal(id, val);
            });
            jQuery('#' + formIdName + ' [rel|=required2_email]').blur(function() {
                var id = this.id;
                var val = jQuery(this).val();
                checkEMail(id, val);
            });
            jQuery('#' + formIdName + ' [rel|=required2_numeric]').blur(function() {
                var id = this.id;
                var val = jQuery(this).val();
                checkNumber(id, val);
            });
            jQuery('#' + formIdName + ' [rel|=required2_minlength]').blur(function() {
                var id = this.id;
                var val = jQuery(this).val();
                checkLength(id, val);
            });
            try {
                if (jQuery('#wzActionInvisibleCaptcha')) {
                    jQuery('#wzActionInvisibleCaptcha').attr('name', 'wzActionInvisibleCaptchaNOW');
                }
            } catch (e) {}
            var error = false;
            jQuery('#' + formIdName + ' [rel|=required2]').each(function() {
                var id = this.id;
                var val = jQuery(this).val();
                if (checkVal(id, val)) {
                    error = true;
                }
            });
            jQuery('#' + formIdName + ' [rel|=required2_check]').each(function() {
                var id = this.id;
                var val = jQuery(this).attr('checked');
                if (checkCheck(id, val)) {
                    error = true;
                }
            });
            jQuery('#' + formIdName + ' [rel|=required2_email]').each(function() {
                var id = this.id;
                var val = jQuery(this).val();
                if (checkEMail(id, val)) {
                    error = true;
                }
            });
            jQuery('#' + formIdName + ' [rel|=required2_numeric]').each(function() {
                var id = this.id;
                var val = jQuery(this).val();
                if (checkNumber(id, val)) {
                    error = true;
                }
            });
            jQuery('#' + formIdName + ' [rel|=required2_minlength]').each(function() {
                var id = this.id;
                var val = jQuery(this).val();
                if (checkLength(id, val)) {
                    error = true;
                }
            });
            jQuery('#' + formIdName + ' [rel|=required2_radio_oneofmany]').each(function() {
                var id = this.id;
                var val = jQuery(this).val();
                var name = jQuery(this).attr('name');
                var div_error = jQuery('#' + name + "_error");
                var checked = false;
                if (jQuery('input[name=' + name + ']:checked').length > 0) {
                    checked = true;
                    div_error.hide();
                }
                if (checked === false) {
                    error = true;
                    div_error.show();
                }
            });
            return !error;
        }
        this.getCurrentFace = function() {
            return currentFace;
        }
        this.chatwindowResize = function() {
            var $chatHeaderHeight = parseInt($('.js-chatheader').innerHeight(), 0);
            var $chatWindowHeight = parseInt($('.js-chatwindow').innerHeight(), 0);
            var $chatTextHeight = parseInt($('.js-chattext').innerHeight(), 0);
            var $windowHeight = $(window).height();
            var fixedMinus;
            if (this.getCurrentFace() == 0) {
                fixedMinus = 120;
            }
            if (this.getCurrentFace() == 1) {
                return
            }
            if (this.getCurrentFace() == 3) {
                fixedMinus = 180;
            }
            var $newHeight = $windowHeight - $chatHeaderHeight - $chatTextHeight - fixedMinus;
            $('.js-chatwindow').css('height', $newHeight);
        }
        this.submitWithValidation = function(formIdName) {
            var ok = this.jsFormValidation(formIdName);
            console.log("submitwithval", ok);
            if (typeof ok != "undefined" && ok == true) {
                jQuery('#' + formIdName).submit();
            }
        }
    }
})();
window.getDevicePixelRatio = function() {
    var ratio = 1;
    if (window.screen.systemXDPI !== undefined && window.screen.logicalXDPI !== undefined && window.screen.systemXDPI > window.screen.logicalXDPI) {
        ratio = window.screen.systemXDPI / window.screen.logicalXDPI;
    } else if (window.devicePixelRatio !== undefined) {
        ratio = window.devicePixelRatio;
    }
    return ratio;
};
