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
				$('#register-fragebogen .antwort-value input[type=radio]').each(function(index) {
					var $this = $(this),
					id = $this.attr('id'),
					delta = $this.val(),
					superwichtig = $('input[type=checkbox]#'+id).is(':checked');

					$allData =  {id:id, delta:delta, superwichtig:superwichtig};

					if($(this).is(':checked')) {
						$antwortenArray[index] = $allData;
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
				/*if(checkboxError === true) {
					console.log('checkboxError '+checkboxError);
					return false;
				}
				else {
					console.log('checkboxError '+checkboxError);
					return true;
				}*/
			};

			$("#saveFragebogenBtn").unbind("click");
			$("#saveFragebogenBtn").click(function(e){
				e.preventDefault();

				var $collection = getFragebogenValues();

				if((typeof $collection != "undefined" && $collection != false)) {
                    $.ajax({
                        type: 'POST',
                        url: '/xsite/call/fe_fragebogen/collectAnswer',
                        data: {frage:$collection}
                    });
				}
                else {
                }
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
			});

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
