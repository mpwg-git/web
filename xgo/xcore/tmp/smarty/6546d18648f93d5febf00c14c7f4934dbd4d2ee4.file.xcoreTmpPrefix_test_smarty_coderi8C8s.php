<?php /* Smarty version Smarty-3.0.7, created on 2015-08-24 11:24:58
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_coderi8C8s" */ ?>
<?php /*%%SmartyHeaderCode:38673214855dae2ea6002c0-33292569%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6546d18648f93d5febf00c14c7f4934dbd4d2ee4' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_coderi8C8s',
      1 => 1440408298,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '38673214855dae2ea6002c0-33292569',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_print_r')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_print_r.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::sc_getUserData",'var'=>"data"),$_smarty_tpl);?>


<?php echo smarty_function_xr_print_r(array('val'=>$_smarty_tpl->getVariable('data')->value),$_smarty_tpl);?>


<div class="profil-map">
    <div class="upper-container">
        <div class="upper default-container-padding">
            
            <a href="<?php echo $_smarty_tpl->getVariable('data')->value['PROFILE']['PROFILE_URL'];?>
">
                <span class="icon-Close"></span>
            </a>
            
            <p class="name">
                Jasmin
            </p>
            <p>
                Mustergasse 10/22 | 1010 Wien
            </p>
        </div>
    </div>
    
    <div id="map" class="map"></div>
    
    
</div>