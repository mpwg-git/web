<?php /* Smarty version Smarty-3.0.7, created on 2015-10-13 01:04:38
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codewDkLDE" */ ?>
<?php /*%%SmartyHeaderCode:1288771515561c3c867f7750-27825345%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd43649bb54bb14fbaba53504b900c26785ee06b8' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codewDkLDE',
      1 => 1444691078,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1288771515561c3c867f7750-27825345',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::checkLoggedIn",'var'=>"loggedin"),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>"fe_room::sc_getMyRoomState",'var'=>"roomState"),$_smarty_tpl);?>


<div class="meinprofil-container meinraum-container">
    <div class="col-xs-12 default-container-paddingtop">

        <h2>Raum löschen</h2>
        
        <div class="button-joinroom-container row">
            
            <?php if ($_smarty_tpl->getVariable('roomState')->value==1){?>
                <?php echo smarty_function_xr_atom(array('a_id'=>826,'return'=>1),$_smarty_tpl);?>

            <?php }else{ ?>
                <?php echo smarty_function_xr_atom(array('a_id'=>827,'return'=>1),$_smarty_tpl);?>

            <?php }?>
            
            
        </div>
        
    </div>
</div>
