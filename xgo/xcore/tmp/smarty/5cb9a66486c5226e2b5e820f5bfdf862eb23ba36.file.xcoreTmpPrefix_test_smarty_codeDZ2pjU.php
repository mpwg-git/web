<?php /* Smarty version Smarty-3.0.7, created on 2015-08-21 14:39:26
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeDZ2pjU" */ ?>
<?php /*%%SmartyHeaderCode:81382338255d71bfe78b887-10546074%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5cb9a66486c5226e2b5e820f5bfdf862eb23ba36' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeDZ2pjU',
      1 => 1440160766,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '81382338255d71bfe78b887-10546074',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_print_r')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_print_r.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><?php echo smarty_function_xr_print_r(array('val'=>$_smarty_tpl->getVariable('searchSession')->value),$_smarty_tpl);?>


<div class="input-icon search-input search-input-map <?php if ($_smarty_tpl->getVariable('inForm')->value==1){?>small v-center<?php }?>">
    <input class="form-control autocomplete-location <?php if ($_smarty_tpl->getVariable('inForm')->value==1){?>in-form<?php }?>" <?php if ($_smarty_tpl->getVariable('inForm')->value==1){?>id="ADRESSE" rel="required"<?php }?> name="ADRESSE" <?php if ($_smarty_tpl->getVariable('inForm')->value==1){?>value="<?php echo $_smarty_tpl->getVariable('profileData')->value['wz_ADRESSE'];?>
"<?php }elseif(){?>value="<?php echo $_smarty_tpl->getVariable('searchSession')->value['adresse'];?>
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
	
	<?php if ($_smarty_tpl->getVariable('inForm')->value==1){?>
        <div class="error-div" id="ADRESSE_error">
            <?php echo smarty_function_xr_translate(array('tag'=>"Bitte Adresse angeben"),$_smarty_tpl);?>

        </div>
    <?php }?>
</div>
