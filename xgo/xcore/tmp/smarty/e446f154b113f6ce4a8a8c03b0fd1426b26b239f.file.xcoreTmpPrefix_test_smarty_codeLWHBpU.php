<?php /* Smarty version Smarty-3.0.7, created on 2015-08-12 14:27:10
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeLWHBpU" */ ?>
<?php /*%%SmartyHeaderCode:142994508855cb3b9e718277-25239481%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e446f154b113f6ce4a8a8c03b0fd1426b26b239f' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeLWHBpU',
      1 => 1439382430,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '142994508855cb3b9e718277-25239481',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_print_r')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_print_r.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><?php echo smarty_function_xr_print_r(array('val'=>$_smarty_tpl->getVariable('profile')->value['wz_MIETE_VON']),$_smarty_tpl);?>


<div class="form-group">
    <label><?php echo smarty_function_xr_translate(array('tag'=>"Miete?"),$_smarty_tpl);?>
</label>
    <div class="column-input v-center">
        <input class="form-control" name="MIETE_VON" value="<?php echo $_smarty_tpl->getVariable('profile')->value['wz_MIETE_VON'];?>
" placeholder="<?php echo smarty_function_xr_translate(array('tag'=>'von'),$_smarty_tpl);?>
 €?" />
    </div><!--
    --><div class="devider v-center">-</div><!--
    --><div class="column-input v-center">
        <input class="form-control" name="MIETE_BIS" value="<?php echo $_smarty_tpl->getVariable('profile')->value['wz_MIETE_BIS'];?>
" placeholder="<?php echo smarty_function_xr_translate(array('tag'=>'bis'),$_smarty_tpl);?>
 €?" />
    </div>
</div>