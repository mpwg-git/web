<?php /* Smarty version Smarty-3.0.7, created on 2015-03-13 17:31:31
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeaaLn4n" */ ?>
<?php /*%%SmartyHeaderCode:1768777015550310e3a9a927-96792824%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '356ff7de602a60ae462b088acc9795300c44e3b4' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeaaLn4n',
      1 => 1426264291,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1768777015550310e3a9a927-96792824',
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