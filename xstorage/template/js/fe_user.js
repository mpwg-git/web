var delRoomOnce = false;
var deactAccountOnce = false; 
var base64Img = false;
var cropData = false;

var fe_user = (function() {

	return new function() {
		
		this.init = function()
		{
			this.jcrop_api;
			
			this.registerListeners();
			this.registerUploadListeners();
		}
		
		
		this.registerListeners = function()
		{
			var me = this;
			
			$('.js-accept-join').unbind("click");
			$('.js-accept-join').click(function(e)
			{
				e.preventDefault();
				$('.ajax-loader').show();
				
				var roomId 	= $(this).data('room');
				
				var data			= {
					room: roomId	
				};
				
				$.ajax({
				   type: 'POST',
				   url: '/xsite/call/fe_room/acceptInvitation',
				   data: data,
				   success: function(data){
						$('.ajax-loader').hide();
						location.reload(true);	
				   }
				});
			});
			
			
			$('.js-reject-join').unbind("click");
			$('.js-reject-join').click(function(e)
			{
				e.preventDefault();
				$('.ajax-loader').show();
				
				var roomId 	= $(this).data('room');
				
				var data			= {
					room: roomId	
				};
				
				$.ajax({
				   type: 'POST',
				   url: '/xsite/call/fe_room/rejectInvitation',
				   data: data,
				   success: function(data){
						$('.ajax-loader').hide();
						location.reload(true);	
				   }
				});
			});
			
			
			$(document).off('click', '#form-del-account').on('click', '#form-del-account', function(e){
				if (delRoomOnce == true) return;
				delRoomOnce = true;
				var $me = $(this);
				$me.popover({
			   		placement: 'top', 
			   		content: '<span class="wirklich">'+top.delete_word1+'<br/><span class="loeschen">'+top.delete_word2+'?</span></span><div class="button-container"><button class="button btn js-btn-confirm-ja">'+top.str_yes+'</button><button class="button btn js-btn-confirm-nein">'+top.str_no+'</button>', 
			   		html: true,
			   		callback: function() {
			   			
			   			var popOver		= this;
			   			
			   			$('.js-btn-confirm-ja').unbind("click");
			   			$('.js-btn-confirm-ja').click(function(){
			   				fe_user.delContent('disable_my_account', 0);
			   			});
			   			
			   			$('.js-btn-confirm-nein').unbind("click");
			   			$('.js-btn-confirm-nein').click(function(){
			   				$me.popover('hide');
			   			});
			   			
			   			delRoomOnce = false;
			   		}
			   	});
			   	$me.popover('show');
			});
			
			
			
			$('.js-delete-room-popup').unbind('click');
			$(document).on('click', '.js-delete-room-popup', function(e){
				
				e.preventDefault(); 
				
				if (delRoomOnce == true) return;
				
				delRoomOnce = true;
					
				var roomId = $(this).attr('data-room');
				var theType = 'room';
				var $me = $(this);
				
								
				$me.popover({
			   		placement: (fe_core.getCurrentFace() == 3 ? 'left' : 'bottom'), 
			   		content: '<span class="wirklich">'+top.delete_word1+'<br/><span class="loeschen">'+top.delete_word2+'?</span></span><div class="button-container"><button class="button btn js-btn-confirm-ja">'+top.str_yes+'</button><button class="button btn js-btn-confirm-nein">'+top.str_no+'</button>', 
			   		html: true,
			   		callback: function() {
			   			
			   			var delType  	= theType;
			   			var delId		= roomId;
			   			
			   			$('.js-btn-confirm-ja').unbind("click");
			   			$('.js-btn-confirm-ja').click(function(){
			   				fe_user.delContent(delType, delId);
			   			});
			   			
			   			$('.js-btn-confirm-nein').unbind("click");
			   			$('.js-btn-confirm-nein').click(function(evt2){
			   				evt2.preventDefault(); 
			   				$me.popover('hide');
			   				return;
			   			});
			   			
			   			delRoomOnce = false;
			   		}
			   	});
			   	$me.popover('show'); 
			   	delRoomOnce = false; 
			});
			
			
			
			$('.js-activate-room').unbind("click");
			$('.js-activate-room').click(function(e)
			{
				e.preventDefault();
				$('.ajax-loader').show();
				
				var roomId 	= $(this).data('room');
				
				var data			= {
					room: roomId	
				};
				
				$.ajax({
				   type: 'POST',
				   url: '/xsite/call/fe_room/activateRoom',
				   data: data,
				   success: function(data){
						//$('.ajax-loader').hide();
						location.reload(true);	
				   }
				});
			});
			
			$('.js-deactivate-room').unbind("click");
			$('.js-deactivate-room').click(function(e)
			{
				e.preventDefault();
				$('.ajax-loader').show();
				
				var roomId 	= $(this).data('room');
				
				var data			= {
					room: roomId	
				};
				
				$.ajax({
				   type: 'POST',
				   url: '/xsite/call/fe_room/deactivateRoom',
				   data: data,
				   success: function(data){
						location.reload(true);	
				   }
				});
			});
			
			
			
			
			
			$('#form-mein-profil-save').unbind("click");
			$('#form-mein-profil-save').click(function(e)
			{
				e.preventDefault();
				return fe_core.submitWithValidation('form-mein-profil');
			});
			
			/*
			$('#form-mein-raum-save').unbind("click");
			$('#form-mein-raum-save').click(function(e)
			{
				var redirectTo = $(this).data('redirect');
				console.log("raum save");
				
				e.preventDefault();
				fe_core.submitWithValidation('form-mein-raum');
				
				window.location = redirectTo;
			});
			*/
			
			$('#form-raum-einladen-save').unbind("click");
			$('#form-raum-einladen-save').click(function(e)
			{
				e.preventDefault();
				return fe_core.submitWithValidation('form-raum-einladen');
			});
			
			
			$('#form-mein-profil-save-user').unbind("click");
			$('#form-mein-profil-save-user').click(function(e)
			{
				e.preventDefault();
				return fe_core.submitWithValidation('form-mein-user');
			});
			
			$('#form-deactivate-account').unbind("click");
			$('#form-deactivate-account').click(function(e)
			{
				e.preventDefault();
				if (deactAccountOnce == true) {
					return;
				}
				
				deactAccountOnce = true;
					
				var $me = $(this);
				$me.popover({
			   		placement: 'top', 
			   		content: '<span class="wirklich">'+top.deactivate_word1+'<br/><span class="deaktivieren">'+top.deactivate_word2+'?</span></span><div class="button-container"><button class="button btn js-btn-confirm-ja">'+top.str_yes+'</button><button class="button btn js-btn-confirm-nein">'+top.str_no+'</button>', 
			   		html: true,
			   		trigger: 'manual',
			   		callback: function()
			   		{
			   			$('.js-btn-confirm-ja').unbind("click");
			   			$('.js-btn-confirm-ja').click(function(){
			   				fe_user.delContent('user_inactive');
			   			});
			   			
			   			$('.js-btn-confirm-nein').unbind("click");
			   			$('.js-btn-confirm-nein').click(function(evt2){
			   				evt2.preventDefault(); 
			   				$me.popover('hide');
			   				return;
			   			});
			   			
			   			deactAccountOnce = false;
			   		}
			   	});
			   	
				$me.popover('show');
					   	
			   	deactAccountOnce = false;
			});
			
			$('#form-reactivate-account').unbind("click");
			$('#form-reactivate-account').click(function(e)
			{
				e.preventDefault();
				if (deactAccountOnce == true) return;
				
				deactAccountOnce = true;
					
				var $me = $(this);
								
				$me.popover({
			   		placement: 'top', 
			   		content: '<span class="wirklich">'+top.activate_word1+'<br/><span class="aktivieren">'+top.activate_word2+'?</span></span><div class="button-container"><button class="button btn js-btn-confirm-ja">'+top.str_yes+'</button><button class="button btn js-btn-confirm-nein">'+top.str_no+'</button>', 
			   		html: true,
			   		callback: function() {
			   			
			   			var popOver		= this;
			   			
			   			$('.js-btn-confirm-ja').unbind("click");
			   			$('.js-btn-confirm-ja').click(function(){
			   				fe_user.delContent('user_active');
			   			});
			   			
			   			$('.js-btn-confirm-nein').unbind("click");
			   			$('.js-btn-confirm-nein').click(function(){
			   				$me.popover('hide');
			   			});
			   			
			   			deactAccountOnce = false;
			   		}
			   	});
			   	$me.popover('show');
			   	
			});
			
			
			$('.form-mein-profil').unbind("submit");
			$('.form-mein-profil').submit(function(e)
			{
				e.preventDefault();
				
				$('.ajax-loader').show();
				
				var data			= {};
				data.user			= $('.form-mein-user').serialize();
				data.profile		= $('.form-mein-profil').serialize();
				
				$.ajax({
				   type: 'POST',
				   url: '/xsite/call/fe_user/profileSave',
				   data: data,
				   success: function(data){
						//$('.ajax-loader').hide();
						window.location.href = $('#form-mein-profil-save').data('redirect');
				   }
				});
			});
			
			
			$('.form-mein-raum').unbind("submit");
			$('.form-mein-raum').submit(function(e)
			{
				e.preventDefault();
				
				var ok = fe_core.jsFormValidation('form-mein-raum');

				if ( typeof ok != "undefined" && ok == true) 
				{
					$('.ajax-loader').show();
					
					var data			= {};
					data.room			= $('.form-mein-raum').serialize();
					//data.profile		= $('.form-mein-profil').serialize();
					
					$.ajax({
					   type: 'POST',
					   url: '/xsite/call/fe_room/profileSave',
					   data: data,
					   success: function(data){
							//$('.ajax-loader').hide();
							window.location.href = $('#form-mein-raum-save').data('redirect');
					   }
					});
				}
				
				return false;
					
			});
			
			
			$('.form-raum-einladen').unbind("submit");
			$('.form-raum-einladen').submit(function(e)
			{
				e.preventDefault();
				
				$('.ajax-loader').show();
				
				var data			= {};
				data.form			= $('.form-raum-einladen').serialize();
				//data.profile		= $('.form-mein-profil').serialize();
				
				$.ajax({
				   type: 'POST',
				   url: '/xsite/call/fe_room/sendInvitation',
				   data: data,
				   success: function(data){
						$('.ajax-loader').hide();
						$('.js-success-notification').show();
				   }
				});
			});
			
			
			$('.form-mein-user').unbind("submit");
			$('.form-mein-user').submit(function(e)
			{
				e.preventDefault();
				
				$('.ajax-loader').show();
				
				var data			= {
					user: $('.form-mein-user').serialize()	
				};
				
				$.ajax({
				   type: 'POST',
				   url: '/xsite/call/fe_user/profileSave',
				   data: data,
				   success: function(data){
						$('.ajax-loader').hide();
				   }
				});
			});
			
			$('#form-mein-profil-save').unbind("click");
			$('#form-mein-profil-save').click(function(e)
			{
				e.preventDefault();
				return fe_core.submitWithValidation('form-mein-profil')
			});
			
			$('#form-login-submit').unbind("click");
			$('#form-login-submit').click(function(e)
			{
				e.preventDefault();
				return fe_core.submitWithValidation('form-login')
			});
			
			$('#form-register-submit').unbind("click");
			$('#form-register-submit').click(function(e)
			{
				e.preventDefault();
				return fe_core.submitWithValidation('form-register')
			});
			
			$('#form-pw-submit').unbind("click");
			$('#form-pw-submit').click(function(e)
			{
				e.preventDefault();
				return fe_core.submitWithValidation('wz_form-login')
			});
			
			
			$('.autocomplete-location').keydown(function(event){
			    if(event.keyCode == 13) {
			      event.preventDefault();
			      event.stopPropagation();
			      return false;
			    }
			});
			
			// klick auf ente = enter senden
			$('.js-autocomplete-duck').unbind('click');
			$('.js-autocomplete-duck').bind('click', function(e){
				var e = jQuery.Event("keydown");
				e.which = 13;
				$('.autocomplete-location').focus().trigger(e);
				
				// desktop: map zentrieren auf gewählte location
				if ($('#map:visible').length > 0)
				{
					var pl = autocomplete.getPlace();
					if (pl)
					{
						var lat = pl.geometry.location.lat();
						var lng = pl.geometry.location.lng();
						
						if (lat > 0 && lng > 0)
						{
							fe_map.centerMapOnPoint(lat, lng, $('#map'));
						}
					}
				}
				
			});
		
			$('.add-image-crop').unbind('click');
			$('.add-image-crop').bind('click', function(e){
				
				e.preventDefault();
				
				// DESKTOP - jCrop uploader
				/*
				if (fe_core.getCurrentFace() == 3)
				{
					$('.ajax-loader').show();			
					
					var formdata = $('#coords').serialize();
					$.ajax({
						type: 'POST',
						url: '/xsite/call/fe_user/cropImageAndSaveNew',
						data: formdata,
						success: function(response){
							$('.ajax-loader').hide();
							if (response.success) {
								me.goToStep(2, response);
							}
						}
					});
				}
				*/
				// MOBILE / TABLET: SmoothZoom 
				
					
					$.ajax({
						type: 'POST',
						url: '/xsite/call/fe_user/cropImageAndSaveNew',
						data: cropData,
						success: function(response){
							$('.ajax-loader').hide();
							if (response.success) {
								me.goToStep(2, response);
							}
						}
					});
					
					
					 
					
					/*
					if (base64Img !== false)
					{
						$('.ajax-loader').show();
						$.ajax({
							type: 'POST',
							url: '/xsite/call/fe_user/get_dkrm_image',
							data: 'img=' + base64Img, 
							success: function(response){
								$('.ajax-loader').hide();
								location.reload(true);
							}
						})
					}
					*/
					
				
			});
			
			$('#reset-password-btn').on('click',function(e){
				e.preventDefault();
				
				var valid = fe_core.jsFormValidation('reset-password');
				
				if(!valid)
				{
					return false;
				}
				
				var data = $('#reset-password').serialize();
				
				fe_core.showLoader();
				
				$.ajax({
					url		: '/xsite/call/fe_user/reset_password',
					method	: 'POST',
					data	: data,
					success	: function(response) {		
						
						$('#currentPWD_error').hide();
						$('#currentPWD_wrong_error').hide();
						
						$('#change-password').find("input[type=password]").val("");
						
						$('#reset-password').animate({
		 					display: 'none'	
		 				}, 250 ,function(){
		 					$('.thx-container').fadeIn();
		 					fe_core.hideLoader();
		 				});
						
						fe_core.hideLoader();
					},
					error	: function(response) {
						
						// -1 || PASSWORT != PASSWORT2
						// -2 || currentPWD ist false
						// -3 || nicht eingeloggt
						// 1 || alles ok
						
						if(response.responseJSON.msg.id == -2)
						{
							$('#currentPWD_error').hide();
							$('#currentPWD_wrong_error').show();
						}
						
						if(response.responseJSON.msg.id == -1)
						{
							$('#reset-password_PASSWORT2_error').show();
						}
						
						fe_core.hideLoader();
					}
				});
			});
			
			
			$('.add-image-final-submit').unbind("click");
			$('.add-image-final-submit').click(function(e){
				
				e.preventDefault();
				
				me.handleFinalUpload($('.add-image-final-form'));
				
				return;
			});
			
			
			$('.js-toggle-favourite').unbind('click');
			$('.js-toggle-favourite').bind('click', function(e){
				
				
				e.preventDefault();
				
				var userId 	= $(this).data('id');
				var theType = $(this).data('type');
				var me 		= this;
				$.ajax({
					type: 'POST',
					url: '/xsite/call/fe_user/toggleFav',
					data: {
						f_userId: userId,
						theType	: theType
					},
					success: function(response){
					
						switch (response.state)
						{
							case true:
								$(me).find('.active').show();
								$(me).find('.inactive').hide();

								break;
								
							case false:
								$(me).find('.inactive').show();
								$(me).find('.active').hide();
								
								if ($(me).hasClass('js-toggle-fade'))
								{
									///console.log("bbb", $(me).closest('.searchresult-single'));
									
									$(me).closest('.searchresult-single').fadeOut();
								}
								
								break;	
								
							default:
								break;
						}
					}
				});
			});
			
			
			$('.js-toggle-blocked').unbind('click');
			$('.js-toggle-blocked').bind('click', function(e){
				
				e.preventDefault();
				
				var userId 	= $(this).data('id');
				var theType = $(this).data('type');
				var me 		= this;
				
				$.ajax({
					type: 'POST',
					url: '/xsite/call/fe_user/toggleBlock',
					data: {
						f_userId: userId,
						theType: theType
					},
					success: function(response){
						switch (response.state)
						{
							case true:
								$(me).find('.active').show();
								$(me).find('.inactive').hide();
								
								if ($(me).hasClass('js-toggle-fade'))
								{
									///console.log("aaa", $(me).closest('.searchresult-single'));
									
									$(me).closest('.searchresult-single').fadeOut();
								}
								
								break;
								
							case false:
								$(me).find('.inactive').show();
								$(me).find('.active').hide();
								break;	
								
							default:
								break;
								
						}
					}
				});
			});
			
			//console.log('image slider royal init');
			if ($(".image-slider").length > 0)
			{
				$(".image-slider").royalSlider({
			        autoHeight: true,
					arrowsNav: true,
					arrowsNavAutoHide: false,
					fadeinLoadedSlide: false,
					controlNavigationSpacing: 0,
					controlNavigation: 'bullets',
					thumbs: false,
					imageScaleMode: 'fill',
					imageAlignCenter:false,
					loop: false,
					loopRewind: true,
					numImagesToPreload: 6,
					keyboardNavEnabled: false,
					usePreloader: false,
					slidesSpacing: 0
			    });
			} 
		    
		    
		    $('.meinprofil-images-container .upload-image.hasImage').unbind("click");
			$('.meinprofil-images-container .upload-image.hasImage').click(function(e){
				
				e.preventDefault();
				$(this).find('.popover-del').show();
				
				return;
			});
			
			
			/*
			$('.meinprofil-images-container .upload-image.hasImage .del-image').unbind("click");
			$('.meinprofil-images-container .upload-image.hasImage .del-image').click(function(e){
				
				e.preventDefault();
				
				var id = $(this).data("fotoid");
				
				$.ajax({
					type: 'POST',
					url: '/xsite/call/fe_user/delFoto',
					data: {
						fotoId: id
					},
					success: function(response){
						
						if (typeof response.fotoId != "undefined")
						{
							console.log("rem ", response.fotoId);
							$('.upload-image[data-fotoid="'+response.fotoId+'"]').remove();
							
						}					
						me.registerListeners();
					}
				});
				
				return;
			});
			*/
			
			/*** selector mitbewohner ***/
			$(".icon-plus-container").click(function(e){
				e.stopImmediatePropagation();
				$(this).toggleClass("active");
			});
			
			$(".icon-plus-container .icon-frau_outline").unbind("click");
			$(".icon-plus-container .icon-frau_outline").click(function(e){
				var personContainer = $(this).closest(".mitbewohner-container").find(".person");
				$(personContainer).append('<span class="unchecked icon-frau_outline"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="icon-rel icon-minus-rel"></span></span>');
				var value = parseInt($("#mitbewohner-frauen-counter").val(), 10);
				value++;
				$("#mitbewohner-frauen-counter").val(value);
				me.registerListeners();
			});	
			
			$(".icon-plus-container .icon-mann_outline").unbind("click");
			$(".icon-plus-container .icon-mann_outline").click(function(e){
				var personContainer = $(this).closest(".mitbewohner-container").find(".person");
				$(personContainer).append('<span class="unchecked icon-mann_outline"><span class="path1"></span><span class="path2"></span><span class="icon-rel icon-minus-rel"></span></span>');
				var value = parseInt($("#mitbewohner-maenner-counter").val(), 10);
				value++;
				$("#mitbewohner-maenner-counter").val(value);
				me.registerListeners();
			});	
			
			$(".mitbewohner-container .person .icon-frau_outline .icon-minus-rel").unbind("click");
			$(".mitbewohner-container .person .icon-frau_outline .icon-minus-rel").click(function(e){
				$(this).closest(".icon-frau_outline").remove();
				var value = parseInt($("#mitbewohner-frauen-counter").val(), 10);
				value--;
				$("#mitbewohner-frauen-counter").val(value);
			});
			
			$(".mitbewohner-container .person .icon-mann_outline .icon-minus-rel").unbind("click");
			$(".mitbewohner-container .person .icon-mann_outline .icon-minus-rel").click(function(e){
				$(this).closest(".icon-mann_outline").remove();
				var value = parseInt($("#mitbewohner-maenner-counter").val(), 10);
				value--;
				$("#mitbewohner-maenner-counter").val(value);
			});
			/*** end selector mitbewohner ***/
			
			$('.js-hide-conversation').unbind("click");
			$('.js-hide-conversation').click(function(e){
		      	
		      	e.preventDefault();
		      	
		      	var messageId 	= $(this).data("messageid");
		      	var userId 		= $(this).data("userid");
		      	
		      	$.ajax({
					type: 'POST',
					url: '/xsite/call/fe_chat/hideConversation',
					data: {
						messageId: messageId,
						userId: userId
					},
					success: function(response){
						
						$('.chat-conversation-container[data-userid='+userId+']').remove();
					}
				});
				     
		    });
			
			
			if ($(".js-chatwindow").length > 0)
			{
				fe_chat.init();
			}
			
			// fix width of the autocomplete
			jQuery.ui.autocomplete.prototype._resizeMenu = function () {
			  var ul = this.menu.element;
			  ul.outerWidth(this.element.outerWidth());
			}
			
			if($('.js-search-personen').length > 0)
			{
				$(".js-search-personen").autocomplete({
	
					source: function(request, response) {
						$.ajax({
							url: "/xsite/call/fe_user/searchUser",
							dataType: "jsonp",
							data: {
								q: request.term
							},
							success: function( data ) {
								response( data );
								fe_core.hideLoader();
							}
						});
					},
					response: function(event, ui) {
						// ui.content is the array that's about to be sent to the response callback.
						if (ui.content.length === 0) {
							var noResult = { value:"",label: "Leider kein Ergebnis gefunden" };
							ui.content.push(noResult);
						} else {
							//$("#empty-message").empty();
						}
					},
					minLength: 3,
					select: function( event, ui ) {
						event.preventDefault(); // needed to stop autocomplete from putting the ID to the textfield... WEB-286
						if(ui.item.url)
						{
							$(".js-search-personen").val(ui.item.label);
							window.location  = ui.item.url;
						}
					}
	
				}).data("ui-autocomplete")._renderItem = function( ul, item ) {
					
					ul.addClass('autocomplete-user-ul');
					
					if(item.value == '')
					{
						return $('<li class="autocomplete-user-result autocomplete-user-not-found">')
						.append( '<a>' + item.label + "</a>" )
						.appendTo( ul );
					}
					else
					{
						return $('<li class="autocomplete-user-result autocomplete-user-found">')
						.append( '<a href="'+ item.url +'">' + item.label + "</a>" )
						.appendTo( ul );
					}
				};
			}
			
			
			var tmp = $.fn.popover.Constructor.prototype.show;
			$.fn.popover.Constructor.prototype.show = function() {
			    tmp.call(this); if (this.options.callback) {
			        this.options.callback();
			    }
			}
		   	
		   	$('.popover-del').popover({
		   		placement: 'right', 
		   		content: '<span class="wirklich">'+top.delete_word1+'<br/><span class="loeschen">'+top.delete_word2+'?</span></span><div class="button-container"><button class="button btn js-btn-confirm-ja">'+top.str_yes+'</button><button class="button btn js-btn-confirm-nein">'+top.str_no+'</button>', 
		   		html: true,
		   		callback: function() {
		   			
		   			var popOver		= this;
		   			var delType  	= this.deltype;
		   			var delId		= this.delid;
		   			
		   			$('.js-btn-confirm-ja').unbind("click");
		   			$('.js-btn-confirm-ja').click(function(){
		   				
		   				console.log("del", delType, delId);
		   				fe_user.delContent(delType, delId);
		   			});
		   			
		   			$('.js-btn-confirm-nein').unbind("click");
		   			$('.js-btn-confirm-nein').click(function(){
		   				
		   				$('.popover-del').popover('hide');
		   			});
		   		}
		   	});
			
			
			me.registerUploadListeners();
			
		    
		}
		
		this.delContent = function(type, id)
		{
			var me = this;
			
			$.ajax({
				type: 'POST',
				url: '/xsite/call/fe_user/delContent',
				data: {
					type: type,
					id: id
				},
				success: function(response){
					
					if ($('#form-mein-raum-save').length > 0)
					{
						var redirectTo = $('#form-mein-raum-save').data('redirect');
						if (redirectTo != "")
						{
							window.location.href = redirectTo;
							return;
						} 
					}
					
					location.reload(true);
				}
			});
			
		}
		
		
		this.registerUploadListeners = function()
         {
         	var me = this;
         	
         	try {
				$('.add-image').bind('fileuploadsubmit', function (e, data) {
				    var type  	= $(this).data('type');
				    me.type   	= type;
				    var refid  	= $(this).data('refid');
				    me.refid   	= refid;
				    data.formData = {
				    	type: type,
				    	refid: refid,
				    	p_id: top.P_ID
				    };
				});
				
				$('.add-image').fileupload({
					formData		: { fromFileupload: 'true', p_id: top.P_ID},
					//acceptFileTypes	: /(\.|\/)(jpe?g)$/i,
					acceptFileTypes: /(\.|\/)(gif|jpe?g|png|tif|tiff|pdf)$/i,
					dataType: "json",
					maxNumberOfFiles: 1,
					url				: '/xsite/call/fe_user/uploadImage',
					type			: 'POST',
					
					beforeSend: function(e, data) {
						
						if (me.type == 'profile')
						{
							$('.add-image-profil .upload-progress-bar').css('height', '10px');
							$('.add-image-profil .upload-progress-bar').css('width', '0%');	
						}
						else
						{
							$('.add-image-other .upload-progress-bar').css('height', '10px');
							$('.add-image-other .upload-progress-bar').css('width', '0%');
						}
						
						
					},
					progressall: function (e, data) {
						var progress = parseInt(data.loaded / data.total * 100, 10);				
						
						if (me.type == 'profile')
						{
							$('.add-image-profil .upload-progress-bar').animate({
								width: progress + '%'
							});	
						}
						else
						{
							$('.add-image-other .upload-progress-bar').animate({
								width: progress + '%'
							});
						}
					},
					add: function (e, data) {
						data.submit();
					},
					fail: function (e, data) {
						//console.log("fail uploading", data);
					},
					done: function (e, data) {
						//console.log("done uploading", data);
						$('.upload-progress-bar').css('height', '0px');
						$('.upload-progress-bar').css('width', '0%');
						if (data.result.success == true) 
						{
							me.goToStep(1, data.result);
						}
						else
						{
							//console.log("done upload");
							// TODO
						}
					}
				});
				
			} catch(e){}
         }
         
         
         this.imgCrop = function() 
         {
         	
         	var trueOrigW 		= parseInt($('#trueOrigW').val(), 10);
			var trueOrigH 		= parseInt($('#trueOrigH').val(), 10);
     		var $image 			= $('#avatarCrop');
		    var selRatio 		= 0.92;
		    var selectionWidth 	= 600 * selRatio;
		    var selectionHeight = 600;
		    
		    var formdata = {};
		    formdata.s_id 	= $('#s_id').val();
            formdata.p_id 	= top.P_ID;
            formdata.lang 	= top.P_LANG;
              
            // type für raum/user, refId für Raum 
            formdata.refid	= $('input[name="refid"]').first().val();
            formdata.type	= $('input[name="type"]').first().val();
            
         	// WORKAROUND BIS MOBILE CROP THEMA GEFIXT IST: Mobile kein Cropper...
         	if (fe_core.getCurrentFace() != 3)
         	{
         		formdata.trueCropW = 0;
         		formdata.trueCropH = 0;
         		formdata.trueX = 0;
         		formdata.trueY = 0;
         		cropData = formdata;
         	}
         	else
         	{
         		// WEB-340: set larger area (almost full image) - geklärt, da cropper das bild eh einpasst 
				$image.smoothZoom({
					width					 : selectionWidth,
					height					 : selectionHeight,
					zoom_OUT_TO_FIT			 : false,
					responsive				 : true,
					pan_BUTTONS_SHOW		 : false,
					responsive_maintain_ratio: true,
					max_WIDTH				 : '',
					max_HEIGHT				 : '',
					on_ZOOM_PAN_UPDATE		 : function(obj, e)
					{
					},
					on_ZOOM_PAN_COMPLETE	 : function(obj, e)
					{
		                  // hier überschreiben wir die formdata mit den smoothzoom daten, deshalb:
		                  // nochmal die defaultwerte hinzufügen
		                  
		                  formdata = obj;
		                  
		                  
		                    formdata.s_id 	= $('#s_id').val();
				            formdata.p_id 	= top.P_ID;
				            formdata.lang 	= top.P_LANG;
				              
				            // type für raum/user, refId für Raum 
				            formdata.refid	= $('input[name="refid"]').first().val();
				            formdata.type	= $('input[name="type"]').first().val();
		                  
		                  formdata.selectionWidth 	= selectionWidth;
		                  formdata.selectionHeight 	= selectionHeight;
		                  formdata.uploader 		= 'smoothZoom';
		                  
		                  
		                  // + die WICHTIGEN werte für calc
		                  formdata.origW		= parseInt($('#trueOrigW').val(), 10);
		                  formdata.origH		= parseInt($('#trueOrigH').val(), 10);
		                  formdata.origRatioX	= formdata.origW / formdata.normWidth;
		                  formdata.origRatioY	= formdata.origH / formdata.normHeight;
		                  formdata.ratiox2      = formdata.origW / formdata.scaledWidth;
		                  formdata.ratioy2      = formdata.origH / formdata.scaledHeight;
		                  formdata.selRatio		= selRatio;
		                  
		                  // trueX / Y stimmen noch 
		                  formdata.trueX	 	= parseFloat(formdata.normX) * formdata.origRatioX;
		                  formdata.trueY	 	= parseFloat(formdata.normY) * formdata.origRatioY;
		                  
		                  // ab hier haben wir einen fehler: wenn kamera bild (s_id 18213) ist ausschnitt zu klein. desktop + mobile selber fehler.
		                  // pixelbild (18203) ist querformat, selbstgemacht, funktioniert desktop + mobile richtig	                  
		                  // kamerabild kommt in 72dpi korrekt rotated etc
		                  // switch in fe_user.php line 1382, da ist ein libx::isDeveloper drin.
		                  
		                  formdata.trueCropW = formdata.selectionWidth /   (formdata.selectionWidth / formdata.origW) / formdata.ratio;
		                  formdata.trueCropH = formdata.trueCropW / formdata.selRatio;
		                  	                  
		                  // übergeben an globale variable             
					      cropData = formdata;
					      
					      // dev cropper
					      if ($('.cropx').length > 0) {
			      			$('.cropx').width(  cropData.trueCropW );
					      	$('.cropx').height( cropData.trueCropH );
					      	
					      	$('.cropx').css('left', cropData.trueX + 'px');
					      	$('.cropx').css('top', cropData.trueY + 'px');
					      }
					      
		            }
				});
         		
         	}
         	
		}

		this.goToStep = function(step, data)
		{
			var me = this;
			
			switch(step)
			{
				case 1:
					$('.add-image-crop-area').html(data.data.html);
					$('.upload-image-modal').modal('show');	
					
					
					$('.upload-image-modal').on('shown.bs.modal', function (e) {
					  // do something...
						$('.avatarCrop').attr('src', data.src).css('height', 'auto');
						
						if (typeof me.jcrop_api != "undefined") 
						{
							me.jcrop_api.destroy();
						}
						me.imgCrop();
					});
					
					break;
				
				case 2:
					$('.add-image-crop-area').html(data.data.html);
					break;
					
				case 3:
					$('.upload-image-modal').modal('hide');	
					location.reload(true);
					
					break;
				
				default: 
					break;
			}
			me.registerListeners();
		}
		
		
		this.handleFinalUpload = function(form)
		{
			var me 		= this;
			
			$('.ajax-loader').show();
			
			var formdata = $(form).serialize();
			
			$.ajax({
				type: 'POST',
				url: '/xsite/call/fe_user/finalSubmit',
				data: formdata,
				success: function(response){
					
					$('.ajax-loader').hide();
					
					if (response.success) 
					{	
						me.goToStep(3, response);
					}
				}
			});
		}
	}
	
})();


$(document).ready(function(){
	fe_user.init();
});