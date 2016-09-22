<?php /* Smarty version Smarty-3.0.7, created on 2015-03-10 11:19:29
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeKZi8wU" */ ?>
<?php /*%%SmartyHeaderCode:43989299354fec5318fc814-15599616%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '85c0405eae8d3c8a14139c49de96b6d04dd41672' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeKZi8wU',
      1 => 1425982769,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '43989299354fec5318fc814-15599616',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_form')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_form.php';
?>
<?php echo smarty_function_xr_form(array('form_id'=>5,'var'=>'form','fill_values'=>$_smarty_tpl->getVariable('data')->value,'submit_txt'=>'Datensatz speichern'),$_smarty_tpl);?>


<div class='row'>
    <div class='col-xs-12' style='padding:20px;'>
    
    
        <div class='pager_edit_record_container_view'>
            <?php echo $_smarty_tpl->getVariable('data')->value['wz_id'];?>

            
            <?php echo $_smarty_tpl->getVariable('data')->value['wz_FIRSTNAME'];?>

            <?php echo $_smarty_tpl->getVariable('data')->value['wz_LASTNAME'];?>

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