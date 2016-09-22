<?php /* Smarty version Smarty-3.0.7, created on 2016-08-08 12:50:43
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/795.cache-3.html" */ ?>
<?php /*%%SmartyHeaderCode:45481500757a8640301cb15-25642090%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bc6ea504c7b7390a6aafb8830ec6dbafc10cd926' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/795.cache-3.html',
      1 => 1462037371,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '45481500757a8640301cb15-25642090',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
?><?php echo smarty_function_xr_translate(array('tag'=>"Du hast noch keine Matching Fragen beantwortet. Deshalb können wir dir noch keine Ergebnisse liefern."),$_smarty_tpl);?>

<br />
<a href="<?php echo smarty_function_xr_genlink(array('p_id'=>10),$_smarty_tpl);?>
"><?php echo smarty_function_xr_translate(array('tag'=>"Klicke hier, um zum WG-Test zu kommen."),$_smarty_tpl);?>
</a>