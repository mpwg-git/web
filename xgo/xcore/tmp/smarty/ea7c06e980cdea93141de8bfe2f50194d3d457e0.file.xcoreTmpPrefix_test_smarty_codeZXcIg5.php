<?php /* Smarty version Smarty-3.0.7, created on 2015-08-09 16:34:47
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeZXcIg5" */ ?>
<?php /*%%SmartyHeaderCode:46908741255c765071a6b18-79670144%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ea7c06e980cdea93141de8bfe2f50194d3d457e0' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeZXcIg5',
      1 => 1439130887,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '46908741255c765071a6b18-79670144',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_feUser')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_feUser.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
?><?php echo smarty_function_xr_feUser(array('action'=>'finishExternalRegistration','var'=>'fer'),$_smarty_tpl);?>


<div class="register">
    <?php if ($_smarty_tpl->getVariable('fer')->value['status']=='OK'){?>
        <h2><?php echo smarty_function_xr_translate(array('tag'=>'Bestätigung erfolgreich'),$_smarty_tpl);?>
</h2>
    	<?php echo smarty_function_xr_translate(array('tag'=>'Ihre Bestätigung war erfolgreich.'),$_smarty_tpl);?>
 <?php echo smarty_function_xr_translate(array('tag'=>'Sie können sich nun mit Ihren Benutzerdaten einloggen.'),$_smarty_tpl);?>

        <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>35),$_smarty_tpl);?>
" class="backLink" target="_self" title="<?php echo smarty_function_xr_translate(array('tag'=>'zum Login'),$_smarty_tpl);?>
">&laquo; <?php echo smarty_function_xr_translate(array('tag'=>'zum Login'),$_smarty_tpl);?>
</a>
    <?php }else{ ?>
        <h2><?php echo smarty_function_xr_translate(array('tag'=>'Bestätigung fehlerhaft'),$_smarty_tpl);?>
</h2>
    	<?php echo smarty_function_xr_translate(array('tag'=>'Ihre Bestätigung war leider fehlerhaft!'),$_smarty_tpl);?>
<br />
    	<?php echo smarty_function_xr_translate(array('tag'=>'Evtl. haben Sie Ihr Konto bereits bestätigt ansonsten versuchen Sie es bitte erneut.'),$_smarty_tpl);?>

        <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>35),$_smarty_tpl);?>
" class="backLink" target="_self" title="<?php echo smarty_function_xr_translate(array('tag'=>'zum Login'),$_smarty_tpl);?>
">&laquo; <?php echo smarty_function_xr_translate(array('tag'=>'zum Login'),$_smarty_tpl);?>
</a>
    <?php }?>
</div>