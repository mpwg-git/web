<?php /* Smarty version Smarty-3.0.7, created on 2015-06-24 15:00:58
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/454.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:1907483436558aaa0ac2e265-27553428%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5feb5fd7583dc6a0849d5b52eb9c780e61e0c3d1' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/454.cache.html',
      1 => 1435074121,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1907483436558aaa0ac2e265-27553428',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><div class="form-group <?php echo $_smarty_tpl->getVariable('class')->value;?>
">
    <label for=""><?php echo $_smarty_tpl->getVariable('fas')->value['fas_name'];?>
<?php if ($_smarty_tpl->getVariable('fas')->value['fas_required']!='N'){?>*<?php }?></label>
    <input type='textfield' data-form-id='<?php echo $_smarty_tpl->getVariable('form_uid')->value;?>
' data-as-id='<?php echo $_smarty_tpl->getVariable('fas')->value['fas_as_id'];?>
' name='<?php echo $_smarty_tpl->getVariable('field_name')->value;?>
' value='<?php echo $_smarty_tpl->getVariable('value')->value;?>
' placeholder='<?php echo $_smarty_tpl->getVariable('fas')->value['fas_placeholder'];?>
' class="form-control" data-required="<?php echo $_smarty_tpl->getVariable('fas')->value['fas_required'];?>
">
    <?php echo smarty_function_xr_atom(array('a_id'=>538,'return'=>1),$_smarty_tpl);?>

    <div class="clearer"></div>
</div>