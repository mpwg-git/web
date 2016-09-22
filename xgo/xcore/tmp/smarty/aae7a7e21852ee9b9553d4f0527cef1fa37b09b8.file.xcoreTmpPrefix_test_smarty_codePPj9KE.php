<?php /* Smarty version Smarty-3.0.7, created on 2015-03-07 01:03:05
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codePPj9KE" */ ?>
<?php /*%%SmartyHeaderCode:176113726354fa40398b3fa2-90095344%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aae7a7e21852ee9b9553d4f0527cef1fa37b09b8' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codePPj9KE',
      1 => 1425686585,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '176113726354fa40398b3fa2-90095344',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="<?php echo $_smarty_tpl->getVariable('class')->value;?>
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
</div>