<?php /* Smarty version Smarty-3.0.7, created on 2016-08-02 12:56:58
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/745.cache-1.html" */ ?>
<?php /*%%SmartyHeaderCode:28852740257a07c7aa738c3-16752236%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd773e8f0f9bc7f6bc72d1a049cfb9af634f1816d' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/745.cache-1.html',
      1 => 1468052455,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '28852740257a07c7aa738c3-16752236',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_changeLang')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_changeLang.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
?><header class="clearfix <?php echo $_smarty_tpl->getVariable('addClass')->value;?>
">
    
    <nav class="left-row">
        <div class="main-nav">
            <span style="white-space: nowrap;">
                <a href="<?php echo smarty_function_xr_changeLang(array('lang'=>'de'),$_smarty_tpl);?>
" class="navlinks <?php if ($_smarty_tpl->getVariable('P_LANG')->value=='de'){?>active<?php }?>">DE</a>
                <span class="navlinks">|</span>
                <a href="<?php echo smarty_function_xr_changeLang(array('lang'=>'en'),$_smarty_tpl);?>
" class="navlinks <?php if ($_smarty_tpl->getVariable('P_LANG')->value=='en'){?>active<?php }?>">EN</a>
            </span>
        </div>
    </nav>
    
    <nav class="middle-row">
        <div class="right-logo">
            <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>1),$_smarty_tpl);?>
"><?php echo smarty_function_xr_imgWrapper(array('s_id'=>18446,'w'=>500),$_smarty_tpl);?>
</a>
        </div>
    </nav>
    
    <?php $_smarty_tpl->tpl_vars['showClose'] = new Smarty_variable(0, null, null);?>
    <?php if (($_smarty_tpl->getVariable('P_ID')->value==4||$_smarty_tpl->getVariable('P_ID')->value==5||$_smarty_tpl->getVariable('P_ID')->value==6)){?>
        <?php $_smarty_tpl->tpl_vars['showClose'] = new Smarty_variable(1, null, null);?>
    <?php }else{ ?>
    
    <?php echo smarty_function_xr_siteCall(array('fn'=>"fe_util::isV2",'var'=>"isV2"),$_smarty_tpl);?>


    <?php if ($_smarty_tpl->getVariable('isV2')->value==1){?>
    <nav class="right-row" style="overflow-y: hidden; margin-top: -20px;">
        <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>6),$_smarty_tpl);?>
" class="navlinks">LOGIN</a>
    </nav>
    <?php }?>
    
    <?php }?>
    
    <?php if ($_smarty_tpl->getVariable('showClose')->value==1){?>
        <nav class="right-row" style="overflow-y: hidden;">
            <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>1),$_smarty_tpl);?>
">
                <span class="icon-Close mobile-closer" ></span>    
            </a>
        </nav>
    <?php }?>
    
</header>

<div class="clearfix"></div>