<?php /* Smarty version Smarty-3.0.7, created on 2016-04-07 12:02:29
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeqdTfi5" */ ?>
<?php /*%%SmartyHeaderCode:155615756757063035514670-33030985%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a39c1ebe5fd6c9105452810db8c1b091a27b985a' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeqdTfi5',
      1 => 1460023349,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '155615756757063035514670-33030985',
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
    
    <div class="icon-navigation-blogpage">
        <!-- Icon Navigation -->
        <?php echo smarty_function_xr_atom(array('a_id'=>886,'return'=>1,'showFace'=>0,'desc'=>"IconNavigation"),$_smarty_tpl);?>

        a
        <?php echo smarty_function_xr_atom(array('a_id'=>662,'return'=>1,'desc'=>"facebook plugin"),$_smarty_tpl);?>

        
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