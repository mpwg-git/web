<?php /* Smarty version Smarty-3.0.7, created on 2015-03-03 18:21:59
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codem5E6Bt" */ ?>
<?php /*%%SmartyHeaderCode:31878129754f5edb7532646-38117967%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b1f81c1c2f9648dedef65105bd8dd5de940267f2' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codem5E6Bt',
      1 => 1425403319,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '31878129754f5edb7532646-38117967',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_produkte::getProduktDetail",'var'=>$_smarty_tpl->getVariable('data')->value),$_smarty_tpl);?>


<div class="row">
    
    <div class="col-sm-4">
        <?php echo $_smarty_tpl->getVariable('data')->value['BILD'];?>

    </div>
    
    <div class="col-sm-8">
    
        <div class="row">
            <div class="col-sm-12">
                <?php echo $_smarty_tpl->getVariable('data')->value['TEXT'];?>

            </div>    
        </div>
        
        <div class="row">
			<div class="col-sm-4">
				<input value="1" data-wk-id="<?php echo $_smarty_tpl->getVariable('data')->value['ID'];?>
">
			</div>
			<div class="col-sm-8">
				<a class="btn btn-primary btn-idwk" href="" data-wk-id="<?php echo $_smarty_tpl->getVariable('data')->value['ID'];?>
">In den Warenkorb <span class="glyphicon glyphicon-shopping-cart"></span></a>
			</div>
		</div>
        
    </div>
    
    
</div>