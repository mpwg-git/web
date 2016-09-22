<?php /* Smarty version Smarty-3.0.7, created on 2015-08-09 16:33:36
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeUE2GqQ" */ ?>
<?php /*%%SmartyHeaderCode:141677153255c764c0daa607-76849793%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '406a49c08e0bd14925fb498718ab3cfe5a328aca' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeUE2GqQ',
      1 => 1439130816,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '141677153255c764c0daa607-76849793',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_feUser')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_feUser.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><?php echo smarty_function_xr_feUser(array('action'=>'finishInternalRegistration','userId'=>$_smarty_tpl->getVariable('newUserRecord')->value['wz_id'],'var'=>'regState'),$_smarty_tpl);?>


<div class="register">
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