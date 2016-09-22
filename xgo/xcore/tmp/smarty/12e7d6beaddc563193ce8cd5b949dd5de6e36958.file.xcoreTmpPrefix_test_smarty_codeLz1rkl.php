<?php /* Smarty version Smarty-3.0.7, created on 2015-12-21 14:50:12
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeLz1rkl" */ ?>
<?php /*%%SmartyHeaderCode:15935090256780394376d91-05027204%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '12e7d6beaddc563193ce8cd5b949dd5de6e36958' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeLz1rkl',
      1 => 1450705812,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15935090256780394376d91-05027204',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_feUser')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_feUser.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
?><?php echo smarty_function_xr_feUser(array('action'=>'finishExternalRegistration','var'=>'fer'),$_smarty_tpl);?>


<div class="register">
    
    <?php echo smarty_function_xr_atom(array('a_id'=>723,'return'=>1,'desc'=>"closer"),$_smarty_tpl);?>

    
    <div class="clearfix"></div>
     
     <div class="register-inner">
    
        <?php if ($_smarty_tpl->getVariable('fer')->value['status']=='OK'){?>
            <h2><?php echo smarty_function_xr_translate(array('tag'=>'Bestätigung erfolgreich'),$_smarty_tpl);?>
</h2>
        	<?php echo smarty_function_xr_translate(array('tag'=>'Ihre Bestätigung war erfolgreich.'),$_smarty_tpl);?>
 <?php echo smarty_function_xr_translate(array('tag'=>'Sie können sich nun mit Ihren Benutzerdaten einloggen.'),$_smarty_tpl);?>

        	<br/><br/>
            <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>6),$_smarty_tpl);?>
" class="button" target="_self" title="<?php echo smarty_function_xr_translate(array('tag'=>'zum Login'),$_smarty_tpl);?>
"><?php echo smarty_function_xr_translate(array('tag'=>'zum Login'),$_smarty_tpl);?>
</a>
        <?php }else{ ?>
            <h2><?php echo smarty_function_xr_translate(array('tag'=>'Bestätigung fehlerhaft'),$_smarty_tpl);?>
</h2>
        	<?php echo smarty_function_xr_translate(array('tag'=>'Ihre Bestätigung war leider fehlerhaft!'),$_smarty_tpl);?>
<br />
        	<?php echo smarty_function_xr_translate(array('tag'=>'Evtl. haben Sie Ihr Konto bereits bestätigt ansonsten versuchen Sie es bitte erneut.'),$_smarty_tpl);?>

        	<br/><br/>
            <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>6),$_smarty_tpl);?>
" class="button" target="_self" title="<?php echo smarty_function_xr_translate(array('tag'=>'zum Login'),$_smarty_tpl);?>
"><?php echo smarty_function_xr_translate(array('tag'=>'zum Login'),$_smarty_tpl);?>
</a>
        <?php }?>
    </div>
</div>