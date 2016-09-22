<?php /* Smarty version Smarty-3.0.7, created on 2016-02-23 15:23:55
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codesM6cHI" */ ?>
<?php /*%%SmartyHeaderCode:164994808056cc6b7b55a4e3-00771614%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b5466458dd92f0d41ec6ae2af8d3a734cc3255d1' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codesM6cHI',
      1 => 1456237435,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '164994808056cc6b7b55a4e3-00771614',
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