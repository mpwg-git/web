<?php /* Smarty version Smarty-3.0.7, created on 2015-11-10 17:06:45
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codePXz82t" */ ?>
<?php /*%%SmartyHeaderCode:47538417556421615d6cbd7-42234758%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '60dd6d9a57d1bbae7bbe1c2fc90e6f3343637978' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codePXz82t',
      1 => 1447171605,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '47538417556421615d6cbd7-42234758',
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
        
        <div class="pull-right" style="padding-top:20px;color:#04e0d7;">
                            <a href="javascript:history.back();">
                                <span class="icon-Close"></span>
                            </a>
        </div>

        <h2>Raum Status ändern</h2>
        
        <div class="button-joinroom-container">
            
            <?php if ($_smarty_tpl->getVariable('roomState')->value==1){?>
                <?php echo smarty_function_xr_atom(array('a_id'=>826,'return'=>1),$_smarty_tpl);?>

            <?php }else{ ?>
                <?php echo smarty_function_xr_atom(array('a_id'=>827,'return'=>1),$_smarty_tpl);?>

            <?php }?>
            
            
        </div>
        
    </div>
</div>
