<?php /* Smarty version Smarty-3.0.7, created on 2016-08-02 16:34:41
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/779.cache-3.html" */ ?>
<?php /*%%SmartyHeaderCode:116579967657a0af8128dbd9-97945540%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e62be23dabf457fc5c499d3c1da4383d759f1276' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/779.cache-3.html',
      1 => 1452804298,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '116579967657a0af8128dbd9-97945540',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
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