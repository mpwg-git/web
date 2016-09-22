<?php /* Smarty version Smarty-3.0.7, created on 2015-03-07 11:16:02
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codehPkenE" */ ?>
<?php /*%%SmartyHeaderCode:145583893154facfe2a8f5a4-40947048%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'be50cd2b555bd74c11e81c8686aed2cb0c37e0f2' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codehPkenE',
      1 => 1425723362,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '145583893154facfe2a8f5a4-40947048',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
[GRID]
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