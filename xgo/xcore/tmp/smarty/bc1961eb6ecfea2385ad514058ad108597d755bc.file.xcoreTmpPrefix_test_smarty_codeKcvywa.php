<?php /* Smarty version Smarty-3.0.7, created on 2015-08-17 18:58:00
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeKcvywa" */ ?>
<?php /*%%SmartyHeaderCode:77280894755d21298a72655-56817360%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bc1961eb6ecfea2385ad514058ad108597d755bc' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeKcvywa',
      1 => 1439830680,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '77280894755d21298a72655-56817360',
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
	
	<input type="hidden" name="ADRESSE_LNG" class="administrative_area_level_1" />
	
	
</div>




