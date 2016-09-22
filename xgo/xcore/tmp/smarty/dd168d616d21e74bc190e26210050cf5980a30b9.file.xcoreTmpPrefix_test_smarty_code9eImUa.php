<?php /* Smarty version Smarty-3.0.7, created on 2015-03-03 17:29:10
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code9eImUa" */ ?>
<?php /*%%SmartyHeaderCode:70676510954f5e156a4c712-98988401%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dd168d616d21e74bc190e26210050cf5980a30b9' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code9eImUa',
      1 => 1425400150,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '70676510954f5e156a4c712-98988401',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_produkte::getProdukte",'var'=>$_smarty_tpl->getVariable('data')->value),$_smarty_tpl);?>


<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>

    <div class="row">
        
        <div class="col-sm-4">
            <?php echo $_smarty_tpl->getVariable('data')->value['BILD'];?>

        </div>
        
        <div class="col-sm-8">
            <?php echo $_smarty_tpl->getVariable('data')->value['DETAILS'];?>

        </div>
        
    </div>

<?php }} ?>