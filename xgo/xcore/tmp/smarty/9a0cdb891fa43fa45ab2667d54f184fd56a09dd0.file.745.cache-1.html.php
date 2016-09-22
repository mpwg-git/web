<?php /* Smarty version Smarty-3.0.7, created on 2015-11-17 16:44:57
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/745.cache-1.html" */ ?>
<?php /*%%SmartyHeaderCode:1364050800564b4b792a1c66-02117139%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9a0cdb891fa43fa45ab2667d54f184fd56a09dd0' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/745.cache-1.html',
      1 => 1447775092,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1364050800564b4b792a1c66-02117139',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_changeLang')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_changeLang.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
?><header class="clearfix <?php echo $_smarty_tpl->getVariable('addClass')->value;?>
">
    
    <nav class="left-row">
        <div class="main-nav">
            <span style="white-space: nowrap;">
                <a href="<?php echo smarty_function_xr_changeLang(array('lang'=>'de'),$_smarty_tpl);?>
" class="navlinks">DE</a>
                <a href="<?php echo smarty_function_xr_changeLang(array('lang'=>'en'),$_smarty_tpl);?>
" class="navlinks">| EN</a>
            </span>
        </div>
    </nav>
    
    <nav class="middle-row">
        <div class="right-logo pull-right">
            <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>1),$_smarty_tpl);?>
"><?php echo smarty_function_xr_imgWrapper(array('s_id'=>13211,'w'=>250),$_smarty_tpl);?>
</a>
        </div>
    </nav>
    
    <?php $_smarty_tpl->tpl_vars['showClose'] = new Smarty_variable(0, null, null);?>
    <?php if (($_smarty_tpl->getVariable('P_ID')->value==4||$_smarty_tpl->getVariable('P_ID')->value==5||$_smarty_tpl->getVariable('P_ID')->value==6)){?>
        <?php $_smarty_tpl->tpl_vars['showClose'] = new Smarty_variable(1, null, null);?>
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