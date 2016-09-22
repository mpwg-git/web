<?php /* Smarty version Smarty-3.0.7, created on 2015-03-03 18:43:05
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeKw7hxX" */ ?>
<?php /*%%SmartyHeaderCode:7050943354f5f2a9b08ed3-09639081%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '335f049b98e2a065f8a212394b02404e0222da60' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeKw7hxX',
      1 => 1425404585,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7050943354f5f2a9b08ed3-09639081',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_warenkorb::getProdukte",'var'=>$_smarty_tpl->getVariable('data')->value),$_smarty_tpl);?>


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
            <div class="col-sm-4">
				<input value="1" data-wk-id="<?php echo $_smarty_tpl->getVariable('data')->value['ID'];?>
">
			</div>
			<div class="col-sm-8">
				<a class="btn btn-primary btn-rfwk" href="" data-wk-id="<?php echo $_smarty_tpl->tpl_vars['v']->value['ID'];?>
"><?php echo smarty_function_xr_translate(array('tag'=>'Aus dem Warenkorb entfernen'),$_smarty_tpl);?>
 <span class="glyphicon glyphicon-shopping-cart-remove"></span></a>               
			</div>
        </div>
        
    </div>

</div>


<?php }} ?>
