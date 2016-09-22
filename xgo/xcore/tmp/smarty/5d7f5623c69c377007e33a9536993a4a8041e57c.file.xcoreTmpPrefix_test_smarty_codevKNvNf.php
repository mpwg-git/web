<?php /* Smarty version Smarty-3.0.7, created on 2015-08-08 13:37:37
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codevKNvNf" */ ?>
<?php /*%%SmartyHeaderCode:153016165755c5ea01b2d132-05085046%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5d7f5623c69c377007e33a9536993a4a8041e57c' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codevKNvNf',
      1 => 1439033857,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '153016165755c5ea01b2d132-05085046',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_feUser')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_feUser.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><?php echo smarty_function_xr_feUser(array('action'=>'doLogin','triggerByVar'=>'doLogin','triggerByVal'=>'1','var'=>'info'),$_smarty_tpl);?>


<div class="anmelden">
    <span class="close">
         <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>1),$_smarty_tpl);?>
">
            <span class="icon-Close"></span>
        </a>
    </span>
    <h2><?php echo smarty_function_xr_translate(array('tag'=>"Anmelden"),$_smarty_tpl);?>
<br/>Lorem Ipsum Dolor?</h2>
    
    <?php if ($_smarty_tpl->getVariable('info')->value['state']==0){?>
    <div class="errorNotification">
        <b><?php echo smarty_function_xr_translate(array('tag'=>'Der eingegebene Benutzername oder das Passwort sind falsch.'),$_smarty_tpl);?>
</b>
        <br />
        <?php echo smarty_function_xr_translate(array('tag'=>'Bitte versuchen Sie es erneut, oder klicken Sie unten auf "Login-Daten vergessen?"'),$_smarty_tpl);?>

         <br /><br />
    </div>
    <?php }?>
    
    <?php echo smarty_function_xr_atom(array('a_id'=>721,'return'=>1),$_smarty_tpl);?>

</div>