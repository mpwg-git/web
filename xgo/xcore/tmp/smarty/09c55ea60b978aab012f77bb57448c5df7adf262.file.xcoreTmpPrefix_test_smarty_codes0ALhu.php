<?php /* Smarty version Smarty-3.0.7, created on 2015-08-21 15:38:49
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codes0ALhu" */ ?>
<?php /*%%SmartyHeaderCode:18010120955d729e90701f4-85526005%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '09c55ea60b978aab012f77bb57448c5df7adf262' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codes0ALhu',
      1 => 1440164329,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18010120955d729e90701f4-85526005',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><?php $_smarty_tpl->tpl_vars['adresseValue'] = new Smarty_variable('', null, null);?>
<?php if ($_smarty_tpl->getVariable('inForm')->value==1){?>
    <?php $_smarty_tpl->tpl_vars['adresseValue'] = new Smarty_variable($_smarty_tpl->getVariable('profileData')->value['wz_ADRESSE'], null, null);?>
<?php }elseif(isset($_smarty_tpl->getVariable('searchSession',null,true,false)->value['adresse'])){?>
    <?php $_smarty_tpl->tpl_vars['adresseValue'] = new Smarty_variable($_smarty_tpl->getVariable('searchSession')->value['adresse'], null, null);?>
<?php }else{ ?>
    <?php $_smarty_tpl->tpl_vars['adresseValue'] = new Smarty_variable($_smarty_tpl->getVariable('value')->value, null, null);?>
<?php }?>

<div class="input-icon search-input search-input-map <?php if ($_smarty_tpl->getVariable('inForm')->value==1){?>small v-center<?php }?>">
    <input class="form-control autocomplete-location <?php if ($_smarty_tpl->getVariable('inForm')->value==1){?>in-form<?php }?>" <?php if ($_smarty_tpl->getVariable('inForm')->value==1){?>id="ADRESSE" rel="required"<?php }?> name="ADRESSE" value="<?php echo $_smarty_tpl->getVariable('adresseValue')->value;?>
" name="address" placeholder="Stadt, Ort, PLZ?" />
    
    <span class="icon-Map">
	    <span class="path1"></span><span class="path2"></span>
	</span>
	
	<div class="location-hidden-container">
	    
	  <input type="hidden" name="ADRESSE_STRASSE" class="location-strasse route" <?php if ($_smarty_tpl->getVariable('inForm')->value==1){?>value="<?php echo $_smarty_tpl->getVariable('profileData')->value['wz_ADRESSE_STRASSE'];?>
"<?php }elseif(isset($_smarty_tpl->getVariable('searchSession',null,true,false)->value)){?>value="<?php echo $_smarty_tpl->getVariable('searchSession')->value['location']['ADRESSE_STRASSE'];?>
"<?php }?> />
    	<input type="hidden" name="ADRESSE_STRASSE_NR" class="location-strasse-nr street_number" <?php if ($_smarty_tpl->getVariable('inForm')->value==1){?>value="<?php echo $_smarty_tpl->getVariable('profileData')->value['wz_ADRESSE_STRASSE_NR'];?>
" <?php }elseif(isset($_smarty_tpl->getVariable('searchSession',null,true,false)->value)){?>value="<?php echo $_smarty_tpl->getVariable('searchSession')->value['location']['ADRESSE_STRASSE_NR'];?>
"<?php }?>/>
    	<input type="hidden" name="ADRESSE_PLZ" class="location-plz postal_code" <?php if ($_smarty_tpl->getVariable('inForm')->value==1){?>value="<?php echo $_smarty_tpl->getVariable('profileData')->value['wz_ADRESSE_PLZ'];?>
"<?php }elseif(isset($_smarty_tpl->getVariable('searchSession',null,true,false)->value)){?>value="<?php echo $_smarty_tpl->getVariable('searchSession')->value['location']['ADRESSE_PLZ'];?>
"<?php }?>  />
    	<input type="hidden" name="ADRESSE_STADT" class="location-stadt locality" <?php if ($_smarty_tpl->getVariable('inForm')->value==1){?>value="<?php echo $_smarty_tpl->getVariable('profileData')->value['wz_ADRESSE_STADT'];?>
"<?php }elseif(isset($_smarty_tpl->getVariable('searchSession',null,true,false)->value)){?>value="<?php echo $_smarty_tpl->getVariable('searchSession')->value['location']['ADRESSE_STADT'];?>
"<?php }?>  />
    	<input type="hidden" name="ADRESSE_LAND" class="location-land country" <?php if ($_smarty_tpl->getVariable('inForm')->value==1){?>value="<?php echo $_smarty_tpl->getVariable('profileData')->value['wz_ADRESSE_LAND'];?>
"<?php }elseif(isset($_smarty_tpl->getVariable('searchSession',null,true,false)->value)){?>value="<?php echo $_smarty_tpl->getVariable('searchSession')->value['location']['ADRESSE_LAND'];?>
"<?php }?>  />
    	<input type="hidden" name="ADRESSE_LAT" class="location-lat" <?php if ($_smarty_tpl->getVariable('inForm')->value==1){?>value="<?php echo $_smarty_tpl->getVariable('profileData')->value['wz_ADRESSE_LAT'];?>
"<?php }elseif(isset($_smarty_tpl->getVariable('searchSession',null,true,false)->value)){?>value="<?php echo $_smarty_tpl->getVariable('searchSession')->value['location']['ADRESSE_LAT'];?>
"<?php }?>  />
    	<input type="hidden" name="ADRESSE_LNG" class="location-lng" <?php if ($_smarty_tpl->getVariable('inForm')->value==1){?>value="<?php echo $_smarty_tpl->getVariable('profileData')->value['wz_ADRESSE_LNG'];?>
"<?php }elseif(isset($_smarty_tpl->getVariable('searchSession',null,true,false)->value)){?>value="<?php echo $_smarty_tpl->getVariable('searchSession')->value['location']['ADRESSE_LNG'];?>
"<?php }?>  />
    	
    	<input type="hidden" class="administrative_area_level_1" />
    	
	</div>
	
	<?php if ($_smarty_tpl->getVariable('inForm')->value==1){?>
        <div class="error-div" id="ADRESSE_error">
            <?php echo smarty_function_xr_translate(array('tag'=>"Bitte Adresse angeben"),$_smarty_tpl);?>

        </div>
    <?php }?>
</div>
