<?php /* Smarty version Smarty-3.0.7, created on 2015-08-20 13:14:23
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/752.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:39454579255d5b68fc19480-19344139%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '325be01cb64cca75c94430dea561047a9ac69271' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/752.cache.html',
      1 => 1440069223,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '39454579255d5b68fc19480-19344139',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_smarty_tpl->getVariable('mitbewohner')->value['F']>0){?>
    <?php while ($_smarty_tpl->getVariable('mitbewohner')->value['F']>0){?>
        <span class="icon-frau"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></span>
        <?php if (!isset($_smarty_tpl->tpl_vars['mitbewohner']) || !is_array($_smarty_tpl->tpl_vars['mitbewohner']->value)) $_smarty_tpl->createLocalArrayVariable('mitbewohner', null, null);
$_smarty_tpl->tpl_vars['mitbewohner']->value['F'] = $_smarty_tpl->getVariable('mitbewohner')->value['F']-1;?>
    <?php }?>
<?php }?>

<?php if ($_smarty_tpl->getVariable('mitbewohner')->value['M']>0){?>
    <?php while ($_smarty_tpl->getVariable('mitbewohner')->value['M']>0){?>
        <span class="icon-mann"><span class="path1"></span><span class="path2"></span></span>
        <?php if (!isset($_smarty_tpl->tpl_vars['mitbewohner']) || !is_array($_smarty_tpl->tpl_vars['mitbewohner']->value)) $_smarty_tpl->createLocalArrayVariable('mitbewohner', null, null);
$_smarty_tpl->tpl_vars['mitbewohner']->value['M'] = $_smarty_tpl->getVariable('mitbewohner')->value['M']-1;?>
    <?php }?>
<?php }?>
