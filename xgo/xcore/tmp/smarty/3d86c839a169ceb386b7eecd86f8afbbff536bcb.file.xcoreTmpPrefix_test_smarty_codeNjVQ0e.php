<?php /* Smarty version Smarty-3.0.7, created on 2016-01-14 21:44:58
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeNjVQ0e" */ ?>
<?php /*%%SmartyHeaderCode:1447816154569808ca40b911-86986219%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3d86c839a169ceb386b7eecd86f8afbbff536bcb' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeNjVQ0e',
      1 => 1452804298,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1447816154569808ca40b911-86986219',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
?><p class="frage-header">
    <?php echo smarty_function_xr_translate(array('tag'=>"Fertig!"),$_smarty_tpl);?>

</p>

<p class="frage-frage">
    <?php echo smarty_function_xr_translate(array('tag'=>"Du hast alle Fragen beantwortet."),$_smarty_tpl);?>

</p>

<p>
    <?php echo smarty_function_xr_translate(array('tag'=>"Deine Meinung hat sich geändert?"),$_smarty_tpl);?>
 <br /><br /><a href="<?php echo smarty_function_xr_genlink(array('p_id'=>10,'m_suffix'=>'restart','restart'=>1),$_smarty_tpl);?>
"><?php echo smarty_function_xr_translate(array('tag'=>"Klicke hier um deine Antworten zu ändern."),$_smarty_tpl);?>
</a>
</p>