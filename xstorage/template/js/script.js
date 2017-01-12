if (window.addEventListener) {
	window.addEventListener("storage", liveEditing, false);
} else {
	window.attachEvent("onstorage", liveEditing);
};
function reloadStylesheets() {
	var queryString = '?reload=' + new Date().getTime();
	var mode = 1;
	switch (mode) {
	case 1:
		$('.css_flush').each(
				function() {
					var href = this.href.replace(/\?.*|$/, queryString);
					$(this).remove();
					$('head').append(
							$('<link type="text/css" class="css_flush" href="'
									+ href + '" rel="stylesheet" />'));
				});
		break;
	case 2:
		$('.css_flush').attr('disabled', 'disabled');
		$('.css_flush').each(function() {
			this.href = this.href.replace(/\?.*|$/, queryString);
		});
		setTimeout(function() {
			$('.css_flush').removeAttr('disabled');
		}, 1);
		break;
	default:
		break;
	}
}
function liveEditing(e) {
	if (e.key == "css_flush") {
		var css_flush = localStorage.getItem('css_flush');
		if (!css_flush)
			return;
		console.info('css_flush', css_flush, e);
		reloadStylesheets();
		return;
	}
	if (typeof atoms_in_use != 'undefined') {
		var a_id = e.key.substring(5);
		if (atoms_in_use[a_id]) {
			reloadPage();
		} else {
			console.info('Atom ' + a_id + " not used in this page.",
					atoms_in_use);
		}
	}
}
function reloadPage() {
	location.reload();
}
$(document)
		.ready(
				function() {
					registerListeners();
					$('.datepicker').datepicker({
						autoclose : true,
						format : 'dd.mm.yyyy',
						language : 'de-DE',
						startDate : '-0d',
						startView : 'decade',
					});
					$('.swipebox').swipebox({
						hideBarsDelay : false
					});
					$('.datepicker-birthday').datepicker({
						autoclose : true,
						todayHighlight : true,
						format : 'dd.mm.yyyy',
						language : 'de-DE',
						startView : 'decade',
					});
					$('.hasDatePicker .add-on').on(
							'click',
							function(e) {
								$(this).parent().find('.datepicker')
										.datepicker('show');
							});
					$(document).on('click', '.close-image-cropper', function() {
						setTimeout(function() {
							$('.modal-backdrop').trigger('click');
						}, 20)
					});
					if (top.P_ID == 30) {
						$(
								'.form-mein-raum input[type!="radio"][type!="hidden"]:visible')
								.first().focus();
					}
					$(document).on(
							'focus',
							'input',
							function() {
								$('.landscape-overlay').addClass(
										'force-hidden-overlay');
							});
					$(document).on(
							'blur',
							'input',
							function() {
								$('.landscape-overlay').removeClass(
										'force-hidden-overlay');
							});
					$(document)
							.on(
									'click',
									'.cookie-warning-top .closing-icon',
									function() {
										$
												.post(
														'/xsite/call/fe_cookie/setCookieWarningSeen',
														'',
														function(response) {
															$(
																	'.js-cookie-warning-top')
																	.removeClass(
																			'active');
														});
									});
					$('#blog-kategorie input[type="checkbox"]')
							.off('change')
							.change(
									function() {
										$
												.ajax({
													type : 'POST',
													url : '/xsite/call/fe_blog/getFiltered',
													data : $('#blog-kategorie')
															.serialize()
															+ '&lang='
															+ top.P_LANG,
													success : function(response) {
														$('#blog-page')
																.replaceWith(
																		$(response.html));
													}
												});
									});
					$(document).on('click', '.fake-checkbox', function() {
						$(this).siblings('label').trigger('click');
					});
					$('input[id="blog-kategorie-all"]').on(
							'change',
							function() {
								if ($(this).is(':checked')) {
									$('input[class="blog-menu-input"]').each(
											function(idx, el) {
												$(el).prop("checked", true);
											});
								} else {
									$('input[class="blog-menu-input"]').each(
											function(idx, el) {
												$(el).prop("checked", false);
											});
								}
								setTimeout(function() {
									$('.blog-menu-input').first().trigger(
											'change');
								}, 50);
							});
					$('input[class="blog-menu-input"]').on(
							'change',
							function() {
								var allChecked = true;
								$('input[class="blog-menu-input"]').each(
										function(idx, el) {
											if (!$(el).is(':checked')) {
												allChecked = false;
											}
										});
								if (allChecked == false) {
									$('input[id="blog-kategorie-all"]').prop(
											'checked', false);
								} else {
									$('input[id="blog-kategorie-all"]').prop(
											'checked', true);
								}
							});
				});
