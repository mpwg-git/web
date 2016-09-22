<?php /* Smarty version Smarty-3.0.7, created on 2015-03-13 16:35:15
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codey9uvks" */ ?>
<?php /*%%SmartyHeaderCode:1409108389550303b361c0e8-96144198%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5e0e367ec05f422063ca8d0420264b7620374c44' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codey9uvks',
      1 => 1426260915,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1409108389550303b361c0e8-96144198',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><?php $_smarty_tpl->tpl_vars['kategorie'] = new Smarty_variable($_smarty_tpl->getVariable('data')->value['wz_CATEGORY'], null, null);?>
<?php $_smarty_tpl->tpl_vars['kategorien'] = new Smarty_variable($_smarty_tpl->getVariable('data')->value['ALSO_LISTED_IN_CATEGORIES'], null, null);?>

<p><?php echo smarty_function_xr_translate(array('tag'=>'Kategorie'),$_smarty_tpl);?>
: <?php echo $_smarty_tpl->getVariable('kategorie')->value;?>
</p>

<?php echo smarty_function_xr_translate(array('tag'=>'Weitere Kategorien'),$_smarty_tpl);?>
: 

<ul>
<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('kategorien')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
    <li><?php echo $_smarty_tpl->tpl_vars['v']->value;?>
</li>
<?php }} ?>
</ul>

