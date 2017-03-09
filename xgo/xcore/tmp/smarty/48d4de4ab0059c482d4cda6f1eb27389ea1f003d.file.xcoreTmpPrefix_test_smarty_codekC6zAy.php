<?php /* Smarty version Smarty-3.0.7, created on 2017-02-21 12:31:09
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codekC6zAy" */ ?>
<?php /*%%SmartyHeaderCode:161523932458ac24fd47f7e8-25600040%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '48d4de4ab0059c482d4cda6f1eb27389ea1f003d' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codekC6zAy',
      1 => 1487676669,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '161523932458ac24fd47f7e8-25600040',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_print_r')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_print_r.php';
?><input type="hidden" name="FILTER" class="js-search-filter" value="<?php echo $_REQUEST['filter'];?>
" />

<?php echo smarty_function_xr_print_r(array('val'=>$_REQUEST['filter']),$_smarty_tpl);?>

