<?php /* Smarty version Smarty-3.0.7, created on 2015-08-27 20:08:25
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeavKWHG" */ ?>
<?php /*%%SmartyHeaderCode:97332863955df5219711bd8-33607952%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '23ac2797fdbb3fee19d7c78bbfead30b76571425' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeavKWHG',
      1 => 1440698905,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '97332863955df5219711bd8-33607952',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_smarty_tpl->getVariable('matching')->value['TEXT']['KATEGORIENBLOCK']!=''){?>
    
    <h3 class="headline">Matching Details</h3>
        <?php echo $_smarty_tpl->getVariable('matching')->value['TEXT']['KATEGORIENBLOCK'];?>

    </h3>
<?php }?>