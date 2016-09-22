<?php /* Smarty version Smarty-3.0.7, created on 2015-10-13 00:40:44
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeKKpp9z" */ ?>
<?php /*%%SmartyHeaderCode:1468597054561c36ece42ee3-98375707%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7dad9a919b7d06338fd570ea2551c2ed81d9536c' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeKKpp9z',
      1 => 1444689644,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1468597054561c36ece42ee3-98375707',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_print_r')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_print_r.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::checkLoggedIn",'var'=>"loggedin"),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>"fe_room::sc_getMyRoomState",'var'=>"roomState"),$_smarty_tpl);?>


<div class="meinprofil-container meinraum-container">
    <div class="col-xs-12 default-container-paddingtop">

        <h2>Raum löschen</h2>
        
        <div class="button-joinroom-container row">
            
            <?php echo smarty_function_xr_print_r(array('val'=>$_REQUEST),$_smarty_tpl);?>

            
            
            <?php if ($_smarty_tpl->getVariable('roomState')->value==true){?>
                <?php echo smarty_function_xr_atom(array('a_id'=>826,'return'=>1,'roomId'=>$_REQUEST['joinRoom']),$_smarty_tpl);?>

            <?php }else{ ?>
                <?php echo smarty_function_xr_atom(array('a_id'=>827,'return'=>1,'roomId'=>$_REQUEST['joinRoom']),$_smarty_tpl);?>

            <?php }?>
            
            
        </div>
        
    </div>
</div>
