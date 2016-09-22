<?php /* Smarty version Smarty-3.0.7, created on 2015-10-12 18:28:07
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codexktd6L" */ ?>
<?php /*%%SmartyHeaderCode:165892961561bdf977323a1-94610874%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3d41057be58646950b41b30f37b6a6a32ca3d1b4' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codexktd6L',
      1 => 1444667287,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '165892961561bdf977323a1-94610874',
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

