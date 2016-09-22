<?php /* Smarty version Smarty-3.0.7, created on 2016-01-19 15:54:03
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeSbBZvp" */ ?>
<?php /*%%SmartyHeaderCode:859354975569e4e0beaeeb1-99803059%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4575856f0e08d9c3ffa9bc45a5bf1fc304950089' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeSbBZvp',
      1 => 1453215243,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '859354975569e4e0beaeeb1-99803059',
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
                <?php echo $_smarty_tpl->tpl_vars['v']->value['wz_KATEGORIE'];?>

            </li>
        <?php }} ?>
    </ul>
</form>