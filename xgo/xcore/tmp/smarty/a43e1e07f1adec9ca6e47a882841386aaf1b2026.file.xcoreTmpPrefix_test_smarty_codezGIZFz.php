<?php /* Smarty version Smarty-3.0.7, created on 2015-12-15 16:29:59
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codezGIZFz" */ ?>
<?php /*%%SmartyHeaderCode:1603486861567031f7154875-64905707%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a43e1e07f1adec9ca6e47a882841386aaf1b2026' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codezGIZFz',
      1 => 1450193399,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1603486861567031f7154875-64905707',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::sc_getUserData",'var'=>"data"),$_smarty_tpl);?>


<div class="searchlist-chat profil">
    1
    <div class="col-xs-4 profil-links">
        <?php echo smarty_function_xr_atom(array('a_id'=>682,'data'=>$_smarty_tpl->getVariable('data')->value,'return'=>1),$_smarty_tpl);?>

    </div>
    2
    <div class="col-xs-8">
        <?php echo smarty_function_xr_atom(array('a_id'=>660,'addClass'=>"fromsearch",'data'=>$_smarty_tpl->getVariable('data')->value,'return'=>1),$_smarty_tpl);?>

    </div>

</div>