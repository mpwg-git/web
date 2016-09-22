<?php /* Smarty version Smarty-3.0.7, created on 2015-07-28 15:38:35
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codedj3cXe" */ ?>
<?php /*%%SmartyHeaderCode:24407410455b785db3bd898-50461130%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ce9f00a63b47fd9b1ee038701d03bf7ce54a8296' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codedj3cXe',
      1 => 1438090715,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '24407410455b785db3bd898-50461130',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
?><header class="clearfix">
    
    <nav class="left-row">
        <div class="main-nav">
            <span>
                <a href="#" class="navlinks">DE</a>
                <a href="#" class="navlinks">| EN</a>
            </span>
        </div>
    </nav>
    <nav class="middle-row">
        
        <div class="right-logo pull-right">
            <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>1),$_smarty_tpl);?>
"><?php echo smarty_function_xr_imgWrapper(array('s_id'=>394,'w'=>144,'h'=>22),$_smarty_tpl);?>
</a>
        </div>
        
    </nav>
    
    <?php $_smarty_tpl->tpl_vars['showClose'] = new Smarty_variable(0, null, null);?>
    <?php if (($_smarty_tpl->getVariable('P_ID')->value==4||$_smarty_tpl->getVariable('P_ID')->value==5||$_smarty_tpl->getVariable('P_ID')->value==6)){?>
        <?php $_smarty_tpl->tpl_vars['showClose'] = new Smarty_variable(1, null, null);?>
    <?php }?>
    
    <?php if ($_smarty_tpl->getVariable('showClose')->value==1){?>
        <nav class="right-row">
            <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>1),$_smarty_tpl);?>
">
                <span class="icon-Close mobile-closer"></span>    
            </a>
        </nav>
    <?php }?>
    
</header>