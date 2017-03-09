<?php /* Smarty version Smarty-3.0.7, created on 2017-03-10 00:09:16
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/940.cache-4.html" */ ?>
<?php /*%%SmartyHeaderCode:142494515958c1e09cc36a79-40978850%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5562c73a47f1984f0a25be6b426b551ab55877c0' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/940.cache-4.html',
      1 => 1489100948,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '142494515958c1e09cc36a79-40978850',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_feUser')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_feUser.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><?php echo smarty_function_xr_feUser(array('action'=>'isLoggedIn','var'=>'isLoggedIn'),$_smarty_tpl);?>



<?php if ($_smarty_tpl->getVariable('isLoggedIn')->value===true&&($_smarty_tpl->getVariable('P_ID')->value!=6||$_smarty_tpl->getVariable('P_ID')->value!=28)){?>
    <?php echo smarty_function_xr_atom(array('a_id'=>973,'return'=>1),$_smarty_tpl);?>

<?php }else{ ?>
    <?php echo smarty_function_xr_atom(array('a_id'=>974,'return'=>1),$_smarty_tpl);?>

<?php }?>

<?php echo smarty_function_xr_atom(array('a_id'=>880,'showFace'=>0,'return'=>1),$_smarty_tpl);?>
