<?php /* Smarty version Smarty-3.0.7, created on 2015-03-07 11:37:45
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeX7JCOo" */ ?>
<?php /*%%SmartyHeaderCode:197832155454fad4f9968613-50379159%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ab093b907999d995196dcb6f47456360aedfb4cf' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeX7JCOo',
      1 => 1425724665,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '197832155454fad4f9968613-50379159',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_print_r')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_print_r.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><?php echo smarty_function_xr_print_r(array('val'=>$_smarty_tpl->getVariable('fas')->value),$_smarty_tpl);?>

<?php $_smarty_tpl->tpl_vars['field_name'] = new Smarty_variable("form_".($_smarty_tpl->getVariable('fas')->value['fas_f_id'])."_".($_smarty_tpl->getVariable('fas')->value['fas_id']), null, null);?>


<div class="form-group <?php echo $_smarty_tpl->getVariable('field')->value['class'];?>
">
    <label for=""><?php echo $_smarty_tpl->getVariable('fas')->value['fas_name'];?>
<?php if ($_smarty_tpl->getVariable('fas')->value['fas_required']!='N'){?>*<?php }?></label>
    <input type='textfield' name='<?php echo $_smarty_tpl->getVariable('field_name')->value;?>
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