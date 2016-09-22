<?php /* Smarty version Smarty-3.0.7, created on 2015-08-17 10:03:34
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeMMROSQ" */ ?>
<?php /*%%SmartyHeaderCode:15883567455d195562731c3-77738181%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6fb25c3e7ca72511c20bd8e66c260410ee140419' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeMMROSQ',
      1 => 1439798614,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15883567455d195562731c3-77738181',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="js-toggle-favourite" data-id="<?php echo $_smarty_tpl->getVariable('userid')->value;?>
">
    <span class="icon icon-Favourite_inaktiv"></span>
    
    <?php if ($_smarty_tpl->getVariable('description')->value!=''){?>
        <span class="icon-description"><?php echo $_smarty_tpl->getVariable('description')->value;?>
</span>
    <?php }?>
    
</div>