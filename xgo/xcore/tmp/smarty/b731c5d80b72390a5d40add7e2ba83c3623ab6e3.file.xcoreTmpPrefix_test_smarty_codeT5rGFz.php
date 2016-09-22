<?php /* Smarty version Smarty-3.0.7, created on 2015-08-17 18:56:33
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeT5rGFz" */ ?>
<?php /*%%SmartyHeaderCode:173691299355d21241f3b807-37330683%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b731c5d80b72390a5d40add7e2ba83c3623ab6e3' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeT5rGFz',
      1 => 1439830593,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '173691299355d21241f3b807-37330683',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="input-icon search-input search-input-map <?php if ($_smarty_tpl->getVariable('inForm')->value==1){?>small v-center<?php }?>">
    <input class="form-control autocomplete-location" name="ADRESSE" value="<?php echo $_smarty_tpl->getVariable('value')->value;?>
" name="address" placeholder="Stadt, Ort, PLZ?" />
    <span class="icon-Map">
	    <span class="path1"></span><span class="path2"></span>
	</span>
	
	<input type="hidden" name="ADRESSE_STRASSE" class="location-strasse street_number" />
	<input type="hidden" name="ADRESSE_STRASSE_NR" class="location-strasse-nr route" />
	<input type="hidden" name="ADRESSE_PLZ" class="location-plz postal_code" />
	<input type="hidden" name="ADRESSE_STADT" class="location-stadt locality" />
	<input type="hidden" name="ADRESSE_LAND" class="location-land country" />
	<input type="hidden" name="ADRESSE_LAT" class="location-lat" />
	<input type="hidden" name="ADRESSE_LNG" class="location-lng" />
	
	
</div>




