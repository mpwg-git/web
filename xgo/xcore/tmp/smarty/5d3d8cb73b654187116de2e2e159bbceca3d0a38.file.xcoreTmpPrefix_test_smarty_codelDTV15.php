<?php /* Smarty version Smarty-3.0.7, created on 2015-08-25 02:24:58
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codelDTV15" */ ?>
<?php /*%%SmartyHeaderCode:17811338455dbb5da1799a4-34189392%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5d3d8cb73b654187116de2e2e159bbceca3d0a38' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codelDTV15',
      1 => 1440462298,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17811338455dbb5da1799a4-34189392',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
?><div class="item chatitem-empfaenger">
    <div class="image-wrapper">
        <?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('data')->value['chat_img'],'w'=>70,'h'=>80,'rmode'=>"cco",'class'=>"chatimage-sender"),$_smarty_tpl);?>
    
    </div>
    <div class="text-wrapper empfaenger">
        <div class="text-container">
            <p class="text"><?php echo $_smarty_tpl->getVariable('data')->value['chat_text'];?>
</p>            
        </div>
    </div>
</div>
<div class="clearfix"></div>
