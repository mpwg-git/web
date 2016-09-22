<?php /* Smarty version Smarty-3.0.7, created on 2015-11-17 11:48:31
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codesie9P9" */ ?>
<?php /*%%SmartyHeaderCode:186077544564b05ff4b6610-75642336%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '17c7bcadd19bc65f034b6657b6bf560cbf9fc62e' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codesie9P9',
      1 => 1447757311,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '186077544564b05ff4b6610-75642336',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="chat default-container-paddingtop js-chat-data" data-userid="<?php echo $_REQUEST['id'];?>
">
    <div class="js-chatheader header clearfix">
        
        <div class="name"><?php echo $_smarty_tpl->getVariable('data')->value['USER']['wz_VORNAME'];?>
 <br/> <?php echo $_smarty_tpl->getVariable('data')->value['USER']['wz_NACHNAME'];?>
</div>
            <div class="pull-right" style="padding-top:20px;color:#04e0d7;">
                <a href="javascript:history.back();">
                  <span class="icon-Close"></span>
                </a>
            </div>
        
        
    </div>
    
    <div class="js-chatwindow chatwindow <?php echo $_smarty_tpl->getVariable('addClass')->value;?>
">
        
        
        
    </div>
    <div class="js-chattext textwindow">
        <textarea placeholder="dein text"></textarea>
    </div>
    
</div>