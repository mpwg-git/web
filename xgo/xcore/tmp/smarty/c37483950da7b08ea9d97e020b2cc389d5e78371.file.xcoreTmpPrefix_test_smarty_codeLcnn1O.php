<?php /* Smarty version Smarty-3.0.7, created on 2016-01-13 10:53:06
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeLcnn1O" */ ?>
<?php /*%%SmartyHeaderCode:209994854256961e82c6b3a5-13949515%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c37483950da7b08ea9d97e020b2cc389d5e78371' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeLcnn1O',
      1 => 1452678786,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '209994854256961e82c6b3a5-13949515',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_smarty_tpl->tpl_vars['icontype'] = new Smarty_Variable($_smarty_tpl->getVariable('icontype',null,true,false)->value);if ($_smarty_tpl->tpl_vars['icontype']->value = 'frau'){?>
<span class="icon-frau"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></span>
<?php }else{ $_smarty_tpl->tpl_vars['icontype'] = new Smarty_Variable($_smarty_tpl->getVariable('icontype',null,true,false)->value);if ($_smarty_tpl->tpl_vars['icontype']->value = 'mann'){?>
Mann
<?php }else{ $_smarty_tpl->tpl_vars['icontype'] = new Smarty_Variable($_smarty_tpl->getVariable('icontype',null,true,false)->value);if ($_smarty_tpl->tpl_vars['icontype']->value = 'raum'){?>
Raum
<?php }}}?>