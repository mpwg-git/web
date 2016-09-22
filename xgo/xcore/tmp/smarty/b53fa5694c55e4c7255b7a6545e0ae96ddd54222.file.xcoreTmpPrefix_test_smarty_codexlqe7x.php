<?php /* Smarty version Smarty-3.0.7, created on 2015-08-28 17:29:09
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codexlqe7x" */ ?>
<?php /*%%SmartyHeaderCode:41486521855e07e4510c782-36352386%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b53fa5694c55e4c7255b7a6545e0ae96ddd54222' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codexlqe7x',
      1 => 1440775749,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '41486521855e07e4510c782-36352386',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::sc_getLanguagesDropdown",'var'=>"langs"),$_smarty_tpl);?>




<div class="form-group">
    <label><?php echo smarty_function_xr_translate(array('tag'=>"Sprachen?"),$_smarty_tpl);?>
</label>
     <div class="v-center multiple-select-container">
        <select class="form-control multiple-select" name="SPRACHEN[]" multiple="multiple">
			
			<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('langs')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
			    <option value='<?php echo $_smarty_tpl->tpl_vars['v']->value['value'];?>
' <?php if (in_array($_smarty_tpl->tpl_vars['v']->value['value'],$_smarty_tpl->getVariable('data')->value['PROFILE']['SPRACHEN_IDS'])){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['v']->value['label'];?>
</option>
			<?php }} ?>
			
		</select>
    </div>
</div>