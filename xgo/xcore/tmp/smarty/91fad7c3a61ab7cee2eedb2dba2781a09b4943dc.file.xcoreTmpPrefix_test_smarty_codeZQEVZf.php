<?php /* Smarty version Smarty-3.0.7, created on 2016-04-07 12:02:54
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeZQEVZf" */ ?>
<?php /*%%SmartyHeaderCode:17705317225706304e378594-33260034%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '91fad7c3a61ab7cee2eedb2dba2781a09b4943dc' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeZQEVZf',
      1 => 1460023374,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17705317225706304e378594-33260034',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_util::isNewLayout",'var'=>"newlayout"),$_smarty_tpl);?>

	
<?php if ($_smarty_tpl->getVariable('newlayout')->value==1){?>
     <?php echo smarty_function_xr_atom(array('a_id'=>889,'return'=>1),$_smarty_tpl);?>

<?php }else{ ?>

<div class="left-row">
    <?php if ($_smarty_tpl->getVariable('P_ID')->value==36){?>
        <?php echo smarty_function_xr_atom(array('a_id'=>883,'return'=>1),$_smarty_tpl);?>

    <?php }elseif($_smarty_tpl->getVariable('P_ID')->value==46){?>
        <?php echo smarty_function_xr_atom(array('a_id'=>885,'return'=>1),$_smarty_tpl);?>

    <?php }?>
    
    <div class="icon-navigation-blogpage icbp">
        <!-- Icon Navigation -->
        <?php echo smarty_function_xr_atom(array('a_id'=>886,'return'=>1,'showFace'=>0,'desc'=>"IconNavigation"),$_smarty_tpl);?>

    </div>
</div>
<div class="middle-row big darkgrey">
    <?php if ($_smarty_tpl->getVariable('P_ID')->value==36){?>
        <?php echo smarty_function_xr_atom(array('a_id'=>835,'return'=>1),$_smarty_tpl);?>

    <?php }elseif($_smarty_tpl->getVariable('P_ID')->value==46){?>
        <?php echo smarty_function_xr_atom(array('a_id'=>881,'return'=>1),$_smarty_tpl);?>

    <?php }?>
</div>

<?php }?>