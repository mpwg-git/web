<?php /* Smarty version Smarty-3.0.7, created on 2015-03-10 10:05:26
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codemt0dTU" */ ?>
<?php /*%%SmartyHeaderCode:32843831854feb3d6bd09b4-20159401%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9a2ff5f900d8976f84a7e34489b37356f9bb4787' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codemt0dTU',
      1 => 1425978326,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '32843831854feb3d6bd09b4-20159401',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_form')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_form.php';
?><?php echo smarty_function_xr_form(array('form_id'=>5,'var'=>'form'),$_smarty_tpl);?>


<div class='row'>
    <div class='col-xs-12' style='padding:20px;'>
    
    
        <div class='pager_edit_record_container_view'>
            <?php echo $_smarty_tpl->getVariable('data')->value['wz_id'];?>

            <?php echo $_smarty_tpl->getVariable('data')->value['wz_STREET'];?>

            <br>
        </div>
        
        <div class='pager_edit_record_container_edit'>
            <?php echo $_smarty_tpl->getVariable('form')->value;?>

        </div>

        
        
        <button type="button" class="pager_edit_record btn btn-primary">edit</button>
        <button type="button" class="pager_edit_record btn btn-primary">delete</button>
        
        
    </div>
</div>