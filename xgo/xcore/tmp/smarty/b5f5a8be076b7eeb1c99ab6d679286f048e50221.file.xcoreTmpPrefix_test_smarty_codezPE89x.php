<?php /* Smarty version Smarty-3.0.7, created on 2015-03-07 11:45:17
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codezPE89x" */ ?>
<?php /*%%SmartyHeaderCode:140125048854fad6bd3f8330-26917554%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b5f5a8be076b7eeb1c99ab6d679286f048e50221' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codezPE89x',
      1 => 1425725117,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '140125048854fad6bd3f8330-26917554',
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
' class="form-control" data-required="<?php echo $_smarty_tpl->getVariable('fas')->value['fas_required'];?>
">
    <div class='xr_required_<?php echo $_smarty_tpl->getVariable('field_name')->value;?>
 required_Y' style='display:none;'><?php echo smarty_function_xr_translate(array('tag'=>'Bitte füllen Sie dieses Feld aus'),$_smarty_tpl);?>
</div>
    <div class='xr_required_<?php echo $_smarty_tpl->getVariable('field_name')->value;?>
 required_EMAIL' style='display:none;'>Bitte tragen Sie eine E-Mail Adresse ein</div>
    <div class="clearer"></div>
</div>