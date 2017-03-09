<?php /* Smarty version Smarty-3.0.7, created on 2017-02-21 12:31:20
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeHuJiAD" */ ?>
<?php /*%%SmartyHeaderCode:164273056958ac25082abd02-71868445%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6d0faae15c74ec52fd8173c9975e2d09fa915b7d' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeHuJiAD',
      1 => 1487676680,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '164273056958ac25082abd02-71868445',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_print_r')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_print_r.php';
?><input type="hidden" name="FILTER" class="js-search-filter" value="<?php echo $_REQUEST['filter'];?>
" />

<?php echo smarty_function_xr_print_r(array('val'=>$_REQUEST['filter']),$_smarty_tpl);?>

