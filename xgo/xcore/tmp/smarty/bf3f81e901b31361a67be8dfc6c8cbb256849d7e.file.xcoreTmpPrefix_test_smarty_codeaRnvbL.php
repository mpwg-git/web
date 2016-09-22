<?php /* Smarty version Smarty-3.0.7, created on 2015-08-15 17:01:11
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeaRnvbL" */ ?>
<?php /*%%SmartyHeaderCode:154665360255cf5437277c15-94179491%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bf3f81e901b31361a67be8dfc6c8cbb256849d7e' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeaRnvbL',
      1 => 1439650871,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '154665360255cf5437277c15-94179491',
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
    var autocomplete;
    
    function initAutocomplete() {
      // Create the autocomplete object, restricting the search to geographical
      // location types.
      autocomplete = new google.maps.places.Autocomplete(
          /** @type {!HTMLInputElement} */(document.getElementById('autocomplete-location')),
          {types: ['geocode']});
    
      // When the user selects an address from the dropdown, populate the address
      // fields in the form.
      //autocomplete.addListener('place_changed', fillInAddress);
    }
    
    $(document).ready(function(){
    
        initAutocomplete();
    
    });
    
    
</script>


