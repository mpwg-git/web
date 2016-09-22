<?php /* Smarty version Smarty-3.0.7, created on 2016-09-15 15:28:57
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code25pMPW" */ ?>
<?php /*%%SmartyHeaderCode:76470521057daa21952f7f3-32315469%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6d4b6d57b43668e233580a464c4d06185f9f460d' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code25pMPW',
      1 => 1473946137,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '76470521057daa21952f7f3-32315469',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_util::isV2",'var'=>"isV2"),$_smarty_tpl);?>


<div class="left-row">
    <?php echo smarty_function_xr_atom(array('a_id'=>$_smarty_tpl->getVariable('TABLET_LEFTROW')->value,'return'=>1),$_smarty_tpl);?>

    
     FOOTER ATOM 
    <?php echo smarty_function_xr_atom(array('a_id'=>643,'return'=>1),$_smarty_tpl);?>

    
</div>
<div class="middle-row">
    
    
    <div class="scrollbarfix">
        <?php echo smarty_function_xr_atom(array('a_id'=>$_smarty_tpl->getVariable('TABLET_RIGHTROW')->value,'return'=>1),$_smarty_tpl);?>

    </div>
    
</div>
