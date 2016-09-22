<?php /* Smarty version Smarty-3.0.7, created on 2015-08-24 23:07:41
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codexwhJtR" */ ?>
<?php /*%%SmartyHeaderCode:91100536055db879d07b3d3-69298637%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c185bdefd9d54961cd85d0df935239878e79dfe0' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codexwhJtR',
      1 => 1440450461,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '91100536055db879d07b3d3-69298637',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::sc_getUserData",'var'=>"data"),$_smarty_tpl);?>


<div class="searchlist-chat profil">
    
    <div class="col-xs-4 profil-links">
        <?php echo smarty_function_xr_atom(array('a_id'=>682,'data'=>$_smarty_tpl->getVariable('data')->value,'m_suffix'=>$_smarty_tpl->getVariable('data')->value['wz_id'],'return'=>1),$_smarty_tpl);?>

    </div>
    
    <div class="col-xs-8">
        <?php echo smarty_function_xr_atom(array('a_id'=>660,'addClass'=>"fromsearch",'return'=>1),$_smarty_tpl);?>

    </div>

</div>