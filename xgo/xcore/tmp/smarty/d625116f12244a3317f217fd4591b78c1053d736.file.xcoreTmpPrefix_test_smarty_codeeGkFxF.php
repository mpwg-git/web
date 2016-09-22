<?php /* Smarty version Smarty-3.0.7, created on 2015-03-06 20:09:38
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeeGkFxF" */ ?>
<?php /*%%SmartyHeaderCode:140923955054f9fb726da645-14473440%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd625116f12244a3317f217fd4591b78c1053d736' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeeGkFxF',
      1 => 1425668978,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '140923955054f9fb726da645-14473440',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xs_getProductDetail')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/../xshop/smarty/function.xs_getProductDetail.php';
if (!is_callable('smarty_function_xr_print_r')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_print_r.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><?php echo smarty_function_xs_getProductDetail(array('var'=>'data'),$_smarty_tpl);?>

<?php echo smarty_function_xr_print_r(array('val'=>$_smarty_tpl->getVariable('data')->value),$_smarty_tpl);?>


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
                <?php if ($_smarty_tpl->getVariable('data')->value['IS_ON_SALE']){?>
                    <del>$data['wz_PRICE_REG_EUR']</del>
                    <ins>$data['wz_PRICE_SALE_EUR']</ins>
                <?php }else{ ?>
                    <span>$data['wz_PRICE_REG_EUR']</span>
                <?php }?>
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