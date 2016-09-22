<?php /* Smarty version Smarty-3.0.7, created on 2015-07-27 16:06:09
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeM7gviK" */ ?>
<?php /*%%SmartyHeaderCode:3934934155b63ad1f129e1-45661689%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e1d21e3846a41e26e8bbf9f7d087a502a412bd33' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeM7gviK',
      1 => 1438005969,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3934934155b63ad1f129e1-45661689',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
?>mobil header suche
<header class="clearfix black header-suche">
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
    
    <nav class="right-row">
        <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>1),$_smarty_tpl);?>
">
            <span class="icon-Close mobile-closer"></span>    
        </a>
    </nav>
    
</header>