<?php /* Smarty version Smarty-3.0.7, created on 2015-08-12 14:52:56
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codefrPAWa" */ ?>
<?php /*%%SmartyHeaderCode:102434819455cb41a8ba36b1-71069643%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '048131241a2ff3d4fa28c897a137bcdaaa31a47b' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codefrPAWa',
      1 => 1439383976,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '102434819455cb41a8ba36b1-71069643',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_print_r')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_print_r.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::sc_getLanguagesDropdown",'var'=>"langs"),$_smarty_tpl);?>


<?php echo smarty_function_xr_print_r(array('val'=>$_smarty_tpl->getVariable('data')->value['PROFILE']['SPRACHEN_IDS']),$_smarty_tpl);?>


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