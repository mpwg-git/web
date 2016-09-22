<?php /* Smarty version Smarty-3.0.7, created on 2015-08-25 05:06:15
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeoBMr0z" */ ?>
<?php /*%%SmartyHeaderCode:11267235155dbdba7e49454-01000967%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '827c5327325337167fad3c259ebf67b4d294e5d3' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeoBMr0z',
      1 => 1440471975,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11267235155dbdba7e49454-01000967',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="chat" data-userid="<?php echo $_REQUEST['id'];?>
">
    <div class="js-chatheader header clearfix">
        
        <div class="name"><?php echo $_smarty_tpl->getVariable('data')->value['USER']['wz_VORNAME'];?>
 <br/> <?php echo $_smarty_tpl->getVariable('data')->value['USER']['wz_NACHNAME'];?>
</div>
        
        
    </div>
    <div class="js-chatwindow chatwindow">
        
        
    </div>
    <div class="js-chattext textwindow">
        <textarea class="form-control"placeholder="Antworten..."></textarea>
    </div>
    
</div>