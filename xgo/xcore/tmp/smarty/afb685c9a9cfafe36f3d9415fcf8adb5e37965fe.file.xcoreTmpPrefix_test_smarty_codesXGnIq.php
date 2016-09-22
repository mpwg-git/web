<?php /* Smarty version Smarty-3.0.7, created on 2015-11-23 11:45:20
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codesXGnIq" */ ?>
<?php /*%%SmartyHeaderCode:13239226725652ee40c20f89-37559760%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'afb685c9a9cfafe36f3d9415fcf8adb5e37965fe' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codesXGnIq',
      1 => 1448275520,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13239226725652ee40c20f89-37559760',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><h1>Default</h1>
<div style="margin:50px; padding:50px; ">
xxxxxxxxxxxxxx
    
</div>

<?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::sc_getUserData",'var'=>"data"),$_smarty_tpl);?>


<div class="searchlist-chat profil">
    
    <div class="col-xs-12">
        <?php echo smarty_function_xr_atom(array('a_id'=>660,'addClass'=>"fromsearch",'data'=>$_smarty_tpl->getVariable('data')->value,'return'=>1),$_smarty_tpl);?>

    </div>

</div>