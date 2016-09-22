<?php /* Smarty version Smarty-3.0.7, created on 2016-01-19 17:47:39
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codevZiFc7" */ ?>
<?php /*%%SmartyHeaderCode:575713242569e68abb34035-49452504%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8189c9611942faafd8224435af31454abbb047ef' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codevZiFc7',
      1 => 1453222059,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '575713242569e68abb34035-49452504',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><div class="mobile-row">
    
    <!-- FILTERING -->
    <?php echo smarty_function_xr_atom(array('a_id'=>883,'return'=>1,'desc'=>"filtering"),$_smarty_tpl);?>

    <?php if ($_smarty_tpl->getVariable('P_ID')->value==36){?>
        <?php echo smarty_function_xr_atom(array('a_id'=>835,'return'=>1),$_smarty_tpl);?>

    <?php }elseif($_smarty_tpl->getVariable('P_ID')->value==46){?>
        <?php echo smarty_function_xr_atom(array('a_id'=>881,'return'=>1),$_smarty_tpl);?>

    <?php }?>
</div>