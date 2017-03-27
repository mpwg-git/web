var delRoomOnce = false;
var deactAccountOnce = false;
var base64Img = false;
var glltFormData = false;
var glltCropData = false;
var fe_user = (function() {
    return new function() {
        this.init = function() {
            this.jcrop_api;
            this.registerListeners();
            this.registerUploadListeners();
        }
        this.registerListeners = function() {
            var me = this;
            $('.js-accept-join').unbind("click");
            $('.js-accept-join').click(function(e) {
                e.preventDefault();
                $('.ajax-loader').show();
                var roomId = $(this).data('room');
                var data = {
                    room: roomId
                };
                $.ajax({
                    type: 'POST',
                    url: '/xsite/call/fe_room/acceptInvitation',
                    data: data,
                    success: function(data) {
                        $('.ajax-loader').hide();
                        location.reload(true);
                    }
                });
            });
            $('.js-reject-join').unbind("click");
            $('.js-reject-join').click(function(e) {
                e.preventDefault();
                $('.ajax-loader').show();
                var roomId = $(this).data('room');
                var data = {
                    room: roomId
                };
                $.ajax({
                    type: 'POST',
                    url: '/xsite/call/fe_room/rejectInvitation',
                    data: data,
                    success: function(data) {
                        $('.ajax-loader').hide();
                        location.reload(true);
                    }
                });
            });
            $(document).off('click', '#form-del-account').on('click', '#form-del-account', function(e) {
                if (delRoomOnce == true) return;
                delRoomOnce = true;
                var $me = $(this);
                $me.popover({
                    placement: 'top',
                    content: '<span class="wirklich">' + top.delete_word1 + '<br/><span class="loeschen">' + top.delete_word2 + '?</span></span><div class="button-container"><button id="del-account" class="button btn js-btn-confirm-ja">' + top.str_yes + '</button><button class="button btn js-btn-confirm-nein">' + top.str_no + '</button>',
                    html: true,
                    callback: function() {
                        var popOver = this;
                        $('.js-btn-confirm-ja').unbind("click");
                        $('.js-btn-confirm-ja').click(function() {
                            fe_user.delContent('disable_my_account', 0);
                        });
                        $('.js-btn-confirm-nein').unbind("click");
                        $('.js-btn-confirm-nein').click(function() {
                            $me.popover('hide');
                        });
                        delRoomOnce = false;
                    }
                });
                $me.popover('show');
            });
            $('.js-delete-room-popup').unbind('click');
            $(document).on('click', '.js-delete-room-popup', function(e) {
                e.preventDefault();
                if (delRoomOnce == true) return;
                delRoomOnce = true;
                var roomId = $(this).attr('data-room');
                var theType = 'room';
                var $me = $(this);
                $me.popover({
                    placement: (fe_core.getCurrentFace() == 3 ? 'left' : 'bottom'),
                    content: '<span class="wirklich">' + top.delete_word1 + '<br/><span class="loeschen">' + top.delete_word2 + '?</span></span><div class="button-container"><button id="delete-room" class="button btn js-btn-confirm-ja">' + top.str_yes + '</button><button class="button btn js-btn-confirm-nein">' + top.str_no + '</button>',
                    html: true,
                    callback: function() {
                        var delType = theType;
                        var delId = roomId;
                        $('.js-btn-confirm-ja').unbind("click");
                        $('.js-btn-confirm-ja').click(function() {
                            fe_user.delContent(delType, delId);
                        });
                        $('.js-btn-confirm-nein').unbind("click");
                        $('.js-btn-confirm-nein').click(function(evt2) {
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
				$('#neues-zimmer-anlegen').unbind('click');
				$('#neues-zimmer-anlegen').one('click', function(){
					var userid = $('#hiddenUserId').attr('value');
					var data = {
						 user: userid,
						 xkalt: false,
					};
					// console.log(userId);
					$.ajax({
						type: 'POST',
						url: '/xsite/call/fe_room/sendMailNewRoom',
						data: data,
						success: function(data) {
							console.log("send mail new room ",userid);
						},
					});
				});
				// $('.new-room').click(function(e) {
				// 	// e.preventDefault();
				// 	var userid = $('#hiddenUserId').attr('value');
				// 	var data = {
				// 		 user: userid
				// 	};
				// 	// console.log(userId);
				// 	$.ajax({
				// 		type: 'POST',
				// 		url: '/xsite/call/fe_room/roomActivatedMail',
				// 		data: data,
				// 		success: function(data) {
				// 			console.log("send mail new room ",userid);
				// 		},
				// 	});
				// });

            $('.js-activate-room').unbind("click");
            $('.js-activate-room').click(function(e) {
                e.preventDefault();
                $('.ajax-loader').show();
                var roomId = $(this).data('room');
                var data = {
                    room: roomId
                };

                $.ajax({
                    type: 'POST',
                    url: '/xsite/call/fe_room/activateRoom',
                    data: data,
                    success: function(data) {
                        location.reload(true);
                    },
                  //   complete: function() {
						// 		$.ajax({
                  //           type: 'POST',
                  //           url: '/xsite/call/fe_room/sendRoomActivatedMail',
                  //           data: data,
                  //           success: function() {
                  //               console.log('sendRoomActivatedMail done');
                  //           }
                  //       });
                  //   }
                });
            });
            $('.js-deactivate-room').unbind("click");
            $('.js-deactivate-room').click(function(e) {
                e.preventDefault();
                $('.ajax-loader').show();
                var roomId = $(this).data('room');
                var data = {
                    room: roomId
                };
                $.ajax({
                    type: 'POST',
                    url: '/xsite/call/fe_room/deactivateRoom',
                    data: data,
                    success: function(data) {
                        location.reload(true);
                    }
                });
            });
            $('#form-mein-profil-save').unbind("click");
            $('#form-mein-profil-save').click(function(e) {
                e.preventDefault();
                return fe_core.submitWithValidation('form-mein-profil');
            });
            $('#form-raum-einladen-save').unbind("click");
            $('#form-raum-einladen-save').click(function(e) {
                e.preventDefault();
                return fe_core.submitWithValidation('form-raum-einladen');
            });
            $('#form-mein-profil-save-user').unbind("click");
            $('#form-mein-profil-save-user').click(function(e) {
                e.preventDefault();
                return fe_core.submitWithValidation('form-mein-user');
            });
            $('#form-deactivate-account').unbind("click");
            $('#form-deactivate-account').click(function(e) {
                e.preventDefault();
                if (deactAccountOnce == true) {
                    return;
                }
                deactAccountOnce = true;
                var $me = $(this);
                $me.popover({
                    placement: 'top',
                    content: '<span class="wirklich">' + top.deactivate_word1 + '<br/><span class="deaktivieren">' + top.deactivate_word2 + '?</span></span><div class="button-container"><button id="deactivate-account" class="button btn js-btn-confirm-ja">' + top.str_yes + '</button><button class="button btn js-btn-confirm-nein">' + top.str_no + '</button>',
                    html: true,
                    trigger: 'manual',
                    callback: function() {
                        $('.js-btn-confirm-ja').unbind("click");
                        $('.js-btn-confirm-ja').click(function() {
                            fe_user.delContent('user_inactive');
                        });
                        $('.js-btn-confirm-nein').unbind("click");
                        $('.js-btn-confirm-nein').click(function(evt2) {
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
            $('#form-reactivate-account').click(function(e) {
                e.preventDefault();
                if (deactAccountOnce == true) return;
                deactAccountOnce = true;
                var $me = $(this);
                $me.popover({
                    placement: 'top',
                    content: '<span class="wirklich">' + top.activate_word1 + '<br/><span class="aktivieren">' + top.activate_word2 + '?</span></span><div class="button-container"><button class="button btn js-btn-confirm-ja">' + top.str_yes + '</button><button class="button btn js-btn-confirm-nein">' + top.str_no + '</button>',
                    html: true,
                    callback: function() {
                        var popOver = this;
                        $('.js-btn-confirm-ja').unbind("click");
                        $('.js-btn-confirm-ja').click(function() {
                            fe_user.delContent('user_active');
                        });
                        $('.js-btn-confirm-nein').unbind("click");
                        $('.js-btn-confirm-nein').click(function() {
                            $me.popover('hide');
                        });
                        deactAccountOnce = false;
                    }
                });
                $me.popover('show');
            });
            

            
            
            $('#icon-mann-circle').unbind("click");
            $('#icon-mann-circle').click(function(e) {
                e.preventDefault();

            	if($('path.svg-icon-mann-circle').css('fill') == 'rgb(100, 100, 100)') {
            		$('path.svg-icon-mann-circle').css({fill: 'rgb(4, 224, 215)'});
	            }
	            else {
	        		$('path.svg-icon-mann-circle').css({fill: 'rgb(100, 100, 100)'});
	            }
            });
            $('#icon-frau-circle').unbind("click");
            $('#icon-frau-circle').click(function(e) {
                e.preventDefault();

            	if($('path.svg-icon-frau-circle').css('fill') == 'rgb(100, 100, 100)') {
            		$('path.svg-icon-frau-circle').css({fill: 'rgb(4, 224, 215)'});
	            }
	            else {
	        		$('path.svg-icon-frau-circle').css({fill: 'rgb(100, 100, 100)'});
	            }
            });
            
            
            

            $('.form-mein-profil').unbind("submit");
            $('.form-mein-profil').submit(function(e) {
                e.preventDefault();
                var data = {};
                data.user = $('.form-mein-user').serialize();
                data.profile = $('.form-mein-profil').serialize();

                $('.ajax-loader').show();
                $.ajax({
                    type: 'POST',
                    url: '/xsite/call/fe_user/profileSave',
                    data: data,
                    success: function(data) {
//                        window.location.href = $('#form-mein-profil-save').data('redirect');
                    	location.reload();

                    }
                });
            });

            $('.form-mein-raum-save').unbind("click");
            $('.form-mein-raum').unbind("submit");
            $('.form-mein-raum').submit(function(e) {
                e.preventDefault();
                var ok = fe_core.jsFormValidation('form-mein-raum');

                if (typeof ok != "undefined" && ok == true) {
                    $('.ajax-loader').show();
                    var data = {};
                    data.room = $('.form-mein-raum').serialize();

                    if(fe_core.getCurrentFace() == 3) {
                    	data.ueberMich = $('.form-mein-user').serialize();
                	}
                    $.ajax({
                        type: 'POST',
                        url: '/xsite/call/fe_room/profileSave',
                        data: data,
                        success: function(data) {
                            window.location.href = $('#form-mein-raum-save').data('redirect');
                        }
                    });
                } else if (!ok) {
                  if (fe_core.getCurrentFace() == 1)
                  {
                          $('.profilerstellen').animate({
                              top: 1150
                          }, 600);

                  } else {

                     $('#mCSB_2_container, #mCSB_2_dragger_vertical').animate({
                          top: ($('#ZEITRAUM_VON').offset().top + 275)
                     }, 800);

                  }
                }
                return false;
            });
            $('.form-raum-einladen').unbind("submit");
            $('.form-raum-einladen').submit(function(e) {
                e.preventDefault();
                $('.ajax-loader').show();
                var data = {};
                data.form = $('.form-raum-einladen').serialize();
                $.ajax({
                    type: 'POST',
                    url: '/xsite/call/fe_room/sendInvitation',
                    data: data,
                    success: function(data) {
                        $('.ajax-loader').hide();
                        $('.js-success-notification').show();
                    }
                });
            });
            $('.form-mein-user').unbind("submit");
            $('.form-mein-user').submit(function(e) {
                e.preventDefault();

                $('#VORNAME_error, #NACHNAME_error').hide();
                
                var vname = $('input#vorname').val().length;
                var nname = $('input#nachname').val().length;
                
                if(vname == 0) {
                	fe_core.hideLoader();
                	if(fe_core.getCurrentFace() == 3)
                	{
                		$('#VORNAME_error').show();
                		$('input#vorname').keydown(function(){
                    		$('#VORNAME_error').hide();
                		});
                    	return;
                	}
                	else
                	{
                		$('#VORNAME_error').show();
                		$('.profilerstellen').animate({
                			top: 500
                        }, 600);
                		$('input#vorname').keydown(function(){
                    		$('#VORNAME_error').hide();
                		});
                    	return;
                	}
                }
                else if(nname == 0) {
                	fe_core.hideLoader();
                	if(fe_core.getCurrentFace() == 3)
                	{
                    	$('#NACHNAME_error').show();
                    	$('input#nachname').keydown(function(){
                    		$('#NACHNAME_error').hide();
                		});
                    	return;
                	}
                	else
                	{
                    	$('#NACHNAME_error').show();
                    	$('.profilerstellen').animate({
                    		top: 500
                    	}, 600);
                		$('input#nachname').keydown(function(){
                    		$('#NACHNAME_error').hide();
                		});
                    	return;
                	}
                }
                
                
                var data = {
                    user: $('.form-mein-user').serialize()
                };
                // hiddenRoomId != false oder leer type == biete
                if(fe_core.getCurrentFace() == 3) {
                    var checkType = $('#hiddenRoomId').val();

                	if(checkType != false || checkType != '') {
                		data.room = $('.form-mein-raum').serialize();
                	}
                }
                $.ajax({
                    type: 'POST',
                    url: '/xsite/call/fe_user/profileSave',
                    data: data,
                    success: function(data) {
                    	
//                		fe_core.showLoader(location.reload($('.profilerstellen').css('top', $(window).height() - $('header').height() - 120), fe_core.hiderLoader()));
                		fe_core.showLoader($(window).scrollTop(0));
                		fe_core.hideLoader();
                		
                    }
                });
            });
            $('#form-mein-profil-save').unbind("click");
            $('#form-mein-profil-save').click(function(e) {
                e.preventDefault();                
                return fe_core.submitWithValidation('form-mein-profil')
            });
            $('#form-login-submit').unbind("click");
            $('#form-login-submit').click(function(e) {
                e.preventDefault();
                var ret = fe_core.submitWithValidation('form-login');
                console.log(ret);
                
            });
            $('#form-register-submit').unbind("click");
            $('#form-register-submit').click(function(e) {
                e.preventDefault();
                return fe_core.submitWithValidation('form-register')
            });
            $('#form-pw-submit').unbind("click");
            $('#form-pw-submit').click(function(e) {
                e.preventDefault();
                return fe_core.submitWithValidation('wz_form-login')
            });
            $('.autocomplete-location').keydown(function(event) {
                if (event.keyCode == 13) {
                    event.preventDefault();
                    event.stopPropagation();
                    return false;
                }
            });
            $('.js-autocomplete-duck').unbind('click');
            $('.js-autocomplete-duck').bind('click', function(e) {
                var e = jQuery.Event("keydown");
                e.which = 13;
                $('.autocomplete-location').focus().trigger(e);
                if ($('#map:visible').length > 0) {
                    var pl = autocomplete.getPlace();
                    if (pl) {
                        var lat = pl.geometry.location.lat();
                        var lng = pl.geometry.location.lng();
                        if (lat > 0 && lng > 0) {
                            fe_map.centerMapOnPoint(lat, lng, $('#map'));
                        }
                    }
                }
            });
            $('.add-image-crop').unbind('click');
            $('.add-image-crop').bind('click', function(e) {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: '/xsite/call/fe_user/cropImageAndSaveNew',
                    data: cropData,
                    success: function(response) {
                        $('.ajax-loader').hide();
                        if (response.success) {
                            me.goToStep(2, response);
                        }
                    }
                });
            });


/**
 * image crop plugin
 * https://github.com/matiasgagliano/guillotine
**/
            $('#modal').off('shown.bs.modal');
            $('#modal').on('shown.bs.modal', function() {
            	
            	var xrFace = fe_core.getCurrentFace();
            	var imgType = 'other';
                var picture = $('#gui_image');
                
                picture.one('load', function(e){
                	if($('#gui-frame > input#type').val() != 'other')
                		imgType = $('#gui-frame > input#type').val();
                	
                	if(imgType == 'profile') {
                		picture.guillotine({
                			width: 345,
                			height: 345                    		
                		});
                		$('#gui-frame').css('margin-bottom', '3.5%');
                	}
                	else
                	{
                		picture.guillotine({
                			width: 761,
                			height: 401                    		
                		});	
                		$('.modal-dialog').css('height', '60%');
                		var stylesDesk = {
                			width: '95%',
                			margin: '0% 2.5% 5.5% 2.5%'
                		};
                		var stylesMob = {
                			width: '95%',
                			padding: '0px 10px 10px 10px !important'
                		};
                		
                		if(fe_core.getCurrentFace() == 3) $('.modal-body').css( stylesDesk );
                		else $('.modal-body').css( stylesMob );
                		
                		$('#gui-frame').css( stylesDesk );
                		$('#gui-frame').css('margin-top', '3.5%');
                		$('#controls').css('width', '95%');
                	}
                	
                	picture.guillotine('fit');
                	
                	fe_core.hideLoader();
                	
                	$('#rotate_left').click(function(){ picture.guillotine('rotateLeft'); });
                	$('#rotate_right').click(function(){ picture.guillotine('rotateRight'); });
                	$('#fit').click(function(){ picture.guillotine('fit'); });
                	$('#zoom_in').click(function(){ picture.guillotine('zoomIn'); });
                	$('#zoom_out').click(function(){ picture.guillotine('zoomOut'); });
                });
                if (picture.prop('complete')) picture.trigger('load')
            });
            
            $('#save-gui-image').unbind('click');
            $('#save-gui-image').bind('click', function(e) {
                e.preventDefault();
        		$('.ajax-loader').show();
                
                glltFormData = {};
                glltFormData.p_id		= top.P_ID;
                glltFormData.lang		= top.P_LANG;
                glltFormData.s_id 		= $('#s_id').val();
                glltFormData.origW		= $('#origW').val();
                glltFormData.origH		= $('#origH').val();                
                glltFormData.currentW   = $('#gui_image').width();
                glltFormData.currentH   = $('#gui_image').height();
                
                var imgType = 'other';
                if($('#gui-frame > input#type').val() != 'other')
                {
                	glltFormData.type = $('#gui-frame > input#type').val();
                	glltFormData.refid = $('#refid').val();
                }
                glltCropData = {};
                glltCropData = $('#gui_image').guillotine('getData');
                glltCropData.refid = $('#refid').val();

                $.ajax({
                	type: 'POST',
                	url: '/xsite/call/fe_user/saveGuillotineImg',
                	data: {
                		glltFormData: glltFormData,
                		glltCropData: glltCropData
                	},
                	success: function(response) {
                		
                		var result = response;
                        if (response.success) {
                    		$('.ajax-loader').hide();
                            $('.gui-image-final-form #refid').val = $('#refidHidden').val();
                            me.goToStep(2, response);
                        }
                    }
                })
            });
// WEB-271
            $('a[href*="collapseChangeMail"]').click(function() {
            $('#changeMail')[0].reset();
				        $('#oldPasswd-error, #newPasswd-error, #newPasswdConfirm-error, #newPasswd-error, span.error-message-1, span.error-message-2, #changePasswd-success').hide();
            });

            $('#changeMail-btn').unbind('click');
            $('#changeMail-btn').on('click', function(e) {
            	e.preventDefault();

            	var email_neu 			= $('#email_neu').val();
            	var email_neu_confirm	= $('#email_neu_confirm').val();

            	$.ajax({
            		type: 'POST',
            		url:'/xsite/call/fe_user/checkNewMail',
            		data: {
            			email_neu: email_neu,
            			email_neu_confirm: email_neu_confirm
            		},
            		dataType : 'json',
            		success: function(result) {
            			if(result == -1) {
            				$('#email-error-1').show();
            				$('#email-error-2, #email-error-3').hide();
            				return false;
            			}
            			if(result == -2) {
            				$('#email-error-2').show();
            				$('#email-error-1, #email-error-3').hide();
            				return false;
            			}
            			if(result == -3) {
            				$('#email-error-3').show();
            				$('#email-error-1, #email-error-2').hide();
            				return false;
            			}
            			if(result == 1) {
            				$('#changeMail-success').show();
            				$('#email-error-1, #email-error-2, #email-error-3').hide();

            				$.ajax({
                        		type: 'POST',
                        		url:'/xsite/call/fe_user/changeMail',
                        		data: {
                        			email_neu: email_neu
                        		},
                            	success: function(result) {
                            		if(result == 'OK')
                            			console.log(result);
                            			location.reload(true);
                            	}
                    		});
            				location.reload(true);
            			}
            		}
            	});
            });


            $('a[href*="collapseChangePwd"]').click(function() {
            	$('#changePwd')[0].reset();
				$('#oldPasswd-error, #newPasswd-error, #newPasswdConfirm-error, #newPasswd-error, span.error-message-1, span.error-message-2, #changePasswd-success').hide();
            });

            $('#changePwd-btn').unbind('click');
            $('#changePwd-btn').on('click', function(e) {
            	e.preventDefault();

            	var pwd_alt 		= $('#oldPasswd').val();
            	var pwd_neu 		= $('#newPasswd').val();
            	var pwd_neuConfirm 	= $('#newPasswdConfirm').val();

            	$.ajax({
            		type: 'POST',
            		url:'/xsite/call/fe_user/checkPasswdForm',
            		data: {
            			pwd_alt: pwd_alt,
            			pwd_neu: pwd_neu,
            			pwd_neuConfirm: pwd_neuConfirm
                    },
            		dataType : 'json',
                	success: function(result) {
                		console.log("Success: ",result);
                		if(result.checkAlt == "01")
                		{
                			$('#oldPasswd-error, span.error-message-1').show();
            				$('#newPasswd-error, #newPasswd-error #newPasswdConfirm-error, span.error-message-2').hide();
            				return;
                		}
                		if(result.checkNeu == "02")
                		{
            				$('#oldPasswd-error, #newPasswdConfirm-error, #newPasswd-error, span.error-message-1, span.error-message-2').hide();
            				$('#newPasswd-error').show();
            				return;
                		}
                		if(result.checkAlt == "-1")
                		{
                			$('#oldPasswd-error, span.error-message-2').show();
            				$('#newPasswd-error, #newPasswd-error #newPasswdConfirm-error, span.error-message-1').hide();
            				return;
                		}
                		if(result.checkNeu == "-2")
                		{
            				$('#oldPasswd-error, #newPasswd-error, #newPasswd-error, span.error-message-1, span.error-message-2').hide();
            				$('#newPasswdConfirm-error').show();
            				return;
                		}
                		if(result.checkAlt == "1" && result.checkNeu == "2")
                		{
                    		$('#oldPasswd-error, #newPasswd-error, #newPasswdConfirm-error, span.error-message-1, span.error-message-2').hide();
                    		$('#changePasswd-success').show();

                    		$.ajax({
                        		type: 'POST',
                        		url:'/xsite/call/fe_user/changePwd',
                        		data: {
                        			pwChange: pwd_neu
                        		},
                        		dataType : 'json',
                            	success: function(result) {
                            		location.reload(true);
                            	}
                    		});
                		}
            		},
            		error: function(result) {
            			console.log("Error: ",result);
            		},
            		failure: function(result) {
            			console.log("Failure: ",result);
            		}
            	});

            });
// END WEB-271


            $('#reset-password-btn').on('click', function(e) {
                e.preventDefault();
                var valid = fe_core.jsFormValidation('reset-password');
                if (!valid) {
                    return false;
                }
                var data = $('#reset-password').serialize();
                fe_core.showLoader();
                $.ajax({
                    url: '/xsite/call/fe_user/reset_password',
                    method: 'POST',
                    data: data,
                    success: function(response) {
                        $('#currentPWD_error').hide();
                        $('#currentPWD_wrong_error').hide();
                        $('#change-password').find("input[type=password]").val("");
                        $('#reset-password').animate({
                            display: 'none'
                        }, 250, function() {
                            $('.thx-container').fadeIn();
                            fe_core.hideLoader();
                        });
                        fe_core.hideLoader();
                    },
                    error: function(response) {
                        if (response.responseJSON.msg.id == -2) {
                            $('#currentPWD_error').hide();
                            $('#currentPWD_wrong_error').show();
                        }
                        if (response.responseJSON.msg.id == -1) {
                            $('#reset-password_PASSWORT2_error').show();
                        }
                        fe_core.hideLoader();
                    }
                });
            });

            $('.js-toggle-favourite').unbind('click');
            $('.js-toggle-favourite').bind('click', function(e) {
                e.preventDefault();
                var userId = $(this).data('id');
                var theType = $(this).data('type');
                var me = this;
                
                $.ajax({
                    type: 'POST',
                    url: '/xsite/call/fe_user/toggleFav',
                    data: {
                        f_userId: userId,
                        theType: theType
                    },
                    success: function(response) {
                    	
                    	/*fe_core.showLoader(location.reload(true, fe_core.hideLoader()));*/
                        
                    	switch (response.state) {
                            case true:
                                $(me).find('.active').show();
                                $(me).find('.inactive').hide();
                                /*$('.ajax-loader').hide(location.reload());*/
                                break;
                            case false:
                                $(me).find('.inactive').show();
                                $(me).find('.active').hide();
                                if ($(me).hasClass('js-toggle-fade')) {
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
            $('.js-toggle-blocked').bind('click', function(e) {
                e.preventDefault();
                var userId = $(this).data('id');
                var theType = $(this).data('type');
                var me = this;
                $.ajax({
                    type: 'POST',
                    url: '/xsite/call/fe_user/toggleBlock',
                    data: {
                        f_userId: userId,
                        theType: theType
                    },
                    success: function(response) {
                    	/*fe_core.showLoader(location.reload(true, fe_core.hideLoader()));*/

                        switch (response.state) {
                            case true:
                                $(me).find('.active').show();
                                $(me).find('.inactive').hide();
                                if ($(me).hasClass('js-toggle-fade')) {
                                    $(me).closest('.searchresult-single').fadeOut();
                                }
                                /*$('.ajax-loader').hide(location.reload());*/
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
            if ($(".image-slider").length > 0) {
                $(".image-slider").royalSlider({
                    autoHeight: true,
                    arrowsNav: true,
                    arrowsNavAutoHide: false,
                    fadeinLoadedSlide: false,
                    controlNavigationSpacing: 0,
                    controlNavigation: 'bullets',
                    thumbs: false,
                    imageScaleMode: 'fill',
                    imageAlignCenter: false,
                    loop: false,
                    loopRewind: true,
                    numImagesToPreload: 6,
                    keyboardNavEnabled: false,
                    usePreloader: false,
                    slidesSpacing: 0
                });
            }
            $('.meinprofil-images-container .upload-image.hasImage').unbind("click");
            $('.meinprofil-images-container .upload-image.hasImage').click(function(e) {
                e.preventDefault();
                $(this).find('.popover-del').show();
                return;
            });
            $(".icon-plus-container").click(function(e) {
                e.stopImmediatePropagation();
                $(this).toggleClass("active");
            });
            $(".icon-plus-container .icon-frau_outline").unbind("click");
            $(".icon-plus-container .icon-frau_outline").click(function(e) {
                var personContainer = $(this).closest(".mitbewohner-container").find(".person");
                $(personContainer).append('<span class="unchecked icon-frau_outline"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="icon-rel icon-minus-rel"></span></span>');
                var value = parseInt($("#mitbewohner-frauen-counter").val(), 10);
                value++;
                $("#mitbewohner-frauen-counter").val(value);
                me.registerListeners();
            });
            $(".icon-plus-container .icon-mann_outline").unbind("click");
            $(".icon-plus-container .icon-mann_outline").click(function(e) {
                var personContainer = $(this).closest(".mitbewohner-container").find(".person");
                $(personContainer).append('<span class="unchecked icon-mann_outline"><span class="path1"></span><span class="path2"></span><span class="icon-rel icon-minus-rel"></span></span>');
                var value = parseInt($("#mitbewohner-maenner-counter").val(), 10);
                value++;
                $("#mitbewohner-maenner-counter").val(value);
                me.registerListeners();
            });
            $(".mitbewohner-container .person .icon-frau_outline .icon-minus-rel").unbind("click");
            $(".mitbewohner-container .person .icon-frau_outline .icon-minus-rel").click(function(e) {
                $(this).closest(".icon-frau_outline").remove();
                var value = parseInt($("#mitbewohner-frauen-counter").val(), 10);
                value--;
                $("#mitbewohner-frauen-counter").val(value);
            });
            $(".mitbewohner-container .person .icon-mann_outline .icon-minus-rel").unbind("click");
            $(".mitbewohner-container .person .icon-mann_outline .icon-minus-rel").click(function(e) {
                $(this).closest(".icon-mann_outline").remove();
                var value = parseInt($("#mitbewohner-maenner-counter").val(), 10);
                value--;
                $("#mitbewohner-maenner-counter").val(value);
            });
            $('.js-hide-conversation').unbind("click");
            $('.js-hide-conversation').click(function(e) {
                e.preventDefault();
                var messageId = $(this).data("messageid");
                var userId = $(this).data("userid");
                $.ajax({
                    type: 'POST',
                    url: '/xsite/call/fe_chat/hideConversation',
                    data: {
                        messageId: messageId,
                        userId: userId
                    },
                    success: function(response) {
                        $('.chat-conversation-container[data-userid=' + userId + ']').remove();
                    }
                });
            });
            if ($(".js-chatwindow").length > 0) {
                fe_chat.init();
            }
            jQuery.ui.autocomplete.prototype._resizeMenu = function() {
                var ul = this.menu.element;
                ul.outerWidth(this.element.outerWidth());
            }
            if ($('.js-search-personen').length > 0) {
                $(".js-search-personen").autocomplete({
                    source: function(request, response) {
                        $.ajax({
                            url: "/xsite/call/fe_user/searchUser",
                            dataType: "jsonp",
                            data: {
                                q: request.term
                            },
                            success: function(data) {
                                response(data);
                                fe_core.hideLoader();
                            }
                        });
                    },
                    response: function(event, ui) {
                        if (ui.content.length === 0) {
                            var noResult = {
                                value: "",
                                label: "Leider kein Ergebnis gefunden"
                            };
                            ui.content.push(noResult);
                        } else {}
                    },
                    minLength: 3,
                    select: function(event, ui) {
                        event.preventDefault();
                        if (ui.item.url) {
                            $(".js-search-personen").val(ui.item.label);
                            window.location = ui.item.url;
                        }
                    }
                }).data("ui-autocomplete")._renderItem = function(ul, item) {
                    ul.addClass('autocomplete-user-ul');
                    if (item.value == '') {
                        return $('<li class="autocomplete-user-result autocomplete-user-not-found">').append('<a>' + item.label + "</a>").appendTo(ul);
                    } else {
                        return $('<li class="autocomplete-user-result autocomplete-user-found">').append('<a href="' + item.url + '">' + item.label + "</a>").appendTo(ul);
                    }
                };
            }
            var tmp = $.fn.popover.Constructor.prototype.show;
            $.fn.popover.Constructor.prototype.show = function() {
                tmp.call(this);
                if (this.options.callback) {
                    this.options.callback();
                }
            }
            $('.popover-del').popover({
                placement: 'right',
                content: '<span class="wirklich">' + top.delete_word1 + '<br/><span class="loeschen">' + top.delete_word2 + '?</span></span><div class="button-container"><button class="button btn js-btn-confirm-ja">' + top.str_yes + '</button><button class="button btn js-btn-confirm-nein">' + top.str_no + '</button>',
                html: true,
                callback: function() {
                    var popOver = this;
                    var delType = this.deltype;
                    var delId = this.delid;
                    $('.js-btn-confirm-ja').unbind("click");
                    $('.js-btn-confirm-ja').click(function() {
                        console.log("del", delType, delId);
                        fe_user.delContent(delType, delId);
                    });
                    $('.js-btn-confirm-nein').unbind("click");
                    $('.js-btn-confirm-nein').click(function() {
                        $('.popover-del').popover('hide');
                    });
                }
            });

            me.registerUploadListeners();
        }
        this.delContent = function(type, id) {
            var me = this;
            $.ajax({
                type: 'POST',
                url: '/xsite/call/fe_user/delContent',
                data: {
                    type: type,
                    id: id
                },
                success: function(response) {
                    if ($('#form-mein-raum-save').length > 0) {
                        var redirectTo = $('#form-mein-raum-save').data('redirect');
                        if (redirectTo != "") {
                            window.location.href = redirectTo;
                            return;
                        }
                    }
                    location.reload(true);
                }
            });
        }
        this.registerUploadListeners = function() {
            var me = this;
            
            try {
                $('.add-image').bind('fileuploadsubmit', function(e, data) {
                    var type = $(this).data('type');
                    me.type = type;
                    var refid = $(this).data('refid');
                    me.refid = refid;
                    data.formData = {
                        type: type,
                        refid: refid,
                        p_id: top.P_ID
                    };
                });
            	
                $('.add-image').fileupload({
                	formData: {
                        fromFileupload: 'true',
                        p_id: top.P_ID
                    },
                    acceptFileTypes: /(\.|\/)(gif|jpe?g|png|tif|tiff|pdf)$/i,
                    dataType: "json",
                    maxNumberOfFiles: 1,
                    url: '/xsite/call/fe_user/uploadImage',
                    type: 'POST',
                    beforeSend: function(e, data) {
                        if (me.type == 'profile') {
                            $('.add-image-profil .upload-progress-bar').css('height', '10px');
                            $('.add-image-profil .upload-progress-bar').css('width', '0%');
                        } else {
                            $('.add-image-other .upload-progress-bar').css('height', '10px');
                            $('.add-image-other .upload-progress-bar').css('width', '0%');
                        }
                    },
                    progressall: function(e, data) {
                    	fe_core.showLoader();
                        var progress = parseInt(data.loaded / data.total * 100, 10);
                        if (me.type == 'profile') {
                            $('.add-image-profil .upload-progress-bar').animate({
                                width: progress + '%'
                            });
                        } else {
                            $('.add-image-other .upload-progress-bar').animate({
                                width: progress + '%'
                            });
                        }
                    },
                    add: function(e, data) {
                    	fe_core.showLoader();
                    	data.submit();
                    },
                    fail: function(e, data) {
                        fe_core.hideLoader();
                    },
                    done: function(e, data) {
                    	fe_core.showLoader();
                        $('.upload-progress-bar').css('height', '0px');
                        $('.upload-progress-bar').css('width', '0%');
                        if (data.result.success == true) {
                        	
                            me.goToStep(1, data.result);
                        } else {}
                    }
                
                });
            } catch (e) {}
        }

        /*
        this.imgCrop = function() {
            var trueOrigW = parseInt($('#trueOrigW').val(), 10);
            var trueOrigH = parseInt($('#trueOrigH').val(), 10);
            var $image = $('#avatarCrop');
            var selRatio = 0.92;
            var selectionWidth = 600 * selRatio;
            var selectionHeight = 600;
            var formdata = {};
            formdata.s_id = $('#s_id').val();
            formdata.p_id = top.P_ID;
            formdata.lang = top.P_LANG;
            formdata.refid = $('input[name="refid"]').first().val();
            formdata.type = $('input[name="type"]').first().val();
            // if (fe_core.getCurrentFace() != 3) {
            //     formdata.trueCropW = 0;
            //     formdata.trueCropH = 0;
            //     formdata.trueX = 0;
            //     formdata.trueY = 0;
            //     cropData = formdata;
            // } else {
            if(fe_core.getCurrentFace() == 3){
                $("#avatarCrop").mouseup(function(){
                    $('.ajax-loader').show();
                }),

                $(".controlsBg").click(function(){
                    $('.ajax-loader').show();
                })
              }
              else
              {
                $("#avatarCrop").on("touchstart", function () {
                    $('.ajax-loader').show();
                }),

                $("#avatarCrop").on("tap", function () {
                    $('.ajax-loader').show();
                  })
                }

                $image.smoothZoom({
                    width: selectionWidth,
                    height: selectionHeight,
                    zoom_OUT_TO_FIT: false,
                    responsive: true,
                    pan_BUTTONS_SHOW: false,
                    responsive_maintain_ratio: true,
                    max_WIDTH: '',
                    max_HEIGHT: '',

                    on_ZOOM_PAN_UPDATE: function(obj, e) {
                    },
                    on_ZOOM_PAN_COMPLETE: function(obj, e) {
                        $('.ajax-loader').hide();

                        formdata = obj;
                        formdata.s_id = $('#s_id').val();
                        formdata.p_id = top.P_ID;
                        formdata.lang = top.P_LANG;
                        formdata.refid = $('input[name="refid"]').first().val();
                        formdata.type = $('input[name="type"]').first().val();
                        formdata.selectionWidth = selectionWidth;
                        formdata.selectionHeight = selectionHeight;
                        formdata.uploader = 'smoothZoom';
                        formdata.origW = parseInt($('#trueOrigW').val(), 10);
                        formdata.origH = parseInt($('#trueOrigH').val(), 10);
                        formdata.origRatioX = formdata.origW / formdata.normWidth;
                        formdata.origRatioY = formdata.origH / formdata.normHeight;
                        formdata.ratiox2 = formdata.origW / formdata.scaledWidth;
                        formdata.ratioy2 = formdata.origH / formdata.scaledHeight;
                        formdata.selRatio = selRatio;
                        formdata.trueX = parseFloat(formdata.normX) * formdata.origRatioX;
                        formdata.trueY = parseFloat(formdata.normY) * formdata.origRatioY;
                        formdata.trueCropW = formdata.selectionWidth / (formdata.selectionWidth / formdata.origW) / formdata.selRatio;
                        formdata.trueCropH = formdata.trueCropW / formdata.selRatio;
                        cropData = formdata;
                        if ($('.cropx').length > 0) {
                            $('.cropx').width(cropData.trueCropW);
                            $('.cropx').height(cropData.trueCropH);
                            $('.cropx').css('left', cropData.trueX + 'px');
                            $('.cropx').css('top', cropData.trueY + 'px');
                        }
                        $('.ajax-loader').hide();
                    }
                });
            // }
        }
        */
        this.goToStep = function(step, data) {
            var me = this;
            switch (step) {
                case 1:
                    $('.add-image-crop-area').html(data.data.html);
                    $('.upload-image-modal').modal('show');
                    $('#modal').css('overflow', 'hidden');

                    break;
                case 2:
                	
                    $('#gui-frame').html(data.data.html);

                    me.handleFinalUpload($('.gui-image-final-form'));
                    
                    break;
                case 3:
                    var newSrc = $('img.gui-cropped-image').attr('src');
                	
                    var fotoid = parseInt($('.upload-image.hasImage').attr('data-fotoid'), 10) + 1;
                    
                	if(fe_core.getCurrentFace() == 3)
                	{
                		if($('.gui-image-final-form > input#type').val() == 'profile')
                		{
                			$('.profileimage.mCS_img_loaded').attr('src', newSrc);
                		}
                		else
                		{
                			$( '<div class="upload-image hasImage hidden" data-fotoid="'+fotoid+'"><span class="popover-del" data-deltype="bild-room" data-delid="'+fotoid+'" data-original-title="" title=""><span class="icon-rel icon-minus-rel"></span></span>" ').prependTo( $('.meinprofil-images-container') );
                			fe_core.showLoader(location.reload(true, fe_core.hideLoader()));
                		}
                	}
                	else
                	{
                		if($('.gui-image-final-form > input#type').val() == 'profile')
                		{
                			$('.profileimage-img').attr('src', newSrc);
                		}
                		else
                		{
//                			$('div.upload-image.hasImage > img.img-responsive.mCS_img_loaded').attr('src', newSrc);
                			fe_core.showLoader(location.reload(true, fe_core.hideLoader()));
                		}
                	}
                	$('.upload-image-modal').modal('hide');
                    break;
                default:
                    break;
            }
            me.registerListeners();
        }
        this.handleFinalUpload = function(form) {
            var me = this;
            
            var formdata = $(form).serialize();
            
            console.log(formdata);

            $.ajax({
                type: 'POST',
                url: '/xsite/call/fe_user/finalSubmit',
                data: formdata,

                success: function(response) {
                    $('.ajax-loader').hide();
                    if (response.success) {
                        me.goToStep(3, response);
                    }
                }

            });

        }
    }
})();
$(document).ready(function() {
    fe_user.init();
});
