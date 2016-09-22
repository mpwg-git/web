<?php /* Smarty version Smarty-3.0.7, created on 2015-10-29 09:42:46
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeermomW" */ ?>
<?php /*%%SmartyHeaderCode:6134141875631dc06715f13-33563838%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '48915662766d0ddd77eb49653fd318442f31ce44' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeermomW',
      1 => 1446108166,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6134141875631dc06715f13-33563838',
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