<?php /* Smarty version Smarty-3.0.7, created on 2015-07-13 16:28:42
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code5mHfjY" */ ?>
<?php /*%%SmartyHeaderCode:206973247455a3cb1a545b14-21473275%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ebf83cbaf375065d0046005446e708c58d2d8992' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code5mHfjY',
      1 => 1436797722,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '206973247455a3cb1a545b14-21473275',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><script type="text/javascript">
    $(function(){
        
        var map = $('#map').gmap3({
            map:{
                options:{
                    zoom: 16,
                    mapTypeId: "wsfStyle",
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
        
        console.log(map);
        map = map[0];
        
        var marker = new google.maps.Marker({
            map: map,
            address: "Neustiftgasse 5, Wien",
            options:{
                icon: {
                    url: "http://wsf.xgodev.com/xstorage/template/img/map_marker.png",
                    scaledSize: new google.maps.Size(50, 50),
                    origin: new google.maps.Point(0,0),
                    anchor: new google.maps.Point(30, 50)
                }
            }
        });
        
        var markerRadius = new google.maps.Circle({
            map: map,
            radius: 10000,    // 10 miles in metres
            fillColor: '#AA0000'
        });
        
        circle.bindTo('center', marker, 'position');
        
    });
</script>

<div class="searchform">
    <h1><?php echo smarty_function_xr_translate(array('tag'=>"Suche"),$_smarty_tpl);?>
</h1>
    <form>
        <div class="form-group">
            <label for="date"><?php echo smarty_function_xr_translate(array('tag'=>"Wann?"),$_smarty_tpl);?>
</label>
            <div class="input-icon">
                <input class="form-control" name="date" id="date" placeholder="<?php echo smarty_function_xr_translate(array('tag'=>'ab'),$_smarty_tpl);?>
"/>
                <span class="icon-Lupe"></span>
    		</div>
        </div>
        <div class="form-group">
            <label for="cost"><?php echo smarty_function_xr_translate(array('tag'=>"Wieviel?"),$_smarty_tpl);?>
</label>
            <div id="slider-range"></div>
            <p class="legend clearfix"><span class="pull-left"><?php echo smarty_function_xr_translate(array('tag'=>"VON"),$_smarty_tpl);?>
</span><span class="pull-right"><?php echo smarty_function_xr_translate(array('tag'=>"BIS"),$_smarty_tpl);?>
</span></p>
            
        </div>
        <div class="form-group">
            <label for="location"><?php echo smarty_function_xr_translate(array('tag'=>"Wo?"),$_smarty_tpl);?>
</label>
            <div class="input-icon location-input">
                <input class="form-control" name="location" id="location"/>
                <span class="icon-Map"><span class="path1"></span><span class="path2"></span></span>
            </div>
        </div>
        <div class="form-group">
            <label for="umkreis"><?php echo smarty_function_xr_translate(array('tag'=>"Umkreis?"),$_smarty_tpl);?>
</label>
            <div id="umkreis-slider"></div>
            <p class="legend clearfix"><span class="pull-left"><?php echo smarty_function_xr_translate(array('tag'=>"5 km"),$_smarty_tpl);?>
</span><span class="pull-right"><?php echo smarty_function_xr_translate(array('tag'=>"50 km"),$_smarty_tpl);?>
</span></p>
        </div>
        <!--
        <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d170129.24812898834!2d16.380059899999996!3d48.2206849!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x476d079e5136ca9f%3A0xfdc2e58a51a25b46!2sWien!5e0!3m2!1sde!2sat!4v1435660054811" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
        -->
        <div id="map" class="map"></div>
    </form>
</div>
