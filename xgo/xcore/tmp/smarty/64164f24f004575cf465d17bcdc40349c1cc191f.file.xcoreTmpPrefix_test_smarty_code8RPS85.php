<?php /* Smarty version Smarty-3.0.7, created on 2016-01-19 11:36:13
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code8RPS85" */ ?>
<?php /*%%SmartyHeaderCode:555603166569e119dd7e993-37063925%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '64164f24f004575cf465d17bcdc40349c1cc191f' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code8RPS85',
      1 => 1453199773,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '555603166569e119dd7e993-37063925',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_wz_fetch')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_wz_fetch.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
if (!is_callable('smarty_modifier_date_format')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/libs/smarty3/plugins/modifier.date_format.php';
?><?php echo smarty_function_xr_wz_fetch(array('id'=>834,'wz_online'=>'Y','r_id'=>$_REQUEST['blogId'],'var'=>'v'),$_smarty_tpl);?>


<div class="blog-page default-container-paddingtop">
    <!-- <h1>FAQ</h1> -->
    <span class="looklikeh1">
        <?php echo smarty_function_xr_translate(array('tag'=>"Blog"),$_smarty_tpl);?>

    </span>
    <br>
    <div class="blog-item" id="post-<?php echo $_smarty_tpl->getVariable('v')->value['wz_id'];?>
">  
        <div class="image-wrapper">
            <?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('v')->value['wz_BILD'],'w'=>240,'h'=>290,'rmode'=>"cco",'class'=>"image"),$_smarty_tpl);?>
 
        </div>
        <div class="content">
            <div class="header-wrapper">
                <h3 class="headline"><?php echo $_smarty_tpl->getVariable('v')->value['wz_HEADLINE'];?>
</h3>
                <div class="date"><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('v')->value['wz_DATUM'],"%d.%m.%Y");?>
</div> 
            </div>
            <div class="text"><?php echo $_smarty_tpl->getVariable('v')->value['wz_TEXT'];?>
</div>
            <div class="reporter"><?php echo $_smarty_tpl->getVariable('v')->value['wz_REPORTER'];?>
</div>
        </div>
        <div class="clearfix"></div>
    </div>    
</div>