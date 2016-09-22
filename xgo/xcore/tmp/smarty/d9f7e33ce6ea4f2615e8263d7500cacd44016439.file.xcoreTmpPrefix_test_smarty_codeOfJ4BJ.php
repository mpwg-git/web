<?php /* Smarty version Smarty-3.0.7, created on 2015-03-10 09:56:56
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeOfJ4BJ" */ ?>
<?php /*%%SmartyHeaderCode:123786330854feb1d8d59ea3-94105040%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd9f7e33ce6ea4f2615e8263d7500cacd44016439' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeOfJ4BJ',
      1 => 1425977816,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '123786330854feb1d8d59ea3-94105040',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_form')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_form.php';
?><?php echo smarty_function_xr_form(array('form_id'=>5,'var'=>'form'),$_smarty_tpl);?>


<div class='row'>
    <div class='col-xs-12' style='padding:20px;'>
        
        <?php echo $_smarty_tpl->getVariable('data')->value['wz_id'];?>

        <?php echo $_smarty_tpl->getVariable('data')->value['wz_STREET'];?>

        
        <br>
        
        
        <div style='display:none'>
            <?php echo $_smarty_tpl->getVariable('form')->value;?>

        </div>
        
        
        
        <button type="button" class="pager_edit_record btn btn-primary">edit</button>
        <button type="button" class="pager_edit_record btn btn-primary">delete</button>
        
        
    </div>
</div>