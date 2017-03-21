var fe_fragebogen = (function() {
    return new function() {
        this.init = function() {
            this.registerListeners();
        }
        this.registerListeners = function() {
            var me = this;

            var collectFragebogen = function() {
                var $form = $("#register-fragebogen");
                var $formdata = $form.serializeObject();

                return $formdata;
            };


            $(".js-show-reg-form").unbind("click");
            $(".js-show-reg-form").click(function(e) {
                e.preventDefault();
                $(".js-show-reg-form").hide();
                $("#saveFragebogenBtn").show();
            });


            $("#saveFragebogenBtn").unbind("click");
            $("#saveFragebogenBtn").click(function(e){
                e.preventDefault();
                var antworten = $("#register-fragebogen").serialize();
                // console.log(antworten);

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

                if(!checkboxError) {
                    console.log(checkboxError, 'ajax call');
                    $.ajax({
                        type: 'POST',
                        url: '/xsite/call/fe_fragebogen/collectAnswer',
                        data: antworten,

                        succes: function(data) {
                            console.log('collectAnswerV2 success');
                        }
                    });
                }
                else {
                    console.log('checkbox_error active');
                }
		    });
        }
    }
})();
$(document).ready(function() {
    // console.log('init js fe_fragebogen');
    fe_fragebogen.init();
});
