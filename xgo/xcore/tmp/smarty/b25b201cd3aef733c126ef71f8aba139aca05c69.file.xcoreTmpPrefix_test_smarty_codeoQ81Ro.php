<?php /* Smarty version Smarty-3.0.7, created on 2015-08-17 18:36:44
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeoQ81Ro" */ ?>
<?php /*%%SmartyHeaderCode:126158004455d20d9c97d129-15499580%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b25b201cd3aef733c126ef71f8aba139aca05c69' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeoQ81Ro',
      1 => 1439829404,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '126158004455d20d9c97d129-15499580',
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
	
	<input type="hidden" name="ADRESSE_STRASSE" class="location-strasse" />
	<input type="hidden" name="ADRESSE_STRASSE_NR" class="location-strasse-nr" />
	<input type="hidden" name="ADRESSE_PLZ" class="location-plz" />
	<input type="hidden" name="ADRESSE_STADT" class="location-stadt" />
	<input type="hidden" name="ADRESSE_LAND" class="location-land" />
	<input type="hidden" name="ADRESSE_LAT" class="location-lat" />
	<input type="hidden" name="ADRESSE_LNG" class="location-lng" />
	
	
</div>




