<?php /* Smarty version Smarty-3.0.7, created on 2015-03-09 12:53:26
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeg5TtSc" */ ?>
<?php /*%%SmartyHeaderCode:19846892154fd89b613d088-31720816%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1215559a78363ea6a0ae17c4a5bc4c58d8935c32' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeg5TtSc',
      1 => 1425902006,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19846892154fd89b613d088-31720816',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="form-group <?php echo $_smarty_tpl->getVariable('class')->value;?>
">
    <label for=""><?php echo $_smarty_tpl->getVariable('fas')->value['fas_name'];?>
<?php if ($_smarty_tpl->getVariable('fas')->value['fas_required']!='N'){?>*<?php }?></label>
    <input type='submit' name='<?php echo $_smarty_tpl->getVariable('field_name')->value;?>
' value='<?php echo $_smarty_tpl->getVariable('value')->value;?>
' placeholder='<?php echo $_smarty_tpl->getVariable('fas')->value['fas_placeholder'];?>
' class="form-control">
</div>