<?php /* Smarty version Smarty-3.0.7, created on 2015-08-15 17:05:40
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeI7LG6f" */ ?>
<?php /*%%SmartyHeaderCode:10200842655cf5544dc42d5-83323459%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6b950bcd85ef1bca283a1bc72da3abcb2e1bfcc7' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeI7LG6f',
      1 => 1439651140,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10200842655cf5544dc42d5-83323459',
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

<script src="https://maps.googleapis.com/maps/api/js?signed_in=true&libraries=places&callback=initAutocomplete"
        async defer></script>

<script>
    var autocomplete;
    
    function initAutocomplete() {
      // Create the autocomplete object, restricting the search to geographical
      // location types.
      
      console.log("init autoo");
      
      autocomplete = new google.maps.places.Autocomplete(
          /** @type {!HTMLInputElement} */(document.getElementById('autocomplete-location')),
          {types: ['geocode']});
    
      // When the user selects an address from the dropdown, populate the address
      // fields in the form.
      //autocomplete.addListener('place_changed', fillInAddress);
    }
    
</script>


