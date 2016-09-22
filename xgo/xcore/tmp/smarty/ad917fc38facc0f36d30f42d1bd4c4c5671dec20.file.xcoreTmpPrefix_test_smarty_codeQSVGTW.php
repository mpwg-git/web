<?php /* Smarty version Smarty-3.0.7, created on 2015-08-20 12:53:25
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeQSVGTW" */ ?>
<?php /*%%SmartyHeaderCode:26102850255d5b1a52f28e6-75657985%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ad917fc38facc0f36d30f42d1bd4c4c5671dec20' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeQSVGTW',
      1 => 1440068005,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '26102850255d5b1a52f28e6-75657985',
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
