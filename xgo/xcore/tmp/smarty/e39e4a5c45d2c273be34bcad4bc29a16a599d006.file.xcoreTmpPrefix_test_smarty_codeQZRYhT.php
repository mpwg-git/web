<?php /* Smarty version Smarty-3.0.7, created on 2015-03-13 17:21:00
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeQZRYhT" */ ?>
<?php /*%%SmartyHeaderCode:173979789055030e6cead767-93579232%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e39e4a5c45d2c273be34bcad4bc29a16a599d006' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeQZRYhT',
      1 => 1426263660,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '173979789055030e6cead767-93579232',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_cimg')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_cimg.php';
?><?php $_smarty_tpl->tpl_vars['alsoviewed'] = new Smarty_variable($_smarty_tpl->getVariable('data')->value['ALSO_VIEWED'], null, null);?>

<?php if (!empty($_smarty_tpl->getVariable('alsoviewed',null,true,false)->value)){?>

<div class="produktdetail-alsoviewed">

    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('bilder')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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