<?php /* Smarty version Smarty-3.0.7, created on 2015-11-05 12:34:58
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codexFJmbB" */ ?>
<?php /*%%SmartyHeaderCode:517896943563b3ee237e2a5-46249500%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f442e1f3d31446dd9b90c5bd9493687b73ad3d7e' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codexFJmbB',
      1 => 1446723298,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '517896943563b3ee237e2a5-46249500',
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