<?php /* Smarty version Smarty-3.0.7, created on 2015-11-13 12:40:52
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codebcKc8M" */ ?>
<?php /*%%SmartyHeaderCode:7978248235645cc44d51223-52670111%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9d740ac47a5dcc326df4ec61badb480e3a7c9dd1' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codebcKc8M',
      1 => 1447414852,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7978248235645cc44d51223-52670111',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div class="item">
    <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>11,'filter'=>'FAVS','m_suffix'=>"favourites"),$_smarty_tpl);?>
">
        <span class="icon-Favourite_inaktiv"></span>
        <?php echo smarty_function_xr_translate(array('tag'=>"Favourites"),$_smarty_tpl);?>

    </a>
</div>
<div class="item">
    <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>11,'filter'=>'BLOCKED','m_suffix'=>"blocked"),$_smarty_tpl);?>
">
        <span class="icon-Blocked_inaktiv"></span>
         <?php echo smarty_function_xr_translate(array('tag'=>"Blocked"),$_smarty_tpl);?>

    </a>
</div>