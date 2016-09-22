<?php /* Smarty version Smarty-3.0.7, created on 2015-03-13 17:32:53
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeIoXc1x" */ ?>
<?php /*%%SmartyHeaderCode:16649740995503113591e418-00646896%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '08b80b3c9c9517c7bba14a44b37dfd2196c04656' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeIoXc1x',
      1 => 1426264373,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16649740995503113591e418-00646896',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><?php if ($_smarty_tpl->getVariable('data')->value['QUANTITY_IN_CART']>-1){?>
    <span class="productdetail-amount-in-cart">
        <?php echo smarty_function_xr_translate(array('tag'=>'Bereits im Warenkorb'),$_smarty_tpl);?>
: <?php echo $_smarty_tpl->getVariable('data')->value['QUANTITY_IN_CART'];?>
 <?php echo smarty_function_xr_translate(array('tag'=>'Stück'),$_smarty_tpl);?>

    </span>
<?php }?>