<?php /* Smarty version Smarty-3.0.7, created on 2015-11-18 15:26:28
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codejCKibJ" */ ?>
<?php /*%%SmartyHeaderCode:942370157564c8a9437bd72-06026344%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd724439c9c94ee0324141d8fd53d86a71c9d28ab' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codejCKibJ',
      1 => 1447856788,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '942370157564c8a9437bd72-06026344',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_print_r')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_print_r.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::getMyRoomData",'var'=>"data"),$_smarty_tpl);?>


<?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::getMyUserData",'var'=>"dataUser"),$_smarty_tpl);?>


<?php echo smarty_function_xr_print_r(array('val'=>'dataUser'),$_smarty_tpl);?>


<div class="profilerstellen">
   
    <?php echo smarty_function_xr_atom(array('a_id'=>783,'return'=>1,'desc'=>'oben'),$_smarty_tpl);?>

   
    <div class="mainform">
       
       <?php echo smarty_function_xr_atom(array('a_id'=>732,'user'=>$_smarty_tpl->getVariable('dataUser')->value['USER'],'profile'=>$_smarty_tpl->getVariable('dataUser')->value['PROFILE'],'return'=>1),$_smarty_tpl);?>

       
    </div>
</div>