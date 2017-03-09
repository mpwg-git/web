<?php /* Smarty version Smarty-3.0.7, created on 2017-03-08 13:39:33
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/851.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:65530861058bffb85e3dea9-20191046%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '60d3b8d65f8bbd52187fd6137943d24b94c26614' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/851.cache.html',
      1 => 1488885596,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '65530861058bffb85e3dea9-20191046',
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