<?php /* Smarty version Smarty-3.0.7, created on 2016-06-16 19:55:35
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeqIcAY5" */ ?>
<?php /*%%SmartyHeaderCode:17809131475762e817256b10-37814127%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '246ea839a21e7b871779317f19ab99813ea775eb' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeqIcAY5',
      1 => 1466099735,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17809131475762e817256b10-37814127',
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

<a href="<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
" target="_blank">
<img src="<?php echo $_smarty_tpl->getVariable('img')->value['src'];?>
" style="margin: 5px;" />
</a>
<?php }} ?>