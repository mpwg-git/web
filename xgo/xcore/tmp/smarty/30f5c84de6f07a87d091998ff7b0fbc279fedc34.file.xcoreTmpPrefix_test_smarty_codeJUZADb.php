<?php /* Smarty version Smarty-3.0.7, created on 2016-01-13 10:59:02
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeJUZADb" */ ?>
<?php /*%%SmartyHeaderCode:213108899256961fe6b04e51-16189614%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '30f5c84de6f07a87d091998ff7b0fbc279fedc34' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeJUZADb',
      1 => 1452679142,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '213108899256961fe6b04e51-16189614',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_smarty_tpl->tpl_vars['icontype'] = new Smarty_Variable($_smarty_tpl->getVariable('icontype',null,true,false)->value);if ($_smarty_tpl->tpl_vars['icontype']->value = 'frau'){?>
XXXXXXXXXXXXXXXX

<span class="icon-frau" data-x><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></span>
<?php }else{ $_smarty_tpl->tpl_vars['icontype'] = new Smarty_Variable($_smarty_tpl->getVariable('icontype',null,true,false)->value);if ($_smarty_tpl->tpl_vars['icontype']->value = 'mann'){?>
Mann
<?php }else{ $_smarty_tpl->tpl_vars['icontype'] = new Smarty_Variable($_smarty_tpl->getVariable('icontype',null,true,false)->value);if ($_smarty_tpl->tpl_vars['icontype']->value = 'raum'){?>
Raum
<?php }}}?>