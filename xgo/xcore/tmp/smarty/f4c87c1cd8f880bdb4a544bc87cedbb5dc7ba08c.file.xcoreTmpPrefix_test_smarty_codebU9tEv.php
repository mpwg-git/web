<?php /* Smarty version Smarty-3.0.7, created on 2015-03-07 11:56:50
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codebU9tEv" */ ?>
<?php /*%%SmartyHeaderCode:32646976954fad97239bef2-84417720%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f4c87c1cd8f880bdb4a544bc87cedbb5dc7ba08c' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codebU9tEv',
      1 => 1425725810,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '32646976954fad97239bef2-84417720',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><?php $_smarty_tpl->tpl_vars['field_name'] = new Smarty_variable("form_".($_smarty_tpl->getVariable('fas')->value['fas_f_id'])."_".($_smarty_tpl->getVariable('fas')->value['fas_id']), null, null);?>

<div class="form-group <?php echo $_smarty_tpl->getVariable('class')->value;?>
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