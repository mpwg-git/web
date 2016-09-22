<?php /* Smarty version Smarty-3.0.7, created on 2015-08-11 18:04:44
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codewuifUb" */ ?>
<?php /*%%SmartyHeaderCode:205487650655ca1d1ce4a0c1-59092202%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ac30c11831c113a5346738fa12c41f51730738ef' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codewuifUb',
      1 => 1439309084,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '205487650655ca1d1ce4a0c1-59092202',
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