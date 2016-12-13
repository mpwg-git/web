top.new_sliderdata = false;
var fe_map = (function() {
    return new function() {
        this.init = function() {
            var me = this;
            this.firstCall = true;
            this.allMarkers = [];
            this.registerListeners();
            this.searchMap = {
                map: null,
                marker: null,
                radius: {
                    shape: null,
                    value: 10
                }
            };
            if ($(".map").length > 0) {
                $(".map").each(function(idx, el) {
                    var $thisMap = $(el);
                    me.initializeSearchMap($thisMap);
                });
            }
            if ($(".map2").length > 0) {
                $(".map2").each(function(idx, el) {
                    var $thisMap = $(el);
                    me.initializeSearchMap($thisMap);
                });
            }
            if (($('.js-replacer-search').length > 0 || $('.search-slider').length > 0) && this.firstCall == true) {
                this.firstCall = false;
                me.refreshSearch();
            }
            this.checkIfNeedToPan();
        }
        this.registerListeners = function() {
            var me = this;
            $('.searchresult-single').unbind("mouseenter");
            $('.searchresult-single').mouseenter(function() {
                var id = $(this).find('.img-wrapper').data('userid');
                me.panToMarker(id);
            });
            var valueRange = 5
            if ($("#umkreis-slider").data('value') != '') {
                valueRange = parseInt($("#umkreis-slider").data('value'), 10);
            }
            $("#umkreis-slider").slider({
                range: "min",
                value: valueRange,
                min: 1,
                max: 50,
                slide: function(event, ui) {
                    $(".ui-slider-handle", "#umkreis-slider").first().html(ui.value);
                    if (me.searchMap.radius.shape != null) {
                        me.searchMap.radius.shape.setRadius(ui.value * 1000);
                    }
                },
                stop: function(event, ui) {
                    $("#umkreis-slider").data('value', ui.value);
                    me.refreshSearch();
                }
            });
            $(".ui-slider-handle:first", "#umkreis-slider").html($("#umkreis-slider").slider("value"));
            var valueAb = 75;
            var valueBis = 400;
            if ($("#slider-range").data('valueab') != '') {
                valueAb = parseInt($("#slider-range").data('valueab'), 10);
            }
            if ($("#slider-range").data('valuebis') != '') {
                valueBis = parseInt($("#slider-range").data('valuebis'), 10);
            }
            $("#slider-range").slider({
                range: true,
                min: 1,
                max: 1000,
                values: [valueAb, valueBis],
                slide: function(event, ui) {
                    var diff = ui.values[1] - ui.values[0];
                    if (diff < 1) {
                        return false;
                    }
                    $(".ui-slider-handle", "#slider-range").first().html("€ " + ui.values[0]);
                    $(".ui-slider-handle", "#slider-range").last().html("€ " + ui.values[1]);
                },
                stop: function(event, ui) {
                    $('span.ui-slider-handle.ui-state-default.ui-corner-all').css('z-Index', 2);
                    $(ui.handle).css('z-Index', 3);
                    $("#slider-range").data('valueab', ui.values[0]);
                    $("#slider-range").data('valuebis', ui.values[1]);
                    fe_map.refreshSearch(location.reload(true));
                }
            });
            $(".ui-slider-handle:first", "#slider-range").html("€ " + $("#slider-range").slider("values", 0));
            $(".ui-slider-handle:last", "#slider-range").html("€ " + $("#slider-range").slider("values", 1));
            if ($(".search-slider").length > 0) {
                var slider = $(".search-slider").data('royalSlider');
                if (typeof slider != "undefined") {
                    slider.destroy();
                }
                setTimeout(function() {
                    $(".search-slider").royalSlider({
                        arrowsNav: false,
                        arrowsNavAutoHide: false,
                        fadeinLoadedSlide: false,
                        controlNavigationSpacing: 0,
                        controlNavigation: 'none',
                        thumbs: false,
                        imageScaleMode: 'fill',
                        imageAlignCenter: false,
                        loop: false,
                        loopRewind: true,
                        numImagesToPreload: 6,
                        keyboardNavEnabled: true,
                        usePreloader: false,
                        slidesSpacing: 0,
                        navigateByClick: false,
                    });
                    var sliderInstance = $(".search-slider").data('royalSlider');
                    sliderInstance.ev.on('rsAfterSlideChange', function() {
                        me.registerListenersForSlider();
                    });
                    me.registerListenersForSlider();
                }, 500);
            }
            $('.js-toggle-map').unbind("click");
            $('.js-toggle-map').click(function(e) {
                e.preventDefault();
                if ($('.map').is(":visible")) {
                    $('.map').hide();
                    $('.map-container').removeClass("active");
                } else {
                    $('.map-container').addClass("active");
                    $('.map').show();
                    me.refreshMapAfterShow();
                }
            });
            $('input[type=radio][name=search-type]').unbind("change");
            $('input[type=radio][name=search-type]').change(function() {
                $('input[type=radio][name=search-type]').removeClass("active");
                me.refreshSearch();
            });
            $('.js-close-mobile-search').unbind("click");
            $('.js-close-mobile-search').click(function(e) {
                e.preventDefault();
                if ($('.map').is(":visible")) {
                    $('.map').hide();
                    $('.map-container').removeClass("active");
                }
            });
            $('.searchlist .img-wrapper, .pictures-start .img-wrapper').unbind("click");
            $('.searchlist .img-wrapper, .pictures-start .img-wrapper').click(function(e) {
                $('.searchlist .img-wrapper, .pictures-start .img-wrapper').removeClass("active");
                $(this).toggleClass("active");
            });
            return;
        }
        this.registerListenersForSlider = function() {
            $('.searchresult-wrapper-js').unbind("click");
            $('.searchresult-wrapper-js').click(function(e) {
                $(this).toggleClass("active");
            });
        }
        this.refreshMapAfterShow = function() {
            google.maps.event.trigger(map, 'resize');
        }
        this.refreshStartsearch = function() {
            var me = this;
            $.ajax({
                type: 'POST',
                url: '/xsite/call/fe_search/getStartResults',
                data: {
                    lang: top.P_LANG
                },
                success: function(response) {
                    if (response.success) {
                        if ($('.js-replacer-pictures-start').length > 0) {
                            $('.js-replacer-pictures-start').html(response.html);
                        }
                        me.registerListeners();
                    }
                }
            });
        }
        this.refreshSearch = function(showAll) {
            var me = this;
            var showAllReq = 1;
            if (window.location.pathname.indexOf("/de/suche") != 0 && window.location.pathname.indexOf("/en/suche") != 0) {
                var newLoc = "/de/suche";
                if (top.P_LANG == 'en') {
                    newLoc = "/en/suche";
                }
                window.location = newLoc;
            }
            if (currentFace != 1) {
                fe_core.showLoader();
            }
            var searchData = new Object;
            if (typeof showAll == "undefined") {
                searchData.date = $('.searchform .search-date').val();
                searchData.location = $('.searchform .location-hidden-container :input').serialize();
                searchData.adresse = $('.searchform .autocomplete-location').val();
                if ($('#slider-range').length > 0) {
                    searchData.price_from = $('#slider-range').slider("values", 0);
                    searchData.price_to = $('#slider-range').slider("values", 1);
                }
                if ($('#umkreis-slider').length > 0) {
                    searchData.range = $('#umkreis-slider').slider("option", "value");
                }
                showAllReq = 0;
            }
            var selectedVal = "";
            var selected = $("input[type='radio'][name='search-type']:checked");
            if (selected.length > 0) {
                selectedVal = selected.val();
            } else {
                selected = $("input[type='radio'][name='search-type'].active");
                selectedVal = selected.val();
            }
            searchData.type = selectedVal;
            searchData.filter = $('.js-search-filter').val();
            this.searchData = searchData;
            $.ajax({
                type: 'POST',
                url: '/xsite/call/fe_search/getResults',
                data: {
                    showAll: 0,
                    returnJson: 1,
                    lang: top.P_LANG,
                    searchData: JSON.stringify(searchData),
                    xr_face: currentFace,
                    p_id: top.P_ID,
                    xxx: 'case1'
                },
                success: function(response) {
                    top.endOfResults = response.endOfResults;
                    fe_core.hideLoader();
                    if (response.success) {
                        if ($('.js-replacer-search').length > 0) {
                            $('.js-replacer-search').html(response.html);
                        }
                        if ($('.search-slider').length > 0) {
                            $('.search-slider').html(response.html);
                            top.searchsliderHtmlOrig = response.html;
                        }
                        if (fe_core.getCurrentFace() == 1) {
                            me.refreshSearchMobileSpecials(response);
                        }
                        me.updateMapWithResults(response.results);
                        me.registerListeners();
                        fe_user.registerListeners();
                    }
                },
                failure: function(response) {
                    fe_core.hideLoader();
                }
            });
        }
        this.getNewSearchResults = function(i) {
            var me = this;
            var res = '';
            $.ajax({
                type: 'POST',
                url: '/xsite/call/fe_search/getResults',
                data: {
                    showAll: 0,
                    returnJson: 1,
                    lang: top.P_LANG,
                    offset: i + 1,
                    searchData: JSON.stringify(me.searchData),
                    xr_face: currentFace,
                    p_id: top.P_ID,
                    xxx: 'case2'
                },
                success: function(response) {
                    res = response.html;
                    top.new_sliderdata = response.html;
                    top.endOfResults = response.endOfResults;
                    $(document).trigger('new_sliderdata_ready');
                },
                failure: function(response) {
                    console.log("failure endless");
                }
            });
        }
        this.refreshSearchMobileSpecials = function() {
            var showEffect = false;
            if (window.location.pathname == "/de/suche") {
                showEffect = true;
            }
            if (showEffect === true) {
                if ($('.ergebnisse-anzeigen').visible() == false) {
                    $('body').animate({
                        scrollTop: $('.ergebnisse-anzeigen').offset().top
                    }, 500);
                }
                $('.footer-search-results').css("color", "#04e0d7");
                $('.footer-search-results').effect("pulsate", {
                    times: 2
                }, 1500, function() {
                    $('.footer-search-results').css("color", "inherit");
                });
            }
        }
        this.initializeSearchMap = function($map) {
            var me = this;
            if (typeof($map) !== undefined) {
                var $el;
                if (typeof($map) == 'string') {
                    $el = $($map);
                } else if (typeof($map) == 'object') {
                    $el = $map;
                }
            } else {
                var $el = $('.map').first();
            }
            $el.gmap3({
                map: {
                    options: {
                        zoom: 14,
                        mapTypeId: "wsfStyle",
                        zoomControl: false,
                    }
                },
                styledmaptype: {
                    id: "wsfStyle",
                    options: {
                        name: "Who showers first Style"
                    },
                    styles: [{
                        "featureType": "poi",
                        "elementType": "geometry.fill",
                        "stylers": [{
                            "visibility": "on"
                        }, {
                            "color": "#c3c9cd"
                        }]
                    }, {
                        "featureType": "landscape",
                        "elementType": "geometry.fill",
                        "stylers": [{
                            "color": "#e1e4e6"
                        }]
                    }, {
                        "featureType": "road",
                        "elementType": "geometry.fill",
                        "stylers": [{
                            "color": "#04e0d7"
                        }]
                    }, {
                        "featureType": "road",
                        "elementType": "geometry.stroke",
                        "stylers": [{
                            "color": "#1caf9a"
                        }]
                    }, {
                        "featureType": "transit.line",
                        "elementType": "geometry.fill",
                        "stylers": [{
                            "color": "#585858"
                        }]
                    }, {
                        "featureType": "transit.station",
                        "elementType": "geometry.fill",
                        "stylers": [{
                            "color": "#585858"
                        }]
                    }, {
                        "featureType": "water",
                        "elementType": "geometry.fill",
                        "stylers": [{
                            "color": "#0695b3"
                        }]
                    }, {
                        "featureType": "road.local",
                        "elementType": "geometry.fill",
                        "stylers": [{
                            "visibility": "on"
                        }, {
                            "color": "#b0b5b9"
                        }]
                    }, {
                        "featureType": "road.local",
                        "elementType": "geometry.stroke",
                        "stylers": [{
                            "color": "#ffffff"
                        }, {
                            "visibility": "on"
                        }]
                    }, {
                        "featureType": "road",
                        "elementType": "labels.icon",
                        "stylers": [{
                            "hue": "#e60046"
                        }]
                    }]
                }
            });
            var myLatLng = new google.maps.LatLng(48.2081743, 16.37381890000006);
            this.searchMap.map = $el.gmap3('get');
            this.searchMap.map.setCenter(myLatLng);
            this.searchMap.marker = new google.maps.Marker({
                map: me.searchMap.map,
                position: myLatLng,
                options: {
                    icon: {
                        url: "/xstorage/template/img/map_marker.png",
                        scaledSize: new google.maps.Size(50, 50),
                        origin: new google.maps.Point(0, 0),
                        anchor: new google.maps.Point(30, 50)
                    }
                }
            });
            this.searchMap.radius.shape = new google.maps.Circle({
                map: me.searchMap.map,
                radius: me.searchMap.radius.value * 1000,
                fillColor: '#04e0d7',
                fillOpacity: 0.15,
                strokeOpacity: 0
            });
            this.searchMap.radius.shape.bindTo('center', this.searchMap.marker, 'position');
            console.log('zoom controls', me.searchMap.map);
            var zoomControlDiv = document.createElement('div');
            var zoomControl = new this.ZoomControl(zoomControlDiv, me.searchMap.map, '-', function() {
                fe_map.zoomOut(1, $el)
            });
            zoomControlDiv.index = 1;
            this.searchMap.map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(zoomControlDiv);
            zoomControlDiv = document.createElement('div');
            zoomControl = new this.ZoomControl(zoomControlDiv, me.searchMap.map, '+', function() {
                fe_map.zoomIn(1, $el)
            });
            zoomControlDiv.index = 1;
            this.searchMap.map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(zoomControlDiv);
            this.checkIfNeedToPan();
        }
        this.checkIfNeedToPan = function() {
            if (top.showOnMap) {
                var lat = parseFloat(showOnMap.lat);
                var lng = parseFloat(showOnMap.lng);
                var $map;
                if (top.showOnMap.el) {
                    if (typeof(top.showOnMap.el) == 'string') {
                        $map = $(showOnMap.el);
                        console.log('case1');
                    } else if (typeof(top.showOnMap.el) == 'object') {
                        $map = top.showOnMap.el;
                        console.log('case2');
                    }
                } else {
                    $map = $('.map').first();
                    console.log('case3');
                }
                if ($map.length > 0) {
                    if (lat > 0 && lng > 0) {
                        console.log('checkIfNeedToMap true - ', lat, lng, $map);
                        this.centerMapOnPoint(lat, lng, $map);
                    }
                }
            }
            if (top.showOnMap2) {
                var lat = parseFloat(showOnMap2.lat);
                var lng = parseFloat(showOnMap2.lng);
                var $map;
                if (top.showOnMap2.el) {
                    if (typeof(top.showOnMap2.el) == 'string') {
                        $map = $(top.showOnMap2.el);
                    } else if (typeof(top.showOnMap2.el) == 'object') {
                        $map = top.showOnMap2.el;
                    }
                } else {
                    $map = $('.map').first();
                }
                if ($map.length > 0) {
                    if (lat > 0 && lng > 0) {
                        this.centerMapOnPoint(lat, lng, $map);
                    }
                }
            }
            return;
        }
        this.updateMapWithResults = function(results) {
            var me = this;
            if (results != false && $(".map").length > 0) {
                results.forEach(function(result) {
                    $('.map').each(function(idx, el) {
                        if (typeof result.LAT != "undefined" && typeof result.LNG != "undefined") {
                            me.addMarkerToMap(result.LAT, result.LNG, result.URL, result.user_id, $(el));
                        }
                    });
                });
            }
            return;
        }
        this.addMarkerToMap = function(lat, lng, url, id, map) {
            var myLatLng = new google.maps.LatLng(lat, lng);
            this.searchMap.map = map.gmap3('get');
            this.searchMap.marker = new google.maps.Marker({
                map: this.searchMap.map,
                position: myLatLng,
                options: {
                    icon: {
                        url: "/xstorage/template/img/map_marker.png",
                        scaledSize: new google.maps.Size(30, 30),
                        origin: new google.maps.Point(0, 0),
                        anchor: new google.maps.Point(10, 30)
                    }
                },
                url: url,
                dataid: id
            });
            this.allMarkers.push({
                id: id,
                obj: this.searchMap.marker
            });
            google.maps.event.addListener(this.searchMap.marker, 'click', function() {
                window.location.href = this.url;
            });
            google.maps.event.addListener(this.searchMap.marker, 'mouseover', function() {
                var userSearchResult = $('.searchlist .img-wrapper[data-userId="' + this.dataid + '"]');
                if (userSearchResult.length > 0) {
                    $(userSearchResult).addClass('active');
                    $('div.middle-row').animate({
                        scrollTop: userSearchResult.offset().top
                    }, 500);
                }
            });
            google.maps.event.addListener(this.searchMap.marker, 'mouseout', function() {
                var userSearchResult = $('.searchlist .img-wrapper[data-userId="' + this.dataid + '"]');
                $(userSearchResult).removeClass('active');
            });
        }
        this.panToMarker = function(id) {
            var foundMarker = false;
            $.each(this.allMarkers, function() {
                if (this.id == id) {
                    foundMarker = this;
                }
            });
            if (foundMarker != false) {
                this.searchMap.map = $('.map').first().gmap3('get');
                $('.map').animate({
                    "border-color": "#04e0d7",
                    "border-style": "solid",
                    "border-width": "6px"
                }, 500).animate({
                    "border-color": "transparent",
                    "border-style": "solid",
                    "border-width": "1px"
                }, 500);
                this.searchMap.map.panTo(foundMarker.obj.position);
            }
            return;
        }
        this.centerMapOnPoint = function(lat, lng, $map) {
            var myLatLng = new google.maps.LatLng(lat, lng);
            console.info($map);
            this.searchMap.map = $map.gmap3('get');
            if (this.searchMap.map === undefined) return;
            this.searchMap.map.setCenter(myLatLng);
            this.searchMap.marker.setPosition(myLatLng);
        }
        this.ZoomControl = function(controlDiv, map, text, callback) {
            var controlUI = document.createElement('div');
            controlUI.style.backgroundColor = '#04e0d7';
            controlUI.style.borderRadius = '50%';
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
            controlDiv.appendChild(controlUI);
            var controlText = document.createElement('div');
            controlText.style.color = '#000000';
            controlText.style.fontFamily = 'Roboto,Arial,sans-serif';
            controlText.style.fontWeight = 'bold';
            controlText.style.fontSize = '16px';
            controlText.style.lineHeight = '25px';
            controlText.innerHTML = text;
            controlUI.appendChild(controlText);
            google.maps.event.addDomListener(controlUI, 'click', callback);
        }
        this.zoomIn = function(times, $map) {
            var howMuch = 1;
            var map;
            if (typeof($map) == 'object') {
                map = $map.gmap3('get');
            } else if (typeof($map) == 'string') {
                map = $($map).gmap3('get');
            } else {
                map = $('.map').first().gmap3('get');
            }
            var currentZoomLevel = map.getZoom();
            if (currentZoomLevel < 21 - howMuch) {
                map.setZoom(currentZoomLevel + howMuch);
            }
        }
        this.zoomOut = function(times, $map) {
            var howMuch = 1;
            var map;
            if (typeof($map) == 'object') {
                map = $map.gmap3('get');
            } else if (typeof($map) == 'string') {
                map = $($map).gmap3('get');
            } else {
                map = $('.map').first().gmap3('get');
            }
            var currentZoomLevel = map.getZoom();
            if (currentZoomLevel > (-1) + howMuch) {
                map.setZoom(currentZoomLevel - howMuch);
            }
        }
    }
})();
$(document).ready(function() {
    fe_map.init();
});
