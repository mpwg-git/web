<?php /* Smarty version Smarty-3.0.7, created on 2016-01-19 15:55:20
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeSIAvOe" */ ?>
<?php /*%%SmartyHeaderCode:2097610496569e4e58c9e095-42654026%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c3e596411c4dcc12e418b26525bc034dc973a8c7' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeSIAvOe',
      1 => 1453215320,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2097610496569e4e58c9e095-42654026',
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
                <input type="checkbox" name="blog-kategorie-<?php echo $_smarty_tpl->tpl_vars['v']->value['wz_id'];?>
"/>
                
                <?php echo $_smarty_tpl->tpl_vars['v']->value['wz_KATEGORIE'];?>

            </li>
        <?php }} ?>
    </ul>
</form>