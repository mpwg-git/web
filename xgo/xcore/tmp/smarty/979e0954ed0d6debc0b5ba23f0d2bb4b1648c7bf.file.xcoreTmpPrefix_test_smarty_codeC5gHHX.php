<?php /* Smarty version Smarty-3.0.7, created on 2015-03-09 11:56:04
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeC5gHHX" */ ?>
<?php /*%%SmartyHeaderCode:36815175954fd7c44bdb173-10069995%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '979e0954ed0d6debc0b5ba23f0d2bb4b1648c7bf' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeC5gHHX',
      1 => 1425898564,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '36815175954fd7c44bdb173-10069995',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xs_getProductDetail')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/../xshop/smarty/function.xs_getProductDetail.php';
if (!is_callable('smarty_function_xr_print_r')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_print_r.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><?php echo smarty_function_xs_getProductDetail(array('var'=>'data','p_id'=>1),$_smarty_tpl);?>


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
                <?php echo $_smarty_tpl->getVariable('data')->value['wz_NAME'];?>

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

