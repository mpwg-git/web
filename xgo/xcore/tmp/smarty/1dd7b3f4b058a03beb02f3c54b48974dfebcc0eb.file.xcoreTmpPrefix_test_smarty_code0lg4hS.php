<?php /* Smarty version Smarty-3.0.7, created on 2015-08-27 23:49:33
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code0lg4hS" */ ?>
<?php /*%%SmartyHeaderCode:100737858855df85ed598fe4-10527132%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1dd7b3f4b058a03beb02f3c54b48974dfebcc0eb' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code0lg4hS',
      1 => 1440712173,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '100737858855df85ed598fe4-10527132',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><div class="item">
    
    <?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('data')->value['chat_img'],'w'=>70,'h'=>80,'rmode'=>"cco",'class'=>"chatimage blackandwhite"),$_smarty_tpl);?>

    <div class="text-wrapper">
        <p class="name"><?php echo $_smarty_tpl->getVariable('data')->value['chat_vorname'];?>
 <span class="timestamp"><?php echo $_smarty_tpl->getVariable('data')->value['chat_time'];?>
</span></p>
        <p class="text <?php if ($_smarty_tpl->getVariable('data')->value['chat_deleted']=='Y'){?>deleted-message<?php }?>"><?php echo $_smarty_tpl->getVariable('data')->value['chat_text'];?>
</p>
        
        <?php if ($_smarty_tpl->getVariable('data')->value['chat_deleted']=='N'){?>
        <div class="del-container">
            <span class="popover-del" data-deltype='chat' data-delid="<?php echo $_smarty_tpl->getVariable('data')->value['chat_message_id'];?>
">
                <span class="icon-rel icon-minus-rel"></span>
            </span>
        </div>
        <?php }?>
        
    </div>
</div>

<?php echo smarty_function_xr_atom(array('a_id'=>681,'return'=>1),$_smarty_tpl);?>
