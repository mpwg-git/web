// 'use strict';

var fe_fragebogen = (function() {
    return new function() {
        this.init = function() {
            this.registerListeners();
        }
        this.registerListeners = function() {
            var me = this;


			var getFragebogenValues = function () {
				var $antwortenArray = [];
				var $ok = checkFragebogen();
				if ((typeof $ok != "undefined" && $ok == false)) {
					console.log("undefined OR !false");
					return false;
				}
				$('#register-fragebogen .hidden-fragen').each(function(i, o) {

					var id = $(o).val();

					var delta = $('input:radio[name="FR' + id + '"]:checked').val();

					var superwichtig = $('input:checkbox[data-frage="' + id + '"]:checked').length;

					if((typeof delta != "undefined" || delta !== false)) {
						$antwortenArray[i] = {id, delta, superwichtig};
					}
					else {
						return;
					}
				});


				return $antwortenArray;
			};


			var checkFragebogen = function () {
				var checkboxError = false;
        		$('.checkbox-error').hide();
        		$(".hidden-fragen").each(function (i, o) {
        			var frageId = $(o).val();
        			var checkedChecker = $('input:radio[name=FR'+frageId+']:checked').length;
        			if (checkedChecker == 0) {
        				$('#FRAGE_' + frageId + '_error').show();
        				checkboxError = true;
        			}
        		})
			};

			$("#ID").unbind("click");
			$("#ID").click(function(e){
				e.preventDefault();

				var $collection = getFragebogenValues();
				var $formdata = $('#wg-zimmer-finden').serializeArray();
				
				var adresse = $('input#ADRESSE.form-control.autocomplete-location-v2').val();
				var mietemax = $('input#MIETEMAX.form-control').val();
				
				if((typeof $collection != "undefined" && $collection != false)) {
                    $.ajax({
                        type: 'POST',
                        url: '/xsite/call/fe_fragebogen/collectAnswer',
                        data: {
                        	frage:$collection,
                        	adresse: adresse,
                        	mietemax:mietemax
                        	}
                        })
                    }
				});
/*
				var ok = fe_core.jsFormValidation('wg-zimmer-finden');

				var ok = fe_core.jsFormValidation2('wg-zimmer-finden');

				if (ok) {
					ok = simpleLogin.checkEMail('v2_EMAIL', $('#v2_EMAIL').val()) ? false : true;
				}
				if (ok) {
					ok = simpleLogin.checkVal('v2_PASSWORT', $('#v2_PASSWORT').val()) ? false : true;
				}
				if (ok) {
				    	ok = simpleLogin.checkEqual('v2_PASSWORT_confirm', $('#v2_PASSWORT').val(), $('#v2_PASSWORT_confirm').val()) ? false : true;
				}

				if (ok != true) {
					return false;
				}
*/

            $(".js-show-reg-form").unbind("click");
            $(".js-show-reg-form").click(function(e) {
                e.preventDefault();
                $(".js-show-reg-form").hide();
                $("#saveFragebogenBtn").show();
            });

        }
    }
})();
$(document).ready(function() {
    fe_fragebogen.init();
});
