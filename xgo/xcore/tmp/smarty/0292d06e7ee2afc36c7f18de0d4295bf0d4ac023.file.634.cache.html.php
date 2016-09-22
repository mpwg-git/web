<?php /* Smarty version Smarty-3.0.7, created on 2015-03-14 01:09:40
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/634.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:27838101155037c44f22640-77944755%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0292d06e7ee2afc36c7f18de0d4295bf0d4ac023' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/634.cache.html',
      1 => 1426264613,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '27838101155037c44f22640-77944755',
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