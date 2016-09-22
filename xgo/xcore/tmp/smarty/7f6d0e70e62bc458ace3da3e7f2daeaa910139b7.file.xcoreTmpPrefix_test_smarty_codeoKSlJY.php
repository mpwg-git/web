<?php /* Smarty version Smarty-3.0.7, created on 2015-03-06 19:32:59
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeoKSlJY" */ ?>
<?php /*%%SmartyHeaderCode:109173336654f9f2db6dc980-01285695%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7f6d0e70e62bc458ace3da3e7f2daeaa910139b7' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeoKSlJY',
      1 => 1425666779,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '109173336654f9f2db6dc980-01285695',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xs_getProductDetail')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/../xshop/smarty/function.xs_getProductDetail.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><?php echo smarty_function_xs_getProductDetail(array('var'=>'data'),$_smarty_tpl);?>


<div class="row">
    
    <div class="col-sm-4">
        <?php echo $_smarty_tpl->getVariable('data')->value['BILD'];?>

    </div>
    
    <div class="col-sm-8">
    
        <div class="row">
            <div class="col-sm-12">
                <?php echo $_smarty_tpl->getVariable('data')->value['wz_NAME'];?>

            </div>
            <div class="col-sm-12">
                <?php echo $_smarty_tpl->getVariable('data')->value['wz_PRICE_REG_EUR'];?>

            </div>    
        </div>
        
        <div class="row">
			<div class="col-sm-4">
				<input value="1" data-wk-id="<?php echo $_smarty_tpl->getVariable('data')->value['wz_id'];?>
">
			</div>
			<div class="col-sm-8">
			    <form>
			        <input type="hidden" name="p_id" value="<?php echo $_smarty_tpl->getVariable('data')->value['wz_id'];?>
">
			        <button class="btn btn-primary js-add-to-cart" type="submit">
			            <?php echo smarty_function_xr_translate(array('tag'=>'In den Warenkorb'),$_smarty_tpl);?>

			            <span class="glyphicon glyphicon-shopping-cart"></span>
			        </button>
			    </form>
			</div>
		</div>
        
    </div>
    
</div>