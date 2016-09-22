<?php /* Smarty version Smarty-3.0.7, created on 2015-10-12 23:57:42
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeEzexJx" */ ?>
<?php /*%%SmartyHeaderCode:990070740561c2cd687e0a8-17817081%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ae9de8e539c67a5f9d924f0537083edfac068e10' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeEzexJx',
      1 => 1444687062,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '990070740561c2cd687e0a8-17817081',
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
            
            <button class="js-accept-join" data-room="<?php echo $_REQUEST['joinRoom'];?>
"><?php echo smarty_function_xr_translate(array('tag'=>"Beitreten"),$_smarty_tpl);?>
</button>    
        </div>
        
    </div>
</div>
