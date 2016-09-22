<?php /* Smarty version Smarty-3.0.7, created on 2016-01-19 16:06:41
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeChqV7B" */ ?>
<?php /*%%SmartyHeaderCode:1866354222569e51015f9dd6-26229054%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8ab99b2f78b1086439e5303c92014c3945261975' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeChqV7B',
      1 => 1453216001,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1866354222569e51015f9dd6-26229054',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_wz_fetch')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_wz_fetch.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><?php echo smarty_function_xr_wz_fetch(array('id'=>882,'var'=>'kategorien'),$_smarty_tpl);?>


<span class="looklikeh1">
    <?php echo smarty_function_xr_translate(array('tag'=>"Blog"),$_smarty_tpl);?>

</span>
<form id="blog-kategorie">
    <ul>
        <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('kategorien')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
            <li>
                <input id="blog-kategorie-<?php echo $_smarty_tpl->tpl_vars['v']->value['wz_id'];?>
" type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['wz_id'];?>
" name="blog-kategorie-<?php echo $_smarty_tpl->tpl_vars['v']->value['wz_id'];?>
"/>
                <label for="blog-kategorie-<?php echo $_smarty_tpl->tpl_vars['v']->value['wz_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['wz_KATEGORIE'];?>
</label>                
            </li>
        <?php }} ?>
    </ul>
</form>