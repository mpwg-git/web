<?php /* Smarty version Smarty-3.0.7, created on 2015-08-25 05:07:10
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeKHb4YL" */ ?>
<?php /*%%SmartyHeaderCode:2668112455dbdbde037249-87623650%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c54aeffe0b19548748a392e6acef1c91e5cd23fc' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeKHb4YL',
      1 => 1440472029,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2668112455dbdbde037249-87623650',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="chat js-chat-data" data-userid="<?php echo $_REQUEST['id'];?>
">
    <div class="js-chatheader header clearfix">
        
        <div class="name"><?php echo $_smarty_tpl->getVariable('data')->value['USER']['wz_VORNAME'];?>
 <br/> <?php echo $_smarty_tpl->getVariable('data')->value['USER']['wz_NACHNAME'];?>
</div>
        
        
    </div>
    <div class="js-chatwindow chatwindow">
        
        
       
        
        
    </div>
    <div class="js-chattext textwindow">
        <textarea placeholder="dein text"></textarea>
    </div>
    
</div>