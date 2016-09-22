<?php /* Smarty version Smarty-3.0.7, created on 2015-03-07 01:03:19
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codebDJWCI" */ ?>
<?php /*%%SmartyHeaderCode:81752324254fa4047916188-80854055%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd2683a8cd2b5cf730635f93caf287286af3b42f3' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codebDJWCI',
      1 => 1425686599,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '81752324254fa4047916188-80854055',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
[GRID]<div class="<?php echo $_smarty_tpl->getVariable('class')->value;?>
">
    <div class="row">
        <?php  $_smarty_tpl->tpl_vars['colHtml'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('columns')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['colHtml']->key => $_smarty_tpl->tpl_vars['colHtml']->value){
?>
            [COL]<?php echo $_smarty_tpl->tpl_vars['colHtml']->value;?>
[/COL]
        <?php }} ?>
    </div>
</div>[/GRID]