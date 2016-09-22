<?php /* Smarty version Smarty-3.0.7, created on 2015-03-07 10:34:35
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeiUSNgE" */ ?>
<?php /*%%SmartyHeaderCode:180287610254fac62b6b6730-36722072%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7a3050d071e4a5deac89c89533ccb304544c3b9d' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeiUSNgE',
      1 => 1425720875,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '180287610254fac62b6b6730-36722072',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_print_r')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_print_r.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><?php echo smarty_function_xr_print_r(array('val'=>$_REQUEST),$_smarty_tpl);?>


<div class="form-group <?php echo $_smarty_tpl->getVariable('field')->value['class'];?>
">
    <label for=""><?php echo smarty_function_xr_translate(array('tag'=>$_smarty_tpl->getVariable('field')->value['label']),$_smarty_tpl);?>
<?php if ($_smarty_tpl->getVariable('field')->value['required']!='N'){?>*<?php }?></label>
    <input type='password' name='<?php echo $_smarty_tpl->getVariable('field')->value['name'];?>
' value='<?php echo $_smarty_tpl->getVariable('field')->value['value'];?>
' placeholder='<?php echo smarty_function_xr_translate(array('tag'=>$_smarty_tpl->getVariable('field')->value['placeholder']),$_smarty_tpl);?>
' class="form-control" data-required="<?php echo $_smarty_tpl->getVariable('field')->value['required'];?>
">
    <div class='xr_required_<?php echo $_smarty_tpl->getVariable('field')->value['name'];?>
 required_Y' style='display:none;'><?php echo smarty_function_xr_translate(array('tag'=>'Bitte füllen Sie dieses Feld aus'),$_smarty_tpl);?>
</div>
    <div class='xr_required_<?php echo $_smarty_tpl->getVariable('field')->value['name'];?>
 required_EMAIL' style='display:none;'>Bitte tragen Sie eine E-Mail Adresse ein</div>
    <div class="clearer"></div>
</div>