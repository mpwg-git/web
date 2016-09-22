<?php /* Smarty version Smarty-3.0.7, created on 2015-03-14 01:09:40
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/633.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:111637622955037c44ef3df8-61692358%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '538926b3ee8a52406fccae018a159cfab0dfc1aa' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/633.cache.html',
      1 => 1426264291,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '111637622955037c44ef3df8-61692358',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="productdetail-price-container">
    <?php if ($_smarty_tpl->getVariable('data')->value['IS_ON_SALE']){?>
        currently on sale!
        <del><?php echo $_smarty_tpl->getVariable('data')->value['wz_PRICE_REG_EUR'];?>
</del>
        <span><?php echo $_smarty_tpl->getVariable('data')->value['wz_PRICE_SALE_EUR'];?>
</span>
    <?php }else{ ?>
        <span><?php echo $_smarty_tpl->getVariable('data')->value['wz_PRICE_REG_EUR'];?>
</span>
    <?php }?>
</div>