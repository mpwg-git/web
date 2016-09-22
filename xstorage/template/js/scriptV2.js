$.fn.serializeObject = function() {
	var o = {};
	var a = this.serializeArray();

	//console.log(a);

	$.each(a, function() {
		if (o[this.name] !== undefined) {
			if (!o[this.name].push) {
				o[this.name] = [o[this.name]];
			}
			o[this.name].push(this.value || '');
		} else {
			o[this.name] = this.value || '';
		}
	});
	return o;
};

var backend_request = {

	backendUrl : '',
	ajaxTimeout : 120,

	post : function(cfg) {
		$('#errorMSG').html('');

		var postData = cfg.data || {};

		postData.lang = top.P_LANG;
		postData.p_id = top.P_ID;

		$.ajax({
			type : "POST",
			url : backend_request.backendUrl + '/xsite/call/' + cfg.be_scope + '/' + cfg.be_fn,
			//data: cfg.params || {},
			data : postData,
			timeout : backend_request.ajaxTimeout * 1000,
			error : function(xhr, textStatus, errorThrown) {
				/*
				 var msg = $.parseJSON(xhr.responseText);

				 $('#errorMSG').html(msg.msg);
				 */
				if (!cfg.ecb)
					return false;
				if (!cfg.scope)
					cfg.scope = this;
				cfg.ecb.call(cfg.scope, false, cfg);

			},
			success : function(data, textStatus, jqXHR) {
				//console.info(data, textStatus, jqXHR);
				cfg.cb.call(cfg.scope, true, cfg, data);
			},
			dataType : 'json'
		});
	}
}

var facebook = {

	init : function() {
		$(window).load(function() {
			FB.getLoginStatus(function(response) {
				facebook.statusChangeCallback(response);
			});
		});

		$(document).on('click', '.js-fb-login', function(e) {
			e.preventDefault();
			facebook.doLogin();
		});
		
		$(document).on('click', '#fb-login-submit', function(e) {
			e.preventDefault();
			facebook.doLoginSimple();
		});
	},
	
	doLoginSimple : function() {
		FB.login(function(response) {
			if (response.authResponse) {		
				
				var authResponse = response.authResponse;
							
				FB.api('/me', {
					fields : 'first_name, last_name, email, picture, gender'
				}, function(response) {

					var formdata = $('#wg-zimmer-finden').serializeObject();
					var object = $.extend(response, formdata);
					
					object.accessToken = authResponse.accessToken;
					
					var cfg = {
						be_scope : 'fe_user',
						be_fn : 'doFacebookLoginSimple',
						data : object,
						scope : this,
						cb : facebook.doLoginSimpleCallback
					}
																	
					backend_request.post(cfg);

				});
			} else {
				console.log('User cancelled login or did not fully authorize.');
			}
		}, {
			scope : 'email,public_profile'
		});
	},
	
	doLoginSimpleCallback : function(state, cfg, data) {
		console.info(state, cfg, data);

		if (data.status == 'OK') {
			window.location = data.redirect;
		}
	},
	
	doLogin : function() {
		
		var checkboxError = false;
		
		$('.checkbox-error').hide();
		
		$(".hidden-fragen").each(function(i,o){
			var frageId = $(o).val();
			
			var checkedChecker = $('input:checkbox[data-frage="'+frageId+'"]:checked').length;
			
			if(checkedChecker == 0)
			{
				$('#FRAGE_'+frageId+'_error').show();
				
				checkboxError = true;
			}	
		});
				
		var ok = fe_core.jsFormValidation('wg-zimmer-finden');
		
		if ((typeof ok != "undefined" && ok == false) || checkboxError) 
		{
			$('.scrollbarfix','.middle-row').animate({
	        	scrollTop: $('#wg-zimmer-finden').find('.error-div:visible:first').offset().top-200
	    	}, 500);
			
			return false;
		}
		
		if ( typeof ok != "undefined" && ok == true) {
			FB.login(function(response) {
				if (response.authResponse) {		
					
					var authResponse = response.authResponse;
								
					FB.api('/me', {
						fields : 'first_name, last_name, email, picture, gender'
					}, function(response) {

						var formdata = $('#wg-zimmer-finden').serializeObject();
						var object = $.extend(response, formdata);
						
						object.accessToken = authResponse.accessToken;
						
						var cfg = {
							be_scope : 'fe_user',
							be_fn : 'doFacebookLogin',
							data : object,
							scope : this,
							cb : facebook.doLoginCallback
						}
																		
						backend_request.post(cfg);

					});
				} else {
					console.log('User cancelled login or did not fully authorize.');
				}
			}, {
				scope : 'email,public_profile'
			});
		}

	},

	doLoginCallback : function(state, cfg, data) {
		console.info(state, cfg, data);

		if (data.status == 'OK') {
			window.location = data.redirect;
		}
	},

	statusChangeCallback : function(response) {
		FB.api('/me', {
			fields : 'first_name, last_name, email, picture, gender'
		}, function(response) {
			console.info(response);
		});
	}
}

