<?php /* Smarty version Smarty-3.0.7, created on 2015-03-10 09:55:28
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeg9C7Rn" */ ?>
<?php /*%%SmartyHeaderCode:157183585554feb1807cfa04-31031129%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd28f41f3f6a66ea00b3e38f9a3e10e79b3bccc8d' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeg9C7Rn',
      1 => 1425977728,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '157183585554feb1807cfa04-31031129',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_form')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_form.php';
?><div class='row'>
    <div class='col-xs-12' style='padding:20px;'>
        
        <?php echo $_smarty_tpl->getVariable('data')->value['wz_id'];?>

        <?php echo $_smarty_tpl->getVariable('data')->value['wz_STREET'];?>

        
        <br>
        
        
        <?php echo smarty_function_xr_form(array('form_id'=>5),$_smarty_tpl);?>

        
        
        <button type="button" class="pager_edit_record btn btn-primary">edit</button>
        <button type="button" class="pager_edit_record btn btn-primary">delete</button>
        
        
    </div>
</div>