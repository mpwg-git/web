<?php /* Smarty version Smarty-3.0.7, created on 2015-03-03 18:42:37
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeoQw8QY" */ ?>
<?php /*%%SmartyHeaderCode:59977910154f5f28dd1e028-12283981%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a1cb1db080c1fe5e33c271057ddb58e0142db096' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeoQw8QY',
      1 => 1425404557,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '59977910154f5f28dd1e028-12283981',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_merkliste::getProdukte",'var'=>$_smarty_tpl->getVariable('data')->value),$_smarty_tpl);?>


<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['ITEMS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>

<div class="row">
    
    <div class="col-sm-4">
        <?php echo $_smarty_tpl->tpl_vars['v']->value['BILD'];?>

    </div>
    
    <div class="col-sm-8">
    
        <div class="row">
            <div class="col-sm-12">
                <?php echo $_smarty_tpl->tpl_vars['v']->value['DETAILS'];?>
                
            </div>
        </div>
        
        <div class="row">
			<div class="col-sm-12">
				<a class="btn btn-primary btn-rfml" href="" data-ml-id="<?php echo $_smarty_tpl->tpl_vars['v']->value['ID'];?>
">Aus der Merkliste entfernen <span class="glyphicon glyphicon-shopping-cart-remove"></span></a>               
			</div>
        </div>
        
    </div>

</div>


<?php }} ?>
