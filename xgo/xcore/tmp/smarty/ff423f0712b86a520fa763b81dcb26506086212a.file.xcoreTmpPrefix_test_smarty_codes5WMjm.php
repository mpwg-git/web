<?php /* Smarty version Smarty-3.0.7, created on 2015-10-12 23:23:28
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codes5WMjm" */ ?>
<?php /*%%SmartyHeaderCode:1258763798561c24d0498487-68996792%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ff423f0712b86a520fa763b81dcb26506086212a' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codes5WMjm',
      1 => 1444685008,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1258763798561c24d0498487-68996792',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::checkLoggedIn",'var'=>"loggedin"),$_smarty_tpl);?>


<div class="meinprofil-container meinraum-container">
    <div class="col-xs-12 default-container-paddingtop">

        <h2>Zu Raum beitreten</h2>
        
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
        
    </div>
</div>