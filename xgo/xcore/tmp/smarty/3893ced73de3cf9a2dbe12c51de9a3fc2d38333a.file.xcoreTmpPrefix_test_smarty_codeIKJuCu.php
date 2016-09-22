<?php /* Smarty version Smarty-3.0.7, created on 2015-10-29 09:48:27
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeIKJuCu" */ ?>
<?php /*%%SmartyHeaderCode:3338640955631dd5b5b9fe3-80725599%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3893ced73de3cf9a2dbe12c51de9a3fc2d38333a' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeIKJuCu',
      1 => 1446108507,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3338640955631dd5b5b9fe3-80725599',
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