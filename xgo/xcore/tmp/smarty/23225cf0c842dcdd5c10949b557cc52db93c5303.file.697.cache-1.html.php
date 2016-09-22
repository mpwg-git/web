<?php /* Smarty version Smarty-3.0.7, created on 2016-08-03 12:56:39
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/697.cache-1.html" */ ?>
<?php /*%%SmartyHeaderCode:49322118757a1cde790d431-22112936%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '23225cf0c842dcdd5c10949b557cc52db93c5303' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/697.cache-1.html',
      1 => 1452674194,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '49322118757a1cde790d431-22112936',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
?><div class="item chatitem-empfaenger" data-msg-id="<?php echo $_smarty_tpl->getVariable('data')->value['chat_message_id'];?>
">
    <div class="image-wrapper">
        <?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('data')->value['chat_img'],'w'=>70,'h'=>80,'rmode'=>"cco",'class'=>"chatimage-sender blackandwhite"),$_smarty_tpl);?>
    
    </div>
    <div class="text-wrapper empfaenger">
        <div class="text-container">
            <p class="text"><?php echo $_smarty_tpl->getVariable('data')->value['chat_text'];?>
</p>            
        </div>
    </div>
</div>
<div class="clearfix"></div>
