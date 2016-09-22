<?php /* Smarty version Smarty-3.0.7, created on 2015-11-24 17:54:57
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code85zzQd" */ ?>
<?php /*%%SmartyHeaderCode:120391137256549661504408-79360542%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'df795e44f3ed6ce3afa7fd7fb49c3df841d063e0' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code85zzQd',
      1 => 1448384097,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '120391137256549661504408-79360542',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::getMyRoomData",'var'=>"data"),$_smarty_tpl);?>


aaa

<div class="profilerstellen">
   
    <?php echo smarty_function_xr_atom(array('a_id'=>783,'return'=>1,'desc'=>'oben'),$_smarty_tpl);?>

   
    <div class="mainform">
       
       <?php echo smarty_function_xr_atom(array('a_id'=>732,'user'=>$_smarty_tpl->getVariable('data')->value['USER'],'profile'=>$_smarty_tpl->getVariable('dataUser')->value['PROFILE'],'return'=>1),$_smarty_tpl);?>

       
    </div>
</div>