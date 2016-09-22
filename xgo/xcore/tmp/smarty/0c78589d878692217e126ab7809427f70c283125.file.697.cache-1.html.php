<?php /* Smarty version Smarty-3.0.7, created on 2015-11-23 15:19:36
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/697.cache-1.html" */ ?>
<?php /*%%SmartyHeaderCode:774112061565320789d1cb6-19475895%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0c78589d878692217e126ab7809427f70c283125' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/697.cache-1.html',
      1 => 1446028406,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '774112061565320789d1cb6-19475895',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
?><div class="item chatitem-empfaenger">
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
