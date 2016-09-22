<?php /* Smarty version Smarty-3.0.7, created on 2015-08-09 13:38:08
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codee311HG" */ ?>
<?php /*%%SmartyHeaderCode:59229307355c73ba030f051-32621627%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '48d352796447c0f601a172918414686dc5825f6f' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codee311HG',
      1 => 1439120288,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '59229307355c73ba030f051-32621627',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_feUser')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_feUser.php';
if (!is_callable('smarty_function_xr_print_r')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_print_r.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><?php echo smarty_function_xr_feUser(array('action'=>'finishInternalRegistration','userId'=>$_smarty_tpl->getVariable('newUserRecord')->value['wz_id'],'var'=>'regState'),$_smarty_tpl);?>


<?php echo smarty_function_xr_print_r(array('val'=>$_smarty_tpl->getVariable('regState')->value),$_smarty_tpl);?>


<div class="container">
    <?php if ($_smarty_tpl->getVariable('regState')->value['status']=='MAIL_OK'){?>
        <h2><?php echo smarty_function_xr_translate(array('tag'=>'Registrierung erfolgreich'),$_smarty_tpl);?>
</h2>
        <p>
            <?php echo smarty_function_xr_translate(array('tag'=>'Zur Bestätigung Ihrer Registrierung wird Ihnen eine E-Mail mit einem Bestätigungslink zugesendet.'),$_smarty_tpl);?>

            <b><?php echo smarty_function_xr_translate(array('tag'=>'Erst nach dieser Bestätigung können Sie sich einloggen.'),$_smarty_tpl);?>
</b>
        </p>
    
    <?php }else{ ?>
        <h2><?php echo smarty_function_xr_translate(array('tag'=>'Registrierung fehlerhaft'),$_smarty_tpl);?>
</h2>
        <p>
    	    <?php echo smarty_function_xr_translate(array('tag'=>'Ihre Registrierung war leider fehlerhaft, bitte versuchen Sie es erneut!'),$_smarty_tpl);?>

        </p>
    <?php }?>
</div>