<?php /* Smarty version Smarty-3.0.7, created on 2016-08-02 17:11:03
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/722.cache-3.html" */ ?>
<?php /*%%SmartyHeaderCode:34708760257a0b807479001-42516032%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e5397b8fb7b7c64b2e3f804096139ddf9e5affd4' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/722.cache-3.html',
      1 => 1452266315,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '34708760257a0b807479001-42516032',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_feUser')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_feUser.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><?php echo smarty_function_xr_feUser(array('action'=>'finishInternalRegistration','userId'=>$_smarty_tpl->getVariable('newUserRecord')->value['wz_id'],'var'=>'regState'),$_smarty_tpl);?>


<div class="register">
     
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