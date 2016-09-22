<?php /* Smarty version Smarty-3.0.7, created on 2015-08-17 10:02:23
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeLcEfwO" */ ?>
<?php /*%%SmartyHeaderCode:148455914155d1950fb413b0-57583470%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '146bbfcac42ac5051b08325b0db9cfcaadbe562e' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeLcEfwO',
      1 => 1439798543,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '148455914155d1950fb413b0-57583470',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="js-toggle-favourite" data-id="<?php echo $_smarty_tpl->getVariable('userid')->value;?>
">
    <span class="icon icon-Favourite_inaktiv"></span>
    
     <?php if ($_smarty_tpl->getVariable('desccription')->value!=''){?>
        <span class="icon-description"><?php echo $_smarty_tpl->getVariable('description')->value;?>
</span>
    <?php }?>
    
</div>