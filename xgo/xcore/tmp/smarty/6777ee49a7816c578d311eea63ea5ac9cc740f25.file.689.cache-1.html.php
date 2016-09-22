<?php /* Smarty version Smarty-3.0.7, created on 2016-07-31 19:56:46
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/689.cache-1.html" */ ?>
<?php /*%%SmartyHeaderCode:1912618907579e3bdeeddc89-44016218%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6777ee49a7816c578d311eea63ea5ac9cc740f25' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/689.cache-1.html',
      1 => 1469517746,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1912618907579e3bdeeddc89-44016218',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><?php if ($_REQUEST['comingFromRedirect']){?>
    <?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::getMyRoomData",'roomId'=>$_REQUEST['roomId'],'var'=>"data"),$_smarty_tpl);?>

<?php }else{ ?>
    <?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::getMyRoomData",'roomId'=>$_REQUEST['roomId'],'var'=>"data",'redirect'=>true),$_smarty_tpl);?>

<?php }?>

<div class="profilerstellen">
   
    <?php echo smarty_function_xr_atom(array('a_id'=>783,'return'=>1,'desc'=>'oben','theType'=>'room'),$_smarty_tpl);?>

   
    <div class="mainform">
       
       <?php echo smarty_function_xr_atom(array('a_id'=>732,'user'=>$_smarty_tpl->getVariable('data')->value['USER'],'profile'=>$_smarty_tpl->getVariable('data')->value['ROOM'],'return'=>1),$_smarty_tpl);?>

       
    </div>
</div>