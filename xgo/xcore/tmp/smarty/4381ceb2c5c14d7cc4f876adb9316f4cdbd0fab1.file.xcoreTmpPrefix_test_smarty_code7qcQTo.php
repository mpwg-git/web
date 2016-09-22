<?php /* Smarty version Smarty-3.0.7, created on 2015-08-11 18:05:33
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code7qcQTo" */ ?>
<?php /*%%SmartyHeaderCode:29750985155ca1d4d7d7706-81562185%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4381ceb2c5c14d7cc4f876adb9316f4cdbd0fab1' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code7qcQTo',
      1 => 1439309133,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '29750985155ca1d4d7d7706-81562185',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<form class="add-image-final-form">
                        
    <input type="hidden" name="s_id" value="<?php echo $_smarty_tpl->getVariable('image')->value['new_s_id'];?>
" />
    <input type="submit" value="speichern" class="add-image-final-submit" data-type="<?php echo $_smarty_tpl->getVariable('type')->value;?>
" />
    
</form>