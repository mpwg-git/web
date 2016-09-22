<?php /* Smarty version Smarty-3.0.7, created on 2015-10-30 11:34:00
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeKPevhX" */ ?>
<?php /*%%SmartyHeaderCode:20108030815633479813b7c4-00979338%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '08c307dcd073af8f1c58e5efe2f9e931dc3c4732' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeKPevhX',
      1 => 1446201240,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20108030815633479813b7c4-00979338',
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