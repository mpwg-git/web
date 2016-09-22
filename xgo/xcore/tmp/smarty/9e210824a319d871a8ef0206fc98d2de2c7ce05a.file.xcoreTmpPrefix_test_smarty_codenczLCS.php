<?php /* Smarty version Smarty-3.0.7, created on 2015-08-17 10:05:48
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codenczLCS" */ ?>
<?php /*%%SmartyHeaderCode:145799484355d195dc8b2243-53309918%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9e210824a319d871a8ef0206fc98d2de2c7ce05a' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codenczLCS',
      1 => 1439798748,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '145799484355d195dc8b2243-53309918',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="js-toggle-favourite" data-id="<?php echo $_smarty_tpl->getVariable('userId')->value;?>
">
    <span class="icon icon-Favourite_inaktiv"></span>
    
    <?php if ($_smarty_tpl->getVariable('description')->value!=''){?>
        <span class="icon-description"><?php echo $_smarty_tpl->getVariable('description')->value;?>
</span>
    <?php }?>
    
</div>