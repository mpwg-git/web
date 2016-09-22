<?php /* Smarty version Smarty-3.0.7, created on 2015-10-13 00:40:13
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeoCUNJu" */ ?>
<?php /*%%SmartyHeaderCode:436873675561c36cdb18041-38059066%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a76835a692ed26140f85d3487afa5a88957eba07' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeoCUNJu',
      1 => 1444689613,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '436873675561c36cdb18041-38059066',
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
            
            <?php if ($_smarty_tpl->getVariable('roomState')->value==true){?>
                <?php echo smarty_function_xr_atom(array('a_id'=>826,'return'=>1,'roomId'=>$_REQUEST['joinRoom']),$_smarty_tpl);?>

            <?php }else{ ?>
                <?php echo smarty_function_xr_atom(array('a_id'=>827,'return'=>1,'roomId'=>$_REQUEST['joinRoom']),$_smarty_tpl);?>

            <?php }?>
            
            
        </div>
        
    </div>
</div>
