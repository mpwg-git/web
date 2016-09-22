<?php /* Smarty version Smarty-3.0.7, created on 2016-01-13 09:36:56
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeObyaLY" */ ?>
<?php /*%%SmartyHeaderCode:163229215056960ca8ce8273-73860123%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '20210f2bd669449df65c4c6cd3107953b01df804' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeObyaLY',
      1 => 1452674216,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '163229215056960ca8ce8273-73860123',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><div class="item" data-msg-id="<?php echo $_smarty_tpl->getVariable('data')->value['chat_message_id'];?>
">
    
    <?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('data')->value['chat_img'],'w'=>70,'h'=>80,'rmode'=>"cco",'class'=>"chatimage blackandwhite"),$_smarty_tpl);?>

    <div class="text-wrapper">
        <p class="name"><?php echo $_smarty_tpl->getVariable('data')->value['chat_vorname'];?>
 <span class="timestamp"><?php echo $_smarty_tpl->getVariable('data')->value['chat_time'];?>
</span></p>
        <p class="text <?php if ($_smarty_tpl->getVariable('data')->value['chat_deleted']=='Y'){?>deleted-message<?php }?>"><?php echo $_smarty_tpl->getVariable('data')->value['chat_text'];?>
</p>
        
        <?php if ($_smarty_tpl->getVariable('data')->value['chat_deleted']=='N'){?>
        <div class="del-container">
            <span class="popover-del" data-deltype='chat' data-placement="left" data-delid="<?php echo $_smarty_tpl->getVariable('data')->value['chat_message_id'];?>
">
                <span class="icon-rel icon-minus-rel"></span>
            </span>
        </div>
        <?php }?>
        
    </div>
</div>

<?php echo smarty_function_xr_atom(array('a_id'=>681,'return'=>1),$_smarty_tpl);?>
