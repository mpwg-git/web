<?php /* Smarty version Smarty-3.0.7, created on 2015-08-20 12:57:54
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codefgSLIY" */ ?>
<?php /*%%SmartyHeaderCode:108554323855d5b2b2120863-86139501%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c9eec3604d3cf6599a2703238f965711775bfe88' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codefgSLIY',
      1 => 1440068274,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '108554323855d5b2b2120863-86139501',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
?><div class="item">
    <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>11,'filter'=>'FAVS','m_suffix'=>"favourites"),$_smarty_tpl);?>
">
        <span class="icon-Favourite_inaktiv"></span>
        Favourites
    </a>
</div>
<div class="item">
    <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>11,'filter'=>'BLOCKED','m_suffix'=>"blocked"),$_smarty_tpl);?>
">
        <span class="icon-Blocked_inaktiv"></span>
        Blocked
    </a>
</div>