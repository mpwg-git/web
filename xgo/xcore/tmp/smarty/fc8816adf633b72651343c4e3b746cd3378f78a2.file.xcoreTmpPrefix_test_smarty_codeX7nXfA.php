<?php /* Smarty version Smarty-3.0.7, created on 2015-08-11 18:06:20
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeX7nXfA" */ ?>
<?php /*%%SmartyHeaderCode:83523331355ca1d7cf06c68-33898469%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fc8816adf633b72651343c4e3b746cd3378f78a2' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeX7nXfA',
      1 => 1439309180,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '83523331355ca1d7cf06c68-33898469',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<form class="add-image-final-form" data-type="<?php echo $_smarty_tpl->getVariable('type')->value;?>
">
                        
    <input type="hidden" name="s_id" value="<?php echo $_smarty_tpl->getVariable('image')->value['new_s_id'];?>
" />
    <input type="submit" value="speichern" class="add-image-final-submit" />
    
</form>