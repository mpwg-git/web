<?php /* Smarty version Smarty-3.0.7, created on 2015-08-26 20:23:44
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codenRMhzR" */ ?>
<?php /*%%SmartyHeaderCode:19928335955de04301013e1-54386178%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cec94adfa0a9f2e73bb5aff48a6af8cd6600e1a2' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codenRMhzR',
      1 => 1440613424,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19928335955de04301013e1-54386178',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
?><p class="frage-header">
    <?php echo smarty_function_xr_translate(array('tag'=>"Fertig!"),$_smarty_tpl);?>

</p>

<p class="frage-frage">
    <?php echo smarty_function_xr_translate(array('tag'=>"Du hast alle Fragen beantwortet."),$_smarty_tpl);?>

</p>

<p>
    Deine Meinung hat sich geändert? <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>10,'restart'=>1),$_smarty_tpl);?>
">Klicke hier um den Test neu zu starten</a>
</p>