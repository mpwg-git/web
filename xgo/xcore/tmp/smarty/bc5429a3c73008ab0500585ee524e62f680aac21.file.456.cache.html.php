<?php /* Smarty version Smarty-3.0.7, created on 2015-03-11 01:06:32
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/456.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:99091891354ff8708bd6037-02942699%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bc5429a3c73008ab0500585ee524e62f680aac21' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/456.cache.html',
      1 => 1425996708,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '99091891354ff8708bd6037-02942699',
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
    <textarea data-form-id='<?php echo $_smarty_tpl->getVariable('form_uid')->value;?>
' data-as-id='<?php echo $_smarty_tpl->getVariable('fas')->value['fas_as_id'];?>
' name='<?php echo $_smarty_tpl->getVariable('field_name')->value;?>
' class="form-control" data-required="<?php echo $_smarty_tpl->getVariable('fas')->value['fas_required'];?>
"><?php echo $_smarty_tpl->getVariable('value')->value;?>
</textarea>
    <?php echo smarty_function_xr_atom(array('a_id'=>538,'return'=>1),$_smarty_tpl);?>

    <div class="clearer"></div>
</div>