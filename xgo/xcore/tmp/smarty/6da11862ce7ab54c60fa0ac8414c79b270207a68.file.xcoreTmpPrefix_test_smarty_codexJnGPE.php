<?php /* Smarty version Smarty-3.0.7, created on 2015-08-15 17:11:53
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codexJnGPE" */ ?>
<?php /*%%SmartyHeaderCode:111645525455cf56b95c4681-62823822%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6da11862ce7ab54c60fa0ac8414c79b270207a68' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codexJnGPE',
      1 => 1439651513,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '111645525455cf56b95c4681-62823822',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="input-icon search-input search-input-map <?php if ($_smarty_tpl->getVariable('inForm')->value==1){?>small v-center<?php }?>">
    <input class="form-control" class="autocomplete-location" id="autocomplete-location" name="address" placeholder="Stadt, Ort, PLZ?" />
    <span class="icon-Map">
	    <span class="path1"></span><span class="path2"></span>
	</span>
</div>


<div class="input-icon search-input small v-center">
        <input class="form-control" name="ADRESSE" value="<?php echo $_smarty_tpl->getVariable('profile')->value['wz_ADRESSE'];?>
" placeholder="Stadt, Ort, PLZ?">
        <span class="icon-Map">
		    <span class="path1"></span><span class="path2"></span>
		</span>
	</div>

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


