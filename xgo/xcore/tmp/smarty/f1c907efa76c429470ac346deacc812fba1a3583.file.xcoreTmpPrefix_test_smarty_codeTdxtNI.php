<?php /* Smarty version Smarty-3.0.7, created on 2015-08-17 10:05:53
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeTdxtNI" */ ?>
<?php /*%%SmartyHeaderCode:85421000555d195e133e8d3-73445976%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f1c907efa76c429470ac346deacc812fba1a3583' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeTdxtNI',
      1 => 1439798753,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '85421000555d195e133e8d3-73445976',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="js-toggle-blocked" data-id="<?php echo $_smarty_tpl->getVariable('userId')->value;?>
">
    <span class="icon icon-Blocked_inaktiv"></span>
    
    <?php if ($_smarty_tpl->getVariable('description')->value!=''){?>
        <span class="icon-description"><?php echo $_smarty_tpl->getVariable('description')->value;?>
</span>
    <?php }?>
    
</div>