var simpleLogin = {
	
	init : function()
	{
		$(document).on('click', '.js-show-simple-login', function(e) {
			e.preventDefault();
			$(this).hide();
			$('.js-simple-login').show();
			
			$('#show-simple-login-form').slideDown();
		});
		
		$(document).on('click', '.js-simple-login', function(e) {
			e.preventDefault();
			simpleLogin.doSimpleLogin();
		});
		
		$(document).on('click', '#sendEmailConfirmationAgain', function(e) {
			e.preventDefault();
			simpleLogin.sendEmailConfirmationAgain();
		});
		
		$('#EmailConfirmModal').on('hidden.bs.modal', function () {
    		simpleLogin.resetEmailConfirmationAgain();
		});
	},
	
	resetEmailConfirmationAgain : function()
	{		
		var cfg = {
			be_scope : 'fe_user',
			be_fn : 'resetEmailConfirmationAgain',
			data : {},
			scope : this,
			cb : simpleLogin.resetEmailConfirmationAgainCallback
		}

		backend_request.post(cfg);
		
	},
	
	resetEmailConfirmationAgainCallback : function(state, cfg, data) {
		
	},
	
	sendEmailConfirmationAgain : function()
	{		
		var cfg = {
			be_scope : 'fe_user',
			be_fn : 'sendEmailConfirmationAgain',
			data : {},
			scope : this,
			cb : simpleLogin.sendEmailConfirmationAgainCallback
		}

		backend_request.post(cfg);
		
	},
	
	sendEmailConfirmationAgainCallback : function(state, cfg, data) {
		
		$('#EmailConfirmModal').modal('hide');
				
		if (data.status == 'NOK') {
			window.location = data.redirect;
		}
	},
	
	isValidEmailAddress : function(emailAddress) {
		var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
		return pattern.test(emailAddress);
	},
			
	checkEMail : function(id,val)
	{
		var div_error 		= jQuery('#'+id+"_error");
		var input_error		= jQuery('#'+id);
		if (!simpleLogin.isValidEmailAddress(val))
		{
			input_error.addClass("error");
			div_error.show();
			return true;
		} else {
			input_error.removeClass("error");
			div_error.hide();
			return false;
		}
	},
	
	checkVal : function(id,val)
	{
		var div_error		 = jQuery('#'+id+"_error");
		var input_error		 = jQuery('#'+id);
		
		if (val.split(' ').join('') == "")
		{
			div_error.show();
			input_error.addClass("error");
			return true;
		} else {
			div_error.hide();
			input_error.removeClass("error");
			return false;
		}
	},
	
	doSimpleLogin: function()
	{
		var checkboxError = false;
		
		$('.checkbox-error').hide();
		
		$(".hidden-fragen").each(function(i,o){
			var frageId = $(o).val();
			
			var checkedChecker = $('input:checkbox[data-frage="'+frageId+'"]:checked').length;
			
			if(checkedChecker == 0)
			{
				$('#FRAGE_'+frageId+'_error').show();
				
				checkboxError = true;
			}	
		});
				
		var ok = fe_core.jsFormValidation('wg-zimmer-finden');
		
		if ((typeof ok != "undefined" && ok == false) || checkboxError) 
		{
			$('.scrollbarfix','.middle-row').animate({
	        	scrollTop: $('#wg-zimmer-finden').find('.error-div:visible:first').offset().top-200
	    	}, 500);
			
			return false;
		}
		
		ok = fe_core.jsFormValidation2('wg-zimmer-finden');
		
		if ((typeof ok != "undefined" && ok == false) || checkboxError) 
		{
			$('.scrollbarfix','.middle-row').animate({
	        	scrollTop: $('#wg-zimmer-finden').find('.error-div:visible:first').offset().top-200
	    	}, 500);
			
			return false;
		}
			
		if(ok)
		{
			ok = simpleLogin.checkEMail('v2_EMAIL',$('#v2_EMAIL').val()) ? false : true;
		}
		
		if(ok)
		{
			ok = simpleLogin.checkVal('v2_PASSWORT',$('#v2_PASSWORT').val()) ? false : true;
		}
		
				
		if(ok != true)
		{
			return false;
		}
		
		var formdata = $('#wg-zimmer-finden').serializeObject();
		
		var cfg = {
			be_scope : 'fe_user',
			be_fn : 'doSimpleLogin',
			data : formdata,
			scope : this,
			cb : simpleLogin.doLoginCallback
		}

		backend_request.post(cfg);
		
	},
	
	doLoginCallback : function(state, cfg, data) {
		console.info(state, cfg, data);

		if (data.status == 'OK') {
			window.location = data.redirect;
		}
		else
		{
			if(data.msg = 'PWD_ERROR')
			{
				$('#v2_PASSWORT_wrong_error').show();
			}
		}
	}
}

