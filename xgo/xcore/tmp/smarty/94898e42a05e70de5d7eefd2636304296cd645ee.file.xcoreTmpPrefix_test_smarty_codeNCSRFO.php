<?php /* Smarty version Smarty-3.0.7, created on 2015-08-24 12:12:34
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeNCSRFO" */ ?>
<?php /*%%SmartyHeaderCode:89449224355daee126ba180-32876429%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '94898e42a05e70de5d7eefd2636304296cd645ee' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeNCSRFO',
      1 => 1440411154,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '89449224355daee126ba180-32876429',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
?><?php echo smarty_function_xr_translate(array('tag'=>"Du hast noch keine Matching Fragen beantwortet. Deshalb können wir dir noch keine Ergebnisse liefern."),$_smarty_tpl);?>

<a href="<?php echo smarty_function_xr_genlink(array('p_id'=>10),$_smarty_tpl);?>
">Klicke hier, um zum WG-Test zu kommen.</a>