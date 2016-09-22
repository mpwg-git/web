<?php /* Smarty version Smarty-3.0.7, created on 2015-03-03 18:28:18
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeHL1trN" */ ?>
<?php /*%%SmartyHeaderCode:106723748954f5ef3284cff4-85929616%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '39eb5faadfb5d8d70f388095aeb4188c7d8df70e' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeHL1trN',
      1 => 1425403698,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '106723748954f5ef3284cff4-85929616',
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