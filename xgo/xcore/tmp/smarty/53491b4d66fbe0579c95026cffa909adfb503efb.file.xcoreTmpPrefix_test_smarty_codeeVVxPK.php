<?php /* Smarty version Smarty-3.0.7, created on 2015-03-10 11:26:32
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeeVVxPK" */ ?>
<?php /*%%SmartyHeaderCode:146551755254fec6d8b255e9-74785065%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '53491b4d66fbe0579c95026cffa909adfb503efb' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeeVVxPK',
      1 => 1425983192,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '146551755254fec6d8b255e9-74785065',
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

            
            U_TYPE: <?php echo $_smarty_tpl->getVariable('data')->value['wz_FIRSTNAME'];?>
<br>
            Firstname: <?php echo $_smarty_tpl->getVariable('data')->value['wz_FIRSTNAME'];?>
<br>
            Lastname: <?php echo $_smarty_tpl->getVariable('data')->value['wz_LASTNAME'];?>
<br>
            Street: <?php echo $_smarty_tpl->getVariable('data')->value['wz_STREET'];?>
<br>
            Street Nr:<?php echo $_smarty_tpl->getVariable('data')->value['wz_STREET_NR'];?>
<br>
            ZIP: <?php echo $_smarty_tpl->getVariable('data')->value['wz_ZIP'];?>
<br>
            CITY: <?php echo $_smarty_tpl->getVariable('data')->value['wz_CITY'];?>
<br>
            
            <br>
        </div>
        
        
        <div class='pager_edit_record_container_edit'>
            <?php echo $_smarty_tpl->getVariable('form')->value;?>

        </div>

        
        <button type="button" class="pager_edit_record btn btn-primary">edit</button>
        <button type="button" class="pager_edit_record btn btn-primary">delete</button>
        
        
    </div>
</div>