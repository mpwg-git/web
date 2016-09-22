<?php /* Smarty version Smarty-3.0.7, created on 2015-08-18 15:18:25
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code8mafIa" */ ?>
<?php /*%%SmartyHeaderCode:127230849855d330a183baa2-59967622%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dc086d03593fdf472674acc8b1625bd9a5b0fe09' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code8mafIa',
      1 => 1439903905,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '127230849855d330a183baa2-59967622',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="input-icon search-input search-input-map <?php if ($_smarty_tpl->getVariable('inForm')->value==1){?>small v-center<?php }?>">
    <input class="form-control autocomplete-location <?php if ($_smarty_tpl->getVariable('inForm')->value==1){?>in-form<?php }?>" name="ADRESSE" <?php if ($_smarty_tpl->getVariable('inForm')->value==1){?>value="<?php echo $_smarty_tpl->getVariable('profileData')->value['wz_ADRESSE'];?>
"<?php }else{ ?>value="<?php echo $_smarty_tpl->getVariable('value')->value;?>
<?php }?>" name="address" placeholder="Stadt, Ort, PLZ?" />
    <span class="icon-Map">
	    <span class="path1"></span><span class="path2"></span>
	</span>
	
	<div class="location-hidden-container">
	    
	    <input type="hidden" name="ADRESSE_STRASSE" class="location-strasse route" <?php if ($_smarty_tpl->getVariable('inForm')->value==1){?>value="<?php echo $_smarty_tpl->getVariable('profileData')->value['wz_ADRESSE_STRASSE'];?>
"<?php }?> />
    	<input type="hidden" name="ADRESSE_STRASSE_NR" class="location-strasse-nr street_number" <?php if ($_smarty_tpl->getVariable('inForm')->value==1){?>value="<?php echo $_smarty_tpl->getVariable('profileData')->value['wz_ADRESSE_STRASSE_NR'];?>
"<?php }?> />
    	<input type="hidden" name="ADRESSE_PLZ" class="location-plz postal_code" <?php if ($_smarty_tpl->getVariable('inForm')->value==1){?>value="<?php echo $_smarty_tpl->getVariable('profileData')->value['wz_ADRESSE_PLZ'];?>
"<?php }?> />
    	<input type="hidden" name="ADRESSE_STADT" class="location-stadt locality" <?php if ($_smarty_tpl->getVariable('inForm')->value==1){?>value="<?php echo $_smarty_tpl->getVariable('profileData')->value['wz_ADRESSE_STADT'];?>
"<?php }?> />
    	<input type="hidden" name="ADRESSE_LAND" class="location-land country" <?php if ($_smarty_tpl->getVariable('inForm')->value==1){?>value="<?php echo $_smarty_tpl->getVariable('profileData')->value['wz_ADRESSE_LAND'];?>
"<?php }?> />
    	<input type="hidden" name="ADRESSE_LAT" class="location-lat" <?php if ($_smarty_tpl->getVariable('inForm')->value==1){?>value="<?php echo $_smarty_tpl->getVariable('profileData')->value['wz_ADRESSE_LAT'];?>
"<?php }?> />
    	<input type="hidden" name="ADRESSE_LNG" class="location-lng" <?php if ($_smarty_tpl->getVariable('inForm')->value==1){?>value="<?php echo $_smarty_tpl->getVariable('profileData')->value['wz_ADRESSE_LNG'];?>
"<?php }?> />
    	
    	<input type="hidden" class="administrative_area_level_1" />
    	
	</div>
	
	
</div>




