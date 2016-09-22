<?php /* Smarty version Smarty-3.0.7, created on 2015-03-13 11:00:40
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code42sc6n" */ ?>
<?php /*%%SmartyHeaderCode:14263240925502b548b1e9b3-57492186%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7937a8ec98d41a1dbc6473c5a8f32559b55ec228' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code42sc6n',
      1 => 1426240840,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14263240925502b548b1e9b3-57492186',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><?php if ($_smarty_tpl->getVariable('data')->value['QUANTITY_IN_CART']>-1){?>
    <span class="produktdetail-menge-im-warenkorb">
        <?php echo smarty_function_xr_translate(array('tag'=>'Bereits im Warenkorb'),$_smarty_tpl);?>
: <?php echo $_smarty_tpl->getVariable('data')->value['QUANTITY_IN_CART'];?>
 <?php echo smarty_function_xr_translate(array('tag'=>'Stück'),$_smarty_tpl);?>

    </span>
<?php }?>