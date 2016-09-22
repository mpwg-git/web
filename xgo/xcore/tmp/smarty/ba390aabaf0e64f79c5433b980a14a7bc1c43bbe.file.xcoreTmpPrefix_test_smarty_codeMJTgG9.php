<?php /* Smarty version Smarty-3.0.7, created on 2015-08-20 19:32:51
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeMJTgG9" */ ?>
<?php /*%%SmartyHeaderCode:92809875155d60f438ab230-96830873%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ba390aabaf0e64f79c5433b980a14a7bc1c43bbe' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeMJTgG9',
      1 => 1440091971,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '92809875155d60f438ab230-96830873',
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

<p class="match-text">
    <?php echo $_smarty_tpl->getVariable('matching')->value['TEXT']['GESAMT'];?>

</p>

<div class="clearfix"></div>