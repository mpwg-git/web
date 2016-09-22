<?php /* Smarty version Smarty-3.0.7, created on 2015-03-13 11:06:58
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code8xVMVl" */ ?>
<?php /*%%SmartyHeaderCode:8612639465502b6c2e0c6b1-80640796%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b8200332f0cd2f8f885c628b427d8b6faac1ab2c' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code8xVMVl',
      1 => 1426241218,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8612639465502b6c2e0c6b1-80640796',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
?><?php $_smarty_tpl->tpl_vars['bilder'] = new Smarty_variable($_smarty_tpl->getVariable('data')->value['wz_PRODUCTIMAGES'], null, null);?>


<?php if (empty($_smarty_tpl->getVariable('bilder',null,true,false)->value)){?>

    <?php echo smarty_function_xr_imgWrapper(array('s_id'=>0,'w'=>700,'h'=>400),$_smarty_tpl);?>


<?php }else{ ?>

    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('bilder')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
    
    <?php }} ?>

<?php }?>