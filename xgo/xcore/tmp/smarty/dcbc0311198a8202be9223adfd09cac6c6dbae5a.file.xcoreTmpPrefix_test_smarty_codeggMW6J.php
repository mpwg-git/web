<?php /* Smarty version Smarty-3.0.7, created on 2015-08-12 11:59:33
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeggMW6J" */ ?>
<?php /*%%SmartyHeaderCode:47533708355cb19059813c2-60879113%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dcbc0311198a8202be9223adfd09cac6c6dbae5a' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeggMW6J',
      1 => 1439373573,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '47533708355cb19059813c2-60879113',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<p class="mitbewohner">
                            
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
    
</p>