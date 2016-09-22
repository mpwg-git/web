<?php /* Smarty version Smarty-3.0.7, created on 2015-08-17 19:56:14
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code8S55VA" */ ?>
<?php /*%%SmartyHeaderCode:8146525955d2203ea65d59-57176417%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9a75d1834c2a698da0aa456f90e44191854211fe' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code8S55VA',
      1 => 1439834174,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8146525955d2203ea65d59-57176417',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><div class="form-group">
    <label><?php echo smarty_function_xr_translate(array('tag'=>"Adresse?"),$_smarty_tpl);?>
*</label>
    
    <?php echo smarty_function_xr_atom(array('a_id'=>764,'inForm'=>1,'profileData'=>$_smarty_tpl->getVariable('data')->value['PROFILE'],'return'=>1),$_smarty_tpl);?>

     
</div>

