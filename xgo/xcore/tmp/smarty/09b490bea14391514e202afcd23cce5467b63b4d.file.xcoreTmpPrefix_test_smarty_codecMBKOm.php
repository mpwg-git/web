<?php /* Smarty version Smarty-3.0.7, created on 2017-03-08 10:57:43
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codecMBKOm" */ ?>
<?php /*%%SmartyHeaderCode:2539222758bfd5972d68c0-08115645%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '09b490bea14391514e202afcd23cce5467b63b4d' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codecMBKOm',
      1 => 1488967063,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2539222758bfd5972d68c0-08115645',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?>
<!--
<?php echo smarty_function_xr_siteCall(array('fn'=>"fe_util::isNewLayout",'var'=>"newlayout"),$_smarty_tpl);?>


<?php echo smarty_function_xr_siteCall(array('fn'=>"fe_util::isV2",'var'=>"isV2"),$_smarty_tpl);?>

	
<?php if ($_smarty_tpl->getVariable('newlayout')->value==1){?>
    
    <?php if ($_smarty_tpl->getVariable('isV2')->value==1){?>
    <?php echo smarty_function_xr_atom(array('a_id'=>905,'DESKTOP_EXTRACLASS_LEFT'=>$_smarty_tpl->getVariable('DESKTOP_EXTRACLASS_LEFT')->value,'DESKTOP_EXTRACLASS_MIDDLE'=>$_smarty_tpl->getVariable('DESKTOP_EXTRACLASS_MIDDLE')->value,'DESKTOP_EXTRACLASS_RIGHT'=>$_smarty_tpl->getVariable('DESKTOP_EXTRACLASS_RIGHT')->value,'return'=>1),$_smarty_tpl);?>

    <?php }else{ ?>
     <?php echo smarty_function_xr_atom(array('a_id'=>887,'DESKTOP_EXTRACLASS_LEFT'=>$_smarty_tpl->getVariable('DESKTOP_EXTRACLASS_LEFT')->value,'DESKTOP_EXTRACLASS_MIDDLE'=>$_smarty_tpl->getVariable('DESKTOP_EXTRACLASS_MIDDLE')->value,'DESKTOP_EXTRACLASS_RIGHT'=>$_smarty_tpl->getVariable('DESKTOP_EXTRACLASS_RIGHT')->value,'return'=>1),$_smarty_tpl);?>

    <?php }?>
    
<?php }else{ ?>

    <div class="left-row <?php echo $_smarty_tpl->getVariable('DESKTOP_EXTRACLASS_LEFT')->value;?>
">
        <?php echo smarty_function_xr_atom(array('a_id'=>$_smarty_tpl->getVariable('DESKTOP_LEFTROW')->value,'return'=>1),$_smarty_tpl);?>

    </div>
    <div class="middle-row darkgrey <?php echo $_smarty_tpl->getVariable('DESKTOP_EXTRACLASS_MIDDLE')->value;?>
">
        <div class="scrollbarfix">
            <?php echo smarty_function_xr_atom(array('a_id'=>$_smarty_tpl->getVariable('DESKTOP_MIDDLEROW')->value,'return'=>1),$_smarty_tpl);?>

        </div>
    </div>
    <div class="right-row <?php echo $_smarty_tpl->getVariable('DESKTOP_EXTRACLASS_RIGHT')->value;?>
">
        <div class="content">
            
            <?php echo smarty_function_xr_atom(array('a_id'=>$_smarty_tpl->getVariable('DESKTOP_RIGHTROW')->value,'extraParams'=>$_smarty_tpl->getVariable('DESKTOP_RIGHTROW_PARAMS')->value,'return'=>1),$_smarty_tpl);?>

            
            <?php echo smarty_function_xr_atom(array('a_id'=>643,'return'=>1),$_smarty_tpl);?>

            
        </div>
    </div>
    
    
<?php }?>
-->