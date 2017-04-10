var fe_fragebogen = (function() {
    return new function() {
        this.init = function() {
            this.registerListeners();
        }
        this.registerListeners = function() {
        	
        	$('.icon-svg.legend-nr2').click(function(e) {
            	e.preventDefault();
            	$(this).addClass('active');
            	$('.legend-nr1, .legend-nr3').removeClass('active');            		
            });
            	
            $(".save-profil-fragebogen").unbind("click");
            $(".save-profil-fragebogen").click(function(e) {
                e.preventDefault();

                $('.ajax-loader').show();
                
                $('.legend-nr1').addClass('active');
            	$('.legend-nr2, .legend-nr3').removeClass('active'); 
                
                var redirectTo = $(this).data('redirect');
                var collection = [];
                
                var $checkboxError = false;
                $('.checkbox-error').hide();
                $(".hidden-fragen").each(function(i, o) {
                    var frageId = $(o).val();
                    var checkedChecker = $('input:radio[name=FR' + frageId + ']:checked').length;
                    if ($checkboxError == 0) {
                        $('#FRAGE_' + frageId + '_error').show();
                        $checkboxError = true;
                    }
                })


                $('#profile-fragebogen .hidden-fragen').each(function(i, o) {

                    var id = $(o).val();

                    var antwort = $('input:radio[name="FR' + id + '"]:checked').val();

                    var superwichtig = $('input:checkbox[data-frage="' + id + '"]:checked').length;

                    if ((typeof antwort != "undefined" || antwort !== false)) {
                    	collection[i] = {id, antwort, superwichtig};
                    } else {
                        return false;
                    }
                });                
                    

                if ((typeof collection != "undefined" && collection != false)) {
                	console.log('ajax call collectAnswer')
                    $.ajax({
                        type: 'POST',
                        url: '/xsite/call/fe_fragebogen/collectAnswer',
                        data:  {
                        	collection: collection
                        },
                        success: function(data) {
                        	console.log('collectAnswer: ', collection);

                        	var redirectTo = $('.save-profil-fragebogen').data('redirect');
                        	window.location.href = redirectTo;
//                        	setTimeout(function() {
//	                        	var redirectTo = $('.save-profil-fragebogen').data('redirect');
//	                            if (redirectTo != "") {
//	                                window.location.href = redirectTo;
//	                                return;
//	                            }	                    
//                        	}, 0);
                        }
                    })
                }
                else {
                    return false;
                }
            });

            
            $(".js-show-reg-form").unbind("click");
            $(".js-show-reg-form").click(function(e) {
                e.preventDefault();
                $(".js-show-reg-form").hide();
                $("#save-reg-fragebogen").show();
            });

        }
    }
})();

$(document).ready(function() {

    fe_fragebogen.init();
});
