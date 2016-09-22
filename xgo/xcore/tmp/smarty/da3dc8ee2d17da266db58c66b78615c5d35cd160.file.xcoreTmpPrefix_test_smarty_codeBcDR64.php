<?php /* Smarty version Smarty-3.0.7, created on 2015-10-30 11:35:43
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeBcDR64" */ ?>
<?php /*%%SmartyHeaderCode:1438369228563347ff8364b5-65872017%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'da3dc8ee2d17da266db58c66b78615c5d35cd160' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeBcDR64',
      1 => 1446201343,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1438369228563347ff8364b5-65872017',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div class="matchinginfos">
    <span class="drducksays"><span class="icon-duck"></span> <?php echo smarty_function_xr_translate(array('tag'=>"Dr. Duck Says:"),$_smarty_tpl);?>
</span>
    
    <p class="match-text">
        <?php echo $_smarty_tpl->getVariable('matching')->value['TEXT']['GESAMT'];?>

    </p>
        
    <span class="prozent"><?php echo $_smarty_tpl->getVariable('matching')->value['RESULT']['matchGesamt'];?>
</span>
    <span class="match">match</span>
</div>

<div class="clearfix"></div>


<div class="clearfix"></div>