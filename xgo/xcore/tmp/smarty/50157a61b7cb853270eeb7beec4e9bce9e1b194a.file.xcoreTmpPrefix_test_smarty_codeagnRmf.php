<?php /* Smarty version Smarty-3.0.7, created on 2015-10-12 23:39:48
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeagnRmf" */ ?>
<?php /*%%SmartyHeaderCode:1079719911561c28a4a58aa4-22905714%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '50157a61b7cb853270eeb7beec4e9bce9e1b194a' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeagnRmf',
      1 => 1444685988,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1079719911561c28a4a58aa4-22905714',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::checkLoggedIn",'var'=>"loggedin"),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::getInvitations",'var'=>"invitations"),$_smarty_tpl);?>



<div class="meinprofil-container meinraum-container">
    <div class="col-xs-12 default-container-paddingtop">

        <h2>Zu Raum beitreten</h2>
        
        <?php if (count($_smarty_tpl->getVariable('invitations')->value)==0){?>
            <?php echo smarty_function_xr_translate(array('tag'=>"Keine Einladungen vorhanden."),$_smarty_tpl);?>

        <?php }else{ ?>
            
            <div class="button-joinroom-container row">
                <div class="col-xs-6">
                    <button class="js-accept-join" data-room="<?php echo $_REQUEST['joinRoom'];?>
"><?php echo smarty_function_xr_translate(array('tag'=>"Beitreten"),$_smarty_tpl);?>
</button>    
                </div>
                <div class="col-xs-6">
                    <button class="js-reject-join" data-room="<?php echo $_REQUEST['joinRoom'];?>
"><?php echo smarty_function_xr_translate(array('tag'=>"Ablehnen"),$_smarty_tpl);?>
</button>    
                </div>
            </div>
        
        <?php }?>
        
    </div>
</div>