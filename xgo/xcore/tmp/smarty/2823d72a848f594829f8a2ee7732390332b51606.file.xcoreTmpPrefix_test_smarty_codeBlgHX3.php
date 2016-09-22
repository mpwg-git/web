<?php /* Smarty version Smarty-3.0.7, created on 2015-08-26 16:07:47
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeBlgHX3" */ ?>
<?php /*%%SmartyHeaderCode:87025161655ddc8332f9160-55950079%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2823d72a848f594829f8a2ee7732390332b51606' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeBlgHX3',
      1 => 1440598067,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '87025161655ddc8332f9160-55950079',
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
