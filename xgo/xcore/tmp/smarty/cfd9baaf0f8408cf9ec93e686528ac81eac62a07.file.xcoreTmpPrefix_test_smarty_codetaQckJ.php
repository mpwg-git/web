<?php /* Smarty version Smarty-3.0.7, created on 2015-03-10 14:11:07
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codetaQckJ" */ ?>
<?php /*%%SmartyHeaderCode:138562473954feed6b16e209-11293531%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cfd9baaf0f8408cf9ec93e686528ac81eac62a07' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codetaQckJ',
      1 => 1425993067,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '138562473954feed6b16e209-11293531',
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
    <input type='textfield' data-as-id='<?php echo $_smarty_tpl->getVariable('fas_as_id')->value;?>
' name='<?php echo $_smarty_tpl->getVariable('field_name')->value;?>
' value='<?php echo $_smarty_tpl->getVariable('value')->value;?>
' placeholder='<?php echo $_smarty_tpl->getVariable('fas')->value['fas_placeholder'];?>
' class="form-control" data-required="<?php echo $_smarty_tpl->getVariable('fas')->value['fas_required'];?>
">
    <?php echo smarty_function_xr_atom(array('a_id'=>538,'return'=>1),$_smarty_tpl);?>

    <div class="clearer"></div>
</div>