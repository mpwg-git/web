<?php /* Smarty version Smarty-3.0.7, created on 2016-08-02 10:21:20
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/851.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:124358081057a058009ed760-47561774%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '60d3b8d65f8bbd52187fd6137943d24b94c26614' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/851.cache.html',
      1 => 1451984362,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '124358081057a058009ed760-47561774',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
?><?php if ($_SESSION['error_message']!=''){?>
    <div class="error-messages">
        <?php echo $_SESSION['error_message'];?>

        <?php echo smarty_function_xr_siteCall(array('fn'=>'fe_user::sc_clearSessionErrorMessage','var'=>'xx'),$_smarty_tpl);?>

    </div>
<?php }?>