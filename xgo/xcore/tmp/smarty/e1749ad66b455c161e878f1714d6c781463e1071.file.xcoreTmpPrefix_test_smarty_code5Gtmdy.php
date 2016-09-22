<?php /* Smarty version Smarty-3.0.7, created on 2015-12-21 13:23:40
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code5Gtmdy" */ ?>
<?php /*%%SmartyHeaderCode:1867277835677ef4cc19796-09176521%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e1749ad66b455c161e878f1714d6c781463e1071' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code5Gtmdy',
      1 => 1450700620,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1867277835677ef4cc19796-09176521',
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
        
    <span class="prozent"><?php echo $_smarty_tpl->getVariable('matchGesamt')->value;?>
</span>
    <span class="match">match</span>
</div>

<div class="clearfix"></div>


<div class="clearfix"></div>