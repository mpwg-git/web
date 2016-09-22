<?php /* Smarty version Smarty-3.0.7, created on 2016-04-07 11:22:34
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeFZrymo" */ ?>
<?php /*%%SmartyHeaderCode:1307119242570626da2b50b6-65720190%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3657fa2d273e8f313cf26038cba1a437328456e1' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeFZrymo',
      1 => 1460020954,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1307119242570626da2b50b6-65720190',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_print_r')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_print_r.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_util::isNewLayout",'var'=>"newlayout"),$_smarty_tpl);?>

	
<?php if ($_smarty_tpl->getVariable('newlayout')->value==1){?>

    <?php echo smarty_function_xr_print_r(array('val'=>$_smarty_tpl->getVariable('DESKTOP_EXTRACLASS_LEFT')->value),$_smarty_tpl);?>


     <?php echo smarty_function_xr_atom(array('a_id'=>887,'DESKTOP_EXTRACLASS_LEFT'=>$_smarty_tpl->getVariable('DESKTOP_EXTRACLASS_LEFT')->value,'DESKTOP_EXTRACLASS_MIDDLE'=>$_smarty_tpl->getVariable('DESKTOP_EXTRACLASS_MIDDLE')->value,'DESKTOP_EXTRACLASS_RIGHT'=>$_smarty_tpl->getVariable('DESKTOP_EXTRACLASS_RIGHT')->value,'return'=>1),$_smarty_tpl);?>

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