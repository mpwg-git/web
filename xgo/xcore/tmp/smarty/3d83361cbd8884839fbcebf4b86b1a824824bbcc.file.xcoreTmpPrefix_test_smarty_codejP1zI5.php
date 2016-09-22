<?php /* Smarty version Smarty-3.0.7, created on 2016-01-08 14:51:45
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codejP1zI5" */ ?>
<?php /*%%SmartyHeaderCode:1863218956568fbef142f9a0-11546362%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3d83361cbd8884839fbcebf4b86b1a824824bbcc' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codejP1zI5',
      1 => 1452261105,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1863218956568fbef142f9a0-11546362',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_feUser')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_feUser.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><?php echo smarty_function_xr_feUser(array('action'=>'finishInternalRegistration','userId'=>$_smarty_tpl->getVariable('newUserRecord')->value['wz_id'],'var'=>'regState'),$_smarty_tpl);?>


<div class="register">
    
    <?php echo smarty_function_xr_atom(array('a_id'=>723,'return'=>1,'desc'=>"closer"),$_smarty_tpl);?>

    
    <?php if ($_smarty_tpl->getVariable('regState')->value['status']=='MAIL_OK'){?>
        <h2><?php echo smarty_function_xr_translate(array('tag'=>'Registrierung erfolgreich'),$_smarty_tpl);?>
</h2>
        <p class="register-finish-text">
            <?php echo smarty_function_xr_translate(array('tag'=>'Zur Bestätigung deiner Registrierung wird Dir eine E-Mail mit einem Bestätigungslink zugesendet.'),$_smarty_tpl);?>

            <b><?php echo smarty_function_xr_translate(array('tag'=>'Erst nach dieser Bestätigung kannst du dich einloggen.'),$_smarty_tpl);?>
</b>
        </p>
    
    <?php }else{ ?>
        <h2><?php echo smarty_function_xr_translate(array('tag'=>'Registrierung fehlerhaft'),$_smarty_tpl);?>
</h2>
        <p class="register-finish-text">
    	    <?php echo smarty_function_xr_translate(array('tag'=>'Ihre Registrierung war leider fehlerhaft, bitte versuchen Sie es erneut!'),$_smarty_tpl);?>

        </p>
    <?php }?>
</div>