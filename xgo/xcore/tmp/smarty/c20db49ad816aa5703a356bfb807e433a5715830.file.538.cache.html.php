<?php /* Smarty version Smarty-3.0.7, created on 2015-06-24 15:00:58
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/538.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:1385965399558aaa0ac834b5-39080747%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c20db49ad816aa5703a356bfb807e433a5715830' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/538.cache.html',
      1 => 1435074121,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1385965399558aaa0ac834b5-39080747',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?> <div class='xr_required_<?php echo $_smarty_tpl->getVariable('field_name')->value;?>
 required_Y' style='display:none;'><?php echo smarty_function_xr_translate(array('tag'=>'Bitte füllen Sie dieses Feld aus'),$_smarty_tpl);?>
</div>
 <div class='xr_required_<?php echo $_smarty_tpl->getVariable('field_name')->value;?>
 required_EMAIL' style='display:none;'><?php echo smarty_function_xr_translate(array('tag'=>'Bitte tragen Sie eine E-Mail Adresse ein'),$_smarty_tpl);?>
</div>