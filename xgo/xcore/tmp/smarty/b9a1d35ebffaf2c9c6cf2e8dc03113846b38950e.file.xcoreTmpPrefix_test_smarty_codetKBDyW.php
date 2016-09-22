<?php /* Smarty version Smarty-3.0.7, created on 2015-11-17 14:46:46
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codetKBDyW" */ ?>
<?php /*%%SmartyHeaderCode:2080230517564b2fc6889c34-78390321%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b9a1d35ebffaf2c9c6cf2e8dc03113846b38950e' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codetKBDyW',
      1 => 1447768006,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2080230517564b2fc6889c34-78390321',
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