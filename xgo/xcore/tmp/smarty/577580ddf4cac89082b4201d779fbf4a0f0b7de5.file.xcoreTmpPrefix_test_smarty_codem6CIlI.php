<?php /* Smarty version Smarty-3.0.7, created on 2015-03-09 21:21:33
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codem6CIlI" */ ?>
<?php /*%%SmartyHeaderCode:164798491054fe00cd78e4a5-11817436%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '577580ddf4cac89082b4201d779fbf4a0f0b7de5' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codem6CIlI',
      1 => 1425932493,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '164798491054fe00cd78e4a5-11817436',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class='row'>
    <div class='col-xs-12'>
        
        <?php echo $_smarty_tpl->getVariable('data')->value['wz_id'];?>

        <?php echo $_smarty_tpl->getVariable('data')->value['wz_STREET'];?>

        
        <br>
        
        <button type="button" class="pager_edit_record btn btn-primary">edit</button>
        <button type="button" class="pager_edit_record btn btn-primary">delete</button>
        
        
    </div>
</div>