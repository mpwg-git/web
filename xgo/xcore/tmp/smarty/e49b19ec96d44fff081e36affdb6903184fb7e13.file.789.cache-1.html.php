<?php /* Smarty version Smarty-3.0.7, created on 2015-11-05 12:36:23
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/789.cache-1.html" */ ?>
<?php /*%%SmartyHeaderCode:1333788016563b3f3763b3c8-46964138%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e49b19ec96d44fff081e36affdb6903184fb7e13' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/789.cache-1.html',
      1 => 1446205007,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1333788016563b3f3763b3c8-46964138',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
?><?php if ($_smarty_tpl->getVariable('user')->value['wz_PROFILBILD']==0){?>
    <?php echo smarty_function_xr_imgWrapper(array('s_id'=>540,'w'=>197,'h'=>197,'rmode'=>"cco",'class'=>"profileimage"),$_smarty_tpl);?>

<?php }else{ ?>
    <?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('user')->value['wz_PROFILBILD'],'w'=>197,'h'=>197,'rmode'=>"cco",'class'=>"profileimage"),$_smarty_tpl);?>

<?php }?>