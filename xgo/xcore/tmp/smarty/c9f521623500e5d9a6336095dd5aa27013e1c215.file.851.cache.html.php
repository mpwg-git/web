<?php /* Smarty version Smarty-3.0.7, created on 2015-11-25 11:58:34
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/851.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:2857390415655945a193a25-56848602%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c9f521623500e5d9a6336095dd5aa27013e1c215' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/851.cache.html',
      1 => 1448448990,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2857390415655945a193a25-56848602',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
?><?php if ($_SESSION['error_message']!=''){?>
    <div class="error-messages">
        <?php echo $_SESSION['error_message'];?>

        <?php echo smarty_function_xr_siteCall(array('fn'=>'fe_user::sc_clearSessionErrorMessage','var'=>'xx'),$_smarty_tpl);?>

    </div>
<?php }?>