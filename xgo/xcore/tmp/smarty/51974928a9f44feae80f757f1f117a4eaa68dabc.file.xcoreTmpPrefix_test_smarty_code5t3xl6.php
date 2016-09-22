<?php /* Smarty version Smarty-3.0.7, created on 2015-11-17 14:43:41
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code5t3xl6" */ ?>
<?php /*%%SmartyHeaderCode:2122093749564b2f0db84798-59078661%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '51974928a9f44feae80f757f1f117a4eaa68dabc' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code5t3xl6',
      1 => 1447767821,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2122093749564b2f0db84798-59078661',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div class="item" style="float:left;">
    <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>11,'filter'=>'FAVS','m_suffix'=>"favourites"),$_smarty_tpl);?>
">
        <span class="icon-Favourite_inaktiv"></span>
        <?php echo smarty_function_xr_translate(array('tag'=>"Favourites"),$_smarty_tpl);?>

    </a>
    <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>11,'filter'=>'BLOCKED','m_suffix'=>"blocked"),$_smarty_tpl);?>
">
        <span class="icon-Blocked_inaktiv"></span>
         <?php echo smarty_function_xr_translate(array('tag'=>"Blocked"),$_smarty_tpl);?>

    </a>
</div>
<div class="item">
    <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>11,'filter'=>'BLOCKED','m_suffix'=>"blocked"),$_smarty_tpl);?>
">
        <span class="icon-Blocked_inaktiv"></span>
         <?php echo smarty_function_xr_translate(array('tag'=>"Blocked"),$_smarty_tpl);?>

    </a>
</div>