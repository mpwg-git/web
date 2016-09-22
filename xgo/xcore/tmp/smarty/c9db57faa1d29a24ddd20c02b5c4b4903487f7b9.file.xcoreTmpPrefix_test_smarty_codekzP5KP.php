<?php /* Smarty version Smarty-3.0.7, created on 2016-06-16 19:48:05
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codekzP5KP" */ ?>
<?php /*%%SmartyHeaderCode:12648927555762e65507ce21-76823213%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c9db57faa1d29a24ddd20c02b5c4b4903487f7b9' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codekzP5KP',
      1 => 1466099285,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12648927555762e65507ce21-76823213',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_img')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_img.php';
?><?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>

<?php echo smarty_function_xr_img(array('s_id'=>$_smarty_tpl->tpl_vars['v']->value['wz_PROFILBILD'],'w'=>200,'h'=>200,'rmode'=>'cco','var'=>'img'),$_smarty_tpl);?>


<img src="<?php echo $_smarty_tpl->getVariable('img')->value['src'];?>
" style="margin: 5px;" />

<?php }} ?>