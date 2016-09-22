<?php /* Smarty version Smarty-3.0.7, created on 2015-08-17 19:56:58
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codec6RukA" */ ?>
<?php /*%%SmartyHeaderCode:17309280455d2206a170883-30487873%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f5bd3831edfc08d68202ea41eadacc6103e2dbbd' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codec6RukA',
      1 => 1439834218,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17309280455d2206a170883-30487873',
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
	
	<div class="location-hidden-container">
	    
	    <input type="hidden" name="ADRESSE_STRASSE" class="location-strasse street_number" <?php if ($_smarty_tpl->getVariable('inForm')->value==1){?>value="<?php echo $_smarty_tpl->getVariable('profileData')->value['wz_ADRESSE_STRASSE'];?>
"<?php }?> />
    	<input type="hidden" name="ADRESSE_STRASSE_NR" class="location-strasse-nr route" />
    	<input type="hidden" name="ADRESSE_PLZ" class="location-plz postal_code" />
    	<input type="hidden" name="ADRESSE_STADT" class="location-stadt locality" />
    	<input type="hidden" name="ADRESSE_LAND" class="location-land country" />
    	<input type="hidden" name="ADRESSE_LAT" class="location-lat" />
    	<input type="hidden" name="ADRESSE_LNG" class="location-lng" />
    	
    	<input type="hidden" class="administrative_area_level_1" />
    	
	        
	</div>
	
	
</div>




