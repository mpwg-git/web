<?php /* Smarty version Smarty-3.0.7, created on 2015-08-15 16:48:56
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeiWjJ8q" */ ?>
<?php /*%%SmartyHeaderCode:69539579855cf5158187780-43617051%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5753af176bc0a82250a27a7198fd32db1056611d' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeiWjJ8q',
      1 => 1439650136,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '69539579855cf5158187780-43617051',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="input-icon search-input search-input-map">
    <input class="form-control" class="autocomplete-location" id="autocomplete-location" name="address" placeholder="Stadt, Ort, PLZ?" />
    <span class="icon-Map">
	    <span class="path1"></span><span class="path2"></span>
	</span>
</div>

<script>
    function initAutocomplete() {
      // Create the autocomplete object, restricting the search to geographical
      // location types.
      autocomplete = new google.maps.places.Autocomplete(
          /** @type {!HTMLInputElement} */(document.getElementById('autocomplete-location')),
          {types: ['geocode']});
    
      // When the user selects an address from the dropdown, populate the address
      // fields in the form.
      autocomplete.addListener('place_changed', fillInAddress);
    }
</script>

<script src="https://maps.googleapis.com/maps/api/js?signed_in=true&libraries=places&callback=initAutocomplete" async defer></script>