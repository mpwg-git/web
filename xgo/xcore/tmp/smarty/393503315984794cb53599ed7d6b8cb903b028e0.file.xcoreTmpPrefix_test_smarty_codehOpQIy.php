<?php /* Smarty version Smarty-3.0.7, created on 2015-03-07 11:34:15
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codehOpQIy" */ ?>
<?php /*%%SmartyHeaderCode:193423993654fad427559df2-54843073%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '393503315984794cb53599ed7d6b8cb903b028e0' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codehOpQIy',
      1 => 1425724455,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '193423993654fad427559df2-54843073',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_print_r')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_print_r.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><?php echo smarty_function_xr_print_r(array('val'=>$_smarty_tpl->getVariable('fas')->value),$_smarty_tpl);?>


<div class="form-group <?php echo $_smarty_tpl->getVariable('field')->value['class'];?>
">
    <label for=""><?php echo smarty_function_xr_translate(array('tag'=>$_smarty_tpl->getVariable('fas')->value['name']),$_smarty_tpl);?>
<?php if ($_smarty_tpl->getVariable('field')->value['required']!='N'){?>*<?php }?></label>
    <input type='textfield' name='form_<?php echo $_smarty_tpl->getVariable('fas')->value['fas_f_id'];?>
_<?php echo $_smarty_tpl->getVariable('fas')->value['fas_id'];?>
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