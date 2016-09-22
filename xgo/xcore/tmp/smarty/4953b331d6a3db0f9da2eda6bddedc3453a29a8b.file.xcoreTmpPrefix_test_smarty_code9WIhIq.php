<?php /* Smarty version Smarty-3.0.7, created on 2016-01-07 11:28:06
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code9WIhIq" */ ?>
<?php /*%%SmartyHeaderCode:711238068568e3db674ef79-39775311%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4953b331d6a3db0f9da2eda6bddedc3453a29a8b' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code9WIhIq',
      1 => 1452162486,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '711238068568e3db674ef79-39775311',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
?><div class="image-slider">
    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('images')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
        <div class="item">
            <?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->tpl_vars['v']->value['wz_S_ID'],'w'=>415,'h'=>256,'rmode'=>"cco",'class'=>"image"),$_smarty_tpl);?>

        </div>
    <?php }} ?>
    
</div>