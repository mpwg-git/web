<?php /* Smarty version Smarty-3.0.7, created on 2015-08-27 19:25:19
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_coderc1fos" */ ?>
<?php /*%%SmartyHeaderCode:81454701755df47ff903606-18639061%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bbf97aa569be058d7354af01331e02fd0c59a542' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_coderc1fos',
      1 => 1440696319,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '81454701755df47ff903606-18639061',
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
        <p class="text"><?php echo $_smarty_tpl->getVariable('data')->value['chat_text'];?>
</p>
        
        <?php if ($_smarty_tpl->getVariable('data')->value['chat_deleted']=='N'){?>
        <span class="popover-del" data-deltype='chat' data-delid="<?php echo $_smarty_tpl->getVariable('data')->value['chat_message_id'];?>
">
            <span class="icon-rel icon-minus-rel"></span>
        </span>
        <?php }?>
        
    </div>
</div>

<?php echo smarty_function_xr_atom(array('a_id'=>681,'return'=>1),$_smarty_tpl);?>
