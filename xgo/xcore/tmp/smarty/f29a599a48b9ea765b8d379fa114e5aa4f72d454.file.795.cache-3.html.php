<?php /* Smarty version Smarty-3.0.7, created on 2016-05-01 16:21:45
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/795.cache-3.html" */ ?>
<?php /*%%SmartyHeaderCode:1512819010572610f971e5a5-73882558%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f29a599a48b9ea765b8d379fa114e5aa4f72d454' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/795.cache-3.html',
      1 => 1462037371,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1512819010572610f971e5a5-73882558',
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