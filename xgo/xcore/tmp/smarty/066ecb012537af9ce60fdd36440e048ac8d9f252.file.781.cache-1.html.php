<?php /* Smarty version Smarty-3.0.7, created on 2016-08-03 12:46:08
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/781.cache-1.html" */ ?>
<?php /*%%SmartyHeaderCode:98081486057a1cb70661675-84946642%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '066ecb012537af9ce60fdd36440e048ac8d9f252' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/781.cache-1.html',
      1 => 1451984362,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '98081486057a1cb70661675-84946642',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div class="form-group">
    <label for="umkreis"><?php echo smarty_function_xr_translate(array('tag'=>"Umkreis?"),$_smarty_tpl);?>
</label>
    <div class="slider-padder">
        <div id="umkreis-slider" data-value="<?php echo $_smarty_tpl->getVariable('searchSession')->value['range'];?>
"></div>
    </div>
    <p class="legend clearfix"><span class="pull-left"><?php echo smarty_function_xr_translate(array('tag'=>"5 km"),$_smarty_tpl);?>
</span><span class="pull-right"><?php echo smarty_function_xr_translate(array('tag'=>"50 km"),$_smarty_tpl);?>
</span></p>
</div>