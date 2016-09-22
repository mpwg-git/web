<?php /* Smarty version Smarty-3.0.7, created on 2015-03-13 11:01:58
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeWftYmB" */ ?>
<?php /*%%SmartyHeaderCode:8996526005502b596c7a2a0-48321651%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4f6da75e3316ed974f21d016ac153346e9b87fe2' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeWftYmB',
      1 => 1426240918,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8996526005502b596c7a2a0-48321651',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><form>
    <input type="hidden" name="p_id" value="<?php echo $_smarty_tpl->getVariable('data')->value['wz_id'];?>
">
    <button class="btn btn-primary js-add-to-cart" data-pid="<?php echo $_smarty_tpl->getVariable('data')->value['wz_id'];?>
" type="submit">
        <?php echo smarty_function_xr_translate(array('tag'=>'In den Warenkorb'),$_smarty_tpl);?>

        <span class="glyphicon glyphicon-shopping-cart"></span>
    </button>
    <?php echo smarty_function_xr_atom(array('a_id'=>632,'return'=>1),$_smarty_tpl);?>

</form>