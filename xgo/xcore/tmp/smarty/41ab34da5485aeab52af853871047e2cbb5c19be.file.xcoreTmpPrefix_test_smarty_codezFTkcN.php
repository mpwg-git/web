<?php /* Smarty version Smarty-3.0.7, created on 2015-03-07 11:43:19
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codezFTkcN" */ ?>
<?php /*%%SmartyHeaderCode:171765609054fad647c9e837-28126837%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '41ab34da5485aeab52af853871047e2cbb5c19be' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codezFTkcN',
      1 => 1425724999,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '171765609054fad647c9e837-28126837',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><?php $_smarty_tpl->tpl_vars['field_name'] = new Smarty_variable("form_".($_smarty_tpl->getVariable('fas')->value['fas_f_id'])."_".($_smarty_tpl->getVariable('fas')->value['fas_id']), null, null);?>

<div class="form-group <?php echo $_smarty_tpl->getVariable('class')->value;?>
">
    <label for=""><?php echo $_smarty_tpl->getVariable('fas')->value['fas_name'];?>
<?php if ($_smarty_tpl->getVariable('fas')->value['fas_required']!='N'){?>*<?php }?></label>
    <input type='textfield' name='<?php echo $_smarty_tpl->getVariable('field_name')->value;?>
' value='<?php echo $_smarty_tpl->getVariable('field')->value['value'];?>
' placeholder='<?php echo $_smarty_tpl->getVariable('fas')->value['fas_placeholder'];?>
' class="form-control" data-required="<?php echo $_smarty_tpl->getVariable('field')->value['required'];?>
">
    <div class='xr_required_<?php echo $_smarty_tpl->getVariable('field_name')->value;?>
 required_Y' style='display:none;'><?php echo smarty_function_xr_translate(array('tag'=>'Bitte füllen Sie dieses Feld aus'),$_smarty_tpl);?>
</div>
    <div class='xr_required_<?php echo $_smarty_tpl->getVariable('field_name')->value;?>
 required_EMAIL' style='display:none;'>Bitte tragen Sie eine E-Mail Adresse ein</div>
    <div class="clearer"></div>
</div>