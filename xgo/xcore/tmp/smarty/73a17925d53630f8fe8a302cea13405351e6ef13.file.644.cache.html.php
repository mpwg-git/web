<?php /* Smarty version Smarty-3.0.7, created on 2016-06-19 16:28:49
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/644.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:1345407585766ac21805b69-98562639%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '73a17925d53630f8fe8a302cea13405351e6ef13' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/644.cache.html',
      1 => 1466178290,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1345407585766ac21805b69-98562639',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_util::isV2",'var'=>"isV2"),$_smarty_tpl);?>


<div class="left-row">
    <?php echo smarty_function_xr_atom(array('a_id'=>$_smarty_tpl->getVariable('TABLET_LEFTROW')->value,'return'=>1),$_smarty_tpl);?>

    
    <!-- FOOTER ATOM -->
    <?php echo smarty_function_xr_atom(array('a_id'=>643,'return'=>1),$_smarty_tpl);?>

    
</div>
<div class="middle-row">
    
    
    <div class="scrollbarfix">
        <?php echo smarty_function_xr_atom(array('a_id'=>$_smarty_tpl->getVariable('TABLET_RIGHTROW')->value,'return'=>1),$_smarty_tpl);?>

    </div>
    
</div>