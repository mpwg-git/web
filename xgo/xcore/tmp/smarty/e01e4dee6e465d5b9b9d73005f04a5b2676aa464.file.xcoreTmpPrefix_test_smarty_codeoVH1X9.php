<?php /* Smarty version Smarty-3.0.7, created on 2015-03-13 11:04:38
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeoVH1X9" */ ?>
<?php /*%%SmartyHeaderCode:4378494295502b6367be782-63422895%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e01e4dee6e465d5b9b9d73005f04a5b2676aa464' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeoVH1X9',
      1 => 1426241078,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4378494295502b6367be782-63422895',
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
                <p class="produktdetail-name"><?php echo $_smarty_tpl->getVariable('data')->value['wz_NAME'];?>
</p>
                <p class="produktdetail-desc-short"><?php echo $_smarty_tpl->getVariable('data')->value['wz_SHORT_DESC'];?>
</p>
                <p class="produktdetail-desc-long"><?php echo $_smarty_tpl->getVariable('data')->value['wz_LONG_DESC'];?>
</p>
            </div>
            <div class="col-sm-12">
               <?php echo smarty_function_xr_atom(array('a_id'=>633,'return'=>1),$_smarty_tpl);?>

            </div>    
        </div>
        
        <?php echo smarty_function_xr_atom(array('a_id'=>634,'return'=>1),$_smarty_tpl);?>

    </div>
    
</div>

