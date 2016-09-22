<?php /* Smarty version Smarty-3.0.7, created on 2015-03-03 18:19:45
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeHNUSfM" */ ?>
<?php /*%%SmartyHeaderCode:113559730854f5ed31874418-89474259%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '41afacbc7fdcad578c5dde98763af88dcb2239cb' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeHNUSfM',
      1 => 1425403185,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '113559730854f5ed31874418-89474259',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div class="form-group <?php echo $_smarty_tpl->getVariable('field')->value['class'];?>
">
    <label for=""><?php echo smarty_function_xr_translate(array('tag'=>$_smarty_tpl->getVariable('field')->value['label']),$_smarty_tpl);?>
<?php if ($_smarty_tpl->getVariable('field')->value['required']!='N'){?>*<?php }?></label>
    <input type="text" class="form-control datepicker2" name='<?php echo $_smarty_tpl->getVariable('field')->value['name'];?>
' value='<?php echo $_smarty_tpl->getVariable('field')->value['value'];?>
' placeholder='<?php echo smarty_function_xr_translate(array('tag'=>$_smarty_tpl->getVariable('field')->value['placeholder']),$_smarty_tpl);?>
' data-required="<?php echo $_smarty_tpl->getVariable('field')->value['required'];?>
" />
    <div class='xr_required_<?php echo $_smarty_tpl->getVariable('field')->value['name'];?>
 required_Y' style='display:none;'><?php echo smarty_function_xr_translate(array('tag'=>'Bitte füllen Sie dieses Feld aus'),$_smarty_tpl);?>
</div>
    <div class="clearer"></div>
</div>