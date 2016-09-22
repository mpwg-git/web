<?php /* Smarty version Smarty-3.0.7, created on 2015-08-26 20:24:05
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeEqlu31" */ ?>
<?php /*%%SmartyHeaderCode:16171309555de0445074b85-81144171%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eb282a8ab35e335a7b38943d5b0a1b4e597de4e3' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeEqlu31',
      1 => 1440613445,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16171309555de0445074b85-81144171',
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
    Deine Meinung hat sich geändert? <br /><br /><a href="<?php echo smarty_function_xr_genlink(array('p_id'=>10,'restart'=>1),$_smarty_tpl);?>
">Klicke hier um den Test neu zu starten</a>
</p>