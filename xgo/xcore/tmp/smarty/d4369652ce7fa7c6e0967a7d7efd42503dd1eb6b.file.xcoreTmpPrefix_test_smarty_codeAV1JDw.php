<?php /* Smarty version Smarty-3.0.7, created on 2016-04-30 19:29:30
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeAV1JDw" */ ?>
<?php /*%%SmartyHeaderCode:5224185875724eb7ae93ca0-72580558%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd4369652ce7fa7c6e0967a7d7efd42503dd1eb6b' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeAV1JDw',
      1 => 1462037370,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5224185875724eb7ae93ca0-72580558',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
?><?php echo smarty_function_xr_translate(array('tag'=>"Du hast noch keine Matching Fragen beantwortet. Deshalb können wir dir noch keine Ergebnisse liefern."),$_smarty_tpl);?>

<br />
<a href="<?php echo smarty_function_xr_genlink(array('p_id'=>10),$_smarty_tpl);?>
"><?php echo smarty_function_xr_translate(array('tag'=>"Klicke hier, um zum WG-Test zu kommen."),$_smarty_tpl);?>
</a>