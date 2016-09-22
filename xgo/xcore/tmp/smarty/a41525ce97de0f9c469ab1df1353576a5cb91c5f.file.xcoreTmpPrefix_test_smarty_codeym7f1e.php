<?php /* Smarty version Smarty-3.0.7, created on 2015-08-17 10:02:09
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeym7f1e" */ ?>
<?php /*%%SmartyHeaderCode:144504922755d1950195ae07-77117029%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a41525ce97de0f9c469ab1df1353576a5cb91c5f' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeym7f1e',
      1 => 1439798529,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '144504922755d1950195ae07-77117029',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="js-toggle-blocked" data-id="<?php echo $_smarty_tpl->getVariable('userid')->value;?>
">
    <span class="icon icon-Blocked_inaktiv"></span>
    
    <?php if ($_smarty_tpl->getVariable('desccription')->value!=''){?>
        <span class="icon-description"><?php echo $_smarty_tpl->getVariable('description')->value;?>
</span>
    <?php }?>
    
</div>