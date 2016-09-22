<?php /* Smarty version Smarty-3.0.7, created on 2015-10-13 00:30:38
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_coderyXhIF" */ ?>
<?php /*%%SmartyHeaderCode:261797412561c348e121c60-40229818%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '67136febe5380db8d4e2eeb71aa7aae137bfba24' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_coderyXhIF',
      1 => 1444689038,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '261797412561c348e121c60-40229818',
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

        <h2>Raum löschen</h2>
        
        <div class="button-joinroom-container row">
            
            <p class="meinraum-text">
                <?php echo smarty_function_xr_translate(array('tag'=>"Möchtest du deinen Raum wirklich deaktivieren? Er wird dann für andere Benutzer nicht mehr in der Suche aufscheinen!"),$_smarty_tpl);?>

            </p>
            
            <button class="js-deactivate-room" data-room="<?php echo $_REQUEST['joinRoom'];?>
"><?php echo smarty_function_xr_translate(array('tag'=>"Deaktivieren"),$_smarty_tpl);?>
</button>    
        </div>
        
    </div>
</div>
