<?php /* Smarty version Smarty-3.0.7, created on 2015-11-23 11:45:32
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code3Mc6Pd" */ ?>
<?php /*%%SmartyHeaderCode:14887166525652ee4c4c5f56-73927187%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0afeecd6cb695850470cc58cd7d5de5636105229' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code3Mc6Pd',
      1 => 1448275532,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14887166525652ee4c4c5f56-73927187',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><h1>Default</h1>
<div style="margin:50px; padding:50px; border:5px red solid">
xxxxxxxxxxxxxx
    
</div>

<?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::sc_getUserData",'var'=>"data"),$_smarty_tpl);?>


<div class="searchlist-chat profil">
    
    <div class="col-xs-12">
        <?php echo smarty_function_xr_atom(array('a_id'=>660,'addClass'=>"fromsearch",'data'=>$_smarty_tpl->getVariable('data')->value,'return'=>1),$_smarty_tpl);?>

    </div>

</div>