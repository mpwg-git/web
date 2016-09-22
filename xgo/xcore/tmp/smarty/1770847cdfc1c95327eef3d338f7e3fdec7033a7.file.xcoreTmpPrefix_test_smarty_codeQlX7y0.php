<?php /* Smarty version Smarty-3.0.7, created on 2015-03-13 17:36:53
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeQlX7y0" */ ?>
<?php /*%%SmartyHeaderCode:82965955655031225073e26-07849201%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1770847cdfc1c95327eef3d338f7e3fdec7033a7' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeQlX7y0',
      1 => 1426264613,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '82965955655031225073e26-07849201',
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
                <button class="btn btn-primary js-add-to-cart productdetail-addtocart-button" data-pid="<?php echo $_smarty_tpl->getVariable('data')->value['wz_id'];?>
" type="submit">
                    <?php echo smarty_function_xr_translate(array('tag'=>'In den Warenkorb'),$_smarty_tpl);?>

                    <span class="glyphicon glyphicon-shopping-cart"></span>
                </button>
                <?php echo smarty_function_xr_atom(array('a_id'=>632,'return'=>1),$_smarty_tpl);?>

            </form>
    	</div>
    </div>
</div>        