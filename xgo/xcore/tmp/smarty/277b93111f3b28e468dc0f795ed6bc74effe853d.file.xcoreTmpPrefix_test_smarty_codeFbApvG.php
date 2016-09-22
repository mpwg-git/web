<?php /* Smarty version Smarty-3.0.7, created on 2015-08-20 16:06:46
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeFbApvG" */ ?>
<?php /*%%SmartyHeaderCode:181144527655d5def6267002-16026047%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '277b93111f3b28e468dc0f795ed6bc74effe853d' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeFbApvG',
      1 => 1440079606,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '181144527655d5def6267002-16026047',
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