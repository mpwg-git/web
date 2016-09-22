<?php /* Smarty version Smarty-3.0.7, created on 2016-06-17 17:44:50
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/644.cache-3.html" */ ?>
<?php /*%%SmartyHeaderCode:64295366357641af2356637-94143934%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c781e7829e4d3f54885edd795fba9a9a25d5222d' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/644.cache-3.html',
      1 => 1466178290,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '64295366357641af2356637-94143934',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_util::isNewLayout",'var'=>"newlayout"),$_smarty_tpl);?>


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