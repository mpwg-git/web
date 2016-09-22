<?php /* Smarty version Smarty-3.0.7, created on 2015-10-13 00:35:48
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codei7CGY8" */ ?>
<?php /*%%SmartyHeaderCode:1366672030561c35c487a3c3-34096060%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '008b513716d84e3a1fbe6ef297acf8d5b858e439' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codei7CGY8',
      1 => 1444689348,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1366672030561c35c487a3c3-34096060',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::checkLoggedIn",'var'=>"loggedin"),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::getMyRoomState",'var'=>"roomState"),$_smarty_tpl);?>


<div class="meinprofil-container meinraum-container">
    <div class="col-xs-12 default-container-paddingtop">

        <h2>Raum löschen</h2>
        
        <div class="button-joinroom-container row">
            
            <?php if ($_smarty_tpl->getVariable('roomState')->value==true){?>
            
            <?php }else{ ?>
            
            <?php }?>
            
            
        </div>
        
    </div>
</div>
