<?php /* Smarty version Smarty-3.0.7, created on 2016-01-07 16:22:06
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_coderbGSXK" */ ?>
<?php /*%%SmartyHeaderCode:745766786568e829e9781a2-65247260%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd1bfb713a66299adaa8703c5c31d95de58a5c56f' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_coderbGSXK',
      1 => 1452180126,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '745766786568e829e9781a2-65247260',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
if (!is_callable('smarty_function_xr_changeLang')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_changeLang.php';
?>
<header class="clearfix <?php echo $_smarty_tpl->getVariable('addClass')->value;?>
">
    <nav class="left-row">
        <div class="main-nav">
            
            <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>1),$_smarty_tpl);?>
" class="logo"><?php echo smarty_function_xr_imgWrapper(array('s_id'=>17200,'w'=>500),$_smarty_tpl);?>
</a>
        </div>
    </nav>
    
     <nav class="middle-row">
        <div class="right-logo pull-right">
             
            
            <div class="main-nav">
                <span>
                    <a href="<?php echo smarty_function_xr_changeLang(array('lang'=>'de'),$_smarty_tpl);?>
" class="navlinks<?php if ($_smarty_tpl->getVariable('P_LANG')->value=='de'){?> active<?php }?>">DE&nbsp;</a><span class="navlinks">|</span>
                    <a href="<?php echo smarty_function_xr_changeLang(array('lang'=>'en'),$_smarty_tpl);?>
" class="navlinks<?php if ($_smarty_tpl->getVariable('P_LANG')->value=='en'){?> active<?php }?>">EN</a>
                </span>
            </div>
            
        </div>
    </nav>
    
</header>