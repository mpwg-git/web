<?php /* Smarty version Smarty-3.0.7, created on 2016-01-13 17:53:23
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeTDiG2r" */ ?>
<?php /*%%SmartyHeaderCode:31785031556968103227870-70972561%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c10cac06c1e2cc62a0158da1be9e6ed25a23490f' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeTDiG2r',
      1 => 1452704003,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '31785031556968103227870-70972561',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_wz_fetch')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_wz_fetch.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
?><?php echo smarty_function_xr_wz_fetch(array('id'=>834,'wz_online'=>'Y','var'=>'data'),$_smarty_tpl);?>


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
        <div class="blog-item">  
            <div style="image-wrapper">
                <?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->tpl_vars['v']->value['wz_BILD'],'w'=>240,'h'=>320,'rmode'=>"cco",'class'=>"image"),$_smarty_tpl);?>
 
            </div>
            <div class="content">
                <div class="header-wrapper">
                    <h3 class="headline"><?php echo $_smarty_tpl->tpl_vars['v']->value['wz_HEADLINE'];?>
</h3>
                    <div class="date"><?php echo $_smarty_tpl->tpl_vars['v']->value['wz_DATUM'];?>
</div> 
                </div>
                <div class="text"><?php echo $_smarty_tpl->tpl_vars['v']->value['wz_TEXT'];?>
</div>
                <div class="reporter"><?php echo $_smarty_tpl->tpl_vars['v']->value['wz_REPORTER'];?>
</div>
            </div>
        </div>    
    <?php }} ?>
</div>