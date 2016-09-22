<?php /* Smarty version Smarty-3.0.7, created on 2016-04-30 14:39:46
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeL9yoFu" */ ?>
<?php /*%%SmartyHeaderCode:16508022545724a79287b2c0-91167973%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c04c88a64449083f1c7c681cebea3653d8b78279' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeL9yoFu',
      1 => 1462019986,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16508022545724a79287b2c0-91167973',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_util::isV2",'var'=>"isV2"),$_smarty_tpl);?>


<div class="left-row">
    <?php echo smarty_function_xr_atom(array('a_id'=>$_smarty_tpl->getVariable('TABLET_LEFTROW')->value,'return'=>1),$_smarty_tpl);?>

    
    <!-- FOOTER ATOM -->
    <?php echo smarty_function_xr_atom(array('a_id'=>643,'return'=>1),$_smarty_tpl);?>

    
</div>
<div class="middle-row">
    
    
    <div class="scrollbarfix">
        <?php echo smarty_function_xr_atom(array('a_id'=>$_smarty_tpl->getVariable('TABLET_RIGHTROW')->value,'return'=>1),$_smarty_tpl);?>

    </div>
    
</div>