function registerListeners() {
	$('.freetext-toggle').unbind("click");
	$('.freetext-toggle').click(function() {
		$('.freetext-container').toggle();
	});
	$('.closer-freetext').unbind("click");
	$('.closer-freetext').click(function() {
		$('.freetext-container').hide();
	});
	$('.popover-toggle').popover();
	$('.js-activity-toggle').on('click', function() {
		$('.js-activity-wrapper').toggleClass('active');
	});
	var scrolled = 0;
	var scrollValue = 300;
	$('.searchlist-js-up').unbind('click');
	$('.searchlist-js-up').click(function() {
		scrolled = scrolled - scrollValue;
		$(".middle-row").animate({
			scrollTop : scrolled
		});
	});
	$('.searchlist-js-down').unbind('click');
	$('.searchlist-js-down').click(function() {
		scrolled = scrolled + scrollValue;
		$(".middle-row").animate({
			scrollTop : scrolled
		});
	});
	var wto;
	$('.searchform input.datepicker').unbind("change");
	$('.searchform input.datepicker').change(function() {
		clearTimeout(wto);
		wto = setTimeout(function() {
			$('.datepicker').datepicker('hide');
			fe_map.refreshSearch();
		}, 750);
	});
	if ($('.autocomplete-location').length > 0) {
		initAutocomplete();
	}
	$('.multiple-select')
			.multiselect(
					{
						buttonText : function(options, select) {
							if (options.length === 0) {
								return 'Sprachen hinzufügen';
							} else if (options.length > 3) {
								return 'Mehrere Sprachen gewählt!';
							} else {
								var labels = [];
								options.each(function() {
									if ($(this).attr('label') !== undefined) {
										labels.push($(this).attr('label'));
									} else {
										labels.push($(this).html());
									}
								});
								return labels.join(' | ') + '';
							}
						},
						enableHTML : true,
						optionLabel : function(element) {
							return $(element).html()
									+ ' <span class="checked"><span class="circle-multiselect circle-filled"></span></span><span class="unchecked"><span class="circle-multiselect circle-unfilled"></span></span>';
						},
						templates : {
							button : '<button type="button" class="multiselect dropdown-toggle" data-toggle="dropdown"><span class="multiselect-selected-text"></span><span class="icon-plus-rel icon-rel"></span></button>'
						}
					});
	window.addEventListener("orientationchange", changeOrientation, false);
	function changeOrientation() {
		var $container = $("body");
		$container.hide();
		setTimeout(function() {
			$container.show();
		}, 10);
	}
}
var autocomplete;
var componentForm = {
	street_number : 'short_name',
	route : 'long_name',
	locality : 'long_name',
	administrative_area_level_1 : 'short_name',
	country : 'short_name',
	postal_code : 'short_name'
};
function initAutocomplete() {
	if ($('.autocomplete-location').length < 1)
		return false;
	var inputFields = document.getElementsByClassName('autocomplete-location');
	$(inputFields).each(function() {
		var inputField = $(this);
		var autocompleteVar = new google.maps.places.Autocomplete((this), {
			types : [ 'geocode' ]
		});
		google.maps.event.addDomListener(this, 'keydown', function(e) {
			console.log(e.triggered)
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
		autocompleteVar.addListener('place_changed', function() {
			handleAddressAutocomplete(inputField, autocompleteVar);
		});
	});
}
function handleAddressAutocomplete(inputField, autocomplete) {
	console.log("handle ", $(inputField));
	if ($(inputField).hasClass("location-start")) {
		fe_map.refreshStartsearch();
		return;
	}
	var place = autocomplete.getPlace();
	if (!place.geometry) {
		console.log("place not found", place);
		$('.location-hidden-container input').each(function() {
			$(this).val('');
		});
		if ($(inputField).hasClass("in-form")) {
			return;
		}
		fe_map.refreshSearch();
		return;
	}
	if (typeof place.address_components == "undefined")
		return false;
	for ( var component in componentForm) {
		document.getElementsByClassName(component)[0].value = '';
		document.getElementsByClassName(component)[0].disabled = false;
	}
	for (var i = 0; i < place.address_components.length; i++) {
		var addressType = place.address_components[i].types[0];
		if (componentForm[addressType]) {
			var val = place.address_components[i][componentForm[addressType]];
			$(inputField).parent().find('.location-hidden-container').find(
					'.' + addressType).val(val);
		}
	}
	var lat = false;
	var lng = false;
	if (typeof place.geometry.location != "undefined") {
		lat = place.geometry.location.lat();
		lng = place.geometry.location.lng();
		$(inputField).parent().find('.location-lat').val(lat);
		$(inputField).parent().find('.location-lng').val(lng);
	}
	if ($(inputField).hasClass("in-form")) {
		return;
	}
	console.log("refresh search", lat, lng);
	console.log("after refresh");
	if (lat != false && lng != false) {
		console.log("centermap", lat, lng);
		fe_map.refreshSearch();
		if ($(".map").length > 0) {
			$('.map').each(function(idx, el) {
				fe_map.centerMapOnPoint(lat, lng, $(el));
			});
		}
	}
	return;
}
function chatwindwoResize() {
	var chatHeaderOffsetBottom = $('.js-chatheader').offset().top
			+ $('.js-chatheader').innerHeight();
	var chatTextOffset = $('.js-chattext').offset().top;
	var offsetDiff = chatTextOffset - chatHeaderOffsetBottom;
	console.log('--------------------------------------' + offsetDiff
			+ '--------------------------------------------');
	$('.js-chatwindow').css('height', offsetDiff);
}