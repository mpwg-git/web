<?php /* Smarty version Smarty-3.0.7, created on 2017-03-08 10:45:28
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codemc29O6" */ ?>
<?php /*%%SmartyHeaderCode:173745893658bfd2b83ffb34-33985470%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '47f846c0d47a44631d4fea04189073deba2c6169' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codemc29O6',
      1 => 1488966328,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '173745893658bfd2b83ffb34-33985470',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_feUser')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_feUser.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><?php echo smarty_function_xr_feUser(array('action'=>'finishInternalRegistration','userId'=>$_smarty_tpl->getVariable('newUserRecord')->value['wz_id'],'var'=>'regState'),$_smarty_tpl);?>


<div class="register" style="display: none;">
     
    <?php echo smarty_function_xr_atom(array('a_id'=>723,'return'=>1,'desc'=>"closer"),$_smarty_tpl);?>

    
    <div class="clearfix"></div>
     
     <div class="register-inner">
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
</div>