<?php /* Smarty version Smarty-3.0.7, created on 2015-03-13 17:32:29
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeCHnr1t" */ ?>
<?php /*%%SmartyHeaderCode:1030258745503111d318d95-03010716%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'de74530ecf50efe2b1f56f05a2429f95b49efc8c' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeCHnr1t',
      1 => 1426264349,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1030258745503111d318d95-03010716',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><div class="productdetail-addtocart-container">
    <div class="row">
    	<div class="col-sm-4">
    		<input value="1" data-wk-id="<?php echo $_smarty_tpl->getVariable('data')->value['wz_id'];?>
">
    	</div>
    	<div class="col-sm-8">
    	    <form>
                <input type="hidden" name="p_id" value="<?php echo $_smarty_tpl->getVariable('data')->value['wz_id'];?>
">
                <button class="btn btn-primary js-add-to-cart" data-pid="<?php echo $_smarty_tpl->getVariable('data')->value['wz_id'];?>
" type="submit">
                    <?php echo smarty_function_xr_translate(array('tag'=>'In den Warenkorb'),$_smarty_tpl);?>

                    <span class="glyphicon glyphicon-shopping-cart"></span>
                </button>
                <?php echo smarty_function_xr_atom(array('a_id'=>632,'return'=>1),$_smarty_tpl);?>

            </form>
    	</div>
    </div>
</div>        