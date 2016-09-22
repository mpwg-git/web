<?php /* Smarty version Smarty-3.0.7, created on 2015-03-13 11:02:59
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeuT5FJD" */ ?>
<?php /*%%SmartyHeaderCode:3189559075502b5d352ab23-29508898%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6c375c674094e704f01433cb66088129c67b38f0' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeuT5FJD',
      1 => 1426240979,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3189559075502b5d352ab23-29508898',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><div class="row">
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
        