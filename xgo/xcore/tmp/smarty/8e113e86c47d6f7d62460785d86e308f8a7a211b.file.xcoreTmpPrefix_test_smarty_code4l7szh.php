<?php /* Smarty version Smarty-3.0.7, created on 2015-11-18 15:28:00
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code4l7szh" */ ?>
<?php /*%%SmartyHeaderCode:2079952170564c8af0c14f98-44857040%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8e113e86c47d6f7d62460785d86e308f8a7a211b' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code4l7szh',
      1 => 1447856880,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2079952170564c8af0c14f98-44857040',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::getMyRoomData",'var'=>"data"),$_smarty_tpl);?>


<div class="profilerstellen">
   
    <?php echo smarty_function_xr_atom(array('a_id'=>783,'return'=>1,'desc'=>'oben'),$_smarty_tpl);?>

   
    <div class="mainform">
       
       <?php echo smarty_function_xr_atom(array('a_id'=>732,'user'=>$_smarty_tpl->getVariable('dataUser')->value['ROOM'],'profile'=>$_smarty_tpl->getVariable('dataUser')->value['PROFILE'],'return'=>1),$_smarty_tpl);?>

       
    </div>
</div>