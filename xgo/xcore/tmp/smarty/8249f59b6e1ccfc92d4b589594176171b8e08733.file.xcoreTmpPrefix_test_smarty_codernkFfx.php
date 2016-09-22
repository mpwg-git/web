<?php /* Smarty version Smarty-3.0.7, created on 2016-01-13 09:35:57
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codernkFfx" */ ?>
<?php /*%%SmartyHeaderCode:30229487956960c6de73b03-90629981%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8249f59b6e1ccfc92d4b589594176171b8e08733' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codernkFfx',
      1 => 1452674157,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '30229487956960c6de73b03-90629981',
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
        
        
    </div>
</div>

<?php echo smarty_function_xr_atom(array('a_id'=>681,'return'=>1),$_smarty_tpl);?>
