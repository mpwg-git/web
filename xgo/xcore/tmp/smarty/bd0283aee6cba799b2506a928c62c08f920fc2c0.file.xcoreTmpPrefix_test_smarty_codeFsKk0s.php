<?php /* Smarty version Smarty-3.0.7, created on 2016-01-19 10:59:39
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeFsKk0s" */ ?>
<?php /*%%SmartyHeaderCode:718504178569e090b4d31c4-46102557%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bd0283aee6cba799b2506a928c62c08f920fc2c0' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeFsKk0s',
      1 => 1453197579,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '718504178569e090b4d31c4-46102557',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_wz_fetch')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_wz_fetch.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
if (!is_callable('smarty_modifier_date_format')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/libs/smarty3/plugins/modifier.date_format.php';
?><?php echo smarty_function_xr_wz_fetch(array('id'=>834,'wz_online'=>'Y','order'=>'wz_created DESC','var'=>'data'),$_smarty_tpl);?>


<div class="blog-page default-container-paddingtop">
    <!-- <h1>FAQ</h1> -->
    <span class="looklikeh1">
        <?php echo smarty_function_xr_translate(array('tag'=>"Blog"),$_smarty_tpl);?>

    </span>
    <br>
    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
        <div class="blog-item" id="post-<?php echo $_smarty_tpl->tpl_vars['v']->value['wz_id'];?>
">  
            <div class="image-wrapper">
                <?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->tpl_vars['v']->value['wz_BILD'],'w'=>240,'h'=>290,'rmode'=>"cco",'class'=>"image"),$_smarty_tpl);?>
 
            </div>
            <div class="content">
                <div class="header-wrapper">
                    <h3 class="headline"><?php echo $_smarty_tpl->tpl_vars['v']->value['wz_HEADLINE'];?>
</h3>
                    <div class="date"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['wz_DATUM'],"%d.%m.%Y");?>
</div> 
                </div>
                <div class="text"><?php echo $_smarty_tpl->tpl_vars['v']->value['wz_TEXT'];?>
</div>
                <div class="reporter"><?php echo $_smarty_tpl->tpl_vars['v']->value['wz_REPORTER'];?>
</div>
            </div>
            <div class="clearfix"></div>
        </div>    
    <?php }} ?>
</div>