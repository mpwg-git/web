<?php /* Smarty version Smarty-3.0.7, created on 2015-08-17 10:03:41
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeshQThe" */ ?>
<?php /*%%SmartyHeaderCode:21213222455d1955d87c410-32755075%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '32b0a79398c327d94530e2f0a16c83eda25fcad0' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeshQThe',
      1 => 1439798621,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21213222455d1955d87c410-32755075',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="js-toggle-blocked" data-id="<?php echo $_smarty_tpl->getVariable('userid')->value;?>
">
    <span class="icon icon-Blocked_inaktiv"></span>
    
    <?php if ($_smarty_tpl->getVariable('description')->value!=''){?>
        <span class="icon-description"><?php echo $_smarty_tpl->getVariable('description')->value;?>
</span>
    <?php }?>
    
</div>