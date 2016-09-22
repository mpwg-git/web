
if (window.addEventListener) {
	window.addEventListener("storage", liveEditing, false);
} else {
	window.attachEvent("onstorage", liveEditing);
};

function reloadStylesheets() 
{
	var queryString = '?reload=' + new Date().getTime();
	var mode = 1;

	switch (mode)
	{
		case 1:
		$('.css_flush').each(function () {

			var href = this.href.replace(/\?.*|$/, queryString);
			$(this).remove();
			$('head').append($('<link type="text/css" class="css_flush" href="'+href+'" rel="stylesheet" />'));
		});
		break;
		case 2:

		$('.css_flush').attr('disabled', 'disabled');

		$('.css_flush').each(function () {
			this.href = this.href.replace(/\?.*|$/, queryString);
		});

		setTimeout(function(){
			$('.css_flush').removeAttr('disabled');
		},1);

		break;
		default: break;
	}
}


function liveEditing(e) 
{

	if (e.key == "css_flush")
	{
		var css_flush = localStorage.getItem('css_flush');
		if (!css_flush) return;
		console.info('css_flush',css_flush,e);
		reloadStylesheets();
		return;
	}

	if (typeof atoms_in_use != 'undefined')
	{
		var a_id = e.key.substring(5);
		if (atoms_in_use[a_id])
		{
			reloadPage();
		} else {
			console.info('Atom '+a_id+" not used in this page.",atoms_in_use);
		}
	}
}

function reloadPage()
{
	location.reload();
}

var searchMap = {
	map: null,
	marker: null,
	radius: {
		shape: null,
		value: 10
	}
};

$(document).ready(function(){

	registerListeners();
	registerSliders();

	$('.datepicker').datepicker({
		todayHighlight: true,
		format: 'dd.mm.yyyy',
		language: 'de-DE',
		startDate: '-0d'
	});

	if ($("#map").length == 1){
		initializeSearchMap();
	}
	
   	

});

function refreshSearch()
{
	$('.ajax-loader').show();
	
	if (window.location.pathname != "/de/suche")
	{
		window.location = "/de/suche";	
	}
	
	var searchData = new Object;
	
	searchData.date 		= $('.searchform .search-date').val();
	searchData.location 	= $('.searchform .location-hidden-container :input').serialize();
	searchData.price_from 	= $('#slider-range').slider( "values", 0 );
	searchData.price_to 	= $('#slider-range').slider( "values", 1 );
	searchData.range		= $('#umkreis-slider').slider("option", "value");
	
	
	$.ajax({
		type: 'POST',
		url: '/xsite/call/fe_search/getResults',
		data: {
			returnJson: 1,
			searchData: JSON.stringify(searchData)
		},
		success: function(response){
			
			setTimeout(function(){
				$('.ajax-loader').hide();
			}, 1500);
			if (response.success) 
			{	
				$('.js-replacer-search').html(response.html);
				
				// handle results in map
				updateMapWithResults(response.results);
				registerListeners();
				
			}
		},
		failure: function(response)
		{
			$('.ajax-loader').hide();
		}
	});
	
	
}

function updateMapWithResults(results)
{
	console.log("update map", results);
	
	results.forEach(function(result) {
	    if (typeof result.LAT != "undefined" && typeof result.LNG != "undefined")
	    {
			addMarkerToMap(result.LAT, result.LNG, result.URL, result.user_id);    	
	    }
	});
	
	return;
	
}

var allMarkers = [];

function addMarkerToMap(lat, lng, url, id)
{
	var myLatLng = new google.maps.LatLng(lat, lng);

	searchMap.map = $('#map').gmap3('get');

	console.log("add marker", lat, lng);

	searchMap.marker = new google.maps.Marker({
		map: searchMap.map,
		position: myLatLng,
		options:{
			icon: {
				url: "http://wsf.xgodev.com/xstorage/template/img/map_marker.png",
				scaledSize: new google.maps.Size(30, 30),
				origin: new google.maps.Point(0, 0),
				anchor: new google.maps.Point(10, 30)
			}
		},
		url: url,
		dataid: id
	});
	
	allMarkers.push({
		id: id,
		obj: searchMap.marker
	});
	
	
	google.maps.event.addListener(searchMap.marker, 'click', function() {
	    window.location.href = this.url;
	});
	
	google.maps.event.addListener(searchMap.marker, 'mouseover', function() {
	    var userSearchResult = $('.searchlist .img-wrapper[data-userId="'+this.dataid+'"]');
	    $(userSearchResult).addClass('active');
	    
	    $('.middle-row').animate({
          scrollTop: userSearchResult.offset().top
        }, 500);
	    
	});
	
	google.maps.event.addListener(searchMap.marker, 'mouseout', function() {
	    var userSearchResult = $('.searchlist .img-wrapper[data-userId="'+this.dataid+'"]');
	    $(userSearchResult).removeClass('active');
	});
}



