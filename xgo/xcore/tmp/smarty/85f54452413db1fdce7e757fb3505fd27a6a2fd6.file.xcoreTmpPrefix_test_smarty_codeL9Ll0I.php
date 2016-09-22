<?php /* Smarty version Smarty-3.0.7, created on 2015-08-20 16:07:05
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeL9Ll0I" */ ?>
<?php /*%%SmartyHeaderCode:109912605955d5df09253117-71863106%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '85f54452413db1fdce7e757fb3505fd27a6a2fd6' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeL9Ll0I',
      1 => 1440079625,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '109912605955d5df09253117-71863106',
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

<p class="match-text">
        <?php echo $_smarty_tpl->getVariable('matching')->value['TEXT']['GESAMT'];?>

    </p>
    

<div class="clearfix"></div>