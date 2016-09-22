<?php /* Smarty version Smarty-3.0.7, created on 2015-03-07 11:17:54
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeVrbfsR" */ ?>
<?php /*%%SmartyHeaderCode:17572175654fad05278d2d5-63038264%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '76b579244af967545cc75845d744d6a7ae0932fd' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeVrbfsR',
      1 => 1425723474,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17572175654fad05278d2d5-63038264',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_print_r')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_print_r.php';
?><?php echo smarty_function_xr_print_r(array('val'=>$_smarty_tpl->getVariable('class')->value),$_smarty_tpl);?>



<div class="<?php echo $_smarty_tpl->getVariable('class')->value;?>
">
    <div class="row">
        <?php  $_smarty_tpl->tpl_vars['colHtml'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('columns')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['colHtml']->key => $_smarty_tpl->tpl_vars['colHtml']->value){
?>
           <?php echo $_smarty_tpl->tpl_vars['colHtml']->value;?>

        <?php }} ?>
    </div>
</div>