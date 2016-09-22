<?php /* Smarty version Smarty-3.0.7, created on 2015-08-17 10:03:18
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeF9H7pW" */ ?>
<?php /*%%SmartyHeaderCode:17152543555d19546138cc6-35971762%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bcb1f80b1d6fa3719bf4759e99aa3782733843d6' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeF9H7pW',
      1 => 1439798598,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17152543555d19546138cc6-35971762',
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