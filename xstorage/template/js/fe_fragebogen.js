var fe_fragebogen = (function() {
    return new function() {
        this.init = function() {
            this.registerListeners();
        }
        this.registerListeners = function() {
            	
            $(".save-profil-fragebogen").unbind("click");
            $(".save-profil-fragebogen").click(function(e) {
                e.preventDefault();

                $('.ajax-loader').show();
                
                var redirectTo = $(this).data('redirect');
                var $collection = [];
                
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

                    var delta = $('input:radio[name="FR' + id + '"]:checked').val();

                    var superwichtig = $('input:checkbox[data-frage="' + id + '"]:checked').length;

                    if ((typeof delta != "undefined" || delta !== false)) {
                    	$collection[i] = { id, delta, superwichtig };
                    } else {
                        return false;
                    }
                });                
                    

                if ((typeof $collection != "undefined" && $collection != false)) {
                	console.log('ajax call collectAnswer')
                    $.ajax({
                        type: 'POST',
                        url: '/xsite/call/fe_fragebogen/collectAnswer',
                        data:  {
                        	collection: $collection
                        },
                        success: function() {
                        	console.log('wgtest saved');
                        	var redirectTo = $('.save-profil-fragebogen').data('redirect');
                            if (redirectTo != "") {
                                window.location.href = redirectTo;
                                return;
                            }	                    
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
        
        /*
        this.getFragebogenValues = function() {
            var $antwortenArray = [];
//            var $ok = checkFragebogen();
//            if ((typeof $ok != "undefined" && $ok == false)) {
//                return false;
//            }
            $('#profile-fragebogen .hidden-fragen').each(function(i, o) {

                var id = $(o).val();

                var delta = $('input:radio[name="FR' + id + '"]:checked').val();

                var superwichtig = $('input:checkbox[data-frage="' + id + '"]:checked').length;

                if ((typeof delta != "undefined" || delta !== false)) {
                    $antwortenArray[i] = { id, delta, superwichtig };
                } else {
                    return;
                }
            });
                        
            return $antwortenArray;
        }

        this.checkFragebogen = function() {
            var checkboxError = false;
            $('.checkbox-error').hide();
            $(".hidden-fragen").each(function(i, o) {
                var frageId = $(o).val();
                var checkedChecker = $('input:radio[name=FR' + frageId + ']:checked').length;
                if (checkedChecker == 0) {
                    $('#FRAGE_' + frageId + '_error').show();
                    checkboxError = true;
                }
            })

        }
        */

    }
})();

$(document).ready(function() {

    fe_fragebogen.init();
});