function registerListeners()
{
	$('.freetext-toggle').unbind("click");
	$('.freetext-toggle').click(function(){
		$('.freetext-container').toggle();
	});
	
	$('.closer-freetext').unbind("click");
	$('.closer-freetext').click(function(){
		$('.freetext-container').hide();
	});

	$('.popover-toggle').popover();

	$('.js-activity-toggle').on('click' , function(){
		$('.js-activity-wrapper').toggleClass('active');
	});
	
	$('.searchlist .img-wrapper').unbind("click");
	$('.searchlist .img-wrapper').click(function(){
		$(this).toggleClass("active");
	});
	
	var scrolled		= 0;
	var scrollValue		= 300; 
	
	$('.searchlist-js-up').unbind('click');
	$('.searchlist-js-up').click(function(){
		
		scrolled = scrolled-scrollValue;
		$(".middle-row").animate({
			scrollTop:  scrolled
	     });
	});
	
	$('.searchlist-js-down').unbind('click');
	$('.searchlist-js-down').click(function(){
		
		scrolled = scrolled+scrollValue;
		$(".middle-row").animate({
			scrollTop:  scrolled
	     });
	});
	
	$('.star-rating').raty({ 
		number: 4,
		path: '/xstorage/template/plugins/raty/images',
		hints: ['nicht wichtig', 'etwas wichtig', 'eher wichtig', 'wichtig']
	});
	
	$('.searchresult-single').unbind("mouseenter");
	$('.searchresult-single').mouseenter(function(){
		
		var id = $(this).find('.img-wrapper').data('userid');
		panToMarker(id);
	});
	
	var wto;
	
	/*
	$('.searchform input.datepicker').unbind("keyup");
	$('.searchform input.datepicker').keyup(function() { 
		clearTimeout(wto);
  		wto = setTimeout(function() {
	    	refreshSearch();
	  	}, 750);
   	});
   	*/
   	
   	$('.searchform input.datepicker').unbind("change");
	$('.searchform input.datepicker').change(function() { 
		clearTimeout(wto);
  		wto = setTimeout(function() {
  			$('.datepicker').datepicker('hide');
	    	refreshSearch();
	  	}, 750);
   	});
   	
   	if ($('.autocomplete-location').length > 0)
   	{
   		initAutocomplete();
   	}
	
	$('.multiple-select').multiselect({
		
		buttonText: function(options, select) {
            if (options.length === 0) {
                return 'Sprachen hinzufügen';
            }
            else if (options.length > 3) {
                return 'Mehrere Sprachen gewählt!';
            }
             else {
                 var labels = [];
                 options.each(function() {
                     if ($(this).attr('label') !== undefined) {
                         labels.push($(this).attr('label'));
                     }
                     else {
                         labels.push($(this).html());
                     }
                 });
                 return labels.join(' | ') + '';
             }
        },
        
        enableHTML: true,
        
        optionLabel: function(element){
		   return $(element).html() + ' <span class="checked"><span class="circle-multiselect circle-filled"></span></span><span class="unchecked"><span class="circle-multiselect circle-unfilled"></span></span>';
		},
		
		templates: {
			button: '<button type="button" class="multiselect dropdown-toggle" data-toggle="dropdown"><span class="multiselect-selected-text"></span><span class="icon-plus-rel icon-rel"></span></button>'
		}
        
	});
	
	// ORIENTATION CHANGE BUGFIX FOR IOS (fixt das resizen von vw werten)
	window.addEventListener("orientationchange", changeOrientation, false);
	function changeOrientation() {
		var $container = $("body");
		$container.hide();
		setTimeout(function() {
			$container.show();
		}, 10);
	}
	
	chatwindwoResize();
}


var autocomplete;
var componentForm = {
  street_number: 'short_name',
  route: 'long_name',
  locality: 'long_name',
  administrative_area_level_1: 'short_name',
  country: 'short_name',
  postal_code: 'short_name'
};

function initAutocomplete() {
  // Create the autocomplete object, restricting the search to geographical
  // location types.
  
  if ($('.autocomplete-location').length < 1) return false;
  
  var inputField = document.getElementsByClassName('autocomplete-location')[0];
  
  autocomplete = new google.maps.places.Autocomplete(
      /** @type {!HTMLInputElement} */(inputField),
      {types: ['geocode']});

  // When the user selects an address from the dropdown, populate the address
  // fields in the form.
  autocomplete.addListener('place_changed', function(){
  		handleAddressAutocomplete(inputField);
  });	
  	
  	
}

