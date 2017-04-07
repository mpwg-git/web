var fe_redesign = (function() {
    return new function() {
        this.init = function() {
        	var me = this;

        	var media_xs = window.matchMedia("(max-width: 529px)");
        	var media_md = window.matchMedia("(min-width: 530px)");

        	
        	if(P_ID == 25) {
            	var leftRowHeight = $('#main-content .left-row').height() + 50;
            	$('#pw-vergessen').css('height', leftRowHeight);
            	$('#main-content .left-row').css('padding-bottom', '100px');
            }
        	
        	if(media_md.matches && P_ID ==46) {
        		$('.blog-page.default-container-paddingtop > .blog-item').css({'box-shadow': '0 0 5px 5px rgba(100,100,100,0.1)'});
//        		$('.blog-page.default-container-paddingtop > .blog.blog-start').css('height', centerBoxHeight);
        	}

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


           
            

//            icon-svg legend-nr2
//            $('#fragebogenModal').click(function(e) {
//            	e.preventDefault();
//            	$('.icon-svg.legend-nr1').toggleClass('active');
//            	$('.icon-svg.legend-nr2').toggleClass('active');
//            	
//            });

/*************************************
 	
 	M O B I L E / subnavi btn actions
 	
 *************************************/
            if($(window).width() <= 768) {

	            var $filter 	=  $('#search-filter');
	            var $treffer 	=  $('#search-hits');
	            var $map	 	=  $('#search-map-chat .mapcontacts');
	            var $chat	 	=  $('#search-map-chat .chatcontacts');
	            var $pos		=  0;

	            $(document).on('click', '.btn-subnav-filter', function() {
	            	if($filter.attr("trigger") === "0") {
	            		$treffer.css("top", "0");
	            		$filter.css({"display": "block", "top": "0"}).attr("trigger","1");
	            		$map.hide().attr("trigger","0");
	            		$chat.hide().attr("trigger","0");
	            	}
	            	else {
	            		$filter.hide().attr("trigger","0");
	                	$treffer.css("top", "0");
	            	}
	            });


	            $(document).on('click', '.btn-subnav-map', function() {
	            	if($map.attr("trigger") === "0") {
	            		$pos = (($treffer.height() + 30) * -1);
	            		$treffer.css("top",  $map.height() + 20);
	            		$map.css({"display": "block", "top": $pos}).attr("trigger","1");
	            		$filter.hide().attr("trigger","0");
	            		$chat.hide().attr("trigger","0");
	            	}
	            	else {
	            		$map.hide().attr("trigger","0");
	                	$treffer.css("top", "0");
	            	}
	            });


	            $(document).on('click', '.btn-subnav-chatsearch', function() {
	            	if($chat.attr("trigger") === "0") {
	            		$pos = (($treffer.height() + 30) * -1);
	            		$treffer.css("top",  $chat.height() + 20);
	            		$chat.css({"display": "block", "top": $pos}).attr("trigger","1");
	            		$filter.hide().attr("trigger","0");
	            		$map.hide().attr("trigger","0");
	            	}
	            	else {
	            		$chat.hide().attr("trigger","0");
	                	$treffer.css("top", "0");
	            	}
	            });


	            $(document).on('click', '.suche-cat', function() {
	            	$filter.toggle().attr("trigger","0");

	            	if($('input#typ-biete').hasClass("active")) {
	            		$('input#typ-biete').removeClass("active");
	            		$('input#typ-suche').addClass("active");
	            	}
	            	else {
	            		$('input#typ-biete').addClass("active");
	            		$('input#typ-suche').removeClass("active");
	            	}
	            });
	            

	        }

        }
    }
})();

$(document).ready(function() {
	
    fe_redesign.init();
});
/* END */ 