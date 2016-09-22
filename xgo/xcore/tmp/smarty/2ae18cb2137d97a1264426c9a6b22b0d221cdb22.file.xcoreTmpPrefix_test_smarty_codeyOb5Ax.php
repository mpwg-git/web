<?php /* Smarty version Smarty-3.0.7, created on 2016-08-09 13:30:37
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeyOb5Ax" */ ?>
<?php /*%%SmartyHeaderCode:120433666757a9bedda70f66-69515574%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2ae18cb2137d97a1264426c9a6b22b0d221cdb22' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeyOb5Ax',
      1 => 1470742237,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '120433666757a9bedda70f66-69515574',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><?php $_smarty_tpl->tpl_vars['adresseValue'] = new Smarty_variable('', null, null);?>
<?php if ($_smarty_tpl->getVariable('inForm')->value==1){?>
    <?php $_smarty_tpl->tpl_vars['adresseValue'] = new Smarty_variable($_smarty_tpl->getVariable('profileData')->value['wz_ADRESSE'], null, null);?>
<?php }elseif(isset($_smarty_tpl->getVariable('searchSession',null,true,false)->value['adresse'])){?>
    <?php $_smarty_tpl->tpl_vars['adresseValue'] = new Smarty_variable($_smarty_tpl->getVariable('searchSession')->value['adresse'], null, null);?>
<?php }else{ ?>
    <?php $_smarty_tpl->tpl_vars['adresseValue'] = new Smarty_variable($_smarty_tpl->getVariable('value')->value, null, null);?>
<?php }?>
<?php if ($_smarty_tpl->getVariable('adresseValue')->value==''){?><?php $_smarty_tpl->tpl_vars['adresseValue'] = new Smarty_variable('Wien,Österreich', null, null);?><?php }?>

<div class="input-icon search-input search-input-map <?php if ($_smarty_tpl->getVariable('inForm')->value==1){?>small v-center<?php }?>">
    <input class="form-control autocomplete-location <?php echo $_smarty_tpl->getVariable('addClass')->value;?>
 <?php if ($_smarty_tpl->getVariable('inForm')->value==1){?>in-form<?php }?>" <?php if ($_smarty_tpl->getVariable('inForm')->value==1){?>id="ADRESSE" rel="required"<?php }?> name="ADRESSE" value="<?php echo $_smarty_tpl->getVariable('adresseValue')->value;?>
"  placeholder="<?php echo smarty_function_xr_translate(array('tag'=>"Stadt, Ort, PLZ?"),$_smarty_tpl);?>
" />
    
    <span class="icon-Map js-autocomplete-duck">
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




