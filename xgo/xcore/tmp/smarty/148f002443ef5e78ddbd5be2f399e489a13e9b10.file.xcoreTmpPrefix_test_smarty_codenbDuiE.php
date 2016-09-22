<?php /* Smarty version Smarty-3.0.7, created on 2015-08-20 16:04:41
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codenbDuiE" */ ?>
<?php /*%%SmartyHeaderCode:187120893855d5de7953f882-59620173%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '148f002443ef5e78ddbd5be2f399e489a13e9b10' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codenbDuiE',
      1 => 1440079481,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '187120893855d5de7953f882-59620173',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div class="matchinginfos">
    <span class="drducksays"><span class="icon-duck"></span> <?php echo smarty_function_xr_translate(array('tag'=>"Dr. Duck Says:"),$_smarty_tpl);?>
</span>
    
    <span class="prozent"><?php echo $_smarty_tpl->getVariable('matching')->value['RESULT']['matchGesamt'];?>
</span>
    <span class="match">match</span>
</div>

<div class="clearfix"></div>