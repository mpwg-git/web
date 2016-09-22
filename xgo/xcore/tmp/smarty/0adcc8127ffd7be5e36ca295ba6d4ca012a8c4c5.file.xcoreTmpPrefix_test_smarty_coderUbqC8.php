<?php /* Smarty version Smarty-3.0.7, created on 2015-03-13 09:45:17
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_coderUbqC8" */ ?>
<?php /*%%SmartyHeaderCode:16041513165502a39dcffc19-65163545%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0adcc8127ffd7be5e36ca295ba6d4ca012a8c4c5' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_coderUbqC8',
      1 => 1426236317,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16041513165502a39dcffc19-65163545',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xs_getCart')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/../xshop/smarty/function.xs_getCart.php';
if (!is_callable('smarty_function_xr_print_r')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_print_r.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><?php echo smarty_function_xs_getCart(array('var'=>'data'),$_smarty_tpl);?>

<?php echo smarty_function_xr_print_r(array('val'=>$_smarty_tpl->getVariable('data')->value),$_smarty_tpl);?>


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
