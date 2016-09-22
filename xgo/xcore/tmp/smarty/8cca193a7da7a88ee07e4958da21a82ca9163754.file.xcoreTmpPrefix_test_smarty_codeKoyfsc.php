<?php /* Smarty version Smarty-3.0.7, created on 2015-03-13 10:38:46
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeKoyfsc" */ ?>
<?php /*%%SmartyHeaderCode:3856639865502b0262aa312-53079305%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8cca193a7da7a88ee07e4958da21a82ca9163754' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeKoyfsc',
      1 => 1426239526,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3856639865502b0262aa312-53079305',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xs_getProductDetail')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/../xshop/smarty/function.xs_getProductDetail.php';
if (!is_callable('smarty_function_xr_print_r')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_print_r.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><?php echo smarty_function_xs_getProductDetail(array('var'=>'data','product_id'=>$_REQUEST['r_id']),$_smarty_tpl);?>


<div style="overflow-y:auto; max-height:400px">
<?php echo smarty_function_xr_print_r(array('val'=>$_smarty_tpl->getVariable('data')->value),$_smarty_tpl);?>

    
</div>

<div class="row">
    
    <div class="col-sm-4">
        <?php echo $_smarty_tpl->getVariable('data')->value['BILD'];?>

    </div>
    
    <div class="col-sm-8">
    
        <div class="row">
            <div class="col-sm-12">
                <p class="produktdetail-name"><?php echo $_smarty_tpl->getVariable('v')->value['wz_NAME'];?>
</p>
                <p class="produktdetail-desc-short"><?php echo $_smarty_tpl->getVariable('v')->value['wz_SHORT_DESC'];?>
</p>
                <p class="produktdetail-desc-long"><?php echo $_smarty_tpl->getVariable('v')->value['wz_LONG_DESC'];?>
</p>
            </div>
            <div class="col-sm-12">
                <?php if ($_smarty_tpl->getVariable('data')->value['IS_ON_SALE']){?>
                    currently on sale!
                    <del><?php echo $_smarty_tpl->getVariable('data')->value['wz_PRICE_REG_EUR'];?>
</del>
                    <span><?php echo $_smarty_tpl->getVariable('data')->value['wz_PRICE_SALE_EUR'];?>
</span>
                <?php }else{ ?>
                    <span><?php echo $_smarty_tpl->getVariable('data')->value['wz_PRICE_REG_EUR'];?>
</span>
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

