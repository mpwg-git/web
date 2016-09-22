<?php /* Smarty version Smarty-3.0.7, created on 2015-08-12 11:57:52
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codesM8LPK" */ ?>
<?php /*%%SmartyHeaderCode:136309165155cb18a074f615-17135614%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aeef91684b77956b65d3694d15e99426679263b7' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codesM8LPK',
      1 => 1439373472,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '136309165155cb18a074f615-17135614',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<p class="mitbewohner">
                            
    <?php if ($_smarty_tpl->getVariable('data')->value['MITBEWOHNER']['F']>0){?>
        <?php while ($_smarty_tpl->getVariable('data')->value['MITBEWOHNER']['F']>0){?>
            <span class="icon-frau_black"></span>
            <?php if (!isset($_smarty_tpl->tpl_vars['data']) || !is_array($_smarty_tpl->tpl_vars['data']->value)) $_smarty_tpl->createLocalArrayVariable('data', null, null);
$_smarty_tpl->tpl_vars['data']->value['MITBEWOHNER']['F'] = $_smarty_tpl->getVariable('data')->value['MITBEWOHNER']['F']-1;?>
        <?php }?>
    <?php }?>
    
    <?php if ($_smarty_tpl->getVariable('data')->value['MITBEWOHNER']['M']>0){?>
        <?php while ($_smarty_tpl->getVariable('data')->value['MITBEWOHNER']['M']>0){?>
            <span class="icon-mann_black"></span>
            <?php if (!isset($_smarty_tpl->tpl_vars['data']) || !is_array($_smarty_tpl->tpl_vars['data']->value)) $_smarty_tpl->createLocalArrayVariable('data', null, null);
$_smarty_tpl->tpl_vars['data']->value['MITBEWOHNER']['M'] = $_smarty_tpl->getVariable('data')->value['MITBEWOHNER']['M']-1;?>
        <?php }?>
    <?php }?>
    
</p>