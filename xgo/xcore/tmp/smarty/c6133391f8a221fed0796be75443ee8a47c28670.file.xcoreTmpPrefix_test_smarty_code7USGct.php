<?php /* Smarty version Smarty-3.0.7, created on 2015-08-25 02:25:06
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code7USGct" */ ?>
<?php /*%%SmartyHeaderCode:140480045155dbb5e28e0648-17392063%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c6133391f8a221fed0796be75443ee8a47c28670' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code7USGct',
      1 => 1440462306,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '140480045155dbb5e28e0648-17392063',
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
        <?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('data')->value['chat_img'],'w'=>70,'h'=>80,'rmode'=>"cco",'class'=>"chatimage-sender"),$_smarty_tpl);?>
    
    </div>
</div>
 <div class="clearfix"></div>