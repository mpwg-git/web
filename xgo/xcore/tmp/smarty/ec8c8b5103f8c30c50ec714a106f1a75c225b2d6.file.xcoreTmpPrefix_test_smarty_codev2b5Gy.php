<?php /* Smarty version Smarty-3.0.7, created on 2017-02-21 12:32:03
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codev2b5Gy" */ ?>
<?php /*%%SmartyHeaderCode:157336327958ac25339039e1-51911221%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ec8c8b5103f8c30c50ec714a106f1a75c225b2d6' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codev2b5Gy',
      1 => 1487676723,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '157336327958ac25339039e1-51911221',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_print_r')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_print_r.php';
?><input type="hidden" name="FILTER" class="js-search-filter" value="<?php echo $_REQUEST['filter'];?>
" />

<?php echo smarty_function_xr_print_r(array('val'=>$_REQUEST),$_smarty_tpl);?>

