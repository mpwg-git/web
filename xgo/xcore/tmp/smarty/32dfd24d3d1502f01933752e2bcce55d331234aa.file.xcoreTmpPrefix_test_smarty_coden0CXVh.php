<?php /* Smarty version Smarty-3.0.7, created on 2016-05-01 13:39:40
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_coden0CXVh" */ ?>
<?php /*%%SmartyHeaderCode:10173231785725eafc4d3f29-47536482%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '32dfd24d3d1502f01933752e2bcce55d331234aa' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_coden0CXVh',
      1 => 1462102780,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10173231785725eafc4d3f29-47536482',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?>
<?php if ($_smarty_tpl->getVariable('adresseValue')->value==''){?><?php $_smarty_tpl->tpl_vars['adresseValue'] = new Smarty_variable('Wien, Österreich', null, null);?><?php }?>

<div class="input-icon search-input search-input-map">
    <input class="form-control autocomplete-location-v2" id="ADRESSE" rel="required name="ADRESSE" value="<?php echo $_smarty_tpl->getVariable('adresseValue')->value;?>
"  placeholder="<?php echo smarty_function_xr_translate(array('tag'=>"Stadt, Ort, PLZ?"),$_smarty_tpl);?>
" />
    
    <span class="icon-Map js-autocomplete-duck">
	    <span class="path1"></span><span class="path2"></span>
	</span>
	
	
	
	
	<div class="location-hidden-container">
	    
	   <input type="hidden" name="ADRESSE_STRASSE" class="location-strasse route" value="" />
    	<input type="hidden" name="ADRESSE_STRASSE_NR" class="location-strasse-nr street_number" value="" />
    	<input type="hidden" name="ADRESSE_PLZ" class="location-plz postal_code" value="" />
    	<input type="hidden" name="ADRESSE_STADT" class="location-stadt locality" value="Wien" />
    	<input type="hidden" name="ADRESSE_LAND" class="location-land country" value="Österreich" />
    	<input type="hidden" name="ADRESSE_LAT" class="location-lat" value="" />
    	<input type="hidden" name="ADRESSE_LNG" class="location-lng" value="" />
    	
    	<input type="hidden" class="administrative_area_level_1" />
    	
    	
	</div>
	

        <div class="error-div" id="ADRESSE_error">
            <?php echo smarty_function_xr_translate(array('tag'=>"Bitte Adresse angeben"),$_smarty_tpl);?>

        </div>
   
</div>




