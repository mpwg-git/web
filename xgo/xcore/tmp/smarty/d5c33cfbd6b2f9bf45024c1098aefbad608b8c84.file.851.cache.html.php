<?php /* Smarty version Smarty-3.0.7, created on 2016-01-05 10:11:02
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/851.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:248641771568b88a6ba6ce9-70351651%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd5c33cfbd6b2f9bf45024c1098aefbad608b8c84' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/851.cache.html',
      1 => 1451984362,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '248641771568b88a6ba6ce9-70351651',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
?><?php if ($_SESSION['error_message']!=''){?>
    <div class="error-messages">
        <?php echo $_SESSION['error_message'];?>

        <?php echo smarty_function_xr_siteCall(array('fn'=>'fe_user::sc_clearSessionErrorMessage','var'=>'xx'),$_smarty_tpl);?>

    </div>
<?php }?>