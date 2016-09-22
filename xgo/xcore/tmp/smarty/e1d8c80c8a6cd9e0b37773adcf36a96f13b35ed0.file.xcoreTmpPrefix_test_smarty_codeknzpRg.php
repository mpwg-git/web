<?php /* Smarty version Smarty-3.0.7, created on 2015-08-20 19:32:44
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeknzpRg" */ ?>
<?php /*%%SmartyHeaderCode:50722245055d60f3ccd2170-14092699%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e1d8c80c8a6cd9e0b37773adcf36a96f13b35ed0' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeknzpRg',
      1 => 1440091964,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '50722245055d60f3ccd2170-14092699',
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