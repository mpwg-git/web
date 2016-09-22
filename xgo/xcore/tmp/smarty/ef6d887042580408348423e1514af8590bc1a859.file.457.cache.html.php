<?php /* Smarty version Smarty-3.0.7, created on 2015-03-10 15:12:39
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/457.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:204685103754fefbd71ea3f5-14664525%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ef6d887042580408348423e1514af8590bc1a859' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/457.cache.html',
      1 => 1425996758,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '204685103754fefbd71ea3f5-14664525',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><div class="form-group <?php echo $_smarty_tpl->getVariable('class')->value;?>
">
    <label><?php echo $_smarty_tpl->getVariable('fas')->value['fas_name'];?>
<?php if ($_smarty_tpl->getVariable('fas')->value['fas_required']!='N'){?>*<?php }?></label>
    <select data-form-id='<?php echo $_smarty_tpl->getVariable('form_uid')->value;?>
' data-as-id='<?php echo $_smarty_tpl->getVariable('fas')->value['fas_as_id'];?>
' name="<?php echo $_smarty_tpl->getVariable('field_name')->value;?>
">
        <?php  $_smarty_tpl->tpl_vars['record'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('metaInfos')->value['records']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['record']->key => $_smarty_tpl->tpl_vars['record']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['record']->key;
?>
        <option value='<?php echo $_smarty_tpl->tpl_vars['record']->value['wz_id'];?>
' <?php if ($_smarty_tpl->tpl_vars['record']->value['wz_id']==$_smarty_tpl->getVariable('value')->value){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['record']->value['titleIt'];?>
</option>
        <?php }} ?>
    </select>
    <?php echo smarty_function_xr_atom(array('a_id'=>538,'return'=>1),$_smarty_tpl);?>

    <div class="clearer"></div>
</div>