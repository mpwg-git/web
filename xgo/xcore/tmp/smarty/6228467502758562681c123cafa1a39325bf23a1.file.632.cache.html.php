<?php /* Smarty version Smarty-3.0.7, created on 2015-03-14 01:09:41
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/632.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:51815016155037c4501cff5-96510316%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6228467502758562681c123cafa1a39325bf23a1' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/632.cache.html',
      1 => 1426264373,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '51815016155037c4501cff5-96510316',
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