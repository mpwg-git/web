<?php /* Smarty version Smarty-3.0.7, created on 2015-11-20 13:14:09
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/680.cache-1.html" */ ?>
<?php /*%%SmartyHeaderCode:1608270477564f0e9111bee3-23094835%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7f7743089c7f470dc4a02340788803d93c7b08d3' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/680.cache-1.html',
      1 => 1446028489,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1608270477564f0e9111bee3-23094835',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
?><div class="item chatitem-sender">
    <div class="text-wrapper sender">
        <div class="text-container">
            <p class="text"><?php echo $_smarty_tpl->getVariable('data')->value['chat_text'];?>
</p>
        </div>
    </div>
     <div class="image-wrapper">
        <?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('data')->value['chat_img'],'w'=>70,'h'=>80,'rmode'=>"cco",'class'=>"chatimage-sender blackandwhite"),$_smarty_tpl);?>
    
    </div>
</div>
<div class="clearfix"></div>