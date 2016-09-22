<?php /* Smarty version Smarty-3.0.7, created on 2016-01-19 15:56:22
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeKeQopW" */ ?>
<?php /*%%SmartyHeaderCode:1075706940569e4e9694ec96-72189019%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cb2b6a5c49915bee5d6af630be8c0ef53ca4189a' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeKeQopW',
      1 => 1453215382,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1075706940569e4e9694ec96-72189019',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_wz_fetch')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_wz_fetch.php';
?><?php echo smarty_function_xr_wz_fetch(array('id'=>882,'var'=>'kategorien'),$_smarty_tpl);?>


<span class="looklikeh1">
    Blog
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
" type="checkbox" name="blog-kategorie"/>
                <label for="blog-kategorie-<?php echo $_smarty_tpl->tpl_vars['v']->value['wz_id'];?>
"></label>                
                <?php echo $_smarty_tpl->tpl_vars['v']->value['wz_KATEGORIE'];?>

            </li>
        <?php }} ?>
    </ul>
</form>