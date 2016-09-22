<?php /* Smarty version Smarty-3.0.7, created on 2015-12-21 13:22:58
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeDvNlbK" */ ?>
<?php /*%%SmartyHeaderCode:13011775745677ef220bd1f2-70405801%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e661d9c24e59cd9c0e09949b0565f79b8c7ee29b' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeDvNlbK',
      1 => 1450700578,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13011775745677ef220bd1f2-70405801',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_print_r')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_print_r.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><?php echo smarty_function_xr_print_r(array('val'=>$_smarty_tpl->getVariable('matching')->value),$_smarty_tpl);?>

<div class="matchinginfos">
    
    
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