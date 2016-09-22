<?php /* Smarty version Smarty-3.0.7, created on 2015-03-03 18:41:48
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code4nc2Ue" */ ?>
<?php /*%%SmartyHeaderCode:22415516154f5f25c488dd6-00676539%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c989a5a46b23d2b1c4c02606443b6870f01279e7' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code4nc2Ue',
      1 => 1425404508,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '22415516154f5f25c488dd6-00676539',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
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
">Aus dem Warenkorb entfernen <span class="glyphicon glyphicon-shopping-cart-remove"></span></a>               
			</div>
        </div>
        
    </div>

</div>


<?php }} ?>
