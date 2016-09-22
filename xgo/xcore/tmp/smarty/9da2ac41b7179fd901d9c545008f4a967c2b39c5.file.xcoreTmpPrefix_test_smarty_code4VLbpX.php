<?php /* Smarty version Smarty-3.0.7, created on 2015-08-20 12:54:21
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code4VLbpX" */ ?>
<?php /*%%SmartyHeaderCode:113847066155d5b1dd478414-82665861%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9da2ac41b7179fd901d9c545008f4a967c2b39c5' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code4VLbpX',
      1 => 1440068061,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '113847066155d5b1dd478414-82665861',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_smarty_tpl->getVariable('mitbewohner')->value['F']>0){?>
    <?php while ($_smarty_tpl->getVariable('mitbewohner')->value['F']>0){?>
        <span class="icon-frau_black"></span>
        <?php if (!isset($_smarty_tpl->tpl_vars['mitbewohner']) || !is_array($_smarty_tpl->tpl_vars['mitbewohner']->value)) $_smarty_tpl->createLocalArrayVariable('mitbewohner', null, null);
$_smarty_tpl->tpl_vars['mitbewohner']->value['F'] = $_smarty_tpl->getVariable('mitbewohner')->value['F']-1;?>
    <?php }?>
<?php }?>

<?php if ($_smarty_tpl->getVariable('mitbewohner')->value['M']>0){?>
    <?php while ($_smarty_tpl->getVariable('mitbewohner')->value['M']>0){?>
        <span class="icon-mann_black"></span>
        <?php if (!isset($_smarty_tpl->tpl_vars['mitbewohner']) || !is_array($_smarty_tpl->tpl_vars['mitbewohner']->value)) $_smarty_tpl->createLocalArrayVariable('mitbewohner', null, null);
$_smarty_tpl->tpl_vars['mitbewohner']->value['M'] = $_smarty_tpl->getVariable('mitbewohner')->value['M']-1;?>
    <?php }?>
<?php }?>
