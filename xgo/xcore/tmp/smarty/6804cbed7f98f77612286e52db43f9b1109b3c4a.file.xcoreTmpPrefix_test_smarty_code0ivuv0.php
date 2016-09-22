<?php /* Smarty version Smarty-3.0.7, created on 2015-03-07 11:59:49
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code0ivuv0" */ ?>
<?php /*%%SmartyHeaderCode:2647284554fada258f7d55-09171040%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6804cbed7f98f77612286e52db43f9b1109b3c4a' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code0ivuv0',
      1 => 1425725989,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2647284554fada258f7d55-09171040',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><div class="form-group <?php echo $_smarty_tpl->getVariable('class')->value;?>
">
    <label for=""><?php echo $_smarty_tpl->getVariable('fas')->value['fas_name'];?>
<?php if ($_smarty_tpl->getVariable('fas')->value['fas_required']!='N'){?>*<?php }?></label>
    <textarea name='<?php echo $_smarty_tpl->getVariable('field_name')->value;?>
' class="form-control" data-required="<?php echo $_smarty_tpl->getVariable('fas')->value['fas_required'];?>
"><?php echo $_smarty_tpl->getVariable('value')->value;?>
</textarea>
    <?php echo smarty_function_xr_atom(array('a_id'=>538,'return'=>1),$_smarty_tpl);?>

    <div class="clearer"></div>
</div>