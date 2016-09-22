<?php /* Smarty version Smarty-3.0.7, created on 2015-10-29 11:01:44
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/781.cache-1.html" */ ?>
<?php /*%%SmartyHeaderCode:673007955631ee884d05e5-42412689%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a1ea3250f7fe5aafe0a4cc35779736f745856db1' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/781.cache-1.html',
      1 => 1446045163,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '673007955631ee884d05e5-42412689',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
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