function handleAddressAutocomplete(inputField) 
{
	var place = autocomplete.getPlace();
    if (!place.geometry) 
    {
       console.log("place not found", place)
    }
	console.log("handle address autocomplete", place);
	
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
	     document.getElementsByClassName(addressType)[0].value = val;
	   }
	}
	// get lat long
	
	var lat = false;
	var lng = false;
	
	if (typeof place.geometry.location != "undefined")
	{
		lat = place.geometry.location.G;
		lng = place.geometry.location.K;
		
		$(inputField).parent().find('.location-lat').val(lat);
		$(inputField).parent().find('.location-lng').val(lng);
	}
	
	refreshSearch();
	
	if (lat != false && lng != false)
	{
		centerMapOnPoint(lat, lng);
	}
}


//CHATWINDOW RESIZE
function chatwindwoResize(){
	var $chatHeaderHeight	= $('.js-chatheader').innerHeight();
	var $chatWindowHeight 	= $('.js-chatwindow').innerHeight();
	var $chatTextHeight		= $('.js-chattext').innerHeight();
	//var fixedMinus			= 50;

	//var $newHeight = $chatWindowHeight - $chatTextHeight - $chatHeaderHeight - fixedMinus;
	var $newHeight = $chatWindowHeight - $chatTextHeight - $chatHeaderHeight;
	$('.js-chatwindow').css('height', $newHeight);
}


