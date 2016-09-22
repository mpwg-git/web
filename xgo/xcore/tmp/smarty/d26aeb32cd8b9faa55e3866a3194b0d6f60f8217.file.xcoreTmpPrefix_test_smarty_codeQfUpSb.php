<?php /* Smarty version Smarty-3.0.7, created on 2015-03-13 17:22:16
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeQfUpSb" */ ?>
<?php /*%%SmartyHeaderCode:62306769555030eb8e10fe8-07552612%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd26aeb32cd8b9faa55e3866a3194b0d6f60f8217' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeQfUpSb',
      1 => 1426263736,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '62306769555030eb8e10fe8-07552612',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_cimg')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_cimg.php';
?><?php $_smarty_tpl->tpl_vars['alsopurchased'] = new Smarty_variable($_smarty_tpl->getVariable('data')->value['ALSO_PURCHASED'], null, null);?>

<?php if (!empty($_smarty_tpl->getVariable('alsopurchased',null,true,false)->value)){?>

<div class="produktdetail-alsopurchased">

    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('alsopurchased')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>

        <div class="produktdetail-bild">
             <?php echo smarty_function_xr_cimg(array('s_id'=>$_smarty_tpl->tpl_vars['v']->value['s_id'],'p_id'=>1,'w'=>700,'h'=>400),$_smarty_tpl);?>

        </div>
    
    <?php }} ?>

</div>

<?php }?>