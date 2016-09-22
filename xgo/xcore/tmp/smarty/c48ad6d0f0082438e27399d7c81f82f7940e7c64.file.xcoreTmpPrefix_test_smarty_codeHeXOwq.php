<?php /* Smarty version Smarty-3.0.7, created on 2015-11-05 12:38:23
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeHeXOwq" */ ?>
<?php /*%%SmartyHeaderCode:625932195563b3faff3cea0-95322791%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c48ad6d0f0082438e27399d7c81f82f7940e7c64' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeHeXOwq',
      1 => 1446723503,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '625932195563b3faff3cea0-95322791',
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