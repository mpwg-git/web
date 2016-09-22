<?php /* Smarty version Smarty-3.0.7, created on 2015-11-23 14:48:35
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeE3oryg" */ ?>
<?php /*%%SmartyHeaderCode:104950874956531933686e86-52952768%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '026ca5fda8dd717d093d7dcfed04dd92a0bfcf25' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeE3oryg',
      1 => 1448286515,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '104950874956531933686e86-52952768',
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
        x<?php echo smarty_function_xr_translate(array('tag'=>"Favourites"),$_smarty_tpl);?>
y
    </a>
</div>
<div class="item">
    <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>11,'filter'=>'BLOCKED','m_suffix'=>"blocked"),$_smarty_tpl);?>
">
        <span class="icon-Blocked_inaktiv"></span>
         <?php echo smarty_function_xr_translate(array('tag'=>"Blocked"),$_smarty_tpl);?>

    </a>
</div>