function registerSliders()
{
	$( "#slider-range" ).slider({
		range: true,
		min: 0,
		max: 1000,
		values: [ 75, 400 ],
		slide: function( event, ui ) {
			$( ".ui-slider-handle" , "#slider-range" ).first().html( "€ " + ui.values[ 0 ]);
			$( ".ui-slider-handle" , "#slider-range" ).last().html( "€ " + ui.values[ 1 ]);
		},
		stop: function(event, ui){
			refreshSearch();
		}
	});
	$( ".ui-slider-handle:first" , "#slider-range" ).html( "€ " + $( "#slider-range" ).slider( "values", 0 ));
	$( ".ui-slider-handle:last" , "#slider-range" ).html( "€ " + $( "#slider-range" ).slider( "values", 1 ));

	$( "#umkreis-slider" ).slider({
		range: "min",
		min: 5,
		max: 50,
		value: 10,
		slide: function( event, ui ) {
			$( ".ui-slider-handle" , "#umkreis-slider" ).first().html(ui.value);
			if (searchMap.radius.shape != null)
			{
				searchMap.radius.shape.setRadius(ui.value * 1000);	
			}
		},
		stop: function(event, ui){
			refreshSearch();
		}
	});
	$( ".ui-slider-handle:first" , "#umkreis-slider" ).html($( "#umkreis-slider" ).slider("value"));
	
	
	$(".search-slider").royalSlider({
        //autoHeight: true,
		arrowsNav: false,
		arrowsNavAutoHide: false,
		fadeinLoadedSlide: false,
		controlNavigationSpacing: 0,
		controlNavigation: 'none',
		thumbs: false,
		imageScaleMode: 'fill',
		imageAlignCenter:false,
		loop: false,
		loopRewind: true,
		numImagesToPreload: 6,
		keyboardNavEnabled: false,
		usePreloader: false,
		slidesSpacing: 0,
		navigateByClick: false,
    });
    
    $(".image-slider").royalSlider({
        autoHeight: true,
		arrowsNav: false,
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

function initializeSearchMap()
{
	$('#map').gmap3({
		map:{
			options:{
				zoom: 14,
				mapTypeId: "wsfStyle",
				zoomControl: false,
			}
		},
		styledmaptype:{
			id: "wsfStyle",
			options:{
				name: "Who showers first Style"
			},
			styles: [
			{
			"featureType": "poi",
			"elementType": "geometry.fill",
			"stylers": [
			{ "visibility": "on" },
			{ "color": "#c3c9cd" }
			]
			},
			{
			"featureType": "landscape",
			"elementType": "geometry.fill",
			"stylers": [
			{ "color": "#e1e4e6" }
			]
			},
			{
			"featureType": "road",
			"elementType": "geometry.fill",
			"stylers": [
			{ "color": "#04e0d7" }
			]
			},
			{
			"featureType": "road",
			"elementType": "geometry.stroke",
			"stylers": [
			{ "color": "#1caf9a" }
			]
			},
			{
			"featureType": "transit.line",
			"elementType": "geometry.fill",
			"stylers": [
			{ "color": "#585858" }
			]
			},
			{
			"featureType": "transit.station",
			"elementType": "geometry.fill",
			"stylers": [
			{ "color": "#585858" }
			]
			},
			{
			"featureType": "water",
			"elementType": "geometry.fill",
			"stylers": [
			{ "color": "#0695b3" }
			]
			},
			{
			"featureType": "road.local",
			"elementType": "geometry.fill",
			"stylers": [
			{ "visibility": "on" },
			{ "color": "#b0b5b9" }
			]
			},
			{
			"featureType": "road.local",
			"elementType": "geometry.stroke",
			"stylers": [
			{ "color": "#ffffff" },
			{ "visibility": "on" }
			]
			},
			{
			"featureType": "road",
			"elementType": "labels.icon",
			"stylers": [
			{ "hue": "#e60046" }
			]
			}
			]
		}
	});

	var myLatLng = new google.maps.LatLng(48.2081743, 16.37381890000006);

	searchMap.map = $('#map').gmap3('get');

	searchMap.map.setCenter(myLatLng);

	searchMap.marker = new google.maps.Marker({
		map: searchMap.map,
		position: myLatLng,
		options:{
			icon: {
				url: "http://wsf.xgodev.com/xstorage/template/img/map_marker.png",
				scaledSize: new google.maps.Size(50, 50),
				origin: new google.maps.Point(0, 0),
				anchor: new google.maps.Point(30, 50)
			}
		}
	});
	
	

	searchMap.radius.shape = new google.maps.Circle({
		map: searchMap.map,
		radius: searchMap.radius.value * 1000,
		fillColor: '#04e0d7',
		fillOpacity: 0.15,
		strokeOpacity:0
	});
	searchMap.radius.shape.bindTo('center', searchMap.marker, 'position');

	//zoom out control
	var zoomControlDiv = document.createElement('div');
	var zoomControl = new ZoomControl(zoomControlDiv, searchMap.map, '-', zoomOut);
	zoomControlDiv.index = 1;
	searchMap.map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(zoomControlDiv);

	//zoom in control
	zoomControlDiv = document.createElement('div');
	zoomControl = new ZoomControl(zoomControlDiv, searchMap.map, '+', zoomIn);
	zoomControlDiv.index = 1;
	searchMap.map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(zoomControlDiv);
}

function panToMarker(id)
{
	var foundMarker = false;
	
	$.each(allMarkers, function() {
    	if (this.id == id) {
      		foundMarker = this;
    	}
  	});
	  
	if (foundMarker != false)
	{
		searchMap.map = $('#map').gmap3('get');
		console.log("panto", foundMarker.obj.position);
		searchMap.map.panTo(foundMarker.obj.position);	
	}  
	return;
}

function centerMapOnPoint(lat, lng)
{
	var myLatLng = new google.maps.LatLng(lat, lng);

	searchMap.map = $('#map').gmap3('get');

	searchMap.map.setCenter(myLatLng);

	console.log("center map", searchMap.marker, searchMap.radius.shape);

	searchMap.marker.setPosition(myLatLng);

	/*
	searchMap.marker = new google.maps.Marker({
		map: searchMap.map,
		position: myLatLng,
		options:{
			icon: {
				url: "http://wsf.xgodev.com/xstorage/template/img/map_marker.png",
				scaledSize: new google.maps.Size(50, 50),
				origin: new google.maps.Point(0, 0),
				anchor: new google.maps.Point(30, 50)
			}
		}
	});
	*/
	
}

function ZoomControl(controlDiv, map, text, callback) 
{
	// Set CSS for the control border
	var controlUI = document.createElement('div');
	controlUI.style.backgroundColor = '#04e0d7';
	controlUI.style.borderRadius = '50%';
	//controlUI.style.border = '1px solid #000000';
	controlUI.style.boxShadow = '0 2px 6px rgba(0,0,0,.3)';
	controlUI.style.cursor = 'pointer';
	controlUI.style.textAlign = 'center';
	controlUI.style.width = '25px';
	controlUI.style.height = '25px';
	controlUI.style.marginRight = '10px';
	controlUI.style.marginBottom = '5px';
	controlUI.style.mozUserSelect = 'none';
	controlUI.style.msUserSelect = 'none';
	controlUI.style.webkitUserSelect = 'none';
	controlUI.style.webkitTouchCallout = 'none';
	controlUI.style.userSelect = 'none';

	//controlUI.title = 'Click to recenter the map';
	controlDiv.appendChild(controlUI);

	// Set CSS for the control interior
	var controlText = document.createElement('div');
	controlText.style.color = '#000000';
	controlText.style.fontFamily = 'Roboto,Arial,sans-serif';
	controlText.style.fontWeight = 'bold';
	controlText.style.fontSize = '16px';
	controlText.style.lineHeight = '25px';
	controlText.innerHTML = text;
	controlUI.appendChild(controlText);

	// Setup the click event listeners: simply set the map to
	// Chicago
	google.maps.event.addDomListener(controlUI, 'click', callback);
}

function zoomIn()
{
	var currentZoomLevel = searchMap.map.getZoom();
	if(currentZoomLevel != 21){
		searchMap.map.setZoom(currentZoomLevel + 1);
	}
}

function zoomOut()
{
	var currentZoomLevel = searchMap.map.getZoom();
	if(currentZoomLevel != 0){
		searchMap.map.setZoom(currentZoomLevel - 1);
	}
}
