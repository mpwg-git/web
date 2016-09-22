<?php /* Smarty version Smarty-3.0.7, created on 2015-11-05 12:40:59
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codexFdIXH" */ ?>
<?php /*%%SmartyHeaderCode:1346725191563b404bef3971-98091300%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c5f98c3d850ec5837ea0307cbfefa68e3ce798d2' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codexFdIXH',
      1 => 1446723659,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1346725191563b404bef3971-98091300',
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
            <div class="pull-right" style="padding-top:20px;color:#04e0d7;">
                <a href="javascript:history.back();">
                  <span class="icon-Close"></span>
                </a>
            </div>
        
    </div>
    <div class="js-chatwindow chatwindow">
        
        
    </div>
    <div class="js-chattext textwindow">
        <textarea class="form-control"placeholder="Antworten..."></textarea>
    </div>
    
</div>