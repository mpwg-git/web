<?php /* Smarty version Smarty-3.0.7, created on 2015-11-13 16:58:14
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeZ6eZze" */ ?>
<?php /*%%SmartyHeaderCode:625478256460896c4a441-73048870%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c85455e138e3b4b769f98c01401f391a6c851b4b' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeZ6eZze',
      1 => 1447430294,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '625478256460896c4a441-73048870',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_print_r')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_print_r.php';
?><div class="matchinginfos">
    <span class="drducksays"><span class="icon-duck"></span> <?php echo smarty_function_xr_translate(array('tag'=>"Dr. Duck Says:"),$_smarty_tpl);?>
</span>
    
    <p class="match-text">
        <?php echo smarty_function_xr_print_r(array('val'=>$_smarty_tpl->getVariable('matching')->value),$_smarty_tpl);?>

        <?php echo $_smarty_tpl->getVariable('matching')->value['TEXT']['GESAMT'];?>

    </p>
        
    <span class="prozent"><?php echo $_smarty_tpl->getVariable('matchGesamt')->value;?>
</span>
    <span class="match">match</span>
</div>

<div class="clearfix"></div>


<div class="clearfix"></div>