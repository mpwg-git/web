<?php /* Smarty version Smarty-3.0.7, created on 2016-01-13 10:57:52
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeX8e9S0" */ ?>
<?php /*%%SmartyHeaderCode:86181291556961fa0463a73-22257711%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3786eb35e60d432aad70fcd7723c3c2d929364f4' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeX8e9S0',
      1 => 1452679072,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '86181291556961fa0463a73-22257711',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_smarty_tpl->tpl_vars['icontype'] = new Smarty_Variable($_smarty_tpl->getVariable('icontype',null,true,false)->value);if ($_smarty_tpl->tpl_vars['icontype']->value = 'frau'){?>
<span class="icon-frau" data-x><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></span>
<?php }else{ $_smarty_tpl->tpl_vars['icontype'] = new Smarty_Variable($_smarty_tpl->getVariable('icontype',null,true,false)->value);if ($_smarty_tpl->tpl_vars['icontype']->value = 'mann'){?>
Mann
<?php }else{ $_smarty_tpl->tpl_vars['icontype'] = new Smarty_Variable($_smarty_tpl->getVariable('icontype',null,true,false)->value);if ($_smarty_tpl->tpl_vars['icontype']->value = 'raum'){?>
Raum
<?php }}}?>