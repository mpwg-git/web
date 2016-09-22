<?php /* Smarty version Smarty-3.0.7, created on 2015-08-27 20:07:03
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code01BdDe" */ ?>
<?php /*%%SmartyHeaderCode:32959731655df51c745b127-99885254%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3ef5ce1005105a0f51dc2dce4d9ca1ee6e261c7a' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code01BdDe',
      1 => 1440698823,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '32959731655df51c745b127-99885254',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_print_r')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_print_r.php';
?><?php echo smarty_function_xr_print_r(array('val'=>$_smarty_tpl->getVariable('matching')->value),$_smarty_tpl);?>


<h3 class="headline">Matching Details</h3>
    <?php echo $_smarty_tpl->getVariable('matching')->value['TEXT']['KATEGORIENBLOCK'];?>

</h3>