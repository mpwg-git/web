<?php /* Smarty version Smarty-3.0.7, created on 2014-07-24 19:45:16
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/642.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:28396391353d1462c668021-49732917%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7d4623bc8798c0f649586bd21e19fa54f44ebe3b' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/642.cache.html',
      1 => 1406223916,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '28396391353d1462c668021-49732917',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>'fe_users::is_logged_in','var'=>'loggedin'),$_smarty_tpl);?>

<div class="form-group links" id="logged_in_box">
    <?php if ($_smarty_tpl->getVariable('loggedin')->value==true){?>
    <?php echo smarty_function_xr_siteCall(array('fn'=>'fe_users::get_login_box_data','var'=>'user'),$_smarty_tpl);?>

    <p>HI, <?php echo $_smarty_tpl->getVariable('user')->value['NAME'];?>
 - <a href="<?php echo $_smarty_tpl->getVariable('user')->value['LINK_SIGNOUT'];?>
"><strong>Sign Out</strong></a> <span>&nbsp;|&nbsp;</span> <a href="<?php echo $_smarty_tpl->getVariable('user')->value['LINK_MYARCHIVE'];?>
">My Archive</a> <span>&nbsp;|&nbsp;</span> <a href="<?php echo $_smarty_tpl->getVariable('user')->value['LINK_MYPROFILE'];?>
">My Profile</a></p>
    <?php }else{ ?>
	<a href="<?php echo smarty_function_xr_genlink(array('p_id'=>34),$_smarty_tpl);?>
"><strong>Sign In</strong> <span>&nbsp;|&nbsp;</span> <strong>Sign Up</strong></a>
	<?php }?>
</div>