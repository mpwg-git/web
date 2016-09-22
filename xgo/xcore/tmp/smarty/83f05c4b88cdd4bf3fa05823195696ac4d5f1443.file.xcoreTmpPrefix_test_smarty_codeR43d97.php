<?php /* Smarty version Smarty-3.0.7, created on 2015-03-09 21:21:06
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeR43d97" */ ?>
<?php /*%%SmartyHeaderCode:6433431554fe00b24cc8b2-37777607%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '83f05c4b88cdd4bf3fa05823195696ac4d5f1443' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeR43d97',
      1 => 1425932466,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6433431554fe00b24cc8b2-37777607',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class='row'>
    <div class='xs-col-12'>
        
        <?php echo $_smarty_tpl->getVariable('data')->value['wz_id'];?>

        <?php echo $_smarty_tpl->getVariable('data')->value['wz_STREET'];?>

        
        <br>
        
        <button type="button" class="pager_edit_record btn btn-primary">edit</button>
        <button type="button" class="pager_edit_record btn btn-primary">delete</button>
        
        
    </div>
</div>