<?php /* Smarty version Smarty-3.0.7, created on 2015-08-26 20:24:13
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code7NlQaO" */ ?>
<?php /*%%SmartyHeaderCode:38000486855de044df2c3b4-99650652%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '831942fa68e76f3830aa9c5b5feb2e71cc893ba7' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code7NlQaO',
      1 => 1440613453,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '38000486855de044df2c3b4-99650652',
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
">Klicke hier um den Test neu zu starten.</a>
</p>