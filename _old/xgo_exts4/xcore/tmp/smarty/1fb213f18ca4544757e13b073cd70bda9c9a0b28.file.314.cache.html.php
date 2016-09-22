<?php /* Smarty version Smarty-3.0.7, created on 2015-02-24 15:47:40
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/314.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:168278649954ec8f0c634653-29989778%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1fb213f18ca4544757e13b073cd70bda9c9a0b28' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/314.cache.html',
      1 => 1424789260,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '168278649954ec8f0c634653-29989778',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="container">
    <section class="leadText">
        <?php if ($_smarty_tpl->getVariable('TITLE')->value!=''){?>
            <h1>
                <?php echo $_smarty_tpl->getVariable('TITLE')->value;?>

            </h1>
        <?php }?>
        <?php if ($_smarty_tpl->getVariable('TEXT')->value!=''){?>
            <div class="paragraph">
                <?php echo $_smarty_tpl->getVariable('TEXT')->value;?>

            </div>
        <?php }?>
    </section>
</div>