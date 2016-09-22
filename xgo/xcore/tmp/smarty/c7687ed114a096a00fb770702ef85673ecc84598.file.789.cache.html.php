<?php /* Smarty version Smarty-3.0.7, created on 2016-01-05 12:38:10
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/789.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:983202873568bab221373a0-29113510%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c7687ed114a096a00fb770702ef85673ecc84598' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/789.cache.html',
      1 => 1451984364,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '983202873568bab221373a0-29113510',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
?><?php if ($_smarty_tpl->getVariable('user')->value['wz_PROFILBILD']==0){?>
    <?php echo smarty_function_xr_imgWrapper(array('s_id'=>540,'w'=>197,'h'=>197,'rmode'=>"cco",'class'=>"profileimage"),$_smarty_tpl);?>

<?php }else{ ?>
    <?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('user')->value['wz_PROFILBILD'],'w'=>197,'h'=>197,'rmode'=>"cco",'class'=>"profileimage"),$_smarty_tpl);?>

<?php }?>