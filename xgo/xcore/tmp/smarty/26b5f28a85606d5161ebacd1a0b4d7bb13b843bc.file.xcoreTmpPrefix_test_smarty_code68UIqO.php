<?php /* Smarty version Smarty-3.0.7, created on 2016-06-16 19:51:46
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code68UIqO" */ ?>
<?php /*%%SmartyHeaderCode:112199325762e7329062d7-78754830%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '26b5f28a85606d5161ebacd1a0b4d7bb13b843bc' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code68UIqO',
      1 => 1466099506,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '112199325762e7329062d7-78754830',
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

<?php  $_smarty_tpl->tpl_vars['v2'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k2'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['v']->value['BILDER']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v2']->key => $_smarty_tpl->tpl_vars['v2']->value){
 $_smarty_tpl->tpl_vars['k2']->value = $_smarty_tpl->tpl_vars['v2']->key;
?>

<?php echo smarty_function_xr_img(array('s_id'=>$_smarty_tpl->tpl_vars['v2']->value['wz_S_ID'],'w'=>200,'h'=>200,'rmode'=>'cco','var'=>'img'),$_smarty_tpl);?>


<img src="<?php echo $_smarty_tpl->getVariable('img')->value['src'];?>
" style="margin: 5px;" />

<?php }} ?>

<?php }} ?>