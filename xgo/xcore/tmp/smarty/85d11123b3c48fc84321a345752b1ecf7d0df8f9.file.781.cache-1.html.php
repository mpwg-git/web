<?php /* Smarty version Smarty-3.0.7, created on 2016-01-05 12:43:06
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/781.cache-1.html" */ ?>
<?php /*%%SmartyHeaderCode:1967197839568bac4a322b47-66253329%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '85d11123b3c48fc84321a345752b1ecf7d0df8f9' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/781.cache-1.html',
      1 => 1451984362,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1967197839568bac4a322b47-66253329',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
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