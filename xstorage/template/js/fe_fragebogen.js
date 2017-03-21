var fe_fragebogen = (function() {
    return new function() {
        this.init = function() {
            this.registerListeners();
        }
        this.registerListeners = function() {
            var me = this;

            // $("#mail-reg-submit").on('hide.bs.collapse', function (e) {
            //     e.preventDefault();
            // });
            //
            $(".js-show-reg-form").unbind("click");
            $(".js-show-reg-form").click(function(e) {
                e.preventDefault();
                $(".js-show-reg-form").hide();
                $(".js-simple-login").show();
            });



        }
    }
})();
$(document).ready(function() {
    console.log('init js fe_fragebogen');
    fe_fragebogen.init();
});
