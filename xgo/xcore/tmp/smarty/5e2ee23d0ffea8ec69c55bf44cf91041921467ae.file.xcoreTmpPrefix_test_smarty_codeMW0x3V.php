<?php /* Smarty version Smarty-3.0.7, created on 2015-10-29 09:47:53
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeMW0x3V" */ ?>
<?php /*%%SmartyHeaderCode:19848934325631dd39967077-84739458%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5e2ee23d0ffea8ec69c55bf44cf91041921467ae' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeMW0x3V',
      1 => 1446108473,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19848934325631dd39967077-84739458',
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
    asdfasdf
    <div class="js-chatwindow chatwindow <?php echo $_smarty_tpl->getVariable('addClass')->value;?>
">
        
        
        
    </div>
    <div class="js-chattext textwindow">
        <textarea placeholder="dein text"></textarea>
    </div>
    
</div>