var fe_redesign = (function() {
    return new function() {
        this.init = function() {
        	var me = this;
        	

            
            $('.cookie-warning-top .closing-icon').on('click', function () {
                $.post('/xsite/call/fe_cookie/setCookieWarningSeen', '', function (response) {
                    $('.js-cookie-warning-top').removeClass('active');
                });
            });
            
            /*
             *    frontpage #und-los-gehts mouseover/out button states 
             */    
            $("#btn-wgzimmer").mouseover(function(e){
                $("img.svg.btn-icon-wgzimmer").attr('src', '/xstorage/template/redesign/svg/icon-wg-zimmer-finden-turkis.svg');
                $("#btn-wgzimmer h2").css({'color': '#04e0d7', 'border-top': '2px solid #04e0d7'});
                $("#btn-wgzimmer .fp-text-small").css('color', '#04e0d7');
                $("#btn-wgzimmer button").css({'background-color': '#04e0d7', 'box-shadow': '0.126rem 0.126rem 0.126rem #04e0d7'});
                });
                $("#btn-wgzimmer").mouseout(function(e){
                    $("img.svg.btn-icon-wgzimmer").attr('src', '/xstorage/template/redesign/svg/icon-wg-zimmer-finden-black.svg');
                    $("#btn-wgzimmer h2").css({'color': '#646464', 'border-top': '2px solid #646464'});
                    $("#btn-wgzimmer .fp-text-small").css('color', '#333');
                    $("#btn-wgzimmer button").css({'background-color': '#646464', 'box-shadow': '0.126rem 0.126rem 0.126rem #646464'});
                });
                
                $("#btn-mitbewohner").mouseover(function(e){
                    $("img.svg.btn-icon-mitbewohner").attr('src', '/xstorage/template/redesign/svg/icon-mitbewohner-finden-turkis.svg');
                    $("#btn-mitbewohner h2").css({'color': '#04e0d7', 'border-top': '2px solid #04e0d7'});
                    $("#btn-mitbewohner .fp-text-small").css('color', '#04e0d7');
                    $("#btn-mitbewohner button").css({'background-color': '#04e0d7', 'box-shadow': '0.126rem 0.126rem 0.126rem #04e0d7'});
                });
                $("#btn-mitbewohner").mouseout(function(e){
                    $("img.svg.btn-icon-mitbewohner").attr('src', '/xstorage/template/redesign/svg/icon-mitbewohner-finden-black.svg');
                    $("#btn-mitbewohner h2").css({'color': '#646464', 'border-top': '2px solid #646464'});
                    $("#btn-mitbewohner .fp-text-small").css('color', '#333');
                    $("#btn-mitbewohner button").css({'background-color': '#646464', 'box-shadow': '0.126rem 0.126rem 0.126rem #646464'});
                });
                
                $("#btn-wg").mouseover(function(e){
                    $("img.svg.btn-icon-wgsuchtwg").attr('src', '/xstorage/template/redesign/svg/icon-wg-sucht-wg-turkis.svg');
                    $("#btn-wg h2").css({'color': '#04e0d7', 'border-top': '2px solid #04e0d7'});
                    $("#btn-wg .fp-text-small").css('color', '#04e0d7');
                    $("#btn-wg button").css({'background-color': '#04e0d7', 'box-shadow': '0.126rem 0.126rem 0.126rem #04e0d7'});
                });
                $("#btn-wg").mouseout(function(e){
                    $("img.svg.btn-icon-wgsuchtwg").attr('src', '/xstorage/template/redesign/svg/icon-wg-sucht-wg-black.svg');
                    $("#btn-wg h2").css({'color': '#646464', 'border-top': '2px solid #646464'});
                    $("#btn-wg .fp-text-small").css('color', '#333');
                    $("#btn-wg button").css({'background-color': '#646464', 'box-shadow': '0.126rem 0.126rem 0.126rem #646464'});
                });
            /** end **/

            
            /*
             *    fixFixed header/footer on focus input field 
             */        
            if ('ontouchstart' in window) {
                var $body = $('body'); 
                $('header')
                .on('focus', 'input', function() {
                    $body.addClass('fixfixed');
                    $body.css('overflow', 'hidden');
                })
                .on('blur', 'input', function() {
                    $body.removeClass('fixfixed');
                    $body.css('overflow', 'visible');
                });
            }
            /* end */


            /* 
             * disable scroll when login form collapsed in
             */
            var $body = $('body');
            $('header').on('click', 'a.btn-login', function() {
                console.log('btn-login');
                $('body').toggleClass('no-scroll');
            });
            /* end */
            
            
            /*
             * rotate arrow icons when form collapsed in/out
             */
            $('#collapse-map').click(function() {
                if($('#map').hasClass('collapse in')) {
                    $('#map-icon-arrow-down').rotate({angle:0});
                } else {
                    $('#map-icon-arrow-down').rotate({angle:180});
                }
            });
            
            $('#collapse-chat').click(function() {
                if($('#chat-input-search').hasClass('collapse in')) {
                    $('#chat-icon-arrow-down').rotate({angle:0});
                } else {
                    $('#chat-icon-arrow-down').rotate({angle:180});
                }
            });
            /* end */


            /*
             * mobile subnavi btn actions 
             */
            $('.btn-subnav-filter').click(function() {
                if($('#search-filter').attr("trigger") === "0") {
                    $('#search-filter').css("display", "block");
                    $('#search-filter').attr("trigger","1");
                }
                else {
                    $('#search-filter').css("display", "none");
                    $('#search-filter').attr("trigger","0");
                }
            });
            
            $('.btn-subnav-map').click(function () {
                var newMapPos = (($('#search-hits').height() + 30) * -1);
                var newSearchListPos = $('#search-map-chat .mapcontacts').height();
                var origSearchListPos = $('#search-hits').position().top;
                if($('#search-map-chat .mapcontacts').attr("trigger") === "0") {
                    $('#search-hits').css("top", newSearchListPos);
                    $('#search-map-chat .mapcontacts').css({"display": "block", "top": newMapPos});
                    $('#search-map-chat .mapcontacts').attr("trigger","1");
                }
                else {
                    $('#search-hits').css("top", "0");
                    $('#search-map-chat .mapcontacts').css("display", "none");
                    $('#search-map-chat .mapcontacts').attr("trigger","0");
                }
            });
            
            $('.btn-subnav-chatsearch').click(function () {
                var newChatPos = $('#search-hits').offset().top;
                var newSearchListPos = $('#search-map-chat .chatcontacts').height();
                var origSearchListPos = $('#search-hits').position().top;
                if($('#search-map-chat .chatcontacts').attr("trigger") === "0") {
                    $('#search-hits').css("top", newSearchListPos);
                    $('#search-map-chat .chatcontacts').css({"display": "block", "top": newMapPos});
                    $('#search-map-chat .chatcontacts').attr("trigger","1");
                }
                else {
                    $('#search-hits').css("top", "0");
                    $('#search-map-chat .chatcontacts').css("display", "none");
                    $('#search-map-chat .chatcontacts').attr("trigger","0");
                }
            }); 
            
            /* end */
        }
        
    }   
})();

$(document).ready(function() {
	console.log('rd init');
    fe_redesign.init();
});
    /* END */    