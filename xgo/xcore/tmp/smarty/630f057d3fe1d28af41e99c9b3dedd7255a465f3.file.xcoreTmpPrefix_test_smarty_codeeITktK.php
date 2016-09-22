<?php /* Smarty version Smarty-3.0.7, created on 2015-10-30 12:36:47
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeeITktK" */ ?>
<?php /*%%SmartyHeaderCode:14304601685633564f933e02-46811109%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '630f057d3fe1d28af41e99c9b3dedd7255a465f3' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeeITktK',
      1 => 1446205007,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14304601685633564f933e02-46811109',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
?><?php if ($_smarty_tpl->getVariable('user')->value['wz_PROFILBILD']==0){?>
    <?php echo smarty_function_xr_imgWrapper(array('s_id'=>540,'w'=>197,'h'=>197,'rmode'=>"cco",'class'=>"profileimage"),$_smarty_tpl);?>

<?php }else{ ?>
    <?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('user')->value['wz_PROFILBILD'],'w'=>197,'h'=>197,'rmode'=>"cco",'class'=>"profileimage"),$_smarty_tpl);?>

<?php }?>