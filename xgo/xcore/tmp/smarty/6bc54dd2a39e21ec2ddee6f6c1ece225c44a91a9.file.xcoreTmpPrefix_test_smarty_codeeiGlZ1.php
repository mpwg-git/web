<?php /* Smarty version Smarty-3.0.7, created on 2015-03-13 17:29:41
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeeiGlZ1" */ ?>
<?php /*%%SmartyHeaderCode:11505252135503107529ff52-55476223%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6bc54dd2a39e21ec2ddee6f6c1ece225c44a91a9' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeeiGlZ1',
      1 => 1426264181,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11505252135503107529ff52-55476223',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xs_getProductDetail')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/../xshop/smarty/function.xs_getProductDetail.php';
if (!is_callable('smarty_function_xr_print_r')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_print_r.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><?php echo smarty_function_xs_getProductDetail(array('var'=>'data','product_id'=>$_REQUEST['r_id']),$_smarty_tpl);?>


<div style="overflow-y:auto; max-height:400px">
<?php echo smarty_function_xr_print_r(array('val'=>$_smarty_tpl->getVariable('data')->value),$_smarty_tpl);?>

    
</div>

<div class="row">
    
    <div class="col-sm-4">
       <?php echo smarty_function_xr_atom(array('a_id'=>629,'return'=>1),$_smarty_tpl);?>

    </div>
    
    <div class="col-sm-8">
    
        <div class="row">
            <div class="col-sm-12">
                <p class="productdetail-name"><?php echo $_smarty_tpl->getVariable('data')->value['wz_NAME'];?>
</p>
                <p class="productdetail-desc-short"><?php echo $_smarty_tpl->getVariable('data')->value['wz_SHORT_DESC'];?>
</p>
                <p class="productdetail-desc-long"><?php echo $_smarty_tpl->getVariable('data')->value['wz_LONG_DESC'];?>
</p>
                <p class="productdetail-categories"><?php echo smarty_function_xr_atom(array('a_id'=>627,'return'=>1),$_smarty_tpl);?>
</p>
                
            </div>
            <div class="col-sm-12">
               <?php echo smarty_function_xr_atom(array('a_id'=>633,'return'=>1),$_smarty_tpl);?>

            </div>    
        </div>
        
        <?php echo smarty_function_xr_atom(array('a_id'=>634,'return'=>1),$_smarty_tpl);?>

    </div>
    
</div>

