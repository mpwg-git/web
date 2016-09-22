<?php /* Smarty version Smarty-3.0.7, created on 2016-08-10 15:14:24
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/680.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:141787022057ab28b0dca0a7-35411888%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c60eb42d2460afaac2304078c3d372d500df6bd9' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/680.cache.html',
      1 => 1452674216,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '141787022057ab28b0dca0a7-35411888',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
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
            <span class="popover-del" data-deltype='chat' data-delid="<?php echo $_smarty_tpl->getVariable('data')->value['chat_message_id'];?>
">
                <span class="icon-rel icon-minus-rel"></span>
            </span>
        </div>
        <?php }?>
        
    </div>
</div>