var addressAutoCompletion = {

	init : function() {
		if ($('.autocomplete-location-v2').length > 0) {
			addressAutoCompletion.initAutocomplete();
		}
	},

	initAutocomplete : function() {
		var inputFields = document.getElementsByClassName('autocomplete-location-v2');

		$(inputFields).each(function() {

			var inputField = $(this);

			var autocompleteVar = new google.maps.places.Autocomplete(
			/** @type {!HTMLInputElement} */(this), {
				types : ['geocode']
			});

			google.maps.event.addDomListener(this, 'keydown', function(e) {
				if (e.keyCode === 13 && !e.triggered) {
					google.maps.event.trigger(this, 'keydown', {
						keyCode : 40
					})
					google.maps.event.trigger(this, 'keydown', {
						keyCode : 13,
						triggered : true
					})
				}
			});
			autocomplete = autocompleteVar;

			// When the user selects an address from the dropdown, populate the address
			// fields in the form.
			autocompleteVar.addListener('place_changed', function() {
				addressAutoCompletion.handleAddressAutocomplete(inputField, autocompleteVar);
			});

		});
	},

	handleAddressAutocomplete : function(inputField, autocomplete) {
		var place = autocomplete.getPlace();
		if (!place.geometry) {
			// reset all hidden address fields
			$('.location-hidden-container input').each(function() {
				$(this).val('');
			});

			return;

		}

		if ( typeof place.address_components == "undefined")
			return false;

		for (var component in componentForm) {
			document.getElementsByClassName(component)[0].value = '';
			document.getElementsByClassName(component)[0].disabled = false;
		}

		// Get each component of the address from the place details
		// and fill the corresponding field on the form.
		for (var i = 0; i < place.address_components.length; i++) {
			var addressType = place.address_components[i].types[0];
			if (componentForm[addressType]) {
				var val = place.address_components[i][componentForm[addressType]];

				$(inputField).parent().find('.location-hidden-container').find('.' + addressType).val(val);

			}
		}
		// get lat long
		var lat = false;
		var lng = false;

		if ( typeof place.geometry.location != "undefined") {
			lat = place.geometry.location.lat();
			lng = place.geometry.location.lng();

			$(inputField).parent().find('.location-lat').val(lat);
			$(inputField).parent().find('.location-lng').val(lng);
		}
	}
}

var formLogic = {

	init : function() {
		$("input:checkbox.checkboxV2").on('click', function() {
			// in the handler, 'this' refers to the box clicked on
			var $box 		= $(this);
			var $frageId 	= $(this).data('frage');
			
			$('#FRAGE_'+$frageId+'_error').hide();
			
			if ($box.is(":checked")) {
				// the name of the box is retrieved using the .attr() method
				// as it is assumed and expected to be immutable
				var group = "input:checkbox[name='" + $box.attr("name") + "']";
				// the checked state of the group/box on the other hand will change
				// and the current value is retrieved using .prop() method
				$(group).prop("checked", false);
				$box.prop("checked", true);
			} else {
				$box.prop("checked", false);
				$('#FRAGE_'+$frageId+'_error').show();
			}
		});
	}
}

$(document).ready(function(){
	
	formLogic.init();
	addressAutoCompletion.init();
	facebook.init();
	simpleLogin.init();
	
	if(typeof showEmailConfirmMsg !== 'undefined')
	{
		var showEmailConfirmMsgOnce = false;
		if(showEmailConfirmMsg)
		{
			if(showEmailConfirmMsgOnce) 
			{
				return false;
			}
			
			showEmailConfirmMsgOnce = true;
			
			$('#EmailConfirmModal').modal('show');
		}
	}
	
});


// [WEB-57] notification wenn keine WG-Test Fragen beantwortet wurden
$(document).ready(function() {
	$('#noQuestionModal').modal('show');

});


// [WEB-253] Geburtstagskalender
$(document).ready(function() {
	$('#geburtsdatum').datepicker({
		format: "dd/mm/yyyy",
		defaultViewDate: { year: 1993, month: 01, day: 01 }
	});
});




