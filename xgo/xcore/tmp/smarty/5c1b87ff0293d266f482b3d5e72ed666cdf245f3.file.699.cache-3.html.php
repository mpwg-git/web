<?php /* Smarty version Smarty-3.0.7, created on 2015-08-31 10:42:02
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/699.cache-3.html" */ ?>
<?php /*%%SmartyHeaderCode:56947526755e4135a2a2025-23574885%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5c1b87ff0293d266f482b3d5e72ed666cdf245f3' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/699.cache-3.html',
      1 => 1440775825,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '56947526755e4135a2a2025-23574885',
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