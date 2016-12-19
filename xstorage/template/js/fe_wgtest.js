var fe_wgtest = (function() {
    return new function() {
        this.init = function() {
            this.registerListeners();
        }
        this.registerListeners = function() {
            var me = this;
            $('.meinprofil-wgtest .option').unbind("click");
            $('.meinprofil-wgtest .option').click(function(e) {
                e.preventDefault();
                $(this).parent().find('.option').removeClass("active");
                $(this).toggleClass("active");
                return;
            });
            $('.star-rating').raty({
                number: 4,
                path: '/xstorage/template/plugins/raty/images',
                hints: ['nicht wichtig', 'etwas wichtig', 'eher wichtig', 'wichtig'],
                score: function() {
                    return $(this).attr('data-score');
                }
            });
            $('.frage-wgtest-submit').unbind("click");
            $('.frage-wgtest-submit').click(function(e) {
                e.preventDefault();
                var redirectTo = $(this).data('redirect');
                var frage_id = $(this).data('frage');
                var antwort_bin = $('.js-options-bin .option.active').data('id');
                var antwort_suche = $('.js-options-suche .option.active').data('id');
                var antwort_wichtig = $('.js-wichtig input[name=score]').val();
                var from_restart = ($('input[name="from_restart"]').length > 0 ? 1 : 0);
                console.log("submit  wg", frage_id, antwort_bin, antwort_suche, antwort_wichtig, from_restart);
                if (typeof antwort_bin == "undefined") {
                    return me.addErrorToElement('.frage-ich');
                } else {
                    me.removeErrorFromElement('.frage-ich');
                }
                if (typeof antwort_suche == "undefined") {
                    return me.addErrorToElement('.frage-du');
                } else {
                    me.removeErrorFromElement('.frage-du');
                }
                $('.ajax-loader').show();
                $.ajax({
                    type: 'POST',
                    url: '/xsite/call/fe_wgtest/collectAnswer',
                    data: {
                        frage: frage_id,
                        antwort_bin: antwort_bin,
                        antwort_suche: antwort_suche,
                        antwort_wichtig: antwort_wichtig,
                        lang: top.P_LANG,
                        from_restart: from_restart
                    },
                    success: function(response) {
                        if (response.success) {
                            if (response.lastQuestion == 1) {
                                window.location = redirectTo;
                            } else {
                                $('#js-toggle-introtext').collapse();
                                $('.js-wgtest-replacer').html(response.html);
                                me.registerListeners();
                                $('.ajax-loader').hide();
                            }
                        }
                    }
                });
            });
        }
        this.addErrorToElement = function(element) {
            if (typeof element == "undefined") return;
            $(element).addClass("error");
            return false;
        }
        this.removeErrorFromElement = function(element) {
            if (typeof element == "undefined") return;
            $(element).removeClass("error");
            return true;
        }
    }
})();
$(document).ready(function() {
    fe_wgtest.init();
});
