<?php /* Smarty version Smarty-3.0.7, created on 2015-08-25 17:17:26
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeH78xED" */ ?>
<?php /*%%SmartyHeaderCode:118648329155dc87062fa044-18375529%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cf7452d782ba426eae1c5fe5e60316b38371a351' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeH78xED',
      1 => 1440515846,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '118648329155dc87062fa044-18375529',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
?><header class="clearfix <?php echo $_smarty_tpl->getVariable('addClass')->value;?>
">
    
    <nav class="left-row">
        <div class="main-nav">
            <span style="white-space: nowrap;">
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

<div class="clearfix"></div>