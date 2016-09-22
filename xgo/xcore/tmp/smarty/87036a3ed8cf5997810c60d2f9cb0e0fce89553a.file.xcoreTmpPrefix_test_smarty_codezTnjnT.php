<?php /* Smarty version Smarty-3.0.7, created on 2015-11-11 11:34:51
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codezTnjnT" */ ?>
<?php /*%%SmartyHeaderCode:1935526710564319cb374ee4-98009658%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '87036a3ed8cf5997810c60d2f9cb0e0fce89553a' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codezTnjnT',
      1 => 1447238091,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1935526710564319cb374ee4-98009658',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::checkLoggedIn",'var'=>"loggedin"),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>"fe_room::sc_getMyRoomState",'var'=>"roomState"),$_smarty_tpl);?>


<div class="meinprofil-container meinraum-container">
    
    
    <div class="col-xs-12 default-container-paddingtop">
        
        <div class="pull-right" style="padding-top:20px;color:#04e0d7;">
                            <a href="/mein-profil">
                                <span class="icon-Close"></span>
                            </a>
        </div>

        <h2><?php echo smarty_function_xr_translate(array('tag'=>"Raum Status ändern"),$_smarty_tpl);?>
</h2>
        
        <div class="button-joinroom-container">
            
            <?php if ($_smarty_tpl->getVariable('roomState')->value==1){?>
                <?php echo smarty_function_xr_atom(array('a_id'=>826,'return'=>1),$_smarty_tpl);?>

            <?php }else{ ?>
                <?php echo smarty_function_xr_atom(array('a_id'=>827,'return'=>1),$_smarty_tpl);?>

            <?php }?>
            
            
        </div>
        
    </div>
</div>
