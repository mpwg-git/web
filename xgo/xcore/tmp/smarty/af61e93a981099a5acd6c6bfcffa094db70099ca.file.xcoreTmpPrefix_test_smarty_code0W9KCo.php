<?php /* Smarty version Smarty-3.0.7, created on 2015-03-13 11:00:31
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code0W9KCo" */ ?>
<?php /*%%SmartyHeaderCode:10857152845502b53f8f20c6-89839387%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'af61e93a981099a5acd6c6bfcffa094db70099ca' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code0W9KCo',
      1 => 1426240831,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10857152845502b53f8f20c6-89839387',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><?php if ($_smarty_tpl->getVariable('data')->value['QUANTITY_IN_CART']>0){?>
    <span class="produktdetail-menge-im-warenkorb">
        <?php echo smarty_function_xr_translate(array('tag'=>'Bereits im Warenkorb'),$_smarty_tpl);?>
: <?php echo $_smarty_tpl->getVariable('data')->value['QUANTITY_IN_CART'];?>
 <?php echo smarty_function_xr_translate(array('tag'=>'Stück'),$_smarty_tpl);?>

    </span>
<?php }?>