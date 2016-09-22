<?php /* Smarty version Smarty-3.0.7, created on 2015-03-13 10:58:16
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeAVeIYT" */ ?>
<?php /*%%SmartyHeaderCode:4887960395502b4b81b8a32-62599007%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0d35f6066acfe8a53ef696fffc863a43098405e7' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeAVeIYT',
      1 => 1426240696,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4887960395502b4b81b8a32-62599007',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
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