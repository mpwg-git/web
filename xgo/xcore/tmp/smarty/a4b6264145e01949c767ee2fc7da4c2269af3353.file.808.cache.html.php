<?php /* Smarty version Smarty-3.0.7, created on 2015-12-21 13:31:14
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/808.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:1742376515677f112121f88-66860889%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a4b6264145e01949c767ee2fc7da4c2269af3353' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/808.cache.html',
      1 => 1450701072,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1742376515677f112121f88-66860889',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_smarty_tpl->getVariable('matching')->value['TEXT']['KATEGORIENBLOCK']!=''){?>
    
    <div class="maching-infos-detail">
        <h3 class="headline">Matching Details</h3>
            <span class="whitetext">
                <?php echo $_smarty_tpl->getVariable('matching')->value['TEXT']['KATEGORIEN'][2];?>

                <?php echo $_smarty_tpl->getVariable('matching')->value['TEXT']['KATEGORIEN'][3];?>

                <?php echo $_smarty_tpl->getVariable('matching')->value['TEXT']['KATEGORIEN'][4];?>

            </span>
        </h3>    
    </div>
    
<?php }?>