<?php /* Smarty version Smarty-3.0.7, created on 2015-03-03 18:28:20
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/449.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:68525118254f5ef34bdd054-47667277%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '69fa4fa7f9cc7e976b15afea86233c5d19ad6bf8' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/449.cache.html',
      1 => 1425403698,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '68525118254f5ef34bdd054-47667277',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_print_r')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_print_r.php';
?><hr>
wz_id: <?php echo $_smarty_tpl->getVariable('wz_id')->value;?>

<?php echo smarty_function_xr_print_r(array('val'=>$_smarty_tpl->getVariable('RECORD_RAW')->value),$_smarty_tpl);?>

<hr>