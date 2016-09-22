<?php /* Smarty version Smarty-3.0.7, created on 2015-03-13 10:58:11
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeQll4Wp" */ ?>
<?php /*%%SmartyHeaderCode:18277589715502b4b3219940-76297625%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f4320a5cc699dad5a613d322938680a9e81e25c2' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeQll4Wp',
      1 => 1426240691,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18277589715502b4b3219940-76297625',
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